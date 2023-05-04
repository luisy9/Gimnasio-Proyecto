<template>
    <p>Dashboard</p>
    <p>{{ user.name }}</p>
    <p>{{ user.email }}</p>
    <h1>Tarifa Actual</h1>
    <h1>Dar de baja</h1>
    <a class="nav-item nav-link" style="cursor: pointer" @click="logout"
        >Logout</a
    >

    <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="card card-default p-5">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h3>Dashboard</h3>
                        </div>
                        <form action="">
                            <div class="form-floating">
                                <input type="text" class="form-control" readonly v-model="user.name">
                                <label for="nombre" >Nombre</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input type="email" class="form-control" readonly v-model="user.email">
                                <label for="email">Email</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input type="date" class="form-control" min='1899-01-01' max='2000-01-01' readonly v-model="user.fecha_nacimiento">
                                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            </div>
                            <br>
                            
                            <br>
                            <div class="text-center">
                                <button type="submit" class="button-primary">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-3">
                <div class="card card-default p-5">
                    <div class="card-body p-4"  v-for="(tarifa, index) in tarfiasArray"
                        :key="tarifa.id">
                        <div class="text-center mb-4">
                            <h3>{{ tarifa.tipo_tarifa }}</h3>
                        </div>
                        <div class="col">
                        <p>{{ tarifa.id }}</p>
                        <p>{{ tarifa.tipo_tarifa }}</p>
                        <p>{{ tarifa.precio }}</p>
                        <p>{{ tarifa.descripcion_tarifa}}</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>


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
