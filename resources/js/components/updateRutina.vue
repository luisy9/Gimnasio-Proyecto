<template>
    <div class="card">
        <div class="card-body">
            <!-- <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="text-center">Actualiza Rutina</h5>
            </div> -->
            <div
                v-if="strSuccess"
                class="alert alert-success alert-dismissible fade show"
                role="alert"
            >
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
                <strong>{{ strSuccess }}</strong>
            </div>

            <div
                v-if="strError"
                class="alert alert-danger alert-dismissible fade show"
                role="alert"
            >
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
                <strong>{{ strError }}</strong>
            </div>

            <form @submit.prevent="updateRutina" enctype="multipart/form-data">
                <h2 class="text-center py-4">Actualiza Rutina</h2>
                <div class="text-center">
                    <button
                        v-for="(day, index) in daysOfWeek"
                        :key="index"
                        :class="{
                            'button-primary': selectedDay === day,
                            'button-secondary': selectedDay !== day,
                        }"
                        @click="selectDay(index)"
                    >
                        {{ day }}
                    </button>
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
                                ><input
                                    type="text"
                                    style="height: 40px"
                                    v-model="nombreRutina"
                                /><br />
                                <select
                                    style="height: 40px"
                                    v-model="selected"
                                    @change="muculosMuestra"
                                >
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
                                <button
                                    class="button-primary m-auto"
                                    @click="handleSubmit"
                                >
                                    Crear Rutina
                                </button>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-8 col-xl-3">
                            <div class="card card-default p-5">
                                <div
                                    class="text-center mb-4"
                                    v-if="selectedDay != null"
                                >
                                    <p class="mb-3 fw-normal titulo-form">
                                        <b>
                                            Tu rutina
                                            {{ "del " + selectedDay }}</b
                                        >
                                    </p>
                                    <p>{{ nombreRutina }}</p>
                                </div>
                                <div
                                    v-for="categoria in categorias"
                                    :value="categoria.id"
                                >
                                    <span> </span>
                                </div>
                                <div class="col">
                                    {{ checkEjer }}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- <button
                    v-for="(day, index) in daysOfWeek"
                    :key="index"
                    class="day-button"
                    :class="{ selected: selectedDay === index }"
                    @click="selectDay(index)"
                >
                    {{ day }}</button
                ><br /> -->
                <!-- <span>Nombre de tu Rutina: </span><br /><input
                    type="text"
                    v-model="nombreRutina"
                /><br />
                <div class="form-group mb-2">
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
                </div>
                <button
                    type="submit"
                    class="btn btn-primary mt-4 mb-4"
                    @click="updateRutina"
                >
                    Update Rutina
                </button> -->
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "updateUsers",
    data() {
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
            selected: "",
            id: "",
            nombre_ejercicio: "",
            file: "",
            categorias: null,
            ejercicios: null,
            user_role: null,
            userid: window.Laravel.user.id,
            idrutina: this.$route.params.id,
            checked: [],
            checkEjer: [],
            strSuccess: "",
            strError: "",
        };
    },
    mounted() {
        this.user_role = window.Laravel.user_role;
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
        onChangeImg(e) {
            this.file = e.target.files[0];
            let reader = new FileReader();
            reader.addEventListener(
                "load",
                function () {
                    this.imgPreview = reader.result;
                }.bind(this),
                false
            );

            if (this.file) {
                if (/\.(jpe?g|png|gif)$/i.test(this.file.name)) {
                    reader.readAsDataURL(this.file);
                }
            }
        },
        existeRole() {
            let list_name_role = this.user_role.map((role) => role.nombre_role);
            this.roles.forEach((role, index) => {
                list_name_role.includes(role.nombre_role)
                    ? this.checked[index].push(role.id)
                    : null;
            });
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
        updateRutina(e) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                let existingObj = this;
                const config = {
                    headers: {
                        "content-type": "multipart/form-data",
                    },
                };

                const formData = new FormData();
                formData.append("nombre_rutina", this.nombreRutina);
                formData.append("dia_semana", this.selectedDay);
                console.log(this.selectedDay);
                formData.append("ejercicios", this.checkEjer);
                formData.append("user_id", this.userid);

                this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                    this.$axios
                        .post("/api/updateRutina/" + this.idrutina, formData)
                        .then((response) => {
                            console.log(response.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                });
            });
        },

        beforeRouteEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/";
            }
            next();
        },
    },
};
</script>
