<template>
    <div class="" v-if="this.miRutina.length == 0">
        <div class="banner-rutina">
            <a href="/crearRutina">
                <button class="button-secondary mb-5">Crear rutina</button>
            </a>
            <h1
                class="text-center text-light pt-5"
                style="-webkit-text-stroke: 1px black"
            >
                Tu Rutina
            </h1>
        </div>
    </div>
    <div class="container-fluid" v-if="this.miRutina.length > 0">
        <h1 class="text-center py-5">Tus Rutinas</h1>
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
                                                    Editar Rutina
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
    <!-- <div v-for="rutina in miRutina">
                {{ rutina.nombre_rutina }}
            </div> -->
</template>

<script>
export default {
    name: "buscarEjercicios",
    data() {
        return {
            iduser: this.$route.params.iduser,
            nombre: "",
            miRutina: [],
            ejercicios: [],
            diaSemana: [
                "Lunes",
                "Martes",
                "Miercoles",
                "Jueves",
                "Viernes",
                "Sabado",
                "Domingo",
            ],
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
    //     this.$axios.get("/sanctum/csrf-cookie").then((response) => {
    //         this.$axios
    //             .get("/api/hasTarifa/" + this.iduser)
    //             .then((response) => {
    //                 this.miRutina = response.data;
    //                 console.log(this.miRutina);
    //                 this.miRutina.forEach((e) => {
    //                     console.log(e.ejercicio);
    //                     this.$axios
    //                         .get("/sanctum/csrf-cookie")
    //                         .then((response) => {
    //                             this.$axios
    //                                 .get("/api/getImg/" + e.ejercicio)
    //                                 .then((response) => {
    //                                     console.log(response.data);
    //                                     e.imagen_ejercicio =
    //                                         response.data[0].imagen_ejercicio;
    //                                     e.descripcion_ejercicio =
    //                                         response.data[0].descripcion_ejercicio;
    //                                 })
    //                                 .catch(function (error) {
    //                                     console.error(error);
    //                                 });
    //                         });
    //                 });
    //                 console.log("hola");
    //                 console.log(this.miRutina);
    //             })
    //             .catch(function (error) {
    //                 console.error(error);
    //             });
    //     });
    // },
    // methods: {
    //     editarRutina(nombre_rutina) {
    //         window.location.href = "/updateRutina/" + nombre_rutina;
    //     },

    //     deleteRutina(id) {
    //         this.$axios.get("/sanctum/csrf-cookie").then((response) => {
    //             this.$axios
    //                 .delete("/api/deleteRutina/" + id)
    //                 .then((response) => {
    //                     const index = this.miRutina.findIndex(
    //                         (rutina) => rutina.id === id
    //                     );
    //                     this.miRutina.splice(index, 1);
    //                 })
    //                 .catch(function (error) {
    //                     console.log(error);
    //                 });
    //         });
    //     },
    // },
};
</script>
<style scoped>
.banner-rutina {
    background-image: url("http://localhost:8000/img/gimnasio_rutina.jpg");
    height: 50em;
    background-size: cover;
    background-position: center;
    /* opacity: 0.9; */
    background-repeat: no-repeat;
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: center;
    flex-direction: column-reverse;
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
@media (max-width: 1500px) {
    .p-5 {
        padding: 0 !important;
    }
}
</style>
