<template>
    <div class="banner-entrenamiento">
        <div class="row align-items-center">
            <div class="col text-center">
                <h1 class="text-light">Mis Rutinas</h1>
                <button class="mt-5 button-secondary" @click="MisRutinas">
                    Ver
                </button>
            </div>
        </div>
    </div>
    <!-- <div class="banner-entrenamiento">
        <h1 class="text-light text-center">Mis Rutinas</h1>
        <button class="button-secondary">Ver</button>
    </div> -->
    <div class="px-5" v-if="isPro">
        <div class="text-center my-5">
            <h3 class="mb-3"><b>Crea tu Rutina</b></h3>
        </div>
        <div class="my-5">
            <div class="banner-buscar">
                <router-link :to="`/crearRutina`">
                    <button class="button-secondary">Crear</button>
                </router-link>
            </div>
        </div>
    </div>
    <div v-else>
        <div class="my-5">
            <div class="text-center my-5">
                <h3 class="mb-3"><b>Crea tu Rutina</b></h3>
            </div>
            <div class="banner-buscar">
                <div class="text-center">
                    <h2 class="mb-5 text-white"><b>Hazte miembro Pro!</b></h2>
                    <router-link :to="`/tarifa`">
                        <button v-if="!isPro" class="button-secondary mt-5">
                            Cambiar Tarifa
                        </button>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
    <h3 class="text-center pt-5" v-if="this.miRutina.length > 0">
        <b ref="section">Mis Rutinas</b>
    </h3>
    <div class="container-fluid" v-if="this.miRutina.length > 0">
        <div class="row">
            <main class="ms-sm-auto px-md-4">
                <section class="p-4">
                    <div class="row d-flex justify-content-center mb-5">
                        <div
                            class="alert alert-danger alert-dismissible fade show"
                            role="alert"
                            v-if="error"
                        >
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close"
                            ></button>
                            <strong>{{ error }}</strong>
                        </div>
                        <div
                            class="card card-default p-5"
                            v-if="this.miRutina.length"
                        >
                            <main class="form-signin w-100 m-auto px-5">
                                <table
                                    class="table table-hover table-sm"
                                    v-for="dia in this.diaSemana"
                                    :key="dia"
                                >
                                    <h2>{{ dia }}</h2>
                                    <table class="table table-hover table-sm">
                                        <thead class="bg-dark text-light">
                                            <tr class="">
                                                <th class="">Nombre Rutina</th>
                                                <th class="px-5">
                                                    Nombre Ejercicio
                                                </th>
                                                <th class="px-4">Series</th>
                                                <th class="px-4">
                                                    Descanso entre Series
                                                </th>
                                                <th class="px-4">
                                                    Repeticiones
                                                </th>
                                                <th class="px-4">Imagen</th>
                                                <th class="px-4">
                                                    Descripcion Ejercicio
                                                </th>
                                                <th class="px-4 text-center">
                                                    Modificar Rutina
                                                </th>
                                                <th class="text-center">
                                                    Eliminar Ejercicio
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            v-for="(rutinas, index) in miRutina"
                                            :key="rutinas.nombre_rutina"
                                        >
                                            <tr
                                                v-if="
                                                    dia === rutinas.dia_semana
                                                "
                                            >
                                                <td class="">
                                                    {{ rutinas.nombre_rutina }}
                                                </td>

                                                <td class="text-center">
                                                    {{ rutinas.ejercicio }}
                                                </td>

                                                <td class="text-center">
                                                    {{ rutinas.series }}
                                                </td>
                                                <td class="text-center">
                                                    {{ rutinas.descanso }}
                                                </td>
                                                <td class="text-center">
                                                    {{ rutinas.repeticiones }}
                                                </td>
                                                <td>
                                                    <div
                                                        class="imagen-seleccionada"
                                                        :style="{
                                                            backgroundImage:
                                                                'url(/img/' +
                                                                rutinas.imagen_ejercicio +
                                                                ')',
                                                        }"
                                                    ></div>
                                                </td>
                                                <td class="text-center">
                                                    {{
                                                        rutinas.descripcion_ejercicio
                                                    }}
                                                </td>
                                                <td class="text-center">
                                                    <a
                                                        class="px-5"
                                                        style="cursor: pointer"
                                                        @click="
                                                            editarRutina(
                                                                rutinas.id_rutina
                                                            )
                                                        "
                                                    >
                                                        <img
                                                            class="logo-editar"
                                                            src="/img/logos/editar.svg"
                                                        />
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a
                                                        class="px-5"
                                                        style="cursor: pointer"
                                                        @click="
                                                            deleteRutina(
                                                                rutinas.id
                                                            )
                                                        "
                                                    >
                                                        <img
                                                            class="logo-x"
                                                            src="/img/logos/x.svg"
                                                        />
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </table>
                            </main>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <div v-if="this.miRutina == false">
        <div class="row">
            <main class="ms-sm-auto px-md-4">
                <section class="p-4">
                    <div class="row d-flex justify-content-center mb-5">
                        <div
                            class="alert alert-danger alert-dismissible fade show"
                            role="alert"
                            v-if="error"
                        >
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close"
                            ></button>
                            <strong>{{ error }}</strong>
                        </div>
                        <div
                            class="card card-default p-5"
                            v-if="this.miRutina == false"
                        >
                            <main class="form-signin w-100 m-auto px-5">
                                <table
                                    class="table table-hover table-sm"
                                    v-for="dia in this.diaSemana"
                                    :key="dia"
                                >
                                    <h2>{{ dia }}</h2>
                                    <table class="table table-hover table-sm">
                                        <thead class="bg-dark text-light">
                                            <tr class="">
                                                <th class="">Nombre Rutina</th>
                                                <th class="px-5">
                                                    Numero Ejercicio
                                                </th>
                                                <th class="px-5">
                                                    Nombre Ejercicio
                                                </th>
                                                <th class="px-4">Series</th>
                                                <th class="px-4">
                                                    Descanso entre Series
                                                </th>
                                                <th class="px-4">
                                                    Repeticiones
                                                </th>
                                                <th class="px-4">Imagen</th>
                                                <th class="px-4">
                                                    Descripcion Ejercicio
                                                </th>
                                                <th class="px-4 text-center">
                                                    Editar
                                                </th>
                                                <th class="text-center">
                                                    Eliminar
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            v-for="(rutinas, index) in miRutina"
                                            :key="rutinas.nombre_rutina"
                                        >
                                            <tr
                                                v-if="
                                                    dia === rutinas.dia_semana
                                                "
                                            >
                                                <td class="">
                                                    {{ rutinas.nombre_rutina }}
                                                </td>
                                                <td class="text-center">
                                                    {{ rutinas.ejercicio }}
                                                </td>

                                                <td class="text-center">
                                                    {{ rutinas.series }}
                                                </td>
                                                <td class="text-center">
                                                    {{ rutinas.descanso }}
                                                </td>
                                                <td class="text-center">
                                                    {{ rutinas.repeticiones }}
                                                </td>
                                                <td>
                                                    <div
                                                        class="imagen-seleccionada"
                                                        :style="{
                                                            backgroundImage:
                                                                'url(/img/' +
                                                                rutinas.imagen_ejercicio +
                                                                ')',
                                                        }"
                                                    ></div>
                                                </td>
                                                <td class="text-center">
                                                    {{
                                                        rutinas.descripcion_ejercicio
                                                    }}
                                                </td>
                                                <td class="text-center">
                                                    <a
                                                        class="px-5"
                                                        style="cursor: pointer"
                                                        @click="
                                                            editarRutina(
                                                                rutinas.nombre_rutina
                                                            )
                                                        "
                                                    >
                                                        <img
                                                            class="logo-editar"
                                                            src="/img/logos/editar.svg"
                                                        />
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a
                                                        class="px-5"
                                                        style="cursor: pointer"
                                                        @click="
                                                            deleteRutina(
                                                                rutinas.id
                                                            )
                                                        "
                                                    >
                                                        <img
                                                            class="logo-x"
                                                            src="/img/logos/x.svg"
                                                        />
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </table>
                            </main>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</template>
<script>
export default {
    name: "WikiEjercicios",
    data() {
        return {
            categorias: null,
            isPro: null,
            isLoggedin: false,
            user: null,
            iduser: null,
            diaSemana: [
                "Lunes",
                "Martes",
                "Miercoles",
                "Jueves",
                "Viernes",
                "Sabado",
                "Domingo",
            ],
            miRutina: [],
            ejercicios: [],
        };
    },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/showMuscles")
                .then((response) => {
                    this.categorias = response.data;
                    console.log(this.categorias);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });

        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/hasTarifa/" + this.iduser)
                .then((response) => {
                    this.miRutina = response.data;
                    console.log(this.miRutina);
                    this.miRutina.forEach((e) => {
                        console.log(e.ejercicio);
                        this.$axios
                            .get("/sanctum/csrf-cookie")
                            .then((response) => {
                                this.$axios
                                    .get("/api/getImg/" + e.ejercicio)
                                    .then((response) => {
                                        console.log(response.data);
                                        e.imagen_ejercicio =
                                            response.data[0].imagen_ejercicio;
                                        e.descripcion_ejercicio =
                                            response.data[0].descripcion_ejercicio;
                                    })
                                    .catch(function (error) {
                                        console.error(error);
                                    });
                            });
                    });
                    console.log("hola");
                    console.log(this.miRutina);
                })
                .catch(function (error) {
                    console.error(error);
                });
        });

        if (window.Laravel.isLoggedin) {
            this.isLoggedin = true;
            this.iduser = window.Laravel.user.id;
            console.log(this.iduser);
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
        }
    },
    methods: {
        MisRutinas() {
            const sectionElement = this.$refs.section;
            sectionElement.scrollIntoView({ behavior: "smooth" });
        },
        editarRutina(nombre_rutina) {
            window.location.href = "/updateRutina/" + nombre_rutina;
        },

        deleteRutina(id) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .delete("/api/deleteRutina/" + id)
                    .then((response) => {
                        const index = this.miRutina.findIndex(
                            (rutina) => rutina.id === id
                        );
                        this.miRutina.splice(index, 1);
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
.image-container {
    width: 400px;
    height: 300px;
    background-image: url("ruta_de_tu_imagen.jpg");
    background-size: cover;
    position: relative;
}

.image-description {
    display: none;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px;
}

.image-container:hover .image-description {
    display: block;
}

.image-description a {
    color: white;
    text-decoration: none;
}
.image-link {
    position: relative;
    display: inline-block;
    margin: 10px;
}

.image-link img {
    display: block;
    width: 100%;
    height: auto;
}

.image-link .description {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    padding: 10px;
    opacity: 0;
    transition: opacity 0.3s;
}

.image-link:hover .description {
    opacity: 1;
}
.logo-x {
    height: 20px;
}
.logo-editar {
    height: 23px;
}
.logo-x:hover {
    opacity: 0.5;
}
.logo-editar:hover {
    opacity: 0.5;
}
.vis-mov {
    display: none;
}
a {
    text-decoration: none;
}
.centrar-ent {
    display: flex;
    justify-content: center;
    align-items: center;
}
.banner-buscar {
    background-image: url("http://localhost:8000/img/1.jpg");
    height: 26.5em;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.banner-buscar h1 {
    -webkit-text-stroke: 1px black;
}
.banner-entrenamiento {
    background-image: url("http://localhost:8000/img/banner3.webp");
    height: 35em;
    background-size: cover;
    background-position: center;
    opacity: 0.9;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.banner-rutina {
    background-image: url("http://localhost:8000/img/clases.jpg");
    height: 35em;
    background-size: cover;
    background-position: center;
    opacity: 0.9;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.banner-entrenamiento h1 {
    -webkit-text-stroke: 1px black;
}
.galeria-ejercicios {
    display: flex;
    width: 100%;
    height: 430px;
}

.galeria-imagen {
    position: relative;
    width: 0px;
    flex-grow: 1;
    background-size: cover;
    background-repeat: no-repeat;
    opacity: 0.8;
    transition: 0.5s ease;
}

.galeria-imagen:hover {
    cursor: pointer;
    width: 500px;
    opacity: 1;
    filter: contrast(120%);
}

.galeria-imagen p {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.day-button {
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    margin-right: 10px;
    cursor: pointer;
}

.day-button.selected {
    background-color: blue;
}
@media (max-width: 400px) {
    h1 {
        font-size: 2.5em;
    }
    .vis-mov {
        display: block;
    }
    .px-5 {
        padding-left: 1em !important;
        padding-right: 1em !important;
    }
}
</style>
