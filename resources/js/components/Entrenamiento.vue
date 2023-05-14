<template>
    <div class="banner-entrenamiento">
        <h1 class="text-center">Entrenamiento</h1>
        <router-link to="/buscarEjercicios" class="nav-item nav-link"
            >Buscador Ejericicos</router-link
        >
    </div>
    <div v-if="this.isPro">
        <div class="banner-entrenamiento">
            <h1>Crear Rutina</h1>
            <router-link to="/crearRutina" class="nav-item nav-link"
                >Crea tu propia Rutina!
                <button>Crear</button>
            </router-link>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div
                class="col flex justify-content-center"
                v-for="(catego, index) in categorias"
                :key="catego.id"
            >
                <div class="card-body">
                    <p class="card-title mx-2">
                        {{ catego.nombre_categoria }}
                    </p>
                </div>
                <router-link
                    class="link-negro"
                    :to="`/ejercicioMusculo/${catego.id}`"
                >
                    <img
                        class="img-fluid"
                        :src="`img/${catego.imagen_categoria}`"
                    />
                </router-link>
            </div>
        </div>
    </div>

    <!-- NO BORRAR GALERIA DE IMAGENES!!!
        <div class="galeria-ejercicios">
            <div class="galeria-imagen"
                style="background-image: url('http://localhost:8000/img/musculos/hombro2.webp'); display: flex; justify-content: center; align-items: center;">
                <p class="text-white">Hombro</p>
            </div>
            <div class="galeria-imagen"
                style="background-image: url('http://localhost:8000/img/musculos/pecho2.webp'); display: flex; justify-content: center; align-items: center;">
                <p class="text-white">Pecho</p>
            </div>
            <div class="galeria-imagen"
                style="background-image: url('http://localhost:8000/img/musculos/biceps.webp'); display: flex; justify-content: center; align-items: center;">
                <p class="text-white">Biceps</p>
            </div>
            <div class="galeria-imagen"
                style="background-image: url('http://localhost:8000/img/musculos/triceps.webp'); display: flex; justify-content: center; align-items: center;">
                <p class="text-white">Triceps</p>
            </div>
            <div class="galeria-imagen"
                style="background-image: url('http://localhost:8000/img/musculos/abdominales2.webp'); display: flex; justify-content: center; align-items: center;">
                <p class="text-white">Abdominales</p>
            </div>
            <div class="galeria-imagen"
                style="background-image: url('http://localhost:8000/img/musculos/espalda.webp'); display: flex; justify-content: center; align-items: center;">
                <p class="text-white">Espalda</p>
            </div>
            <div class="galeria-imagen"
                style="background-image: url('http://localhost:8000/img/musculos/pierna.webp'); display: flex; justify-content: center; align-items: center;">
                <p class="text-white">Pierna</p>
            </div>
            <div class="galeria-imagen"
                style="background-image: url('http://localhost:8000/img/musculos/otros.webp'); display: flex; justify-content: center; align-items: center;">
                <p class="text-white">Otros</p>
            </div>
        </div>-->

    <section class="pt-5 pb-5 mt-5 vis-desck">
        <div class="row">
            <div class="col-6 mb-2">
                <h3 class="mb-3"><b>Ejercicios especificos</b></h3>
            </div>
            <div class="col-6 text-end mb-2">
                <a
                    class=""
                    href="#carouselExampleIndicators2"
                    role="button"
                    data-slide="prev"
                >
                    <img
                        class="logo-flechas"
                        src="../../img/logos/izquierda.svg"
                    />
                </a>
                <a
                    class=""
                    href="#carouselExampleIndicators2"
                    role="button"
                    data-slide="next"
                >
                    <img
                        class="logo-flechas"
                        src="../../img/logos/derecha.svg"
                    />
                </a>
            </div>
            <div class="col-12">
                <div
                    id="carouselExampleIndicators2"
                    class="carousel slide"
                    data-ride="carousel"
                >
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3 mb-3 pad-carrusel">
                                    <a
                                        class="link-negro"
                                        href="/ejercicioMusculo"
                                    >
                                        <img
                                            class="img-fluid"
                                            src="../../img/musculos/hombro2.webp"
                                        />
                                        <div class="card-body">
                                            <p class="card-title mx-2">
                                                Hombro
                                            </p>
                                            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3 pad-carrusel">
                                    <a class="link-negro" href="#">
                                        <img
                                            class="img-fluid"
                                            src="../../img/musculos/pecho2.webp"
                                        />
                                        <div class="card-body">
                                            <p class="card-title">Pecho</p>
                                            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3 pad-carrusel">
                                    <a class="link-negro" href="#">
                                        <img
                                            class="img-fluid"
                                            src="../../img/musculos/biceps.webp"
                                        />
                                        <div class="card-body">
                                            <p class="card-title">Biceps</p>
                                            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3 pad-carrusel">
                                    <a class="link-negro" href="#">
                                        <img
                                            class="img-fluid"
                                            src="../../img/musculos/triceps.webp"
                                        />
                                        <div class="card-body">
                                            <p class="card-title">Triceps</p>
                                            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3 mb-3 pad-carrusel">
                                    <a class="link-negro" href="#">
                                        <img
                                            class="img-fluid"
                                            src="../../img/musculos/abdominales2.webp"
                                        />
                                        <div class="card-body">
                                            <p class="card-title mx-2">
                                                Abdominales
                                            </p>
                                            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3 pad-carrusel">
                                    <a class="link-negro" href="#">
                                        <img
                                            class="img-fluid"
                                            src="../../img/musculos/espalda.webp"
                                        />
                                        <div class="card-body">
                                            <p class="card-title">Espalda</p>
                                            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3 pad-carrusel">
                                    <a class="link-negro" href="#">
                                        <img
                                            class="img-fluid"
                                            src="../../img/musculos/pierna.webp"
                                        />
                                        <div class="card-body">
                                            <p class="card-title">Pierna</p>
                                            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3 pad-carrusel">
                                    <a class="link-negro" href="#">
                                        <img
                                            class="img-fluid"
                                            src="../../img/musculos/otros.webp"
                                        />
                                        <div class="card-body">
                                            <p class="card-title">Otros</p>
                                            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="row vis-mov">
        <div class="col-6 mb-2">
            <h3 class="mb-3"><b>Ejercicios especificos</b></h3>
        </div>

            <div class="col-6 text-end mb-2">
                <a
                    class=""
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev"
                >
                    <span class="visually-hidden">Anterior</span>
                    <img
                        class="logo-flechas"
                        src="../../img/logos/izquierda.svg"
                    />
                </a>

                <a
                    class=""
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide="next"
                >
                    <span class="visually-hidden">Siguiente</span>
                    <img
                        class="logo-flechas"
                        src="../../img/logos/derecha.svg"
                    />
                </a>
            </div>
            <div
                id="carouselExampleControls"
                class="carousel slide"
                data-bs-ride="carousel"
            >
                <div class="carousel-inner mb-5">
                    <a class="link-negro" href="/Musculo"
                        ><div class="carousel-item active">
                            <img
                                src="../../img/musculos/hombro2.webp"
                                class="img-fluid w-100"
                                alt="..."
                            />
                            <p class="card-title text-center">Hombro</p>
                        </div></a
                    >
                    <div class="carousel-item">
                        <img
                            src="../../img/musculos/pecho2.webp"
                            class="img-fluid w-100"
                            alt="..."
                        />
                        <p class="card-title text-center">Pecho</p>
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../img/musculos/biceps.webp"
                            class="img-fluid w-100"
                            alt="..."
                        />
                        <p class="card-title text-center">Biceps</p>
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../img/musculos/triceps.webp"
                            class="img-fluid w-100"
                            alt="..."
                        />
                        <p class="card-title text-center">Triceps</p>
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../img/musculos/abdominales2.webp"
                            class="img-fluid w-100"
                            alt="..."
                        />
                        <p class="card-title text-center">Abdominales</p>
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../img/musculos/espalda.webp"
                            class="img-fluid w-100"
                            alt="..."
                        />
                        <p class="card-title text-center">Espalda</p>
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../img/musculos/pierna.webp"
                            class="img-fluid w-100"
                            alt="..."
                        />
                        <p class="card-title text-center">Pierna</p>
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../img/musculos/otros.webp"
                            class="img-fluid w-100"
                            alt="..."
                        />
                        <p class="card-title text-center">Otros</p>
                    </div>
                </div>
            </div>
        </div>-->

    <section class="part2">
        <div class="text-center mb-2 mt-2">
            <h3 class="mb-3"><b>Rutinas</b></h3>
        </div>
        <div class="row mb-5 mt-5">
            <div class="col-md-4 pad-rutinas">
                <a class="link-negro" href="#">
                    <img
                        alt=""
                        class="resize-image center-block w-100"
                        src="../../img/rutinas/kettlebell-g3e8f94e67_1280.webp"
                    />
                    <h4 class="text-center m-4">Rutina basica</h4>
                </a>
            </div>
            <div class="col-md-4 pad-rutinas">
                <a class="link-negro" href="#">
                    <img
                        alt=""
                        class="resize-image center-block w-100"
                        src="../../img/rutinas/kettlebell-g1b482f877_1280.webp"
                    />
                    <h4 class="text-center m-4">Rutina intermedia</h4>
                </a>
            </div>
            <div class="col-md-4 pad-rutinas">
                <a class="link-negro" href="#">
                    <img
                        alt=""
                        class="resize-image center-block w-100"
                        src="../../img/rutinas/kettlebell-g0c3db8563_1280.webp"
                    />
                    <h4 class="text-center m-4">Rutina pro</h4>
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
