<template>
    <div class="text-center my-3">
        <h1>Rutina</h1>
    </div>
    <div id="app">
        <h4 class="text-center">Elige el dia de la semana:</h4>
        <div class="text-center">
            <button
                v-for="(day, index) in daysOfWeek"
                :key="index"
                
                :class="{ 'button-primary': selectedDay === day, 'button-secondary': selectedDay !== day }"
                @click="selectDay(index)"
            >
                {{ day }}
            </button>
        </div>
    </div>

    <section class="p-4 p-md-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-5 mb-2">
                <div class="card card-default p-5">
                    <div class="text-center mb-4">
                        <p class="mb-3 fw-normal titulo-form">
                            <b> Crea tu rutina </b>
                        </p>
                    </div>
                    <span>Nombre de tu Rutina: </span
                    ><input type="text" v-model="nombreRutina" /><br />
                    <select v-model="selected" @change="muculosMuestra">
                        <option disabled value="">
                            Seleccione un elemento
                        </option>
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
                    <button class="button-primary m-auto" @click="handleSubmit">
                        Crear Rutina
                    </button>
                </div>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-3">
                <div class="card card-default p-5">
                    <div class="text-center mb-4" v-if="selectedDay ===null">
                        <p class="mb-3 fw-normal titulo-form">
                            <b> Tu rutina</b>
                        </p>
                        <p>{{ nombreRutina }}</p>
                    </div><div class="text-center mb-4" v-if="selectedDay != null">
                        <p class="mb-3 fw-normal titulo-form">
                            <b> Tu rutina {{"del " + selectedDay }}</b>
                        </p>
                        <p>{{ nombreRutina }}</p>
                    </div>
                    <div  v-for="categoria in categorias"
                            :value="categoria.id"
                        >
                    <span>Seleccionado: {{ categoria.nombre_categoria}} </span>
                    </div>
                    <div class="col">
                        {{ checkEjer }}
                    </div>
                    {{ this.diaSemana }}
                    
                    <div
                        class="card-body p-4"
                        v-for="(tarifa, index) in tarfiasArray"
                        :key="tarifa.id"
                    >
                        <div class="text-center mb-4">
                            <h3>{{ tarifa.tipo_tarifa }}</h3>
                        </div>
                        <div class="col">
                            <p>{{ tarifa.id }}</p>
                            <p>{{ tarifa.tipo_tarifa }}</p>
                            <p>{{ tarifa.precio }}</p>
                            <p>{{ tarifa.descripcion_tarifa }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            console.log("Rutina creada");
            //Post datos Rutina
            const formData = new FormData();
            formData.append("nombre_rutina", this.nombreRutina);
            formData.append("dia_semana", this.selectedDay);
            formData.append("ejercicios", this.checkEjer);
            // formData.append('user_id', this.userid)
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("/api/crearRutina/" + this.userid, formData)
                    .then((response) => {
                        console.log(response.data);
                        window.location.href = `/tuRutina/${this.userid}`;
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
.button-secondary{
    border: 1px solid black;
}
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
