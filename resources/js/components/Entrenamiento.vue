<template>
    <div class="banner-entrenamiento">
        <h1 class="text-light text-center">Entrenamiento</h1>
    </div>
    <router-link to="/buscarEjercicios" class="nav-item nav-link"
        >Buscador Ejericicos</router-link
    >
    <div class="galeria-ejercicios vis-desck">
        <div
            class="col flex justify-content-center galeria-ejercicios"
            v-for="(catego, index) in categorias"
            :key="catego.id"
        >
            <div
                class="galeria-imagen"
                :style="`background-image: url('http://localhost:8000/img/${catego.imagen_categoria}');
                   display: flex;
                   justify-content: center;
                   align-items: center;`"
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

    <div class="row vis-mov">
        <div class="col-6 mb-2">
            <h3 class="mb-3"><b>Ejercicios especificos</b></h3>
        </div>

        <div
            id="carouselExampleControls"
            class="carousel slide"
            data-bs-ride="carousel"
            v-for="(catego, index) in categorias"
            :key="catego.id"
        >
        <div class="carousel-inner mb-3 px-3">
                <router-link
                    class="link-negro"
                    :to="`/ejercicioMusculo/${catego.id}`"
                    :style="`width: 100% ; height: 100%;`"
                >
                <div class="carousel-item active">
                    <div
                class="img-fluid w-100"
                :style="`background-image: url('http://localhost:8000/img/${catego.imagen_categoria}');
                   display: flex;
                   justify-content: center;
                   align-items: center;`"
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

    <section class="part3 px-3 ">
  <div class="text-center mb-2 mt-2">
    <h3 class="mb-3"><b>Rutinas</b></h3>
  </div>
  <div class="row mt-5">
    <div class="col-md-4 mb-3">
      <div class="position-relative">
        <img src="../../img/rutinas/kettlebell-g1b482f877_1280.webp" alt="" class="w-100">
        <a href="#" class="btn button-secondary position-absolute bottom-0 start-50 translate-middle">Basica</a>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="position-relative">
        <img src="../../img/rutinas/kettlebell-g1b482f877_1280.webp" alt="" class="w-100">
        <a href="#" class="btn button-secondary position-absolute bottom-0 start-50 translate-middle">Media</a>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="position-relative">
        <img src="../../img/rutinas/kettlebell-g1b482f877_1280.webp" alt="" class="w-100">
        <a href="#" class="btn button-secondary position-absolute bottom-0 start-50 translate-middle">Pro</a>
      </div>
    </div>
    <div class="col-md-4 mb-3 vis-mov" v-if="this.isPro">
      <div class="position-relative">
        <img src="http://localhost:8000/img/kettlebell-g30da63dfe_1280_osc.webp" alt="" class="w-100">
        <a href="/crearRutina" class="btn button-secondary position-absolute top-50 start-50 translate-middle">Crear</a>
      </div>
    </div>
  </div>
  <div class="vis-desck mb-5" v-if="this.isPro">
    <div class="banner-entrenamiento">
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
    width: 300px;
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
</style>
