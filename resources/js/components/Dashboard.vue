<template>

        <div class="row" v-if="
            this.user_role == 'admin'">
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
                    <div class="row d-flex justify-content-center mb-5 mt-5">
                        <div class="col-md-10 col-lg-8 col-xl-5 pb-5">
                            <div class="card card-default p-5">
                                <div class="card-body p-4">
                                    <div class="text-center mb-4">
                                        <p class="mb-3 fw-normal titulo-form">
                                            <b> Perfil </b>
                                        </p>
                                    </div>
                                    <form>
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="name"
                                            />
                                            <label for="nombre">Nombre</label>
                                        </div>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                type="email"
                                                class="form-control"
                                                v-model="email"
                                            />
                                            <label for="email">Email</label>
                                        </div>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                type="password"
                                                class="form-control"
                                                v-model="password"
                                                placeholder="Enter post name"
                                            />
                                            <label>Contraseña</label
                                            >
                                        </div>
                                        <br>
                                        <!--<div class="form-group mb-2">
                                            <label>Contraseña</label
                                            ><span class="text-danger"> *</span>
                                            <input
                                                type="password"
                                                class="form-control"
                                                v-model="password"
                                                placeholder="Enter post name"
                                            />
                                        </div>-->
                                        <div class="form-floating">
                                            <input
                                                type="date"
                                                class="form-control"
                                                min="1899-01-01"
                                                :max="maxFechaNacimiento" 
                                                v-model="fechaNacimiento"
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
                                            <!-- {{ this.rolesActualesUser }} -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-10 col-lg-8 col-xl-3" v-if="this.hayTarifa">-->

                        <div
                            v-if="this.membership == false"
                            class="col-md-10 col-lg-8 col-xl-4"
                        >
                            <div class="card card-default">
                                <div class="text-center imagen-container hovereffect">
                                    <a
                                        style="cursor: pointer"
                                        @click="editarRutina(rutina.id)"
                                        href="/tarifa"
                                    >
                                        <img
                                            class="w-100"
                                            src="/img/unete.jpg"
                                        />
                                        <h4
                                            class="position-absolute top-50 start-50 translate-middle text-light imagen-texto"
                                        >
                                            Abonate
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            v-if="this.membership == true"
                            class="col-md-10 col-lg-8 col-xl-4"
                        >
                            <div class="card card-default p-5">
                                <div class="text-center py-4">
                                    <p class="mb-3 fw-normal titulo-form">
                                        <b> Tarifa Actual </b>
                                    </p>
                                    <h4 class="mb-4">{{ this.id_tarifa }}</h4>
                                    <router-link :to="`/cambiarTarifa/${this.iduser}/${this.nombre_tarifa}`" ></router-link>
                                    
                                    <button
                                        type="submit"
                                        class="button-primary"
                                        style="padding-left: 10px;padding-right: 10px;"
                                    >
                                        Cambiar tarifa
                                    </button>
                                    <button
                                        type="submit"
                                        class="button-primary"
                                        style="padding-left: 10px;padding-right: 10px;"
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
 

    <section class="p-4 p-md-5" v-if="
            this.user_role != 'admin'">
                    <div class="row d-flex justify-content-center mb-5 mt-5">
                        <div class="col-md-10 col-lg-8 col-xl-5 pb-5">
                            <div class="card card-default p-5">
                                <div class="card-body p-4">
                                    <div class="text-center mb-4">
                                        <p class="mb-3 fw-normal titulo-form">
                                            <b> Perfil </b>
                                        </p>
                                    </div>
                                    <form>
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="name"
                                            />
                                            <label for="nombre">Nombre</label>
                                        </div>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                type="email"
                                                class="form-control"
                                                v-model="email"
                                            />
                                            <label for="email">Email</label>
                                        </div>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                type="password"
                                                class="form-control"
                                                v-model="password"
                                                placeholder="Enter post name"
                                            />
                                            <label>Contraseña</label
                                            >
                                        </div>
                                        <br />
                                        <div class="form-floating">
                                            <input
                                                type="date"
                                                class="form-control"
                                                min="1899-01-01"
                                                :max="maxFechaNacimiento" 
                                                v-model="fechaNacimiento"
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
                                            <!-- {{ this.rolesActualesUser }} -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-10 col-lg-8 col-xl-3" v-if="this.hayTarifa">-->

                        <div
                            v-if="this.membership == false"
                            class="col-md-10 col-lg-8 col-xl-4"
                        >
                            <div class="card card-default">
                                <div class="text-center imagen-container hovereffect">
                                    <a
                                        style="cursor: pointer"
                                        @click="editarRutina(rutina.id)"
                                        href="/tarifa"
                                    >
                                        <img
                                            class="w-100"
                                            src="/img/unete.jpg"
                                        />
                                        <h4
                                            class="position-absolute top-50 start-50 translate-middle text-light imagen-texto"
                                        >
                                            Abonate
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            v-if="this.membership == true"
                            class="col-md-10 col-lg-8 col-xl-4"
                        >
                            <div class="card card-default p-5">
                                <div class="text-center p-4">
                                    <p class="mb-3 fw-normal titulo-form">
                                        <b> Tarifa Actual </b>
                                    </p>
                                    <h4 class="mb-4">{{ this.id_tarifa }}</h4>
                                    <router-link :to="`/cambiarTarifa/${this.iduser}/${this.nombre_tarifa}`" ></router-link>
                                    <button
                                        type="submit"
                                        class="button-primary"
                                        style="padding-left: 10px;padding-right: 10px;"
                                    >
                                        Cambiar tarifa
                                    </button>
                                    <button
                                        type="submit"
                                        class="button-primary"
                                        style="padding-left: 10px;padding-right: 10px;"
                                        @click="darbaja(this.iduser)"
                                    >
                                        Dar de baja
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

    <!--<div class="mt-5 text-center" v-if="this.user_role == 'admin'">
        <router-link to="/crearUsuarios" class="nav-item nav-link">Crear Usuarios</router-link>
        <router-link to="/modificarUsuarios" class="nav-item nav-link">Modificar Usuarios</router-link>
        <router-link to="/eliminarUsuarios" class="nav-item nav-link">Eliminar Usuarios</router-link>
        <router-link to="/roleAdmin" class="nav-item nav-link">Gestionar Roles</router-link>
        <router-link to="/GestionarTarifas" class="nav-item nav-link">Gestionar Tarifas</router-link>
        <router-link to="/crearTarifas" class="nav-item nav-link">Crear Tarifas</router-link>
    </div>-->
    <!-- <section class="p-4 p-md-5" v-if="this.user_role != 'admin'">
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
            </div> -->
    <!--<div class="col-md-10 col-lg-8 col-xl-3" v-if="this.hayTarifa">-->
    <!-- <div class="col-md-10 col-lg-8 col-xl-4">
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
    </section> -->
    <!-- <div v-for="role in this.user_role">
        {{ role }}
    </div> -->
</template>
<script>
export default {
    name: "Dashboard",
    data() {
        return {
            iduser: this.$route.params.idUser,
            membership: false,
            name: "",
            email: "",
            fecha_nacimiento: "",
            isLoggedin: false,
            isAdmin: false,
            tieneRutina: false,
            user: null,
            factura: null,
            iduser: null,
            id_tarifa: [],
            rolesActualesUser: [],
            user_role: window.Laravel.user_roles,
            tarifa_actual: null,
            hayTarifa: null,
            editing: false,
            nombre_tarifa: [],
            fechaNacimiento: '',
        };
    },
    computed: {
    maxFechaNacimiento() {
      const fechaMaxima = new Date();
      fechaMaxima.setFullYear(fechaMaxima.getFullYear() - 16);
      return fechaMaxima.toISOString().split('T')[0];
    },
  },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/membership/${this.iduser}`)
                .then((response) => {
                    this.membership = response.data;
                    if (this.membership == 0) {
                        // console.log("dkasmdkas");
                        // console.log((this.membership = false));
                    } else {
                        this.membership = true;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/hasTarifa/${this.iduser}`)
                .then((response) => {
                    // console.log(response.data);
                    this.tieneRutina = response.data;
                    if (this.tieneRutina == 0) {
                        // console.log("dkasmdkas");
                        // console.log((this.tieneRutina = false));
                    } else {
                        this.tieneRutina = true;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/showUserUpdate/${this.iduser}`)
                .then((response) => {
                    this.name = response.data.name;
                    this.email = response.data.email;
                    this.fecha_nacimiento = response.data.fecha_nacimiento;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/facturasTarifas/${this.iduser}`)
                .then((response) => {
                    this.nombre_tarifa = response.data.id;
                    this.id_tarifa = response.data.tipo_tarifa;
                    // console.log(response.data.tipo_tarifa);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.iduser = window.Laravel.user.id;
            // console.log(this.iduser);
            this.isLoggedin = true;
            this.user = window.Laravel.user;
            this.isLoggedin = true;
            this.user = window.Laravel.user;
            this.user_role = window.Laravel.user_role;
            console.log(this.user_role);
            console.log("=======");
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
                        location.reload();
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
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                let existingObj = this;
                const config = {
                    headers: {
                        "content-type": "multipart/form-data",
                    },
                };

                const formData = new FormData();
                formData.append("name", this.name);
                formData.append("email", this.email);
                formData.append("password", this.password);
                formData.append("fecha_nacimiento", this.fecha_nacimiento);

                this.$axios
                    .post("/api/editUser/" + this.iduser, formData, config)
                    .then((response) => {
                        existingObj.strError = "";
                        existingObj.strSuccess = response.data.success;
                    })
                    .catch(function (error) {
                        existingObj.strSuccess = "";
                        existingObj.strError = error.response.data.message;
                    });
            });
            // Deshabilitar la edición de los valores de los inputs
            const inputs = document.querySelectorAll("input:not([readonly])");
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].setAttribute("readonly", true);
            }

            // Cambiar el botón "Confirmar" por "Editar"
            this.editing = false;
        },
    },

    // beforeRouteEnters(to, from, next){
    //     if(!window.Laravel.isLoggedin){
    //         window.Location.href = "/";
    //     }else{
    //         if(window.Laravel.user.roles[0].nombre_role == 'admin' || (window.Laravel.user.roles[0].nombre_role == 'gestion_users')){
    //             next();
    //         }else{
    //             next('/');
    //         }
    //     }
    // }
};
</script>
<style scoped>
@media (max-width: 1500px) {
    .p-5 {
        padding: 0 !important;
    }
}

.hovereffect {
float:left;
overflow:hidden;
position:relative;
text-align:center;
cursor:default;
}

.hovereffect .overlay {
width:100%;
height:100%;
position:absolute;
overflow:hidden;
top:0;
left:0;
opacity:0;
background-color:rgba(0,0,0,0.5);
-webkit-transition:all .4s ease-in-out;
transition:all .4s ease-in-out
}

.hovereffect img {
display:block;
position:relative;
-webkit-transition:all .4s linear;
transition:all .4s linear;
}
.hovereffect a.info {
text-decoration:none;
display:inline-block;
text-transform:uppercase;
color:#fff;
background-color:transparent;
opacity:0;
filter:alpha(opacity=0);
-webkit-transition:all .2s ease-in-out;
transition:all .2s ease-in-out;
margin:170px 0 0;
padding:7px 14px;
}

.hovereffect a.info:hover {
border-radius: 10px;
}

.hovereffect:hover img {
-ms-transform:scale(1.2);
-webkit-transform:scale(1.2);
transform:scale(1.2);
}

.hovereffect:hover .overlay {
opacity:1;
filter:alpha(opacity=100);
}

.hovereffect:hover h2,.hovereffect:hover a.info {
opacity:1;
filter:alpha(opacity=100);
-ms-transform:translatey(0);
-webkit-transform:translatey(0);
transform:translatey(0);
}

.hovereffect:hover a.info {
-webkit-transition-delay:.2s;
transition-delay:.2s;
}
</style>
