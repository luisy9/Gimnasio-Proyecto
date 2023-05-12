<template>
    <div class="container-fluid" v-if="this.user_role == 'admin'">
        <div class="row">
            <nav
                id="sidebarMenu"
                class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
            >
                <div class="position-sticky pt-3">
                    <h5
                        class="d-flex justify-content-between px-3 mt-4 mb-1 my-3 text-muted"
                    >
                        <span>Dashboard</span
                        ><a
                            class="link-secondary"
                            href="#"
                            aria-label="Add a new report"
                        >
                            <img
                                class="contraer-img pb-1"
                                src="http://localhost:8000/img/logos/contraer_izq.svg"
                            />
                        </a>
                    </h5>
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
                    >
                        <span>Usuario</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <router-link to="/dashboard/4" class="nav-link"
                                >Perfil</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link to="/crearUsuarios" class="nav-link"
                                >Crear Usuarios</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                to="/modificarUsuarios"
                                class="nav-link"
                                >Modificar Usuarios</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link to="/eliminarUsuarios" class="nav-link"
                                >Eliminar Usuarios</router-link
                            >
                        </li>
                        </ul>
                        <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
                    >
                        <span>Rol</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <router-link to="/roleAdmin" class="nav-link"
                                >Gestionar Roles</router-link
                            >
                        </li>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
                    >
                        <span>Tarifa</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <router-link to="/GestionarTarifas" class="nav-link"
                                >Gestionar Tarifas</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link to="/crearTarifas" class="nav-link"
                                >Crear Tarifas</router-link
                            >
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <section class="p-4 p-md-5">
                    <div class="row d-flex justify-content-center mb-5 mt-5">
                        <div class="col-md-10 col-lg-8 col-xl-5">
                            <div class="card card-default p-5">
                                <div class="card-body p-4">
                                    <div class="text-center mb-4">
                                        <p class="mb-3 fw-normal titulo-form">
                                            <b> Perfil </b>
                                        </p>
                                    </div>
                                    <form @submit.prevent="editarUsuario">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="user.name"
                                                :readonly="!editing"
                                            />
                                            <label for="nombre">Nombre</label>
                                        </div>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                type="email"
                                                class="form-control"
                                                v-model="user.email"
                                                :readonly="!editing"
                                            />
                                            <label for="email">Email</label>
                                        </div>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                type="date"
                                                class="form-control"
                                                min="1899-01-01"
                                                max="2000-01-01"
                                                v-model="user.fecha_nacimiento"
                                                :readonly="!editing"
                                            />
                                            <label for="fecha_nacimiento"
                                                >Fecha de nacimiento</label
                                            >
                                        </div>
                                        <br />
                                        <div class="text-center">
                                            <button
                                                v-if="!editing"
                                                type="button"
                                                class="button-primary"
                                                @click="editProfile"
                                            >
                                                Editar
                                            </button>
                                            <button
                                                v-else
                                                type="submit"
                                                class="button-primary"
                                                @click="saveProfile"
                                            >
                                                Confirmar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-10 col-lg-8 col-xl-3" v-if="this.hayTarifa">-->
                        <div class="col-md-10 col-lg-8 col-xl-4">
                            <div class="card card-default p-5">
                                <div class="text-center">
                                    <p class="mb-3 fw-normal titulo-form">
                                        <b> Tarifa Actual </b>
                                    </p>
                                    <h4>{{ this.id_tarifa.tipo_tarifa }}</h4>
                                    <button
                                        type="submit"
                                        class="button-primary"
                                        @click=""
                                    >
                                        Cambiar tarifa
                                    </button>
                                    <button
                                        type="submit"
                                        class="button-primary"
                                        @click="darbaja(this.iduser)"
                                    >
                                        Dar de baja
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!--<div class="mt-5 text-center" v-if="this.user_role == 'admin'">
        <router-link to="/crearUsuarios" class="nav-item nav-link">Crear Usuarios</router-link>
        <router-link to="/modificarUsuarios" class="nav-item nav-link">Modificar Usuarios</router-link>
        <router-link to="/eliminarUsuarios" class="nav-item nav-link">Eliminar Usuarios</router-link>
        <router-link to="/roleAdmin" class="nav-item nav-link">Gestionar Roles</router-link>
        <router-link to="/GestionarTarifas" class="nav-item nav-link">Gestionar Tarifas</router-link>
        <router-link to="/crearTarifas" class="nav-item nav-link">Crear Tarifas</router-link>
    </div>-->
    <section class="p-4 p-md-5" v-if="this.user_role != 'admin'">
        <div class="row d-flex justify-content-center mb-5 mt-5">
            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="card card-default p-5">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <p class="mb-3 fw-normal titulo-form">
                                <b> Perfil </b>
                            </p>
                        </div>
                        <form @submit.prevent="editarUsuario">
                            <div class="form-floating">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="user.name"
                                    :readonly="!editing"
                                />
                                <label for="nombre">Nombre</label>
                            </div>
                            <br />
                            <div class="form-floating">
                                <input
                                    type="email"
                                    class="form-control"
                                    v-model="user.email"
                                    :readonly="!editing"
                                />
                                <label for="email">Email</label>
                            </div>
                            <br />
                            <div class="form-floating">
                                <input
                                    type="date"
                                    class="form-control"
                                    min="1899-01-01"
                                    max="2000-01-01"
                                    v-model="user.fecha_nacimiento"
                                    :readonly="!editing"
                                />
                                <label for="fecha_nacimiento"
                                    >Fecha de nacimiento</label
                                >
                            </div>
                            <br />
                            <div class="text-center">
                                <button
                                    v-if="!editing"
                                    type="button"
                                    class="button-primary"
                                    @click="editProfile"
                                >
                                    Editar
                                </button>
                                <button
                                    v-else
                                    type="submit"
                                    class="button-primary"
                                    @click="saveProfile"
                                >
                                    Confirmar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--<div class="col-md-10 col-lg-8 col-xl-3" v-if="this.hayTarifa">-->
            <div class="col-md-10 col-lg-8 col-xl-4">
                <div class="card card-default p-5">
                    <div class="text-center">
                        <p class="mb-3 fw-normal titulo-form">
                            <b> Tarifa Actual </b>
                        </p>
                        <h4>{{ this.id_tarifa.tipo_tarifa }}</h4>
                        <button type="submit" class="button-primary" @click="">
                            Cambiar tarifa
                        </button>
                        <button
                            type="submit"
                            class="button-primary"
                            @click="darbaja(this.iduser)"
                        >
                            Dar de baja
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            isLoggedin: false,
            isAdmin: false,
            user: null,
            factura: null,
            iduser: null,
            id_tarifa: [],
            tarifa_actual: null,
            hayTarifa: null,
            editing: false,
        };
    },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/facturasTarifas/${this.iduser}`)
                .then((response) => {
                    this.id_tarifa = response.data;
                    this.hayTarifa = true;
                    console.log(this.hayTarifa);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.iduser = window.Laravel.user.id;
            console.log(this.iduser);
            this.isLoggedin = true;
            this.user = window.Laravel.user;
            this.isLoggedin = true;
            this.user = window.Laravel.user;
            this.user_role = window.Laravel.user_role;
            console.log("=======");
            console.log(window.Laravel.user.roles[0].nombre_role);
            this.user_role = window.Laravel.user.roles[0].nombre_role;
        }
    },
    methods: {
        darbaja(id) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .delete("/api/deleteFactura/" + id)
                    .then((response) => {
                        const index = this.factura.findIndex(
                            (factura) => factura.id === id
                        );
                        this.factura.splice(index, 1);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        },
        logout(e) {
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("api/logout")
                    .then((response) => {
                        if (response.data.success) {
                            window.location.href = "/";
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            });
        },
        editProfile() {
            // Permitir la edición de los valores de los inputs
            const inputs = document.querySelectorAll("input[readonly]");
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].removeAttribute("readonly");
            }

            // Cambiar el botón "Editar" por "Confirmar"
            this.editing = true;
        },
        saveProfile() {
            // Aquí iría la lógica para guardar los cambios del perfil en el servidor

            // Deshabilitar la edición de los valores de los inputs
            const inputs = document.querySelectorAll("input:not([readonly])");
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].setAttribute("readonly", true);
            }

            // Cambiar el botón "Confirmar" por "Editar"
            this.editing = false;
        },
    },
};
</script>
<style scoped>
@media (max-width: 1500px) {
    .p-5 {
        padding: 0 !important;
    }
}
</style>
