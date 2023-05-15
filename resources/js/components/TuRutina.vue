<template>
    <h1 class="text-center pt-5">Tu Rutina</h1>
    <div class="container-fluid">
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
                        <div class="vis-desck mb-5" v-if="this.miRutina.length == 0">
                            <div class="banner-rutina">
                                <a href="/crearRutina">
                                    <button class="button-secondary">
                                        Crear rutina
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div
                            class="card card-default p-5"
                            v-if="this.miRutina.length"
                        >
                            <main class="form-signin w-100 m-auto px-5">
                                <table
                                    v-for="(rutina, index) in miRutina"
                                    :key="rutina.id"
                                >
                                    <h2>{{ rutina.dia_semana }}</h2>
                                    <table class="table table-hover table-sm">
                                        <thead class="bg-dark text-light">
                                            <tr>
                                                <th
                                                    width="50"
                                                    class="text-center"
                                                >
                                                    #
                                                </th>
                                                <th class="px-2 text-center">
                                                    Nombre Rutina
                                                </th>
                                                <th class="px-2 text-center">
                                                    Nombre Ejercicio
                                                </th>
                                                <th class="px-2 text-center">
                                                    Editar
                                                </th>
                                                <th class="text-center">
                                                    Eliminar
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            v-for="(rutinas, index) in miRutina"
                                            :key="rutina.id"
                                        >
                                            <tr
                                                v-if="
                                                    rutina.dia_semana ===
                                                    rutinas.dia_semana
                                                "
                                            >
                                                <td>{{ rutinas.id }}</td>
                                                <td>
                                                    {{ rutinas.nombre_rutina }}
                                                </td>
                                                <td>
                                                    {{ rutinas.ejercicios }}
                                                </td>
                                                <td class="text-center">
                                                    <a
                                                        class="px-5"
                                                        style="cursor: pointer"
                                                        @click="
                                                            editarRutina(
                                                                rutinas.id
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
        };
    },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/hasTarifa/" + this.iduser)
                .then((response) => {
                    this.miRutina = response.data;
                    console.log(this.miRutina);
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    },
    methods: {
        editarRutina(id) {
            window.location.href = "/updateRutina/" + id;
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
.banner-rutina{
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
