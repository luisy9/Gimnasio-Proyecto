<template>
    <div id="app">
        <h1>Tu Rutina</h1>
        <div v-for="rutina in miRutina">
            {{ rutina }}
        </div>
    </div>
</template>

<script>
export default {
    name: "buscarEjercicios",
    data() {
        return {
            iduser: this.$route.params.iduser,
            nombre: "",
            miRutina: [],
            ejercicios: [],
        };
    },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .get("/api/hasTarifa/" + this.iduser)
                    .then((response) => {
                       this.miRutina = response.data;
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            });
    },
    methods: {

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
