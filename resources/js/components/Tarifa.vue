<template>
    <div class="seccion">
        <div class="text-center text-titulo">
            <h1>PAGAMIENTO</h1>
        </div>
        <p>{{ $route.params.idtarifa }}</p>
        <main></main>
    </div>
</template>

<script>
export default {
    name: "tarifa",
    data() {
        return {
            tarifas: null,
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
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .post("api/tarifasSelect")
                .then((response) => {
                    if (response.data.success) {
                        console.log(response.data);
                    } else {
                        console.log(response);
                    }
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    },
};
</script>

<style scoped></style>
