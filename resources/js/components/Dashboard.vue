<template>
    <p>{{ user.name }}</p>
    <p>{{ user.email }}</p>
    <h1>Tarifa Actual</h1>
    <h1>Dar de baja</h1>
    <div class="" v-if="this.user_role == 'admin'">
        <router-link to="/crearUsuarios" class="nav-item nav-link"
            >Crear Usuarios</router-link
        >
        <router-link to="/modificarUsuarios" class="nav-item nav-link"
            >Modificar Usuarios</router-link
        >
        <router-link to="/eliminarUsuarios" class="nav-item nav-link"
            >Eliminar Usuarios</router-link
        >
        <router-link to="/roleAdmin " class="nav-item nav-link"
            >Gestionar Roles</router-link
        >
    </div>
    <a class="nav-item nav-link" style="cursor: pointer" @click="logout"
        >Logout</a
    >
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            isLoggedin: false,
            isAdmin: false,
            user: null,
        };
    },
    created() {
        if (window.Laravel.isLoggedin) {
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
    },
};
</script>

<style scoped></style>
