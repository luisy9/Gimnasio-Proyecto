<template>
    <div class="seccion">
        <div class="text-center text-titulo">
            <h1>NUESTRAS TARIFAS</h1>
        </div>
        <div class="seccion">
            <main>
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-dark">
                            <div class="card-header py-3 border-dark">
                                <h4 class="my-0 fw-normal">CUOTA BÁSICA</h4>
                            </div>
                            <div class="card-body carta-color tarjeta">
                                <h1 class="card-title pricing-card-title">
                                    19,90€<small
                                        class="text-body-secondary fw-light"
                                        >/mes</small
                                    >
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Horario de 7 a 14</li>
                                    <li>Sin reserva</li>
                                    <li>Acceso a sala de musculación</li>
                                    <li>Mes de apertura gratuito</li>
                                    <li>Acceso ilimitado</li>
                                </ul>
                                <a href="/Pago">
                                    <button class="button-primary">
                                        Seleccionar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-dark">
                            <div
                                class="card-header py-3 text-bg-dark border-dark"
                            >
                                <h4 class="my-0 fw-normal">CUOTA PREMIUM</h4>
                            </div>
                            <div class="card-body carta-color tarjeta">
                                <h1 class="card-title pricing-card-title">
                                    29,90€<small
                                        class="text-body-secondary fw-light"
                                        >/mes</small
                                    >
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Acceso a horario completo</li>
                                    <li>Reserva con 48h de antelacion</li>
                                    <li>Planes de entrenamiento online</li>
                                    <li>Acceso a todas las salas</li>
                                    <li>Mes de apertura gratuito</li>
                                    <li>Acceso ilimitado</li>
                                </ul>
                                <a href="/Pago">
                                    <button class="button-primary">
                                        Seleccionar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-dark">
                            <div class="card-header py-3 border-dark">
                                <h4 class="my-0 fw-normal">CUOTA PRO</h4>
                            </div>
                            <div class="card-body carta-color tarjeta">
                                <h1 class="card-title pricing-card-title">
                                    25,70€<small
                                        class="text-body-secondary fw-light"
                                        >/mes</small
                                    >
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Acceso a horario completo</li>
                                    <li>Reserva con 36h de antelacion</li>
                                    <li>Acceso a sala de musculación</li>
                                    <li>Mes de apertura gratuito</li>
                                    <li>Acceso ilimitado</li>
                                </ul>
                                <a href="/Pago">
                                    <button class="button-primary">
                                        Seleccionar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
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
