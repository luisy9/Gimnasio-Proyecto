<template>
    <section class="p-4 p-md-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-5 mb-2">
                <div class="card card-default p-5">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <p class="mb-3 fw-normal titulo-form">
                                <b>
                                    Pago
                                </b>
                            </p>
                        </div>
                        <form action="">
                            <div class="form-floating">
                                <div
                                    v-if="strSuccess"
                                    class="alert alert-success alert-dismissible fade show"
                                    role="alert"
                                >
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close"
                                    ></button>
                                    <strong>{{ strSuccess }}</strong>
                                </div>

                                <div
                                    v-if="strError"
                                    class="alert alert-danger alert-dismissible fade show"
                                    role="alert"
                                >
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close"
                                    ></button>
                                    <strong>{{ strError }}</strong>
                                </div>
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    v-model="name"
                                    required
                                    autofocus
                                    autocomplete="off"
                                    placeholder="Nombre completo"
                                />
                                <label
                                    for="name"
                                    class="col-sm-4 col-form-label text-md-right"
                                    >Nombre completo</label
                                >
                            </div>
                            <br />
                            <div class="form-floating">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    v-model="name"
                                    required
                                    autofocus
                                    autocomplete="off"
                                    placeholder="Numero de tarjeta"
                                />
                                <label
                                    for="name"
                                    class="col-sm-4 col-form-label text-md-right"
                                    >Numero de tarjeta</label
                                >
                            </div>
                            <br />
                            <div class="row mb-4">
                                <div class="col-4">
                                    <div class="form-floating">
                                        <input
                                            id="name"
                                            type="text"
                                            class="form-control"
                                            v-model="name"
                                            required
                                            autofocus
                                            autocomplete="off"
                                            placeholder="MM/YY"
                                        />
                                        <label
                                            for="name"
                                            class="col-sm-4 col-form-label text-md-right"
                                            >MM/YY</label
                                        >
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-floating">
                                        <input
                                            id="name"
                                            type="text"
                                            class="form-control"
                                            v-model="name"
                                            required
                                            autofocus
                                            autocomplete="off"
                                            placeholder="CVV"
                                        />
                                        <label
                                            for="name"
                                            class="col-sm-4 col-form-label text-md-right"
                                            >CVV</label
                                        >
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="text-center">
                                <button
                                    type="submit"
                                    class="button-primary"
                                    @click="pago"
                                >
                                    Pagar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-3">
                <div class="card card-default p-5">
                    <div
                        class="card-body p-4"
                        v-for="(tarifa, index) in tarfiasArray"
                        :key="tarifa.id"
                    >
                        <div class="text-center mb-4">
                            <h3>{{ tarifa.tipo_tarifa }}</h3>
                        </div>
                        <div class="col">
                            <p>{{ tarifa.id }}</p>
                            <p>{{ tarifa.tipo_tarifa }}</p>
                            <p>{{ tarifa.precio }}</p>
                            <p>{{ tarifa.descripcion_tarifa }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
</template>

<script>
export default {
    name: "Pago",
    data() {
        return {
            tarifas: null,
            tarfiasArray: [],
            factura: null,
            membership: null,
            idtarifa: this.$route.params.idtarifa,
            iduser: this.$route.params.iduser,
            isLoggedin: false,
        };
    },
    created() {
        console.log(this.iduser);
        if (!window.Laravel.isLoggedin) {
            this.isLoggedin = true;
        }
    },
    mounted() {
        this.iduser = window.Laravel.user.id;
        if (this.isLoggedin) {
            window.location.href = "/login";
        }
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/membership/${this.iduser}`)
                .then((response) => {
                    this.membership = response.data;
                    console.log(this.membership);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
        this.$axios
            .post("/api/tarifasSelect", {
                id: this.idtarifa,
            })
            .then((response) => {
                var tarifas = response.data;
                this.tarfiasArray.push(tarifas);
                console.log(tarifas);
            })
            .catch(function (error) {
                console.error(error);
            });
    },

    methods: {
        pago(e) {
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post(`/api/pago/${this.idtarifa}/${this.iduser}`)
                    .then((response) => {
                        if (response.data.success) {
                            existingObj.strSuccess = response.data.success;
                            console.log(response.data);
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
<style scoped>
@media (max-width: 1500px) {
    .p-5{
        padding: 0!important;
    }
}
</style>