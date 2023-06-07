<template>
    <!--<div class="container">-->
    <nav class="navbar navbar-expand-sm navbar-light bg-light nav-padding">
        <div class="movil-vis logo-header">
            <a href="/">
                <img src="../img/nike_logo.svg" alt="Logo" />
            </a>
        </div>

        <a
            class="d-lg-none mx-2"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
            ><img src="../img/menu.svg" width="55px"
        /></a>

        <!--<button
            class="navbar-toggler d-lg-none mx-3"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
        ></button>-->

        <!-- <div class="" v-if="user_role == 2">
            <a>Crear Users</a>
        </div>
        <div class="navbar-nav mx-auto">
            <router-link to="/entrenamiento" class="nav-item nav-link"
                >Entrenamiento</router-link
            >
            <router-link to="/tarifa" class="nav-item nav-link"
                >Tarifas</router-link -->
        <!-- <div v-if="isLoggedin">
                <router-link :to="`/tarifa/${this.iduser}`" class="nav-item nav-link"
                    >Tarifas</router-link
                >
            </div> -->
        <!-- <router-link to="/compania" class="nav-item nav-link"
                >¿Quienes somos?</router-link
            >
        </div> -->
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <div class="" v-if="user_role == 2">
                <a>Crear Users</a>
            </div>
            <ul class="navbar-nav mx-auto" >
                <li class="nav-item">
                    <router-link to="/entrenamiento" class="nav-link"
                        >Mis Rutinas</router-link
                    >
                </li>
                <li class="nav-item">
                    <router-link to="/tarifa" class="nav-link"
                        >Tarifas</router-link
                    >
                </li>
                <li class="nav-item">
                    <router-link to="/wikiEjercicios" class="nav-link"
                        >Wiki de Ejercicios</router-link
                    >
                </li>
                <!-- <li class="nav-item">
                    <router-link to="/compania" class="nav-link"
                        >¿Quienes somos?</router-link
                    >
                </li> -->
                <li class="nav-item vis-mov">
                    <div class="nav-item" v-if="isLoggedin">
                        <a
                            data-toggle="dropdown"
                            class="nav-link dropdown-toggle"
                            role="button"
                            >{{ user.name }}</a
                        >

                        <div
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdownMenuLink"
                        >
                            <router-link
                                :to="`/dashboard/${this.user.id}`"
                                class="nav-item nav-link px-4"
                                >Dashboard</router-link
                            >
                            <router-link
                                :to="`/tuRutina/${this.iduser}`"
                                class="nav-item nav-link px-4"
                                >Mi Rutina</router-link
                            >
                            <router-link
                                :to="`/tuRutina/${this.iduser}`"
                                class="nav-item nav-link px-4"
                                >Clases</router-link
                            >
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="vis-desck login-header">
            <div class="nav-item" v-if="isLoggedin">
                <a
                    data-toggle="dropdown"
                    class="nav-link dropdown-toggle mx-3 login-nav"
                    role="button"
                    >{{ user.name }}</a
                >

                <div
                    class="dropdown-menu login-nav"
                    style="margin-top:6em; margin-left:3em"
                    aria-labelledby="navbarDropdownMenuLink"
                >
                    <router-link
                        :to="`/dashboard/${this.user.id}`"
                        class="nav-item nav-link px-4 py-1"
                        >Dashboard</router-link
                    >
                    <router-link
                        :to="`/tuRutina/${this.iduser}`"
                        class="nav-item nav-link px-4 py-1"
                        >Mi Rutina</router-link
                    >
                    <router-link
                        to="/misClases"
                        class="nav-item nav-link px-4 py-1"
                        >Clases</router-link
                    >
                </div>
            </div>
        </div>
        <div class="movil-vis login-header" v-if="!isLoggedin">
            <a href="/login">
                <img src="../img/logo_login.svg" />
            </a>
        </div>
        <div class="movil-vis logout-header" v-if="isLoggedin">
            <a style="cursor: pointer" @click="logout">
                <img src="../img/logo_logout.svg" />
            </a>
        </div>
    </nav>

    <router-view></router-view>

    <div class="bg-black">
        <footer class="py-3">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="/" class="nav-link px-2 text-light">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="/tarifa" class="nav-link px-2 text-light"
                        >Tarifas</a
                    >
                </li>
                <li class="nav-item">
                    <a href="/entrenamiento" class="nav-link px-2 text-light"
                        >Ejercicios</a
                    >
                </li>
                <li class="nav-item">
                    <a href="/compania" class="nav-link px-2 text-light"
                        >Compañía</a
                    >
                </li>
            </ul>
            <ul
                class="nav justify-content-center list-unstyled d-flex img-footer my-4"
            >
                <li class="ms-3 mx-2">
                    <a class="text-muted" href="https://twitter.com/Nike"
                        ><img
                            src="../img/tw.svg"
                            alt="Logo"
                            width="35"
                            height="35"
                    /></a>
                </li>
                <li class="ms-3 mx-2">
                    <a class="text-muted" href="https://www.facebook.com/nike"
                        ><img
                            src="../img/fb.svg"
                            alt="Logo"
                            width="35"
                            height="35"
                    /></a>
                </li>
                <li class="ms-3 mx-2">
                    <a class="text-muted" href="https://youtube.com/Nike"
                        ><img
                            src="../img/yt.svg"
                            alt="Logo"
                            width="35"
                            height="35"
                    /></a>
                </li>
                <li class="ms-3 mx-2">
                    <a class="text-muted" href="https://instagram.com/nike"
                        ><img
                            src="../img/ig.svg"
                            alt="Logo"
                            width="35"
                            height="35"
                    /></a>
                </li>
            </ul>
            <div
                class="d-flex align-items-center justify-content-center nav-link"
            >
                <a
                    href="https://agreementservice.svs.nike.com/es/es_es/rest/agreement?agreementType=termsOfUse&uxId=com.nike&country=ES&language=es&requestType=redirect"
                    class="mb-3 mb-md-0 text-light footer-link"
                >
                    © 2023 Nike, Inc. Todos los derechos reservados
                </a>
            </div>
        </footer>
    </div>
</template>
<script>
export default {
    name: "App",
    data() {
        return {
            isLoggedin: false,
            iduser: null,
            isAdmin: false,
            user: null,
            user_role: null,
            arrayUserRole: [],
            tieneRutina: false,
        };
    },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/hasTarifa/${this.iduser}`)
                .then((response) => {
                    console.log("tiene rutina?");
                    console.log(response.data);
                    this.tieneRutina = response.data;
                    if (this.tieneRutina == 0) {
                        console.log("dkasmdkas");
                        console.log((this.tieneRutina = false));
                    } else {
                        this.tieneRutina = true;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.iduser = window.Laravel.user.id;
            this.isLoggedin = true;
            this.user = window.Laravel.user;
            this.user_role = window.Laravel.user_role;
            console.log("=======");
            // console.log(window.Laravel.user.roles[1].nombre_role);
            this.user_role = window.Laravel.user.roles[0].nombre_role;
            console.log(this.user.name);
        }
    },
    methods: {
        logout(e) {
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                console.log(response);
                this.$axios
                    .post("/api/logout")
                    .then((response) => {
                        if (response.data.success) {
                            window.location.href = "/";
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            });
        },
    },
};
</script>
<style scoped>
.login-nav {
    position: absolute;
    top: 50%;
    left: 88%;
    transform: translate(-50%, -50%);
}

.nav-link{
   opacity: 1;
}

.nav-link:hover{
    color: rgb(0, 0, 0);
    opacity: 40;
}

li a.nav-link {
    font-size: 18px;
}
.nav-padding {
    padding-left: 2.5em;
    padding-right: 3em;
}
.d-lg-none:hover {
    opacity: 0.5;
}
@media (max-width: 1500px) {
.login-nav {
    position: absolute;
    top: 50%;
    left: 85%;
    transform: translate(-50%, -50%);
}
}
@media (max-width: 400px) {
    .dropdown-menu {
        border: 0;
        --bs-dropdown-bg: transparent;
    }
}
</style>
