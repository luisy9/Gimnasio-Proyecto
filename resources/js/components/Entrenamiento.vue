<template>
    <div class="banner-entrenamiento">
        <h1 class="text-light text-center">ENTRENAMIENTO</h1>
    </div>

    
    <div class="px-5">
        <div class="text-center my-5">
            <h3 class="mb-3"><b>Ejercicios especificos</b></h3>
        </div>
        <div class="my-5">
            <div class="banner-buscar">
                <a href="/buscarEjercicios" class="w-100 h-100 centrar-ent">
                    <button class="button-secondary">Crear rutina</button>
                </a>
            </div>
        </div>
        <div class="galeria-ejercicios">
            <div
                class="col flex justify-content-center galeria-ejercicios"
                v-for="(catego, index) in categorias"
                :key="catego.id"
            >
                <div
                    class="galeria-imagen centrar-ent"
                    :style="`background-image: url('http://localhost:8000/img/${catego.imagen_categoria}');`"
                >
                    <router-link
                        class="link-negro"
                        :to="`/ejercicioMusculo/${catego.id}`"
                        :style="`width: 100% ; height: 100%;`"
                    >
                        <p class="text-white">
                            {{ catego.nombre_categoria }}
                        </p>
                    </router-link>
                </div>
            </div>
        </div>
        
    </div>

    <div class="vis-mov mb-5">
        <div class="text-center vis-mov">
            <h3 class="mb-3"><b>Ejercicios especificos</b></h3>
        </div>

        <div class="" v-for="(catego, index) in categorias" :key="catego.id">
            <div class="px-3">
                <router-link
                    class="link-negro"
                    :to="`/ejercicioMusculo/${catego.id}`"
                    :style="`width: 100% ; height: 100%;`"
                >
                    <div class="">
                        <div
                            class="img-fluid centrar-ent w-100"
                            :style="`background-image: url('http://localhost:8000/img/${catego.imagen_categoria}');`"
                        >
                            <p class="text-white card-title">
                                {{ catego.nombre_categoria }}
                            </p>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </div>

    <section class="part3 px-5 pb-5">
        <div class="text-center  ">
            <!-- <h3 class="mb-3"><b>Rutinas</b></h3> -->
        </div>
        <div class="vis-desck" v-if="this.isPro">
            <div class="banner-rutina">
                <a href="/crearRutina">
                    <button class="button-secondary">Crear rutina</button>
                </a>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: "Entrenamiento",
    data() {
        return {
            categorias: null,
            isPro: null,
            isLoggedin: false,
            user: null,
            iduser: null,
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
        buscadorEjercicios() {},
    },
};
</script>
<style scoped>
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
