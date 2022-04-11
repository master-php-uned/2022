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
            console.log('eliminando...', this.userId)
        }
    },

}
</script>
