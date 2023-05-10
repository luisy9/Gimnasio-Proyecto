<template>
    <div class="container">
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
                        <form>
                            <h1 class="h3 mb-3 fw-normal">Crear Tarifa</h1>
                            <br />
                            <div class="form-floating">
                                <input
                                    id="tipo_tarifa"
                                    type="text"
                                    class="form-control"
                                    v-model="tipo_tarifa"
                                    autofocus
                                    autocomplete="off"
                                    placeholder="nombre tarifa"
                                />
                                <label
                                    for="name"
                                    class="col-sm-4 col-form-label text-md-right"
                                    >Nombre Tarifa</label
                                >
                            </div>
                            <br />
                            <div class="form-floating">
                                <input
                                    id="precio"
                                    type="text"
                                    class="form-control"
                                    v-model="precio"
                                    autocomplete="off"
                                    placeholder="precio"
                                />
                                <label
                                    for="precio"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Precio</label
                                >
                            </div>
                            <br />
                            <div class="form-floating">
                                <input
                                    id="descripcion_tarifa"
                                    type="text"
                                    class="form-control"
                                    v-model="descripcion_tarifa"
                                    autocomplete="off"
                                    placeholder="descripcion_tarifa"
                                />
                                <label
                                    for="descripcion_tarifa"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Descripcion</label
                                >
                            </div>
                            <br />
                            <button
                                type="submit"
                                class="button-primary"
                                @click="createTarifa"
                            >
                                Añadir
                            </button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "crearUsuarios",
    data() {
        return {
            tipo_tarifa: "",
            precio: "",
            descripcion_tarifa: "",
            error: null,
        };
    },

    methods: {
        createTarifa(e) {
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("api/createTarifas", {
                        tipo_tarifa: this.tipo_tarifa,
                        precio: this.precio,
                        descripcion_tarifa: this.descripcion_tarifa,
                    })
                    .then((response) => {
                        if (response.data.success) {
                            console.log(response.data.checked);
                        } else {
                            console.log(response);
                            this.error = response.data.message;
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

<style scoped></style>
