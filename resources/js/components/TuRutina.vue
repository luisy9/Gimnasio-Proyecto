<template>
    <h1 class="text-center pt-5">Tu Rutina</h1>
    <div class="container-fluid">
        <div class="row">
            <main class="ms-sm-auto px-md-4">
                <section class="p-4 p-md-5">
                    <div class="row d-flex justify-content-center mb-5">
                        <!--<div class="login-pag px-5">-->
                        <!--<div
                                class="row jutify-content-center w-50 mx-auto mb-5"
                            >-->
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
                        <div class="card card-default p-5">
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
                                                <th class="px-2">Nombre Rutina</th>
                                                <th class="px-2">Nombre Ejercicio</th>
                                                <th class="px-5">Editar</th>
                                                <th class="">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(
                                                    rutina, index
                                                ) in miRutina"
                                                :key="rutina.id"
                                            >
                                                <td>{{ rutina.id }}</td>
                                                <td>
                                                    {{ rutina.nombre_rutina }}
                                                </td>
                                                <td>{{ rutina.ejercicios }}</td>
                                                <td class="text-center">
                                                    <a
                                                        class="px-5"
                                                        style="cursor: pointer"
                                                        @click="
                                                            editarRutina(rutina.id)
                                                        "
                                                    >
                                                        <img
                                                            src="/img/editar.png"
                                                            style="height: 23px"
                                                        />
                                                    </a>
                                                    <a
                                                        class="px-5"
                                                        style="cursor: pointer"
                                                        @click="
                                                            deleteRutina(rutina.id)
                                                        "
                                                    >
                                                        <img
                                                            src="/img/x.png"
                                                            style="height: 20px"
                                                        />
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </table>
                            </main>
                        </div>
                        <!--</div>-->
                        <!--</div>-->
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
        editarRutina(id){
            window.location.href = "/updateRutina/" + id;
        },

        deleteRutina(id){
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
        }
    },
};
</script>
<style scoped>
@media (max-width: 1500px) {
    .p-5 {
        padding: 0 !important;
    }
}
</style>
