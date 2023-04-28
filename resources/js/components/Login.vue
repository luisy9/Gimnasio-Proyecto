<template>
    <div class="container">
        <div class="login-pag px-5">
            <div class="row jutify-content-center w-50 mx-auto">
                <div class="row jutify-content-center">
                       
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ error }}</strong>
                    </div>
                    <div class="card card-default p-5">
                    <main class="form-signin w-100 m-auto px-5">
                        <form>
                            <h1 class="h3 mb-3 fw-normal">
                                Inicia sesión para acceder a tu cuenta
                            </h1>
                            <br/>
                            <div class="form-floating">
                                <input id="email" type="text" class="form-control" v-model="email" required autofocus autocomplete="off" placeholder="Enter your email"/>
                                <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                            </div>
                            <br />
                            <div class="form-floating">
                                <input id="password" type="password" class="form-control" v-model="password" required autocomplete="off" placeholder="Enter your password"/>
                                <label for="password" class="col-md-4 col-form-label text-md-right" >Password</label>
                            </div>
                            <br />
                            <div class="text-center">
                                <button type="submit" class="button-primary" @click="doLogin">Continuar</button>
                            </div>
                            <div class="text-center mt-3">
                                <small class="text-muted">
                                        No tienes un cuenta? 
                                    <router-link class="link-login" to="/register">
                                        Registrate
                                    </router-link>
                                </small>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
        </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            error: null,
        };
    },
    methods: {
        doLogin(e) {
            e.preventDefault();
            // if (this.password.length > 0) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("api/login", {
                        email: this.email,
                        password: this.password,
                    })
                    .then((response) => {
                        if (response.data.success) {
                            console.error("OK");
                            console.error(response.data.message);
                            //window.location.href = "/login";
                        } else {
                            console.error("No loggin");
                            this.error = response.data.message;
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            });
            // }
        },
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next("dashboard");
        }
        next();
    },
};
</script>
