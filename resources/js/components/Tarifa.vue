<template>
    <div class="seccion">
        <div class="text-center text-titulo">
            <h1>PAGAMIENTO</h1>
        </div>
        <div
            class="col"
            v-for="(tarifa, index) in tarfiasArray"
            :key="tarifa.id"
        >
            <p>{{ tarifa.id }}</p>
            <p>{{ tarifa.tipo_tarifa }}</p>
            <p>{{ tarifa.precio }}</p>
            <p>{{ tarifa.descripcion_tarifa }}</p>
    </div>
        <main></main>
    </div>
</template>

<script>
export default {
    name: "tarifa",
    data() {
        return {
            tarifas: null,
            tarfiasArray: [],
            idtarifa: this.$route.params.idtarifa,
        };
    },
    mounted() {
        // var self = this;
        // this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        //     this.$axios
        //         .get("/api/tarifasSelect")
        //         .then((response) => {
        //             this.tarifas = response.data;
        //             console.log(response.data);
        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         });
        // });
        this.$axios
            .post("/api/tarifasSelect", {
                id: this.idtarifa,
            })
            .then((response) => {
                var tarifas = response.data;
                this.tarfiasArray.push(tarifas);
                console.log(tarifas);
            })
            .catch(function (error) {
                console.error(error);
            });
    },
};
</script>

<style scoped></style>
