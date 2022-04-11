<template>
<!-- en el evento click se llama al método eliminarUsuario() -->
    <button
        class="text-red-600 hover:text-red-900  mr-5"
        @click="eliminarUsuario"
        >Eliminar</button>
</template>

<script>
export default {
    props: ['userId'],
    methods: {
        eliminarUsuario(){
            // console.log('eliminando...', this.userId)
            // incorporamos sweetalert2 y lo personalizamos
            this.$swal.fire({
            title: '¿Desea eliminar este usuario?',
            text: "Una vez eliminado no se puede recuperar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrarlo!',
            cancelButtonText: 'No'
            }).then((result) => {
            if (result.isConfirmed) {

                // TODO: Enviar petición a axios

                this.$swal.fire(
                    'Usuario Eliminado!',
                    'Se eliminó Correctamente',
                    'success'
                )
            }
            })
        }
    },

}
</script>
