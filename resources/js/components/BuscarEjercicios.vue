<template>
    <div id="app">
        <div class="banner-entrenamiento">
            <h1 class="text-light text-center">Busca tu Ejercicio!</h1>
        </div>
        <div class="container-fluid container-buscador">
            <div class="row">
                <div class="col my-3 mx-3 border border-black py-4 px-4">
                    <!-- Contenido de la primera columna -->
                    <h2 class="pb-3">Introduce el Ejericio</h2>
                    <form class="form-control py-4">
                        <div>
                            <label for="nombre" class="px-3 py-4">Nombre: </label>
                            <input
                                class="form-control"
                                type="text"
                                required
                                name="nombre"
                                v-model="nombre"
                            />
                            <button type="button" class="" @click="buscar">Buscar</button>
                        </div>
                        
                    </form>
                </div>
                <div class="col my-3 mx-3 border border-black py-3">
                    <!-- Contenido de la segunda columna -->
                    <h2>Ejericios</h2>
                    <ul>
                        <li v-for="ejercicio in ejercicios" :key="ejercicio.id">
                            {{ ejercicio.nombre_ejercicio }}
                            <img
                                class="img-fluid"
                                :src="`img/${ejercicio.imagen_ejercicio}`"
                            />
                        </li>
                    </ul>
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
        },
    },
};
</script>
<style scoped>
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
    width: calc(80% - 100px);
    margin-right: 20px;
}
.form-group {
    display: inline-block;
    width: 100%;
    max-width: 500px;
    margin-bottom: 20px;
}
input.form-control{
    border: 1px solid black;
    border-radius: 8px;
}
</style>
