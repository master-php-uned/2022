<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Canal;
use App\Models\Lista;
use App\Models\ListaReproduccion;
use App\Models\Video;
use App\Innovanda\DatosYoutube;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class ListaController extends Controller
{
    /**
     * constructor
     */
    public function __construct()
    {

    }

    /**
     * Listado de todos los playlist en orden alfabético en base de datos
     * GET      /api/lista    lista.index
     */
    public function index()
    {
        $listas = Lista::orderBy('nombre', 'asc')->get();
        // comprobamos la existencias de listas
        // if(count($listas) > 0){
        //     // recuperar categoirías de lista
        //     foreach ($listas as $lista)
        //     {
        //         $lista->categorias = DB::table('canalcategorias')->select('idcategoria')->where('idcanal', $lista->id)->get();
        //     }
        // }

        return $listas;
    }

    /**
     * Insertar nuevo playlist en base de datos
     * POST 	/api/lista      lista.store
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        // fecha actual para contador (Los Ángeles)
        $f = new \DateTime("now", new \DateTimeZone('America/Los_Angeles'));

        // búsqueda por PlaylistId
        // formatos: código 34 carácteres, https://www.youtube.com/playlist?list={codigo}/*
        // if (preg_match("/^PL[a-z,A-Z,0-9,_,-]{32}$/", $request->dato)
            // || preg_match("/^https:\/\/www\.youtube\.com\/playlist?list=\/PL[a-z,A-Z,0-9,_,-]{32}[\/,a-z]*$/", $request->dato)
        // )
        // {
            // obtener código
            $cod = $request->dato;
            // else $cod = substr(strstr($request->dato, 'playlist?list='), 14, 34);
            if ($request->channelid != 0) $channelid = $request->channelid;
            $etag = $request->etag;
            $yt = new DatosYoutube($f->format('Y-m-d'));
            $lista = $yt->getListasReproduccionCanalPorId($channelid, $cod ,$etag);
            if ($lista === null)
            {
                return response()->json(['error' => 'No existe un canal con ese Código.']);
            }


            return $this->guardarLista($lista);
        // }
        // //https://www.youtube.com/user/IslasDeCultura
        // else if (preg_match("/^https:\/\/www\.youtube\.com\/user\/[\pL,\pN,_,-]+(\/[a-z,A-Z,0-9,_,-]*|)$/", $request->dato))
        // {
        //     $nombre = substr(strstr($request->dato, 'user/'), 5);
        //     if (strpos($nombre, '/') !== false) $nombre = strstr($nombre, '/', true);
        //     $yt = new DatosYoutube($f->format('Y-m-d'));
        //     $canales = $yt->getDatosCanalesPorUsuario($nombre);
        //     if ($canales === null)
        //     {
        //         return response()->json([
        //             'error' => 'No existe un canal con ese nombre de usuario',
        //         ]);
        //     }
        //     $oError = null;
        //     $salidaCanales = array(); // listado de canales de salida de función
        //     if (is_array($canales))
        //     {
        //         foreach($canales as $canal)
        //         {
        //             // guardar canal en base de datos
        //             $c = $this->guardarCanal($canal);
        //             // comprobar si hubo error
        //             if (!$c instanceof Canal) $oError = $c; // mensaje de error
        //             else $salidaCanales[] = $c; // añadir canal al listado de salida
        //         }
        //     }
        //     if ($oError) return response()->json(['error' => $oError]);
        //     else return $salidaCanales;
        // }
        // // https://www.youtube.com/c/IslasDeCultura/videos
        // else if (preg_match("/^https:\/\/www\.youtube\.com\/c\/[\pL,\pN,_,-,%]+(\/[a-z,A-Z,0-9,_,-]*|)$/u", $request->dato))
        // {
        //     $nombre = substr(strstr($request->dato, 'c/'), 2);
        //     if (strpos($nombre, '/') !== false) $nombre = strstr($nombre, '/', true);
        //     // si no está adaptado el nombre a URL lo convertimos
        //     if (!preg_match("/%/", $nombre)) $nombre = urlencode($nombre);
        //     $yt = new DatosYoutube($f->format('Y-m-d'));
        //     $canal = $yt->getDatosCanalPorCURL("https://www.youtube.com/c/" . $nombre);
        //     if ($canal === null)
        //     {
        //         return response()->json(['error' => 'No existe un canal con esa URL']);
        //     }

        //     return $this->guardarCanal($canal);
        // }
        // else
        // {
        //     return response()->json(['error' => 'El URL o código no tiene un formato correcto']);
        // }

    }

    /**
     * Guardar o recuperar lista en base de datos
     * @param Lista $lista datos de lista a guardar
     * @return Json|Lista
     */
    private function guardarLista($lista)
    {
        var_dump($lista);


        try
        {
            // comporbar si la lista fue eliminada anteriormente
            $auxLista = Lista::onlyTrashed()->where('listid', $lista->listid)->first();
            if ($auxLista) // la lista está en la base de datos en estado "eliminado"
            {
                // restaurar lista con nuevos datos
                $auxLista->nombre = $lista->nombre;
                $auxLista->descripcion = $lista->descripcion;
                $auxLista->imagen = $lista->imagen;
                $auxLista->etagDatos = $lista->etagDatos;
                // poner valor en campo "actualizado" que obligue a la ejecutar la recuperación del listado de listas de reproducción en segundo plano
                $tiempoReferencia = new \DateTime();
                $tiempoReferencia->sub(new \DateInterval("PT" . Config::get('youtube.youtube_tiempo_actualizar_canal') . "H"));
                $auxLista->actualizado = $tiempoReferencia->format('Y-m-d H:i:s');
                $auxLista->restore();

                // recuperar listas de reproducción
                $auxListas = Lista::onlyTrashed()->where('idcanal', $auxLista->id)->get();
                foreach($auxListas as $lista)
                {
                    $lista->restore();
                    // recuperar videos de lista
                    $auxVideos = Video::onlyTrashed()->where('idlistarep', $lista->id)->get();
                    foreach($auxVideos as $video)
                    {
                        $video->restore();
                    }
                }
                return $auxLista;
            }
            else
            {
                $lista->save(); // guardar nuevo canal en base de datos
            }
        }
        catch (QueryException $e)
        {
            if ($e->getCode() == 23000)
            {
                return response()->json(['error' => 'Lista ya existe.']);
            }
            else
            {
                return response()->json(['error' => 'Error al insertar lista en base de datos.']);
            }
        }
        return $lista;
    }


//     /**
//      * Eliminar Lista y videos asociados en base de datos
//      * DELETE 	/api/lista/{listid}      destroy
//      * @param int $id   id de lista en base de datos
//      * @return void
//      */
//     public function destroy(int $id)
//     {
//         // datos de lista
//         $lista = Lista::find($id);
//         // listas de reproducción asociadas al canal
//         // $listas = ListaReproduccion::where('idcanal', $id)->get();

//         // foreach ($listas as $lista)
//         // {
//             // obtener videos de la lista
//             $videos = Video::where('listid', $lista->id)->get();
//             // eliminar videos de lista
//             foreach($videos as $video)
//             {
//                 $video->delete();
//             }
//             // eliminar lista
//             $lista->delete();
//         // }
//         // eliminar asociación de categorías
//         // DB::table('canalcategorias')->where('idcanal', $id)->delete();
//         // eliminar lista
//         $lista->delete();
//     }

//     /**
//      * Asignar categoría a una lista
//      * @param Request $request datos de consulta
//      * @param int $id identificador de canal
//      */
//     // public function establecerCategoria(Request $request, $id)
//     // {
//     //     DB::table('canalcategorias')->insert(['idcanal' => $id, 'idcategoria' => $request->cat]);
//     // }

//     /**
//      * Quitar categoría a una lista
//      * @param Request $request datos de consulta
//      * @param int $id identificador de canal
//      */
//     // public function quitarCategoria(Request $request, $id)
//     // {
//     //     DB::table('canalcategorias')->where('idcanal', $id)->where('idcategoria', $request->cat)->delete();
//     // }

//     /**
//      * Eliminar totalmente lista y videos asociados en base de datos
//      * PUT 	/api/lista/purgar/{idlista}
//      * @param int $id   id de lista en base de datos
//      * @return void
//      */
//     public function purgar(int $id)
//     {
//         // datos de lista
//         $lista = Lista::find($id);

//         // obtener videos de la lista
//         $videos = Video::where('listid', $lista->id)->get();
//         // eliminar videos de lista
//         foreach($videos as $video)
//         {
//             $video->forceDelete();
//         }
//         // eliminar lista
//         $lista->forceDelete();

//     }
}

