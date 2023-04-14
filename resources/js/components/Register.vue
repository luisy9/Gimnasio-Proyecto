<template>
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

                    <strong>{{ error }}</strong>
                </div>

                <div class="card card-default">
                    <div class="card-header"><h5>Register New User</h5></div>
                    <div class="card-body">
                        <h1>Form Register</h1>

                        <form>
                            <div class="form-group row">
                                <label
                                    for="nombre"
                                    class="col-sm-4 col-form-label text-md-right"
                                    >Nombre</label
                                >
                                <div class="col-md-8">
                                    <input
                                        id="nombre"
                                        type="text"
                                        class="form-control"
                                        v-model="nombre"
                                        autofocus
                                        autocomplete="off"
                                        placeholder="Teclea tu nombre"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mt-1">
                                <label
                                    for="Apellido"
                                    class="col-sm-4 col-form-label text-md-right"
                                    >Apellido</label
                                >
                                <div class="col-md-8">
                                    <input
                                        id="Apellido"
                                        type="text"
                                        class="form-control"
                                        v-model="Apellido"
                                        autofocus
                                        autocomplete="off"
                                        placeholder="Teclea tu Apellido"
                                    />
                                </div>
                            </div>
                            <div class="form-group row mt-1">
                                <label
                                    for="email"
                                    class="col-md-4 col-form-label text-md-right"
                                    >email</label
                                >
                                <div class="col-md-8">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        v-model="email"
                                        autocomplete="off"
                                        placeholder="Teclea tu email"
                                    />
                                </div>
                            </div>
                            <div class="form-group row mt-1">
                                <label
                                    for="DNI"
                                    class="col-md-4 col-form-label text-md-right"
                                    >DNI</label
                                >
                                <div class="col-md-8">
                                    <input
                                        id="DNI"
                                        type="DNI"
                                        class="form-control"
                                        v-model="DNI"
                                        autocomplete="off"
                                        placeholder="Teclea tu DNI"
                                    />
                                </div>
                            </div>
                            <div class="form-group row mt-1">
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Contraseñ</label
                                >
                                <div class="col-md-8">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        v-model="password"
                                        autocomplete="off"
                                        placeholder="Teclea tu passwordseña"
                                    />
                                </div>
                            </div>
                            <div class="form-group row mt-1">
                                <label
                                    for="fecha_nacimiento"
                                    class="col-md-4 col-form-label text-md-right"
                                    >fecha nacimiento</label
                                >
                                <div class="col-md-8">
                                    <input
                                        id="fecha_nacimiento"
                                        type="date"
                                        class="form-control"
                                        v-model="fecha_nacimiento"
                                        autocomplete="off"
                                        placeholder="Teclea tu fecha nacimiento"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mt-1 mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-success"
                                        @click="register"
                                    >
                                        Register
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-8 offset-md-4">
                                    <small class="text-muted">
                                        Have an account? Please
                                        <router-link to="/login"
                                            >login</router-link
                                        >
                                    </small>
                                </div>
                            </div>
                        </form>
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
            nombre: "",
            Apellido: "",
            email: "",
            DNI: "",
            password: "",
            fecha_nacimiento: "",
            rol: "usuario",
            error: null,
        };
    },
    methods: {
        register(e) {
            e.preventDefault();
            // if (this.password.length > 0) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("api/register", {
                        nombre: this.nombre,
                        Apellido: this.Apellido,
                        email: this.email,
                        DNI: this.DNI,
                        password: this.password,
                        fecha_nacimiento: this.fecha_nacimiento,
                        rol: this.rol,
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
