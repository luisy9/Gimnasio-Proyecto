<template>
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

                <h6
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
                >
                    <span>Entrenamiento</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <router-link to="/gestionarEjercicios" class="nav-link"
                            >Gestionar Ejercicios</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link to="/crearEjercicio" class="nav-link"
                            >Crear Ejercicio</router-link
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
                                            Crear Roles
                                        </h1>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                id="name"
                                                type="text"
                                                class="form-control"
                                                v-model="name"
                                                autofocus
                                                autocomplete="off"
                                                placeholder="Nombre"
                                            />
                                            <label
                                                for="name"
                                                class="col-sm-4 col-form-label text-md-right"
                                                >Nombre</label
                                            >
                                        </div>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                id="email"
                                                type="email"
                                                class="form-control"
                                                v-model="email"
                                                autocomplete="off"
                                                placeholder="Email"
                                            />
                                            <label
                                                for="email"
                                                class="col-md-4 col-form-label text-md-right"
                                                >Email</label
                                            >
                                        </div>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                id="password"
                                                type="password"
                                                class="form-control"
                                                v-model="password"
                                                autocomplete="off"
                                                placeholder="Contraseña"
                                            />
                                            <label
                                                for="password"
                                                class="col-md-4 col-form-label text-md-right"
                                                >Contraseña</label
                                            >
                                        </div>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                id="fecha_nacimiento"
                                                type="date"
                                                min="1899-01-01"
                                                max="2000-01-01"
                                                class="form-control"
                                                v-model="fecha_nacimiento"
                                                autocomplete="off"
                                                placeholder="Teclea tu fecha nacimiento"
                                            />
                                            <label
                                                for="fecha_nacimiento"
                                                class="col-md-4 col-form-label text-md-right"
                                                >fecha nacimiento</label
                                            >
                                        </div>

                                        <br />
                                        <div class="containerBotons">
                                            <h5>Añadir Roles</h5>
                                            <div id="">
                                                <div
                                                    v-for="(
                                                        role, index
                                                    ) in roles"
                                                >
                                                    {{ role.nombre_role }}
                                                    <input
                                                        type="checkbox"
                                                        :value="role.id"
                                                        v-model="checked"
                                                    />
                                                </div>
                                                <p>
                                                    Has Seleeccionado:
                                                    {{ checked }}
                                                </p>
                                            </div>
                                        </div>
                                        <button
                                            type="submit"
                                            class="button-primary"
                                            @click="createUser"
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
        </main>
    </div>
</template>

<script>
export default {
    name: "createRoles",
    data() {
        return {
            name: "",
            email: "",
            password: "",
            fecha_nacimiento: "",
            error: null,
            checked: [],
            roles: [],
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
                    window.Laravel.user.roles[0].nombre_role == "gestion_roles"
                ) {
                    this.$nextTick();
                } else {
                    window.location.href = "/";
                }
            }
        }

        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/roles")
                .then((response) => {
                    console.log(response);
                    this.roles = response.data;
                    console.log(this.roles);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    methods: {
        createUser(e) {
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("api/createUsers", {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        checked: this.checked,
                        fecha_nacimiento: this.fecha_nacimiento,
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

<style scoped></style>
