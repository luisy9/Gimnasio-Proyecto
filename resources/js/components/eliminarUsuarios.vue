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
                        <router-link to="/gestionarEjercicios" class="nav-link"
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
                    <!--<div class="login-pag px-5">-->
                    <!--<div
                                class="row jutify-content-center w-50 mx-auto mb-5"
                            >-->
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
                            <h2>Gestionar usuarios</h2>
                            <table class="table table-hover table-sm">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th width="50" class="text-center">
                                            #id
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(user, index) in usuarios"
                                        :key="user.id"
                                    >
                                        <td class="text-center py-4">
                                            {{ user.id }}
                                        </td>
                                        <td class="py-4">{{ user.name }}</td>
                                        <td class="py-4">{{ user.email }}</td>
                                        <td class="text-center">
                                            <a
                                                class="text-center"
                                                style="cursor: pointer"
                                                @click="updateUsers(user.id)"
                                            >
                                                <img
                                                    class="logo-editar my-4"
                                                    style="height: 20px"
                                                    src="/img/logos/editar.svg"
                                                />
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a
                                                class="text-enter"
                                                style="cursor: pointer"
                                                @click="deleteUsers(user.id)"
                                            >
                                                <img
                                                    class="logo-x my-4"
                                                    style="height: 20px"
                                                    src="/img/logos/x.svg"
                                                />
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </main>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script>
export default {
    name: "crearUsuarios",
    data() {
        return {
            usuarios: [],
            strSuccess: "",
            strError: "",
            error: null,
            user_role: null,
        };
    },
    created() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/users")
                .then((response) => {
                    console.log(response);
                    this.usuarios = response.data;
                    console.log(this.usuarios);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
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
                    window.Laravel.user.roles[0].nombre_role == "gestion_users"
                ) {
                    this.$nextTick();
                } else {
                    window.location.href = "/";
                }
            }
        }
    },

    methods: {
        updateUsers(id) {
            window.location.href = "/updateUsers/" + id;
        },

        deleteUsers(id) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .delete("/api/deleteUsers/" + id)
                    .then((response) => {
                        const index = this.usuarios.findIndex(
                            (user) => user.id === id
                        );
                        this.usuarios.splice(index, 1);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        },
    },
};
</script>

<style scoped></style>
