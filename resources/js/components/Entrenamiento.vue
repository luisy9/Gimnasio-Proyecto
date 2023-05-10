<template>
    <div class="banner-entrenamiento">
        <h1 class="text-center">Entrenamiento</h1>
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
                <a class="link-negro" href="/ejercicioMusculo">
                    <img
                        class="img-fluid"
                        :src="`img/${catego.imagen_categoria}`"
                    />
                </a>
            </div>
        </div>
    </div>

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
                <img class="logo-flechas" src="../../img/logos/izquierda.svg" />
            </a>

            <a
                class=""
                type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="next"
            >
                <span class="visually-hidden">Siguiente</span>
                <img class="logo-flechas" src="../../img/logos/derecha.svg" />
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
    </div> -->

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
            isLoggedin: window.Laravel.isLoggedin,
        };
    },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/showCategorias")
                .then((response) => {
                    this.categorias = response.data;
                    console.log(this.categorias);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
};
</script>

<style scoped></style>
