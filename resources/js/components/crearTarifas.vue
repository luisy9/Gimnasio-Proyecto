<template>
    <div class="container-fluid">
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
                    <!-- <div v-if="restriccion('admin')">
                        <h1>Hola</h1>
                    </div> -->
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <router-link
                                :to="`/dashboard/${this.iduser}`"
                                class="nav-link"
                                >Perfil</router-link
                            >
                            <div v-if="this.tieneRutina == true">
                                <router-link
                                    :to="`/tuRutina/${this.iduser}`"
                                    class="nav-link"
                                    >Tu Rutina</router-link
                                >
                            </div>
                        </li>
                    </ul>
                    <!-- <div
                        v-if="
                            this.user_role == 'admin' ||
                            this.user_role == 'gestion_users'
                        "
                    > -->
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
                    >
                        <span>Gestion Usuarios</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <router-link to="/crearUsuarios" class="nav-link"
                                >Crear Usuarios</router-link
                            >
                        </li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <router-link to="/eliminarUsuarios" class="nav-link"
                                >Modificar Usuarios</router-link
                            >
                        </li>
                    </ul>
                    <!-- </div> -->
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
                    >
                        <span>Rol</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <router-link to="/createRole" class="nav-link"
                                >Crear Roles</router-link
                            >
                        </li>
                    </ul>
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
                            <router-link to="/crearTarifas" class="nav-link"
                                >Crear Tarifas</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link to="/GestionarTarifas" class="nav-link"
                                >Gestionar Tarifas</router-link
                            >
                        </li>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
                    >
                        <span>Entrenamiento</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <router-link to="/crearEjercicio" class="nav-link"
                                >Crear Ejercicio</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                to="/gestionarEjercicios"
                                class="nav-link"
                                >Gestionar Ejercicios</router-link
                            >
                        </li>
                    </ul>
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
                    >
                        <span>Clases</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <router-link to="/crearClases" class="nav-link"
                                >Crear Clases</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link to="/gestionarClases" class="nav-link"
                                >Gestionar Clases</router-link
                            >
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <section class="p-4 p-md-5">
                    <div class="row d-flex justify-content-center mb-5">
                        <div class="login-pag px-5">
                            <div
                                class="row jutify-content-center w-50 mx-auto mb-5"
                            >
                                <div
                                    class="alert alert-danger alert-dismissible fade show"
                                    role="alert"
                                    v-if="error"
                                >
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close"
                                    ></button>
                                    <strong>{{ error }}</strong>
                                </div>
                                <div class="card card-default p-5">
                                    <main class="form-signin w-100 m-auto px-5">
                                        <form>
                                            <h1 class="h3 mb-3 fw-normal">
                                                Crear Tarifa
                                            </h1>
                                            <br />
                                            <div class="form-floating">
                                                <input
                                                    id="tipo_tarifa"
                                                    type="text"
                                                    class="form-control"
                                                    v-model="tipo_tarifa"
                                                    autofocus
                                                    autocomplete="off"
                                                    placeholder="nombre tarifa"
                                                />
                                                <label
                                                    for="name"
                                                    class="col-sm-4 col-form-label text-md-right"
                                                    >Nombre Tarifa</label
                                                >
                                            </div>
                                            <br />
                                            <div class="form-floating">
                                                <input
                                                    id="precio"
                                                    type="text"
                                                    class="form-control"
                                                    v-model="precio"
                                                    autocomplete="off"
                                                    placeholder="precio"
                                                />
                                                <label
                                                    for="precio"
                                                    class="col-md-4 col-form-label text-md-right"
                                                    >Precio</label
                                                >
                                            </div>
                                            <br />
                                            <div class="form-floating">
                                                <input
                                                    id="descripcion_tarifa"
                                                    type="text"
                                                    class="form-control"
                                                    v-model="descripcion_tarifa"
                                                    autocomplete="off"
                                                    placeholder="descripcion_tarifa"
                                                />
                                                <label
                                                    for="descripcion_tarifa"
                                                    class="col-md-4 col-form-label text-md-right"
                                                    >Descripcion</label
                                                >
                                            </div>
                                            <br />
                                            <div class="form-floating">
                                                <input
                                                    id="num_clases"
                                                    type="number"
                                                    class="form-control"
                                                    v-model="num_clases"
                                                    autocomplete="off"
                                                    placeholder="num_clases"
                                                />
                                                <label
                                                    for="num_clases"
                                                    class="col-md-4 col-form-label text-md-right"
                                                    >Numero de Clases</label
                                                >
                                            </div>
                                            <button
                                                type="submit"
                                                class="button-primary my-4"
                                                @click="createTarifa"
                                            >
                                                Añadir
                                            </button>
                                        </form>
                                    </main>
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
</template>
<script>
export default {
    name: "crearUsuarios",
    data() {
        return {
            tipo_tarifa: "",
            precio: "",
            descripcion_tarifa: "",
            num_clases: "",
            error: null,
        };
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedin = true;
            this.iduser = window.Laravel.user.id;
            console.log(this.iduser);
            this.user = window.Laravel.user;
            this.user_role = window.Laravel.user_role;
            console.log("=======");
            console.log(window.Laravel.user.roles[0].nombre_role);
            this.user_role = window.Laravel.user_role;
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/";
            } else {
                if (
                    window.Laravel.user.roles[0].nombre_role == "admin" ||
                    window.Laravel.user.roles[0].nombre_role == "gestion_tarifa"
                ) {
                    this.$nextTick();
                } else {
                    window.location.href = "/";
                }
            }
        }
    },
    methods: {
        createTarifa(e) {
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("api/createTarifas", {
                        tipo_tarifa: this.tipo_tarifa,
                        precio: this.precio,
                        descripcion_tarifa: this.descripcion_tarifa,
                        num_clases: this.num_clases,
                    })
                    .then((response) => {
                        if (response.data.success) {
                            console.log(response.data.checked);
                        } else {
                            console.log(response);
                            this.error = response.data.message;
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            });
        },
    },
};
</script>

<style scoped>
@media (max-width: 1500px) {
    .login-pag {
        padding: 0;
    }
    .w-50 {
        width: 70% !important;
    }
    .p-5 {
        padding: 1em !important;
    }
    .px-5 {
        padding: 0 !important;
    }
}
@media (max-width: 400px) {
    .w-50 {
        width: 106% !important;
    }
}
</style>
