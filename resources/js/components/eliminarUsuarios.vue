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
                        <table class="table table-hover table-sm">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th width="50" class="text-center">#</th>
                                    <th>Name</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(user, index) in usuarios"
                                    :key="user.id"
                                >
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td class="text-center">
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteUsers(user.id)"
                                        >
                                            Delete
                                        </button>
                                        <button
                                            type="submit"
                                            class="btn btn-primary mt-4 mb-4"
                                            @click="updateUsers(user.id)"
                                        >
                                            Update User
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "crearUsuarios",
    data() {
        return {
            usuarios: [],
            strSuccess: "",
            strError: "",
            error: null,
        };
    },
    created() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/users")
                .then((response) => {
                    console.log(response);
                    this.usuarios = response.data;
                    console.log(this.usuarios);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },

    methods: {
        updateUsers(id) {
            window.location.href = "/updateUsers/" + id;
        },

        deleteUsers(id) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .delete("/api/deleteUsers/" + id)
                    .then((response) => {
                        const index = this.usuarios.findIndex(user => user.id === id);
                        this.usuarios.splice(index, 1)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        },
    },
};
</script>

<style scoped></style>
