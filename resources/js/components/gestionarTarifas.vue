<template>
    <div class="container">
        <h1>Gestionar Tarifas</h1>
        <div class="login-pag px-5">
            <div class="row jutify-content-center w-50 mx-auto mb-5">
                <div
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
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
                        <table class="table table-hover table-sm">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th width="50" class="text-center">
                                        Tipo tarifa
                                    </th>
                                    <th>Precio</th>
                                    <th>descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(tarifa, index) in tarifas"
                                    :key="tarifa.id"
                                >
                                    <td>{{ tarifa.tipo_tarifa }}</td>
                                    <td>{{ tarifa.precio }}</td>
                                    <td>{{ tarifa.descripcion_tarifa }}</td>
                                    <td class="text-center">
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteTarifa(tarifa.id)"
                                        >
                                            Delete
                                        </button>
                                        <button
                                            type="submit"
                                            class="btn btn-primary mt-4 mb-4"
                                            @click="updateTarifa(tarifa.id)"
                                        >
                                            Update User
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "GestionarTarifas",
    data() {
        return {
            tarifas: [],
            strSuccess: "",
            strError: "",
            error: null,
        };
    },
    mounted() {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/login";
        }
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
        updateTarifa(id) {
            window.location.href = "/updateTarifas/" + id;
        },
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

<style scoped></style>
