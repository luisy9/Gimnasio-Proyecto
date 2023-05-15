<template>
    <div class="banner-entrenamiento">
        <h1 class="text-center text-light">{{ this.nombre_clase }}</h1>
    </div>
    <div class="galeria-ejercicios my-5 px-5">
        <div class="col-sm-8"></div>
        <div class="row">
            <div
                class="col col-lg-6"
                :style="`background-image: url('/img/${this.imagen_clase}');  height: 37.5em;
    background-size: cover;
    background-repeat: no-repeat;`"
            >
                <!-- Contenido de la primera columna -->
            </div>
            <div class="col col-lg-6 px-5">
                <!-- Contenido de la segunda columna -->
                <h2 class="pb-1">Escoje un dia</h2>
                <h5>Cada dia tenemos clases!</h5>
                <div class="calendar col-sm-12" style="cursor: pointer">
                    <div
                        v-for="(day, index) in days"
                        :key="index"
                        :class="{
                            day: true,
                            today: isToday(day),
                            selected: isSelected(day),
                        }"
                        @click="selectDay(day)"
                    >
                        {{ day.getDate() }}
                    </div>
                </div>
                <div v-if="selectedDay">
                    <div class="">
                        <button
                            v-for="(dia, index) in horario"
                            :key="index"
                            :class="{
                                'button-primary': horarioSelected === dia,
                                'button-secondary': horarioSelected !== dia,
                            }"
                            @click="selectedHorario(index)"
                        >
                            {{ dia }}
                        </button>
                    </div>
                    <div v-if="horarioSelected">
                        <button
                            class="button-primary m-auto my-5"
                            @click="uneteClase"
                        >
                            Incribete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "claseSeleccionada",
    data() {
        return {
            horario: ["12:00", "10:00", "17:00", "20:00", "21:00"],
            nombre_clase: "",
            imagen_clase: "",
            clase: [],
            idclase: this.$route.params.idclase,
            iduser: window.Laravel.user,
            today: new Date(),
            isLoggedin: false,
            diaSemana: "",
            activeDay: null,
            membership: null,
            selectedDate: "",
            selected: "",
            horarioSelected: null,
            selectedDay: null,
        };
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.iduser = window.Laravel.user.id;
            this.isLoggedin = true;
            this.user = window.Laravel.user;
            this.user_role = window.Laravel.user_role;
            console.log("=======");
            // console.log(window.Laravel.user.roles[1].nombre_role);
        }
    },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/claseSeleccionada/" + this.idclase)
                .then((response) => {
                    this.nombre_clase = response.data.nombre_clase;
                    this.imagen_clase = response.data.imagen;
                    this.clase = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    computed: {
        days() {
            const firstDay = new Date(
                this.today.getFullYear(),
                this.today.getMonth(),
                1
            );
            const lastDay = new Date(
                this.today.getFullYear(),
                this.today.getMonth() + 1,
                0
            );
            const days = [];
            for (let i = 1; i <= lastDay.getDate(); i++) {
                const date = new Date(
                    this.today.getFullYear(),
                    this.today.getMonth(),
                    i
                );
                days.push(date);
            }
            for (let i = 1; i < firstDay.getDay(); i++) {
                days.unshift(null);
            }
            return days;
        },
    },
    methods: {
        selectedHorario(index) {
            this.horarioSelected = this.horario[index];
            console.log(this.horarioSelected);
        },
        logDay(dia) {
            console.log(dia);
            this.diaSemana = dia;
        },
        addDay(index) {
            if (!this.horarioSelected.includes(this.horario[index])) {
                this.horarioSelected.push(this.horario[index]);
            }
        },
        isToday(date) {
            return date && date.toDateString() === this.today.toDateString();
        },
        isSelected(date) {
            return (
                date &&
                this.selectedDay &&
                date.toDateString() === this.selectedDay.toDateString()
            );
        },
        selectDay(date) {
            this.selectedDay = date;
        },
        uneteClase() {
            const formData = new FormData();
            formData.append("fecha_clase", this.selectedDay);
            formData.append("hora_clase", this.horarioSelected);
            formData.append("clase_id", this.idclase);
            formData.append("user_id", this.iduser);
            // formData.append('user_id', this.userid)
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post(
                        "/api/unirteClase/" + this.iduser + "/" + this.idclase,
                        formData
                    )
                    .then((response) => {
                        console.log(response.data);
                        // window.location.href = `/tuRutina/${this.iduser}`;
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
    },
};
</script>

<style>
.calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    grid-template-rows: auto repeat(6, 1fr);
}
.day {
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ddd;
}
.today {
    background-color: #f7f7f7;
    font-weight: bold;
}
.selected {
    background-color: #000;
    color: #fff;
}
.imagen-prueba {
    background-image: url("../../img/seccion3.webp");
    height: 37.5em;
    background-size: cover;
    background-repeat: no-repeat;
}

.banner-entrenamiento {
    background-image: url("http://localhost:8000/img/banner3.webp");
    height: 25em;
    background-size: cover;
    background-position: center;
    opacity: 0.9;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.button-secondary {
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
