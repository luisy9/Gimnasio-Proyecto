<template>
    <div class="seccion">
        <div class="text-center text-titulo">
            <h1>PAGAMIENTO</h1>
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
        this.$axios
            .post("/api/userSelect", {
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
