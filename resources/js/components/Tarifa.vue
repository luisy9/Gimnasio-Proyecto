<template>
    <div class="seccion">
        <div class="text-center text-titulo" v-if="membership == 0">
            <h1>NUESTRAS TARIFAS</h1>
        </div>
        <div class="text-center text-titulo" v-if="membership != 0">
            <h1>CAMBIA TU TARIFA</h1>
        </div>
        <main>
            <div v-if="this.membership || ! this.membership">
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <div v-for="(tarifa, index) in tarifas" :key="index">
                        <div class="col">
                            <div
                                class="card mb-4 rounded-3 shadow-sm border-dark"
                            >
                                <div
                                    class="card-header py-3 border-dark bg-dark"
                                >
                                    <h4 class="my-0 fw-normal text-light">
                                        <b>
                                            {{ tarifa.tipo_tarifa }}
                                        </b>
                                    </h4>
                                </div>
                                <div class="card-body carta-color tarjeta">
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <div
                                            v-for="descripcion in tarifa.descripcion_tarifa.split(
                                                ','
                                            )"
                                        >
                                            <li class="tarjeta-text my-2">
                                                {{ descripcion }}
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                                <h1
                                    class="card-title pricing-card-title precio"
                                >
                                    {{ tarifa.precio }}€<small
                                        class="text-body-secondary fw-light"
                                        >/mes</small
                                    >
                                </h1>
                                <div v-if="!this.membership">
                                    <router-link
                                        :to="`/pago/${tarifa.id}/${this.iduser}`"
                                    >
                                        <button
                                            class="button-primary my-4"
                                            @click="navigate"
                                        >
                                            Seleccionar
                                        </button>
                                    </router-link>
                                </div>
                                <div v-if="userRole == 'admin' || userRole == 'gestion_tarifas'" class="pb-3">
                                    <button
                                        class="btn btn-danger"
                                        @click="deleteTarifa(tarifa.id)"
                                    >
                                        Delete
                                    </button>
                                </div>
                                <div v-if="this.membership">
                                    <router-link
                                        :to="`/cambiarTarifa/${tarifa.id}/${this.iduser}`"
                                    >
                                        <button
                                            class="button-primary my-4"
                                            @click="navigate"
                                        >
                                            Cambiar
                                        </button>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
export default {
    name: "tarifa",
    data() {
        return {
            tarifas: [],
            isLoggedin: false,
            membership: null,
            iduser: null,
            user: null,
            userRole: null,
            strSuccess: "",
            strError: "",
        };
    },

    mounted() {
        if (window.Laravel.isLoggedin) {
            this.iduser = window.Laravel.user.id;
            console.log(this.iduser);
            this.userRole = window.Laravel.user.roles[0].nombre_role;
            console.log(this.userRole);
        }
        var self = this;
        axios.get("/Tarifa").then(function (response) {
            return (self.item = response.data);
        });

        if (window.Laravel.isLoggedin) {
            this.iduser = window.Laravel.user.id;
            this.user = window.Laravel.user;
            this.userRole = window.Laravel.user.roles[0].nombre_role;
            // console.log(this.user);
        }
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/membership/${this.iduser}`)
                .then((response) => {
                    this.membership = response.data;
                    if (this.membership == 0) {
                        console.log("dkasmdkas");
                        console.log((this.membership = false));
                    } else {
                        this.membership = true;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
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
};
</script>

<style scoped></style>
