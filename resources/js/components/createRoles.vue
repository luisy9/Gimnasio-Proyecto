<template>
    <div class="container">
        <div class="login-pag px-5">
            <div class="row jutify-content-center w-50 mx-auto mb-5">
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
                <div class="card card-default p-5">
                    <main class="form-signin w-100 m-auto px-5">
                        <form>
                            <h1 class="h3 mb-3 fw-normal">Create Roles</h1>
                            <br />
                            <div class="form-floating">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    v-model="name"
                                    autofocus
                                    autocomplete="off"
                                    placeholder="Nombre"
                                />
                                <label
                                    for="name"
                                    class="col-sm-4 col-form-label text-md-right"
                                    >Nombre</label
                                >
                            </div>
                            <br />
                            <div class="form-floating">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control"
                                    v-model="email"
                                    autocomplete="off"
                                    placeholder="Email"
                                />
                                <label
                                    for="email"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Email</label
                                >
                            </div>
                            <br />
                            <div class="form-floating">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control"
                                    v-model="password"
                                    autocomplete="off"
                                    placeholder="Contraseña"
                                />
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Contraseña</label
                                >
                            </div>
                            <br />
                            <div class="form-floating">
                                <input
                                    id="fecha_nacimiento"
                                    type="date"
                                    min="1899-01-01"
                                    max="2000-01-01"
                                    class="form-control"
                                    v-model="fecha_nacimiento"
                                    autocomplete="off"
                                    placeholder="Teclea tu fecha nacimiento"
                                />
                                <label
                                    for="fecha_nacimiento"
                                    class="col-md-4 col-form-label text-md-right"
                                    >fecha nacimiento</label
                                >
                            </div>

                            <br />
                            <div class="containerBotons">
                                <h5>Añadir Roles</h5>
                                <div id="">
                                    <input
                                        type="checkbox"
                                        value="3"
                                        v-model="checked"
                                    />
                                    Añadir Users
                                    <input
                                        type="checkbox"
                                        value="4"
                                        v-model="checked"
                                    />
                                    Modificar Users
                                    <input
                                        type="checkbox"
                                        value="5"
                                        v-model="checked"
                                    />
                                    Eliminar Users
                                    <input
                                        type="checkbox"
                                        value="6"
                                        v-model="checked"
                                    />
                                    Añadir Tarifas
                                    <input
                                        type="checkbox"
                                        value="7"
                                        v-model="checked"
                                    />
                                    Eliminar Tarifas
                                    <input
                                        type="checkbox"
                                        value="8"
                                        v-model="checked"
                                    />
                                    Modificar Tarifas
                                    <input
                                        type="checkbox"
                                        value="9"
                                        v-model="checked"
                                    />
                                    Crear Productos
                                    <input
                                        type="checkbox"
                                        value="10"
                                        v-model="checked"
                                    />
                                    Modificar Producto
                                    <input
                                        type="checkbox"
                                        value="11"
                                        v-model="checked"
                                    />
                                    Eliminar Producto
                                    <input
                                        type="checkbox"
                                        value="12"
                                        v-model="checked"
                                    />
                                    Crear Musculo
                                    <input
                                        type="checkbox"
                                        value="13"
                                        v-model="checked"
                                    />
                                    Eliminar Musculo
                                    <input
                                        type="checkbox"
                                        value="14"
                                        v-model="checked"
                                    />
                                    Modificar Musculo
                                    <p>Has Seleeccionado: {{ checked }}</p>
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="button-primary"
                                @click="createUser"
                            >
                                Añadir
                            </button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "createRoles",
    data() {
        return {
            name: "",
            email: "",
            password: "",
            fecha_nacimiento: "",
            error: null,
            checked: [],
        };
    },

    methods: {
        createUser(e) {
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("api/createUsers", {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        checked: this.checked,
                        fecha_nacimiento: this.fecha_nacimiento,
                    })
                    .then((response) => {
                        if (response.data.success) {
                            console.log(response.data.checked);
                        } else {
                            console.log(response);
                            this.error = response.data.message;
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
