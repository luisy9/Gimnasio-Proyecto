<template>
    <h1 class="text-center">Ejercicios de {{ this.nombre_categoria }}</h1>
    <div
        class="card-body p-4"
        v-for="(ejerci, index) in ejercicios"
        :key="ejerci.id"    
    >
        {{ ejercicios[index].id }}
        {{ ejercicios[index].nombre_ejercicio }}
    </div>
    <!-- <img :src="`${ejercicios[0].imagen_ejercicio}`"> -->
</template>

<script>
export default {
    name: "EjerciciosMusculo",

    data() {
        return {
            nombre_categoria: null,
            ejercicios: null,
            id_ejercicio: null,
            nombre_ejercicio: null,
            imagen_ejercicio: null,
            idcategoria: this.$route.params.idcategoria,
        };
    },

    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/showMusculitos/" + this.idcategoria)
                .then((response) => {
                    // console.log(response.data[0].nombre_ejercicio);
                    this.ejercicios = response.data;
                    // for (let i = 0; i < 5; i++) {
                    //     this.ejercicios = response.data[i];
                    //     console.log(this.ejercicios);
                    // }
                    this.id_ejercicio = response.data[0].id;
                    this.nombre_ejercicio = response.data[0].nombre_ejercicio;
                    this.imagen_ejercicio = response.data[0].imagen_ejercicio;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });

        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/showCategoria/" + this.idcategoria)
                .then((response) => {
                    this.nombre_categoria = response.data.nombre_categoria;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
};
</script>

<style scoped></style>
