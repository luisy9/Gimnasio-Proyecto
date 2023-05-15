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
                            <router-link
                                to="/gestionarEjercicios"
                                class="nav-link"
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
                                <div class="card card-default ">
                                    <main class="form-signin w-100 m-auto px-5 py-5">
                                        <form>
                                            <h1 class="h3 mb-3 fw-normal">
                                                Crear Ejercicio
                                            </h1>
                                            <br />
                                            <div class="form-floating">
                                                <input
                                                    id="nombre_ejercicio"
                                                    type="text"
                                                    class="form-control"
                                                    v-model="nombre_ejercicio"
                                                    autofocus
                                                    autocomplete="off"
                                                    placeholder="Nombre"
                                                />
                                                <label
                                                    for="name"
                                                    class="col-sm-4 col-form-label text-md-right"
                                                    >Nombre Ejercicio</label
                                                >
                                            </div>
                                            <br />
                                            <div class="form-group mb-2">
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    v-on:change="onChangeImg"
                                                    placeholder="Enter post name"
                                                />
                                            </div>
                                            <select
                                                v-model="selected"
                                                class="d-flex my-3"
                                            >
                                                <option disabled value="">
                                                    Seleccione un elemento
                                                </option>
                                                <option
                                                    v-for="categoria in categorias"
                                                    :value="categoria.id"
                                                >
                                                    {{
                                                        categoria.nombre_categoria
                                                    }}
                                                </option>
                                            </select>
                                            <button
                                                type="submit"
                                                class="button-primary"
                                                @click="createEjercicio"
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
    </div>
</template>

<script>
export default {
    name: "crearUsuarios",
    data() {
        return {
            nombre_ejercicio: "",
            img: "",
            error: null,
            categorias: [],
            checked: [],
            roles: [],
            selected: "",
            checkcategorias: [],
        };
    },
    mounted() {
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
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/showCategorias")
                .then((response) => {
                    console.log(response.data);
                    this.categorias = response.data;
                    console.log(this.categorias);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    methods: {
        onChangeImg(e) {
            this.img = e.target.files[0];
            let reader = new FileReader();
            reader.addEventListener(
                "load",
                function () {
                    this.imgPreview = reader.result;
                }.bind(this),
                false
            );

            if (this.img) {
                if (/\.(jpe?g|png|gif)$/i.test(this.img.name)) {
                    console.log(this.img.name);
                    reader.readAsDataURL(this.img);
                }
            }
        },
        createEjercicio(e) {
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                let existObj = this;
                const config = {
                    headers: {
                        "content-type": "multipart/form-data",
                    },
                };

                const formData = new FormData();
                formData.append("nombre_ejercicio", this.nombre_ejercicio);
                formData.append("imagen_ejercicio", this.img);
                formData.append("categoria_id", this.selected);

                this.$axios
                    .post("/api/createEjercicio", formData, config)
                    .then((response) => {
                        existObj.strError = "";
                        existObj.strSuccess = response.data.success;
                    })
                    .catch(function (error) {
                        existObj.strError = error.response.data.message;
                        existObj.strSuccess = "";
                    });
            });
        },
    },
};
</script>

<style scoped>
@media (max-width: 1500px) {
    .login-pag{
        padding: 0;
    }
    .w-50{
        width: 70%!important;
    }
    .p-5{
        padding: 1em!important;
    }
    .px-5{
        padding: 0!important;
    }
}
@media (max-width: 400px) {
    .w-50{
        width: 106%!important;
    }
}
</style>
