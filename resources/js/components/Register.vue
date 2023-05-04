<template>
    <div class="container">
        <div class="login-pag px-5">
            <div class="row jutify-content-center w-50 mx-auto mb-5">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ error }}</strong>
                </div>
                <div class="card card-default p-5">
                    <main class="form-signin w-100 m-auto px-5">
                        <form>
                            <h1 class="h3 mb-3 fw-normal">Registrate</h1>
                            <br/>
                            <div class="form-floating">
                                <input id="name" type="text" class="form-control" v-model="name" autofocus autocomplete="off" placeholder="Nombre"/>
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Nombre</label>
                            </div>
                            <br />
                            <div class="form-floating">
                                <input id="email" type="email" class="form-control" v-model="email" autocomplete="off" placeholder="Email"/>
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            </div>
                            <br />
                            <div class="form-floating">
                                <input id="password" type="password" class="form-control" v-model="password" autocomplete="off" placeholder="Contraseña"/>
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                            </div>
                            <br />
                            <div class="form-floating">
                                <input id="fecha_nacimiento" type="date" min='1899-01-01' max='2000-01-01' class="form-control" v-model="fecha_nacimiento" autocomplete="off" placeholder="Teclea tu fecha nacimiento"/>
                                <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">fecha nacimiento</label>
                            </div>
                            


                            
                            <br />
                            <div class="text-center">
                                <button type="submit" class="button-primary" @click="doLogin">Continuar</button>
                            </div>
                            <div class="text-center mt-3">
                                <small class="text-muted">
                                        Ya tienes una cuenta?
                                    <router-link class="link-login" to="/login">
                                        Logueate
                                    </router-link>
                                </small>
                            </div>
                        </form>
                    </main>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            fecha_nacimiento: "",
            // id_role: 0 ,
            error: null,
        };
    },
    methods: {
        doLogin(e) {
            e.preventDefault();
            // if (this.password.length > 0) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("api/register", {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        fecha_nacimiento: this.fecha_nacimiento,
                        // id_role: this.id_role,
                    })
                    .then((response) => {
                        if (response.data.success) {
                            window.location.href = "/login";
                        } else {
                            console.log(response);
                            console.log("hola error");
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
};
</script>
