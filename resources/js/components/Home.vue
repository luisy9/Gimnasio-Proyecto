<template>
    <!-- BANNER-->
    <div v-if="this.membership == false" class="banner-home">
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
    <div v-if="this.membership == true" class="banner-home">
        <div class="banner-text">
            <p class="text-white" v-if="this.isPro">
                Enhorabuena eres Miembro Pro!<br />
                Crear tu primera rutina o Inscribete en nuestras clases!
            </p>
            <p class="text-white" v-else>
                Ya eres de los nuestros!<br />
                Quieres reservar tu primera clase?
            </p>
            <a href="/Entrenamiento" v-if="this.isPro">
                <button class="button-secondary">Crea tu Rutina</button>
            </a>
            <a href="/clasesDirigidas">
                <button class="button-secondary">Clases Dirigidas</button>
            </a>
        </div>
    </div>
    <div class="seccion mx-0 mb-0" v-if="isPro">
        <div class="text-center text-titulo">
            <h1>Crea tu Rutina</h1>
        </div>
        <div class="row">
            <div class="col-md-12 imagen-rutina">
                <div class="banner-text">
                    <section>
                        <h2 class=""><b>Eres miembro Pro enhorabuena!</b></h2>
                            <p class="pt-3">Siendo miemnbro Pro podras crear tus propias rutinas y poder verlas cuando quieras</p>
                            <router-link to="/Entrenamiento">
                                <button class="button-secondary my-2">Mis Rutinas</button>
                            </router-link>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="seccion mx-0 mb-0">
        <div class="text-center text-titulo">
            <h1>Miembro Pro</h1>
        </div>
        <div class="row">
            <div class="col-md-12 imagen-rutina">
                <div class="banner-text">
                    <section>
                        <h2 class=""><b>Hazte miembro Pro!</b></h2>
                            <p class="pt-3">Si te haces miembro Pro, podras tener acceso a todas las rutinas que quieras totalmente personalizadas solo para ti!!</p>
                            <router-link to="/Tarifa">
                                <button class="button-primary my-2">Hacerme Pro</button>
                            </router-link>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- SEC1 TARIFAS-->
    <!--
    <div v-if="this.membership && this.userRole == 'default_user'">
        <h1 class="pt-5" style="text-align: center">Clases del gimnasio!</h1>
    </div>
    <div v-if="!this.membership || this.userRole == 'admin'">
        <div class="seccion">
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
                                            class="button-primary my-4"
                                            @click="navigate"
                                        >
                                            Seleccionar
                                        </button>
                                    </router-link>
<<<<<<< HEAD
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!-- </main>
        </div>
    </div>
                                </div>-->

    <div class="seccion">
        <div class="text-center text-titulo">
            <h1>NUESTRAS TARIFAS</h1>
        </div>
        <main>
            <div v-if="this.membership || !this.membership">
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <div v-for="(tarifa, index) in tarifas" :key="index">
                        <div class="col">
                            <div
                                class="card mb-4 rounded-3 shadow-sm border-dark"
                            >
                                <div
                                    class="card-header py-3 border-dark bg-dark"
                                >
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
                                            <li class="tarjeta-text my-2">
                                                {{ descripcion }}
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                                <h1
                                    class="card-title pricing-card-title precio"
                                >
                                    {{ tarifa.precio }}€<small
                                        class="text-body-secondary fw-light"
                                        >/mes</small
                                    >
                                </h1>
                                <div v-if="!this.membership">
                                    <router-link
                                        :to="`/pago/${tarifa.id}/${this.iduser}`"
                                    >
                                        <button
                                            class="button-primary my-4"
                                            @click="navigate"
                                        >
                                            Seleccionar
                                        </button>
                                    </router-link>
                                </div>
                                <div v-if="this.membership">
                                    <router-link
                                        :to="`/cambiarTarifa/${tarifa.id}/${this.iduser}`"
                                    >
                                        <button
                                            class="button-primary my-4"
                                            @click="navigate"
                                        >
                                            Cambiar
                                        </button>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div v-if="this.membership">
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <div v-for="(tarifa, index) in tarifas" :key="index">
                        <div class="col">
                            <div
                                class="card mb-4 rounded-3 shadow-sm border-dark"
                            >
                                <div
                                    class="card-header py-3 border-dark bg-dark"
                                >
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
                                            <li class="tarjeta-text my-2">
                                                {{ descripcion }}
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                                <h1
                                    class="card-title pricing-card-title precio"
                                >
                                    {{ tarifa.precio }}€<small
                                        class="text-body-secondary fw-light"
                                        >/mes</small
                                    >
                                </h1>
                                <div v-if="!this.membership">
                                    <router-link
                                        :to="`/pago/${tarifa.id}/${this.iduser}`"
                                    >
                                        <button
                                            class="button-primary my-4"
                                            @click="navigate"
                                        >
                                            Seleccionar
                                        </button>
                                    </router-link>
                                </div>
                                <div v-if="userRole == 'admin'" class="pb-3">
                                    <button
                                        class="btn btn-danger"
                                        @click="deleteTarifa(tarifa.id)"
                                    >
                                        Delete
                                    </button>
                                </div>
                                <div v-if="this.membership">
                                    <router-link
                                        :to="`/cambiarTarifa/${tarifa.id}/${this.iduser}`"
                                    >
                                        <button
                                            class="button-primary my-4"
                                            @click="navigate"
                                        >
                                            Cambiar
                                        </button>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </main>
    </div>
    <!-- SEC2  ELEGIRNOS-->
    <div class="seccion mx-0 mb-0">
        <div class="text-center text-titulo">
            <h1>NUESTRO CLUB</h1>
        </div>
        <div class="row">
            <div class="col-md-7 imagen-prueba"></div>
            <div class="col-md-5">
                <div class="club-home">
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
            categorias: null,
            membership: null,
            userRole: null,
            iduser: null,
            strSuccess: "",
            strError: "",
            isPro: null
        };
    },

    mounted() {
        if (window.Laravel.isLoggedin) {
            this.iduser = window.Laravel.user.id;
            console.log(this.iduser);
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
                    if (this.membership == 0) {
                        console.log("dkasmdkas");
                        console.log((this.membership = false));
                    } else {
                        this.membership = true;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        });

        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/showCategorias")
                .then((response) => {
                    this.categorias = response.data;
                    // this.categorias.push(response.data);
                    console.log(this.categorias);
                    // this.membership = response.data;
                    // if (this.membership == 0) {
                    //     console.log("dkasmdkas");
                    //     console.log(this.membership = false);
                    // }else{
                    //     this.membership = true;
                    // }
                })
                .catch(function (error) {
                    console.log(error);
                });
        });

        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .get("/api/isUserPro/" + this.iduser)
                    .then((response) => {
                        this.isPro = response.data;
                        if (this.isPro == 0) {
                            console.log("dkasmdkas");
                            console.log((this.isPro = false));
                        } else {
                            this.isPro = true;
                        }
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
                    console.log(this.tarifas);
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
                    .delete("/api/tarifasDelete/" + id)
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

<style scoped>
.banner-home {
    background-image: url("../../img/banner.webp");
    height: 50em;
    background-size: cover;
    background-position: center;
    opacity: 0.9;
    background-repeat: no-repeat;
}

.banner-text {
    padding-top: 9.375em;
    padding-left: 5em;
    width: 40em;
}

.imagen-rutina {
    background-image: url("../../img/creaTuRutina.jpg");
    height: 40.5rem;
    background-size: cover;
    background-repeat: no-repeat;
}
.imagen-prueba {
    background-image: url("../../img/seccion3.webp");
    /* height: 37.5em; */
    background-size: cover;
    background-repeat: no-repeat;
}

.listaguion li {
    list-style-type: none;
    margin-bottom: 0.625em;
}

.listaguion li:before {
    content: "-";
}

.club-home {
    height: 500px;
    width: 600px;
    margin-top: 60px;
    margin-left: -100px;
}

/** TABLET */
@media (max-width: 1500px) {
    .banner-home {
        background-image: url("../../img/bannerOsc.webp");
        opacity: 5;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .banner-text {
        padding: 0em;
        padding-left: 2em;
        padding-right: 2em;
        text-align: center;
    }

    .club-home {
        height: 500px;
        width: 600px;
        margin-top: 60px;
        margin-left: 0;
    }
}

/** MOVIL */
@media (max-width: 400px) {
    .club-home {
        height: 100%;
        width: 100%;
        margin-top: 40px;
        margin-left: 0;
    }
    .imagen-prueba {
        background-image: url("../../img/boxer-gca6b9b9c3_1280.jpg");
    }
}
</style>
