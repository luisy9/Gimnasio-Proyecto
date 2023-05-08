<template>
    <!-- BANNER-->
    <div class="banner-home">
        <div class="banner-text">
            <p class="text-white">
                Transforma tu cuerpo y mejora tu salud con nuestro gimnasio.
                Entrenamiento personalizado, clases de fitness y planes
                nutricionales para alcanzar tus objetivos. ¡Abónate hoy mismo y
                comienza tu transformación!
            </p>
            <a href="/Tarifa">
                <button class="button-secondary">Abonarse</button>
            </a>
        </div>
    </div>
    <!-- SEC1 TARIFAS-->
<<<<<<< HEAD
    <div v-if="this.membership && this.userRole == 'default_user'">
        <h1 class="pt-5" style="text-align: center;">Clases del gimnasio!</h1>
    </div>
    <div v-if="!this.membership || this.userRole == 'admin'">
        <div class="seccion">
            <div class="text-center text-titulo">
                <h1>NUESTRAS TARIFAS</h1>
            </div>
            <main>
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <div v-for="(tarifa, index) in tarifas" :key="index">
                        <div class="col">
                            <div
                                class="card mb-4 rounded-3 shadow-sm border-dark"
                            >
                                <div class="card-header py-3 border-dark">
                                    <h4 class="my-0 fw-normal">
                                        {{ tarifa.tipo_tarifa }}
                                    </h4>
                                </div>
                                <div class="card-body carta-color tarjeta">
                                    <h1 class="card-title pricing-card-title">
                                        {{ tarifa.precio }}€<small
                                            class="text-body-secondary fw-light"
                                            >/mes</small
                                        >
                                    </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>{{ tarifa.descripcion_tarifa }}</li>
                                    </ul>
                                    <div
                                        v-if="userRole == 'admin'"
                                        class="pb-3"
                                    >
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteTarifa(tarifa.id)"
                                        >
                                            Delete
                                        </button>
                                    </div>

                                    <router-link
                                        :to="`/pago/${tarifa.id}/${this.iduser}`"
                                    >
                                        <button
                                            class="button-primary"
                                            @click="navigate"
                                        >
                                            Seleccionar
                                        </button>
                                    </router-link>
                                </div>
=======
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
>>>>>>> 22fbc43fea100e3ddfd489d9ba770c7b5b665f76
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
            </main>
        </div>
    </div>

    <!-- SEC2  ELEGIRNOS-->
    <div class="seccion mx-0 mb-0">
        <div class="text-center text-titulo">
            <h1>NUESTRO CLUB</h1>
        </div>
        <div class="row">
            <div class="col-md-7 imagen-prueba"></div>
            <div class="col-md-5">
                <div
                    style="
                        height: 500px;
                        width: 600px;
                        margin-top: 60px;
                        margin-left: -100px;
                    "
                >
                    <h2>¿PARA QUÉ?</h2>
                    <ul class="list-unstyled listaguion mt-3 mb-4">
                        <li>
                            Desarrollar el crecimiento muscular y la fuerza
                            física.
                        </li>
                        <li>
                            Para obtener una mayor resistencia y unos músculos
                            más tonificados y prominentes.
                        </li>
                        <li>Aumentar la masa muscular reduciendo la grasa.</li>
                        <li>
                            Fortalecer la resistencia ósea combatiendo la
                            pérdida de densidad (osteoporosis) con cargas
                            progresivas
                        </li>
                        <li>
                            Estimular la confianza personal ayudándote a
                            conseguir un cuerpo con el que te sientas bien.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home",

    data() {
        return {
            tarifas: [],
            membership: null,
            userRole: null,
            iduser: null,
            strSuccess: "",
            strError: "",
        };
    },

    mounted() {
        if (window.Laravel.isLoggedin) {
            this.iduser = window.Laravel.user.id;
            this.userRole = window.Laravel.user.roles[0].nombre_role;
            console.log(this.userRole);
        }
        var self = this;
        axios.get("/Tarifa").then(function (response) {
            return (self.item = response.data);
        });

        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/membership/${this.iduser}`)
                .then((response) => {
                    this.membership = response.data;
                    console.log(this.membership);
                })
                .catch(function (error) {
                    console.log(error);
                });
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

    methods: {
        deleteTarifa(id) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .delete("/api/deleteTarifas/" + id)
                    .then((response) => {
                        const index = this.tarifas.findIndex(
                            (tarifa) => tarifa.id === id
                        );
                        this.tarifas.splice(index, 1);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        },
    },
};
</script>

<style scoped></style>
