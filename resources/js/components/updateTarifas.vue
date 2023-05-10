<template>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title">Update Tarifas</h5>
                <div>
                    <router-link :to="{ name: 'posts' }" class="btn btn-success"
                        >Go Back</router-link
                    >
                </div>
            </div>

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

            <form @submit.prevent="updatePost" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label>Tipo Tarifa</label
                    ><span class="text-danger"> *</span>
                    <input
                        type="text"
                        class="form-control"
                        v-model="tipo_tarifa"
                        placeholder="Enter post tarifa"
                    />
                </div>
                <div class="form-group mb-2">
                    <label>Precio</label><span class="text-danger"> *</span>
                    <input
                        type="text"
                        class="form-control"
                        v-model="precio"
                        placeholder="Enter post name"
                    />
                </div>
                <div class="form-group mb-2">
                    <label>descripcion</label
                    ><span class="text-danger"> *</span>
                    <input
                        type="text"
                        class="form-control"
                        v-model="descripcion"
                        placeholder="Enter post name"
                    />
                </div>
                <button
                    type="submit"
                    class="btn btn-primary mt-4 mb-4"
                    @click="updateTarifa"
                >
                    Update Tarifa
                </button>

                <!-- {{ this.user_role }} -->
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "updateUsers",
    data() {
        return {
            id: "",
            tipo_tarifa: "",
            precio: "",
            descripcion: "",
            user_role: null,
            idtarifa: this.$route.params.idTarifa,
            roles: [],
            checked: [],
            strSuccess: "",
            strError: "",
        };
    },
    mounted() {
        // this.user_role = window.Laravel.user_role;
        // console.log("dsadas");
        // console.log(window.Laravel.user.roles[0].nombre_role);
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/showTarifaUpdate/${this.idtarifa}`)
                .then((response) => {
                    console.log(response.data);
                    this.tipo_tarifa = response.data.tipo_tarifa;
                    this.precio = response.data.precio;
                    this.descripcion = response.data.descripcion_tarifa;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    methods: {
        updateTarifa(e) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                let existingObj = this;
                const config = {
                    headers: {
                        "content-type": "multipart/form-data",
                    },
                };

                const formData = new FormData();
                formData.append("tipo_tarifa", this.tipo_tarifa);
                formData.append("precio", this.precio);
                formData.append("descripcion_tarifa", this.descripcion);

                this.$axios
                    .post(
                        `/api/updateTarifa/${this.idtarifa}`,
                        formData,
                        config
                    )
                    .then((response) => {
                        existingObj.strError = "";
                        existingObj.strSuccess = response.data.success;
                    })
                    .catch(function (error) {
                        existingObj.strSuccess = "";
                        existingObj.strError = error.response.data.message;
                    });
            });
        },

        beforeRouteEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/";
            }
            next();
        },
    },
};
</script>
