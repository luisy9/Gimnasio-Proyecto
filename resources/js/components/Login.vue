<template>
<<<<<<< HEAD
    <div class="container">
        <div class="row jutify-content-center">
            <div class="col-md-8">
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
                    <strong>{{}}</strong>
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <h5>Login</h5>
                    </div>
                    <div class="card-body">
                        <form
                            action=""
                            method="GET"
                            @submit.prevent="loginUser()"
                        >
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-sm-4 col-form-label text-md-right"
                                >
                                    E-Mail Address
                                </label>
                                <div class="col-md-8">
                                    <input
                                        id="email"
                                        type="text"
                                        class="form-control"
                                        v-model="email"
                                        required
                                        autofocus
                                        autocomplete="off"
                                        placeholder="Teclea tu email"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mt-1">
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-right"
                                >
                                    Password
                                </label>
                                <div class="col-md-8">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        v-model="password"
                                        required
                                        autofocus
                                        autocomplete="off"
                                        placeholder="Teclea tu contraseña"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mt-1 mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-success"
                                    >
                                        Login
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-8 offset-md-4">
                                    <small class="text-muted">
                                        Don't have any account yet? Please
                                        <router-link to="/register">
                                            Register
                                        </router-link>
                                    </small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
=======
    <div class="container px-5">
    <div class="login-pag">
    <div class="row jutify-content-center w-50 mx-auto">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{  }}</strong>
>>>>>>> 40c38eeaf4f9d9606e6c3d0d9e85f8f3e7fe8520
    </div>
    <main class="form-signin w-100 m-auto px-5">
        <form>
            <h1 class="h3 mb-3 fw-normal">Inicia sesión para acceder a tu cuenta</h1>
            <br>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" placeholder="name@example.com" required autofocus>
                <label for="floatingInput">Email address</label>
            </div>
            <br>
            <div class="form-floating">
              <input type="password" class="form-control" id="password" placeholder="Password" required autofocus>
              <label for="floatingPassword">Password</label>
            </div>
            <br>
            <div class="text-center">
            <button class="button-primary" type="submit">Continuar</button>
            </div>
            <div class="text-center mt-3">
                <small class="text-muted">
                    Don't have any account yet? Please
                    <router-link class="link-login" to="/register">
                        Register
                    </router-link>
                </small>
            </div>
        </form>
    </main>
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
        };
    },

    methods: {
        loginUser() {
            if (this.password.length > 0) {
                this.$axios
                    .get("/sanctum/csrf-cookie")
                    .then((response) => {
                        this.$axios
                            .post("api/login", {
                                email: this.email,
                                password: this.password,
                            })
                            .then((response) => {
                                if (response.data.success) {
                                    console.error("OK");
                                    window.location.href = "/login";
                                } else {
                                    console.error("No loggin");
                                    this.error = response.data.message;
                                }
                            })
                            .catch(function (error) {
                                console.error(error);
                            });
                    });
            }
        },
    },
};
<<<<<<< HEAD
</script>
=======
</script>


>>>>>>> 40c38eeaf4f9d9606e6c3d0d9e85f8f3e7fe8520
