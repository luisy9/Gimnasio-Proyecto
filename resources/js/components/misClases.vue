<template>
    <h1 class="text-center pt-5">Clases Añadidas</h1>
    <div class="container-fluid">
        <div class="row">
            <main class="ms-sm-auto px-md-4">
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
                                <table class="table table-hover table-sm">
                                    <thead class="bg-dark text-light">
                                        <tr>
                                            <th width="50" class="">
                                                Numero Clase
                                            </th>
                                            <th class="px-1">
                                                Fecha Clase
                                            </th>
                                            <th class="">
                                                Hora Clase
                                            </th>

                                            <th class="text-center px-3 ">
                                                Cancelar Clase
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        v-for="(clases, index) in clasesUser"
                                        :key="clases.id"
                                        class="py-5"
                                    >
                                        <tr>
                                            <td class="py-4">
                                                {{ clases.clase_id }}
                                            </td>
                                            <td  class="py-4">
                                                {{ clases.fecha_clase }}
                                            </td>
                                            <td  class="py-4">
                                                {{ clases.hora_clase }}
                                            </td>
                                            <td class="text-center py-4">
                                                <a
                                                    class="px-5"
                                                    style="cursor: pointer"
                                                    @click="
                                                        deleteClase(clases.id)
                                                    "
                                                >
                                                    <img
                                                        class="logo-x"
                                                        src="/img/logos/x.svg"
                                                    />
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </main>
                        </div>
                        <!--</div>-->
                        <!--</div>-->
                    </div>
                </section>
            </main>
        </div>
    </div>
    <!-- <div v-for="rutina in miRutina">
                {{ rutina.nombre_rutina }}
            </div> -->
</template>

<script>
export default {
    name: "buscarEjercicios",
    data() {
        return {
            iduser: this.$route.params.iduser,
            iduser: null,
            nombre: "",
            clasesUser: [],
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
            this.user_role = window.Laravel.user.roles[0].nombre_role;
            console.log(this.user.name);
        }
    },
    mounted() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/hasClases/" + this.iduser)
                .then((response) => {
                    this.clasesUser = response.data;
                    console.log(this.misClases);
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    },
    methods: {
        deleteClase(id) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .delete("/api/deleteClase/" + id)
                    .then((response) => {
                        console.log(response);
                        // const index = this.clasesUser.findIndex(
                        //     (clase) => clase.id === id
                        // );
                        // this.clasesUser.splice(index, 1);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        },
    },
};
</script>
<style scoped>
.logo-x {
    height: 20px;
}
.logo-editar {
    height: 23px;
}
.logo-x:hover {
    opacity: 0.5;
}
.logo-editar:hover {
    opacity: 0.5;
}
@media (max-width: 1500px) {
    .p-5 {
        padding: 0 !important;
    }
}
</style>
