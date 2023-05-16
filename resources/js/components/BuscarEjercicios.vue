<template>
    <div id="app">
        <div class="banner-entrenamiento">
            <h1 class="text-light text-center">Busca tu Ejercicio!</h1>
        </div>

        <div class="align-items-start sticky-top pb-2 text-center">
            <form class="form-control pt-4 w-100 border-0">
                <div class="pl-3">
                    <label for="nombre" class="py-4"
                        ><p>Introduce el ejercicio:</p>
                    </label>
                    <input
                        class="form-control mx-3"
                        type="text"
                        required
                        name="nombre"
                        v-model="nombre"
                        style="width: 60%"
                    />
                    <button
                        type="button"
                        class="button-primary"
                        @click="buscar"
                    >
                        Buscar
                    </button>
                </div>
            </form>
        </div>
        <div v-if="mostrarResultados === false">
            <div class="container px-4 py-5" id="custom-cards">
                <h3 class="pb-2 border-bottom">Ejercicios</h3>
                <div
                    class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5"
                >
                    <div
                        class="col h-carta"
                        v-for="allEjercicios in allEjercicios"
                    >
                        <div
                            class="card card-cover h-100 overflow-hidden text-white d-flex ejercicio"
                            :style="{
                                backgroundImage:
                                    'url(/img/' +
                                    allEjercicios.imagen_ejercicio +
                                    ')',
                            }"
                        >
                            <div
                                class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 align-items-center justify-content-center"
                            >
                                <h2 class="text-center">
                                    {{ allEjercicios.nombre_ejercicio }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div v-if="mostrarResultados">
            <div class="container px-4 py-5" id="custom-cards">
                <h3>Ejericios</h3>
                <div
                    class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5"
                >
                    <div
                        class="col h-carta"
                        v-for="ejercicio in ejercicios" :key="ejercicio.id"
                    >
                        <div
                            class="card card-cover h-100 overflow-hidden d-flex ejercicio"
                            :style="{
                                backgroundImage:
                                    'url(/img/' +
                                    ejercicio.imagen_ejercicio +
                                    ')',
                            }"
                        >
                            <div
                                class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1 align-items-center justify-content-center"
                            >
                                <h2 class="text-center text-dark">
                                    {{ ejercicio.nombre_ejercicio }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "buscarEjercicios",
    data() {
        return {
            nombre: "",
            ejercicios: [],
            allEjercicios: [],
            mostrarResultados: false,
        };
    },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/ejercicios")
                .then((response) => {
                    this.allEjercicios = response.data;
                    console.log(this.allEjercicios);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    methods: {
        buscar() {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .get("/api/search/" + this.nombre)
                    .then((response) => {
                        this.ejercicios = response.data;
                        console.log(this.ejercicios);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
            this.mostrarResultados = true;
        },
    },
};
</script>
<style scoped>
h2{
 color: rgb(0, 0, 0);
}
h2:hover{
    transform: 1.5em;
}
.ejercicio{
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.5;
}
.ejercicio:hover{
    opacity: 1;
}

.container {
    max-width: none;
    width: 100%;
    padding-left: 3em !important;
    padding-right: 3em !important;
}
form {
    display: flex;
    align-items: center;
    justify-content: center;
}

input[type="text"] {
    padding: 10px;
    font-size: 16px;
    border: none;
    border-radius: 5px 0 0 5px;
}

button[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #555;
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
.banner-entrenamiento h1 {
    -webkit-text-stroke: 1px black;
}
.form-control {
    display: inline-block;
    width: 60%;
}
.form-group {
    display: inline-block;
    width: 100%;
    max-width: 500px;
    margin-bottom: 20px;
}
input.form-control {
    border: 1px solid black;
    border-radius: 8px;
}
</style>
