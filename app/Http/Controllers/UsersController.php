<?php

namespace App\Http\Controllers;

use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mostramos un listado de los usuarios
        // Consulta al modelo de usuario
        $users = User::Paginate(3);

        // dd($users);
        // retornamos la vista a la que se pasan los usuarios
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Cosultas al modelo de typo de usuario
        $types = TypeUser::all();

        return view('users.create')
                    ->with('types', $types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación y mensajes de validación
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'type_id' => 'required',
        ], [
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.string' => 'El campo Nombre no puede ser un número.',
            'name.max' => 'El campo Nombre no ha de tener más de 255 caracteres.',
            'email.required' => 'El campo Correo Electrónico es obligatorio.',
            'email.email' => 'El Correo Electrónico debe ser valido.',
            'email.unique' => 'El Correo Electrónico ya existe en nuestra base de datos.',
            'password.required' => 'El campo Contraseña es obligatorio.',
            'password.min' => 'El campo Contraseña ha de contener al menos 8 caracteres.',
            'password.confirmed' => 'Las Contraseñas no coinciden.',
            'type_id.required' => 'El campo Tipo de Usuario es obligatorio'
        ]);

        // Almacenar en la base de datos

        if($data) {
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->type_id = $data['type_id'];
            $user->save();
        }

        // Redireccionar a la lista de usuarios
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Cosultas al modelo de typo de usuario y paso de valores a la vista junto con los valores de user
        $types = TypeUser::all();

        return view('users.edit')
                    ->with('types', $types)
                    ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());

        // Validación y mensajes de validación
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required',
        ], [
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.string' => 'El campo Nombre no puede ser un número.',
            'name.max' => 'El campo Nombre no ha de tener más de 255 caracteres.',
            'type_id.required' => 'El campo Tipo de Usuario es obligatorio'
        ]);

        // dd($user->name);
        // Se pasan los datos modificados a la instancia del objeto
        $user->name = $data['name'];
        $user->type_id = $data['type_id'];

        // Se guardan los resultados
        $user->save();

        // redireccionamos
        return redirect()->route('users.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // comprobamos lo que estamos enviando por la petición axios con json() conectamos php con javascript
        // return response()->json($user);

        $user->delete();

        return response()->json(['mensaje' => 'Se eliminó el usuario ' . $user->name]);
    }
}
