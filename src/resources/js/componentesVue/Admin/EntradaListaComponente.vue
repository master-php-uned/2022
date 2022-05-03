<template>
    <div class="col" style='margin:15px 0;'>
        <div v-if="lista" class="card" style="width: 18rem;">
            <img :src="lista.imagen" class="card-img-top" :alt="lista.nombre">
            <div class="card-body overflow-auto" style='height:250px'>
                <h5 class="card-title">{{ lista.nombre }}</h5>
                <p v-if="lista.descripcion" class="card-text" v-html="des"></p>
            </div>
            <div class="card-footer">
                <div><small v-if="lista.fecha" class="text-muted" style="padding-bottom: 15px; display: inline-block;">{{ preFecha(lista.fecha) }}</small></div>
                <div class="text-center">
                    <button type="button" class="btn btn-outline-success " @click="ventanaCategoria()">
                        <i class="bi bi-bookmark-plus"></i>
                    </button>
                    <button type="button" class="btn btn-outline-primary ms-2" @click="irEnlace(lista.listid)">
                        <i class="bi bi-link"></i>
                    </button>
                    <button type="button" class="btn btn-outline-danger ms-2" @click="eliminar()">
                        <i class="bi bi-trash"></i>
                    </button>
                    <button v-if="administrador" type="button" class="btn btn-outline-danger ms-2" @click="purgar()">
                        <i class="bi bi-x-square"></i>
                    </button>
                </div>
                <!-- <div v-for="cat in canal.categorias" :key="cat.idcategoria" style='margin-top:10px'>
                    <button class="categoriaCanal">
                        {{ nombreCategoria(cat.idcategoria) }}
                        <img src="/img/eliminar.png" @click="eliminarCategoria(cat.idcategoria)"/>
                    </button>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        /**
         * Datos de la lista a mostrar
         * listado de categorías
         * Índica si el usuario actual es administrador
         */
        props: [
            'lista',
            'categorias',
            'administrador'
        ],
        data(){
            return {
                des: "", // descripción con ajuste de saltos de línea
            }
        },
        mounted()
        {
            // ajustar saltos de línea
            des = lista.descripcion.replaceAll("<", "&lt;").replaceAll(">", "&gt;").replaceAll("\n", "<br />");

        },

        methods:{
            /**
             * Cambiar formato de fecha para mostrar
             * @param string f fecha en formato AAAA-MM-DD HH:mm:ss
             * @return string fecha en formato DD/MM/AAAA
             */
            preFecha(f)
            {
                let t = f.substring(0,10).split('-');
                return t[2] + "/" + t[1] + "/" + t[0];
            },
            /**
             * enviar a componente padre un mensaje de eliminación de este canal
             */
            eliminar()
            {
                this.$emit('eliminar', this.list.id);
            },
            /**
             * enviar a componente padre un mensaje de purgación de canal
             */
            purgar()
            {
                this.$emit('purgar', this.list.id);
            },
            /**
             * Abre nueva ventana con la dirección url del playlist
             */
            irEnlace(id)
            {
                window.open("https://www.youtube.com/playlist?list=" + id, "_blank");
            },
            /**
             * Abrir ventana para seleccionar categoría a ñadir al canal
             * enviar mensaje a componente padre
             */
            ventanaCategoria()
            {
                this.$emit('selCategoria', this.canal.id, this.canal.categorias);
            },
            /**
             * Eliminar la categoría para el canal
             * @param idcat identificador de categoría
             */
            eliminarCategoria(idcat)
            {
                const parametros = {data: {cat: idcat}};

                // llamada a API de aplicación para asignar categoría
                axios.delete('/api/canal/categorias/' + this.canal.id, parametros).then((respuesta) =>
                {
                    if (respuesta.data.error) // error en operación
                    {
                        alert(respuesta.data.error);
                    }
                    else
                    {
                        // eliminar del listado
                        // buscar elemento en listado
                        let i;
                        for(i=0; i < this.canal.categorias.length; i++)
                        {
                            if (this.canal.categorias[i].idcategoria == idcat) break;
                        }
                        // eliminar de listado
                        this.canal.categorias.splice(i, 1);
                    }
                });
            },
            /**
             * Nombre de categoiría por ID
             * @param int idcategoria identificador de categoría
             * @return string nombre de categoría
             */
            nombreCategoria(idcategoria)
            {
                for(var i=0; i < this.categorias.length; i++)
                {
                    if (this.categorias[i].id == idcategoria) return this.categorias[i].nombre;
                }
                return null;
            },
        }
    }
</script>
