<template>
    <h1 class="text-center py-4">Ejercicios de {{ this.nombre_categoria }}</h1>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5 nav-padding">
        <div
            class="col h-carta"
            v-for="(ejercicio, index) in ejercicios"
            :key="ejercicio.id"
        >
            <div
                class="card card-cover h-100 overflow-hidden text-white d-flex ejercicio"
                :style="{
                    backgroundImage:
                        'url(/img/' + ejercicio.imagen_ejercicio + ')',
                }"
            >
                <div
                    class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 align-items-center justify-content-center"
                >
                    <h2 class="text-center">
                        {{ ejercicio.nombre_ejercicio }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="container">
        <div class="row">
            <div
                class="col-6 py-4 hovereffect"
                v-for="(ejercicio, index) in ejercicios"
                :key="ejercicio.id"
            >
                <img
                    :src="`/img/${ejercicio.imagen_ejercicio}`"
                    class="img-fluid w-100"
                />
                <div class="overlay">
                    <a class="info" href="#">{{ ejercicio.nombre_ejercicio }}</a> 
                </div>
            </div>
        </div>
    </div>-->
</template>
<script>
export default {
    name: "EjerciciosMusculo",

    data() {
        return {
            nombre_categoria: null,
            ejercicios: [],
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

<style scoped>
h2{
    color: rgba(0, 0, 0, 1);
    background-color: rgba(255, 255, 255, 0.5);
}
.ejercicio{
    background-repeat: no-repeat;
    background-size: cover;
}
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    opacity: 0;
    transition: opacity 0.5s;
    display: flex;
    justify-content: center;
    align-items: center;
}

.carta:hover .overlay {
    opacity: 1;
}

.hovereffect {
    float: left;
    overflow: hidden;
    position: relative;
    text-align: center;
    cursor: default;
}

.hovereffect .overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    opacity: 0;
    background-color: rgba(0, 0, 0, 0.5);
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
}

.hovereffect img {
    display: block;
    position: relative;
    -webkit-transition: all 0.4s linear;
    transition: all 0.4s linear;
}
.hovereffect a.info {
    text-decoration: none;
    display: inline-block;
    text-transform: uppercase;
    color: #fff;
    background-color: transparent;
    opacity: 0;
    filter: alpha(opacity=0);
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    margin: 170px 0 0;
    padding: 7px 14px;
}

.hovereffect a.info:hover {
    border-radius: 10px;
}

.hovereffect:hover img {
    -ms-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    transform: scale(1.2);
}

.hovereffect:hover .overlay {
    opacity: 1;
    filter: alpha(opacity=100);
}

.hovereffect:hover h2,
.hovereffect:hover a.info {
    opacity: 1;
    filter: alpha(opacity=100);
    -ms-transform: translatey(0);
    -webkit-transform: translatey(0);
    transform: translatey(0);
}

.hovereffect:hover a.info {
    -webkit-transition-delay: 0.2s;
    transition-delay: 0.2s;
}
</style>

<!-- <script>
export default {
    name: "crearUsuarios",
    data() {
        return {
            ejercicios: [],
            strSuccess: "",
            strError: "",
            error: null,
        };
    },
    created() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/ejercicios")
                .then((response) => {
                    console.log(response.data);
                    this.ejercicios = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
        if (window.Laravel.isLoggedin) {
            this.isLoggedin = true;
            this.iduser = window.Laravel.user.id;
            console.log(this.iduser);
            this.user = window.Laravel.user;
            this.user_role = window.Laravel.user_role;
            console.log("=======");
            console.log(window.Laravel.user.roles[0].nombre_role);
            this.user_role = window.Laravel.user_role;
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/";
            } else {
                if (
                    window.Laravel.user.roles[0].nombre_role == "admin" ||
                    window.Laravel.user.roles[0].nombre_role ==
                        "gestion_entrenamiento"
                ) {
                    this.$nextTick();
                } else {
                    window.location.href = "/";
                }
            }
        }
    },

    methods: {
        updateEjercicios(id) {
            window.location.href = "/updateEjercicio/" + id;
        },

        deleteEjercicios(id) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .delete("/api/deleteEjercicios/" + id)
                    .then((response) => {
                        const index = this.ejercicios.findIndex(
                            (ejercicio) => ejercicio.id === id
                        );
                        this.usuarios.splice(index, 1);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        },
    },
};
</script>

<style scoped></style> -->
