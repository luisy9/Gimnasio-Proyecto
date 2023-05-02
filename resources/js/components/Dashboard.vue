<template>
    <p>Dashboard</p>
    <p>{{ user.name }}</p>
    <p>{{ user.email }}</p>
    <h1>Tarifa Actual</h1>
    <h1>Dar de baja</h1>
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
