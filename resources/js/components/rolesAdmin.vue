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
                                    <th>id</th>
                                    <th>nombre_role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(role, index) in roles"
                                    :key="role.id"
                                >
                                    <td>{{ role.id }}</td>
                                    <td>{{ role.nombre_role }}</td>
                                    <td class="text-center">
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteUsers(role.id)"
                                        >
                                            Delete
                                        </button>
                                        <button
                                            type="submit"
                                            class="btn btn-primary mt-4 mb-4"
                                            @click="updateRoles(role.id)"
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
    name: "roleAdmin",
    data() {
        return {
            roles: [],
            strSuccess: "",
            strError: "",
            error: null,
        };
    },
    created() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/roles")
                .then((response) => {
                    console.log(response);
                    this.roles = response.data;
                    console.log(this.roles);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },

    methods: {
        updateRoles(id) {
            window.location.href = "/updateRoles/" + id;
        },

        deleteUsers(id) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .delete("/api/deleteRoles/" + id)
                    .then((response) => {
                        this.roles = response.data;
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
