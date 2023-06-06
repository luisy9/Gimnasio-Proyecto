<template>
    <div class="banner-entrenamiento text-center">
        <h1 class="text-light">Rutina</h1>
    </div>
    <section class="p-4 p-md-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-5 mb-2">
                <div class="card card-default p-5">
                    <div class="text-center mb-4">
                        <p class="mb-3 fw-normal titulo-form">
                            <b> Modifica tu Rutina </b>
                        </p>
                    </div>
                    <div id="app" class="pb-4">
                        <h4 class="">Elige el dia de la semana:</h4>
                        <div class="">
                            <button
                                v-for="(day, index) in daysOfWeek"
                                :key="index"
                                :class="{
                                    'button-primary my-2': selectedDay === day,
                                    'button-secondary my-2':
                                        selectedDay !== day,
                                }"
                                @click="selectDay(index)"
                            >
                                {{ day }}
                            </button>
                        </div>
                    </div>
                    <span>Nombre de tu Rutina: </span
                    ><input
                        type="text"
                        style="height: 40px"
                        v-model="nombreRutina"
                    /><br />
                    <select
                        style="height: 40px"
                        v-model="selected"
                        @change="muculosMuestra"
                        class="my-2"
                    >
                        <option disabled value="">Seleccione un Musculo</option>
                        <option
                            v-for="categoria in categorias"
                            :value="categoria.id"
                        >
                            {{ categoria.nombre_categoria }}
                        </option>
                    </select>
                    <div
                        class=""
                        v-for="(ejerci, index) in ejercicios"
                        :key="ejerci.id"
                    >
                        <div class="image-container">
                            <div
                                class="image"
                                :style="{
                                    backgroundImage:
                                        'url(/img/' +
                                        ejerci.imagen_ejercicio +
                                        ')',
                                }"
                            ></div>
                            <div class="image-description">
                                <p>{{ ejerci.descripcion_ejercicio }}</p>
                                <div class="">
                                    <p>
                                        {{ ejerci.nombre_ejercicio }}:
                                        <input
                                            class="mt-1"
                                            type="checkbox"
                                            name="test"
                                            :value="`${ejerci.id}`"
                                            @change="busquedaImg"
                                            :id="`${ejerci.id}`"
                                        />
                                        <!-- <input type="number" :value="" -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-3">
                <div class="card card-default p-5">
                    <div class="text-center mb-4">
                        <p class="fw-normal titulo-form" v-if="selectedDay">
                            <b class="">
                                Tu rutina {{ "para el " + selectedDay }}</b
                            ><br />
                            <b>{{ nombreRutina }}</b>
                        </p>
                    </div>
                    <div v-for="categoria in categorias" :value="categoria.id">
                        <span> </span>
                    </div>
                    <div class="col">
                        <!-- <h2 class="mb-4">Tu Rutina</h2> -->
                        <!-- <h4><b>{{ nombreRutina }}</b></h4> -->
                        <div
                            class="imagen-container"
                            v-for="(objetoImagen, id) in this.imgEjer"
                        >
                            <h5 v-for="nombre in this.nombreEjer">
                                {{ nombre.nombre_ejercicio }}
                            </h5>
                            <h5>
                                {{ objetoImagen[0] }}

                                <a
                                    class="px-5"
                                    style="cursor: pointer"
                                    @click="deleteRutinaX(id)"
                                >
                                    <img
                                        class="logo-x"
                                        src="/img/logos/x.svg"
                                        style="height: 19px; width: 19px"
                                    />
                                </a>
                            </h5>
                            <div
                                class="imagen-seleccionada"
                                :style="{
                                    backgroundImage:
                                        'url(/img/' + objetoImagen[1] + ')',
                                }"
                            ></div>
                            Series:
                            <input
                                type="number"
                                class="mb-2"
                                :value="objetoImagen[2]"
                                @input="
                                    actualizarSeries(id, $event.target.value)
                                "
                                style="width: 5rem"
                            /><br />
                            Descanso entre Series:
                            <input
                                class="mb-2"
                                type="text"
                                :value="objetoImagen[4]"
                                @input="
                                    actualizarDescanso(id, $event.target.value)
                                "
                                style="width: 8rem"
                            />
                            <br />
                            Repeticiones:
                            <input
                                class="mt-2"
                                type="number"
                                :value="objetoImagen[3]"
                                @input="
                                    actualizarRepes(id, $event.target.value)
                                "
                                style="width: 5rem"
                            />
                        </div>
                    </div>
                    <button
                        class="button-primary m-auto mt-4"
                        @click="handleSubmit"
                    >
                        Actualizar Rutina
                    </button>
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
            nombreRutina: "",
            userid: window.Laravel.user.id,
            idRutina: this.$route.params.id_rutina,
            rutinaUsuario: [],
            miRutina: [],
            diaSemana: "",
            activeDay: null,
            selectedDate: "",
            categorias: null,
            ejercicios: null,
            selected: "",
            checkEjer: [],
            imgEjer: {},
            nombreEjer: [],
            strSuccess: "",
            strError: "",
            diaSemana: "",
            lengthRutina: [],
            idRutinaAnterior: "",
            complementos: [],
        };
    },
    mounted() {
        this.idRutinaAnterior = this.idRutina;
        console.log(this.idRutinaAnterior);
        console.log(this.nombreRutina);
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

        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/rutinaUser/" + this.idRutina)
                .then((response) => {
                    console.log(response.data);
                    this.nombreRutina = response.data[0].nombre_rutina;
                    this.diaSemana = response.data[0].dia_semana;
                    this.selectedDay = response.data[0].dia_semana;
                    this.lengthRutina = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
        this.$axios
            .get("/sanctum/csrf-cookie")
            .then((response) => {
                this.$axios
                    .get(
                        "/api/hasRutinaUser/" +
                            this.userid +
                            "/" +
                            this.idRutina
                    )
                    .then((response) => {
                        this.rutinaUsuario = response.data;
                        console.log(this.rutinaUsuario, "hola");
                        this.rutinaUsuario.forEach((e) => {
                            this.$axios
                                .get(`/api/getImgEjercicio/${e.ejercicio}`)
                                .then((response) => {
                                    console.log(response.data[0]);
                                    e.imagen_ejercicio =
                                        response.data[0].imagen_ejercicio;
                                    this.imgEjer[e.id] = [
                                        response.data[0].nombre_ejercicio,
                                        response.data[0].imagen_ejercicio,
                                        // this.rutinaUsuario[0].series,
                                        e.series,
                                        e.repeticiones,
                                        e.descanso
                                        // 1,
                                        // 1,
                                        // 0
                                        // this.complementos[0].series,
                                        // this.complementos[0].repeticiones,
                                        // this.complementos[0].descanso,
                                    ];
                                })
                                .catch(function (error) {
                                    console.error(error);
                                });
                        });
                        console.log("hola");
                        console.log(this.miRutina);
                    });
            })
            .catch(function (error) {
                console.error(error);
            });
    },
    methods: {
        MoverEjercicio(id,tipo){

        },

        deleteRutinaX(id) {
            delete this.imgEjer[id];
        },
        deleteRutinaAnterior(id_rutina) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .delete("/api/deleteRutinaAnterior/" + id_rutina)
                    .then((response) => {
                        const index = this.rutinaUsuario.findIndex(
                            (rutina) => rutina.id_rutina === id_rutina
                        );
                        this.rutinaUsuario.splice(index, 1);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        },
        busquedaImg(event) {
            console.log("busquedaImg");
            console.log(event);
            console.log(event.target.checked);
            console.log(event.target.value);
            if (event.target.checked) {
                this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                    this.$axios
                        .get("/api/busquedaImgRutina/" + event.target.value)
                        .then((response) => {
                            console.log(response.data[0].nombre_ejercicio);
                            //esta en una lista que se llama imgEjer este info
                            this.imgEjer[event.target.value] = [
                                response.data[0].nombre_ejercicio,
                                response.data[0].imagen_ejercicio,
                                1,
                                1,
                                0,
                            ];
                            console.log(this.imgEjer);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                });
            } else {
                delete this.imgEjer[event.target.value];
            }
        },
        actualizarRepes(id, reps) {
            this.imgEjer[id][3] = reps;
        },
        actualizarSeries(id, sets) {
            this.imgEjer[id][2] = sets;
        },
        actualizarDescanso(id, rest) {
            this.imgEjer[id][4] = rest;
        },
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
            this.deleteRutinaAnterior(this.idRutinaAnterior);
            for (const [id, e] of Object.entries(this.imgEjer)) {
                const formData = new FormData();
                formData.append("id_rutina", this.idRutina);
                formData.append("nombre_rutina", this.nombreRutina);
                formData.append("dia_semana", this.selectedDay);
                formData.append("ejercicio", e[0]);
                formData.append("descanso", e[4]);
                formData.append("series", e[2]);
                formData.append("repeticiones", e[3]);
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
            }
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
.image-container {
    position: relative;
    display: inline-block;
    width: 100%;
    height: 25rem;
    margin: 0.225rem;
}

.image-container:hover .image-description {
    display: block;
}

.image {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
}

.imagen-seleccionada {
    width: 12rem;
    height: 13rem;
    background-size: cover;
    background-position: center;
}

.image-description {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40rem;
    height: 100%;
    padding: 10px;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.7);
    display: none;
}
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.imagen-container {
    height: 30rem;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.imagen-container:hover .overlay {
    opacity: 1;
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
