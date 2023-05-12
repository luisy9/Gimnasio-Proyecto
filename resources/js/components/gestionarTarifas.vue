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
                    <div class="row d-flex justify-content-center mb-5">
                        
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
                        <table class="table table-hover table-sm">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th width="50" class="text-center">
                                        Tipo tarifa
                                    </th>
                                    <th>Precio</th>
                                    <th>descripcion</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(tarifa, index) in tarifas"
                                    :key="tarifa.id"
                                >
                                    <td>{{ tarifa.tipo_tarifa }}</td>
                                    <td>{{ tarifa.precio }}</td>
                                    <td>{{ tarifa.descripcion_tarifa }}</td>
                                    <td class="text-center">
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteTarifa(tarifa.id)"
                                        >
                                            Delete
                                        </button>
                                        <button
                                            type="submit"
                                            class="btn btn-primary mt-4 mb-4"
                                            @click="updateTarifa(tarifa.id)"
                                        >
                                            Update User
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </main>
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
    name: "GestionarTarifas",
    data() {
        return {
            tarifas: [],
            strSuccess: "",
            strError: "",
            error: null,
        };
    },
    mounted() {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/login";
        }
    },
    created() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/tarifas")
                .then((response) => {
                    this.tarifas = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },

    methods: {
        updateTarifa(id) {
            window.location.href = "/updateTarifas/" + id;
        },
        deleteTarifa(id) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .delete("/api/tarifasDelete/" + id)
                    .then((response) => {
                        const index = this.tarifas.findIndex(
                            (tarifa) => tarifa.id === id
                        );
                        this.tarifas.splice(index, 1);
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
