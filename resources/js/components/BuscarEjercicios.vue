<template>
    <div id="app">
        <form>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" v-model="nombre" />
            </div>

            <button type="button" @click="buscar">Buscar</button>
        </form>

        <ul>
            <li v-for="ejercicio in ejercicios" :key="ejercicio.id">
                {{ ejercicio.nombre_ejercicio }}
                <img class="img-fluid" :src="`img/${ejercicio.imagen_ejercicio}`">
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "buscarEjercicios",
    data() {
        return {
            nombre: "",
            ejercicios: [],
        };
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
</style>
