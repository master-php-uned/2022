<template>
    <div class="modal fade" :id="identificador" tabindex="-1" role="dialog" aria-labelledby="NuevaLista" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">A&ntilde;adir nueva Lista</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="datocanal">Canal de la Lista</label>
                    <select class="form-select" placeholder="Canal" name="datocanal" id="datocanal" aria-label="canal" @change="cambioCanal" v-model="filtroCanal">
                        <option value="" selected disabled> -- Selección de canal -- </option>
                        <option value="0"> Todos los canales </option>
                        <option v-for="canal in canales" :key="canal.id" :value="canal.id">
                            {{ canal.nombre }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="datolista">URL o c&oacute;digo de la lista</label>
                    <input type="text" class="form-control" id="datolista" name="datolista" placeholder="URL o código" value="" v-model="codigo" v-bind:disabled="trabajando">
                </div>
                <div v-if="avisoVisible" class="alert alert-warning d-flex align-items-center cuadroError" role="alert">
                    <i class="bi bi-exclamation-triangle-fill" style="font-size: 2em;"></i>
                    <div>
                        {{ textoAviso }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" @click="nuevaLista()" v-bind:disabled="trabajando">
                    <span v-if="trabajando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>{{ textoBotonAceptar }}
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" v-bind:disabled="trabajando">Cancelar</button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        /**
         * Identificador para la ventana modal
         */
        props:['identificador'],

        data(){
            return {
                canales: [], // listado de canales
                codigo: "", // texto del cuadro del formulario
                filtroCanal: 1, // canal a mostrar
                avisoVisible: false, // ¿se ve aviso de error?
                textoAviso: "", // texto para aviso de error
                trabajando: false, // Esperando respuesta del servidor en una operación
                textoBotonAceptar: "Aceptar", // texto del botón Aceptar
                cambioCanal: "",
                etag: "", //
            }
        },
        mounted() {
            // cargar listado de canales
            axios.get('/api/canal').then((response) =>
            {
                this.canales = response.data;
            });

            this.$nextTick(function () {
                // Código que se ejecutará solo después de
                // haber renderizado la vista completa
                // al mostrar ventana limpiar datos
                var v = document.getElementById(this.$props.identificador);
                v.addEventListener('shown.bs.modal', function (event) {
                    this.__vue__.limpiar();
                });
            });
        },
        methods:{
            /**
             * Enviar datos a API para crear nueva entrada de lista en base de datos
             */
            nuevaLista()
            {
                // parámetros a enviar
                const parametros = {
                    dato: this.canales[0].channelid,
                    channelid: this.filtroCanal,
                    etag: this.etag
                    };
                    console.log(parametros.channelid);
                    console.log(parametros.dato);
                    console.log(parametros.etag);

                // modificar interfaz a estado "ocupado"
                this.trabajando = true;
                this.textoBotonAceptar = "Cargando...";
                this.avisoVisible = false;

                // llamada a API de aplicación para insertar Lista
                axios.post('/api/lista', parametros).then((respuesta) =>
                {
                    //console.log(respuesta);
                    if (respuesta.data.error) // error en operación
                    {
                        // mostrar mensaje de error
                        if (typeof respuesta.data.error === "object") this.textoAviso = respuesta.data.error.original.error;
                        else this.textoAviso = respuesta.data.error;
                        this.avisoVisible = true;
                    }
                    else
                    {
                        let lista;// datos de lista
                        if (Array.isArray(respuesta.data)) lista = respuesta.data[0];
                        else lista = respuesta.data;
                        // lista.categorias = []; // listado vacío de categorías para lista
                        this.codigo = ""; // limpiar campo
                        this.$emit('nuevaLista', lista); // enviar a componente padre datos de nueva lista
                    }
                    // restaurar la interfaz
                    this.trabajando = false;
                    this.textoBotonAceptar = "Aceptar";
                });

            },
            /**
             * Poner valores inciales para formulario y mensaje de error
             */
            limpiar()
            {
                this.codigo = "";
                this.avisoVisible = false;
            },
            /**
             * Cambio en el select de filtro, canal
             * actualizar listado de vídeo con nuevos valores
             */
            cambioFiltro()
            {

                return this.filtroCanal;
            }
        },
    };
</script>
