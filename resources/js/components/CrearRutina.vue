<template>
    <div id="app">
        <h1>Crea tu propia rutina</h1>
        <h4>Rutina para el dia de la semana:</h4>
        <div>
            <button
                v-for="(day, index) in daysOfWeek"
                :key="index"
                class="day-button"
                :class="{ selected: selectedDay === index }"
                @click="selectDay(index)"
            >
                {{ day }}
            </button>
        </div>
        <!-- <div>
            <button class="day-button" @click="logDay('Lunes')">Lunes</button>
            <button class="day-button" @click="logDay('Martes')">
                Tuesday
            </button>
            <button class="day-button" @click="logDay('Miercoles')">
                Wednesday
            </button>
            <button class="day-button" @click="logDay('Jueves')">
                Thursday
            </button>
            <button class="day-button" @click="logDay('Viernes')">Friday</button>
            <button class="day-button" @click="logDay('Sabado')">
                Saturday
            </button>
            <button class="day-button" @click="logDay('Domingo')">Sunday</button>
        </div> -->
        <!-- <button
            v-for="(day, index) in days"
            :key="index"
            :class="{ active: activeDay === index }"
            @click="activeDay = index"
        >
            {{ day }}
        </button>
        {{ activeDay }} -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- Contenido de la columna izquierda aquí -->
            </div>
            <div class="col-md-6">
                <!-- Contenido de la columna derecha aquí -->
            </div>
        </div>
    </div>
    <div class="card">
        <div class="container-fluid">
            <div class="col">
                <h3>Crea tu rutina</h3>
                <span>Nombre de tu Rutina: </span
                ><input type="text" v-model="nombreRutina" /><br />
                <select v-model="selected" @change="muculosMuestra">
                    <option disabled value="">Seleccione un elemento</option>
                    <option
                        v-for="categoria in categorias"
                        :value="categoria.id"
                    >
                        {{ categoria.nombre_categoria }}
                    </option>
                </select>

                <p v-for="ejerci in ejercicios">
                    {{ ejerci.nombre_ejercicio }}
                    <input
                        type="checkbox"
                        :value="`${ejerci.nombre_ejercicio}`"
                        v-model="checkEjer"
                    />
                </p>
                <br />
                <button @click="handleSubmit">Crear Rutina</button>
            </div>
            <span>Seleccionado: {{ selected }} </span>
            <div class="col">
                <h3>Tu Rutina</h3>
                {{ checkEjer }}
            </div>
            {{ this.diaSemana }}
        </div>
    </div>
</template>

<script>
export default {
    data() {
        name: "CrearRutina";
        return {
            daysOfWeek: [
                "Lunes",
                "Martes",
                "Miercoles",
                "Jueves",
                "Viernes",
                "Sabado",
                "Domingo",
            ],
            selectedDay: null,
            userid: window.Laravel.user.id,
            diaSemana: "",
            activeDay: null,
            selectedDate: "",
            nombreRutina: "",
            categorias: null,
            ejercicios: null,
            selected: "",
            checkEjer: [],
            strSuccess: "",
            strError: "",
        };
    },
    mounted() {
        console.log(this.userid);
        console.log("day: " + this.activeDay);
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
    },
    methods: {
        selectDay(index) {
            this.selectedDay = this.daysOfWeek[index];
            console.log(this.selectedDay);
        },
        logDay(day) {
            console.log(day);
            this.diaSemana = day;
        },
        addDay(index) {
            if (!this.selectedDays.includes(this.daysOfWeek[index])) {
                this.selectedDays.push(this.daysOfWeek[index]);
            }
        },
        handleSubmit() {
            console.log("Hola");
            //Post datos Rutina
            const formData = new FormData();
            formData.append('nombre_rutina', this.nombreRutina);
            formData.append('dia_semana', this.selectedDay);
            formData.append('ejercicios',this.checkEjer)
            // formData.append('user_id', this.userid)
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("/api/crearRutina/" + this.userid, formData)
                    .then((response) => {
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
            const data = {
                diaSeleccionado: this.selectedDay,
                nombreRutina: this.nombreRutina,
                arrayRutina: this.checkEjer,
            };

            const dataString = JSON.stringify(data);
            localStorage.setItem("myData", dataString);
        },
        muculosMuestra() {
            console.log(this.selected);
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .get("/api/showMusculitos/" + this.selected)
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
<style>
button {
    padding: 10px;
    margin-right: 10px;
    background-color: white;
    border: 1px solid black;
    border-radius: 5px;
}

button.active {
    background-color: blue;
    color: white;
}

.buttons-week:hover {
    background-color: blue;
}

.day-button {
    background-color: white;
    color: black;
    border: 1px solid black;
    border-radius: 5px;
    padding: 10px 20px;
    margin-right: 10px;
    cursor: pointer;
}

.day-button.selected {
    background-color: blue;
}
</style>
