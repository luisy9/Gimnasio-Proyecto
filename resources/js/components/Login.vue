<template>
    <div class="container">
    <div class="login-pag px-5">
    <div class="row jutify-content-center w-50 mx-auto">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{  }}</strong>
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
</script>


