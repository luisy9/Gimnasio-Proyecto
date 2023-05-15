<template>
    <div class="banner-entrenamiento">
        <h1 class="text-light text-center">Clases Dirigidas</h1>
    </div>
    <div v-if="this.clasesTarifa > this.numClases" class="container py-5">
        <div class="row">
            <!-- Agregamos 6 divs con sus respectivas imágenes y texto en el overlay -->
            <div v-for="clase in clases" class="col-sm-4">
                <div class="box">
                    <router-link :to="`/claseSeleccionada/${clase.id}`">
                        <img
                            style="height: 15rem; width: 25rem; cursor: pointer"
                            :src="`/img/${clase.imagen}`"
                            alt="Imagen 1"
                        />
                        <div class="overlay">{{ clase.nombre_clase }}</div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">
                                Has Agotado las clases disponilbes
                            </h2>
                            <router-link
                                to="/tarifa"
                            >
                            <button type="submit" class="button-primary my-3">
                                Cambiar tarifa
                            </button>
                        </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "clasesDirigidas",

    data() {
        return {
            clases: [],
            iduser: null,
            isLoggedin: false,
            membership: null,
            tipo_tarifa: null,
            usuario_tarifa: null,
            numClases: null,
            idTarifa: null,
            clasesTarifa: null,
            iduser: window.Laravel.user,
        };
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.iduser = window.Laravel.user.id;
            this.isLoggedin = true;
            this.user = window.Laravel.user;
            this.user_role = window.Laravel.user_role;
            console.log("=======");
            // console.log(window.Laravel.user.roles[1].nombre_role);
        }
    },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/facturasTarifas/${this.iduser}`)
                .then((response) => {
                    console.log(response.data);
                    this.idTarifa = response.data.id;
                    console.log(this.idTarifa);
                    this.clasesTarifa = response.data.num_clases;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/numeroClasesUser/${this.iduser}`)
                .then((response) => {
                    console.log(response.data);
                    this.numClases = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/clases")
                .then((response) => {
                    this.clases = response.data;
                    console.log(this.clases);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
};
</script>
<style scoped>
.banner-entrenamiento {
    background-image: url("http://localhost:8000/img/banner3.webp");
    height: 25em;
    background-size: cover;
    background-position: center;
    opacity: 0.9;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.container {
    text-align: center;
}
.box {
    display: inline-block;
    margin: 20px;
    position: relative;
}
.box img {
    display: block;
    width: 100%;
}
.box .overlay {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    font-size: 1.5em;
    left: 0;
    opacity: 0;
    padding: 20px;
    position: absolute;
    top: 0;
    transition: opacity 0.3s ease;
    width: 100%;
}
.box:hover .overlay {
    opacity: 1;
}
</style>
