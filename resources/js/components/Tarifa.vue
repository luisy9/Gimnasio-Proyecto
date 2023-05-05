<template>
    <div class="seccion">
        <div class="text-center text-titulo">
            <h1>NUESTRAS TARIFAS</h1>
        </div>
        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div v-for="(tarifa, index) in tarifas" :key="index">
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-dark">
                            <div class="card-header py-3 border-dark bg-dark">
                                <h4 class="my-0 fw-normal text-light">
                                    <b>
                                        {{ tarifa.tipo_tarifa }}
                                    </b>
                                </h4>
                            </div>
                            <div class="card-body carta-color tarjeta">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <div
                                        v-for="descripcion in tarifa.descripcion_tarifa.split(
                                            ','
                                        )"
                                    >
                                        <li class="tarjeta-text my-2">{{ descripcion }}</li>
                                    </div>
                                </ul>
                            </div>
                            <h1 class="card-title pricing-card-title precio">
                                {{ tarifa.precio }}€<small
                                    class="text-body-secondary fw-light"
                                    >/mes</small
                                >
                            </h1>
                            <router-link :to="`/pago/${tarifa.id}`">
                                <button
                                    class="button-primary my-4"
                                    @click="navigate"
                                >
                                    Seleccionar
                                </button>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
export default {
    name: "tarifa",
    data() {
        return {
            tarifas: [],
            strSuccess: "",
            strError: "",
        };
    },

    mounted() {
        var self = this;
        axios.get("/Tarifa").then(function (response) {
            return (self.item = response.data);
        });
    },
    created() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/tarifas")
                .then((response) => {
                    this.tarifas = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
};
</script>

<style scoped></style>
