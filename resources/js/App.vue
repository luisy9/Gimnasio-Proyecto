<template>
    <!--<div class="container">-->
    <nav class="navbar navbar-expand-sm navbar-light bg-light nav-padding">
        <div class="movil-vis logo-header">
            <a href="/">
                <img src="../img/nike_logo.svg" alt="Logo" />
            </a>
        </div>
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
        ></button>
        <div class="" v-if="user_role.id == 2">
            <a>Crear Users</a>
        </div>
        <div class="navbar-nav mx-auto">
            <router-link to="/entrenamiento" class="nav-item nav-link"
                >Entrenamiento</router-link
            >
            <router-link to="/tarifa" class="nav-item nav-link"
                >Tarifas</router-link
            >
            <router-link to="/compania" class="nav-item nav-link"
                >¿Quienes somos?</router-link
            >
        </div>
        <div class="movil-vis login-header">
            <div class="nav-item" v-if="isLoggedin">
                <a data-toggle="dropdown" class="nav-item nav-link" role="button">{{ user.name }}</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <router-link to="/dashboard" class="nav-item nav-link"
                >Dashboard</router-link
            >
            <router-link to="/posts" class="nav-item nav-link"
                >xxxx</router-link
            >
            <a class="nav-item nav-link" style="cursor: pointer" @click="logout"
                >Logout</a
            >
            </div>
            </div>
            <a href="/login">
                <img src="../img/logo_login.svg" />
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
                    <a href="/tarifa" class="nav-link px-2 text-light">Tarifas</a>
                </li>
                <li class="nav-item">
                    <a href="/entrenamiento" class="nav-link px-2 text-light">Ejercicios</a>
                </li>
                <li class="nav-item">
                    <a href="/compania" class="nav-link px-2 text-light">Compañía</a>
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
            <div class="d-flex align-items-center justify-content-center nav-link ">
                <a href="https://agreementservice.svs.nike.com/es/es_es/rest/agreement?agreementType=termsOfUse&uxId=com.nike&country=ES&language=es&requestType=redirect" class="mb-3 mb-md-0 text-light footer-link">
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
            isAdmin: false,
            user: null,
            user_role: [],

        };
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedin = true;
            this.user = window.Laravel.user;
            this.user_role = window.Laravel.user_role;
            console.log(this.user_role);
        }
    },
    mounted() {
        this.$axios;
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/rolesSelect")
                .then((response) => {
                    this.user_role = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    methods: {
        logout(e) {
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("api/logout")
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
