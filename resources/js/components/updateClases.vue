<template>
    <div class="card mx-4 my-4">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title">Update Clases</h5>
            </div>

            <div
                v-if="strSuccess"
                class="alert alert-success alert-dismissible fade show"
                role="alert"
            >
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
                <strong>{{ strSuccess }}</strong>
            </div>

            <div
                v-if="strError"
                class="alert alert-danger alert-dismissible fade show"
                role="alert"
            >
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
                <strong>{{ strError }}</strong>
            </div>

            <form @submit.prevent="updatePost" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label>Nombre Clase</label
                    ><span class="text-danger"> *</span>
                    <input
                        type="text"
                        class="form-control"
                        v-model="nombre_clase"
                        placeholder="Enter post nombre clase"
                    />
                </div>
                <div class="form-group mb-2">
                    <label>Descripcion</label
                    ><span class="text-danger"> *</span>
                    <input
                        type="text"
                        class="form-control"
                        v-model="Descripcion"
                        placeholder="Enter post descripcion"
                    />
                </div>
                <div class="form-group mt-2">
                    <label>Imagen</label>
                    <input
                        type="file"
                        class="form-control"
                        v-on:change="onChangeImg"
                        placeholder="Enter post name"
                    />
                </div>
                <button
                    type="submit"
                    class="btn btn-primary mt-4 mb-4"
                    @click="updateClase"
                >
                    Update Clase
                </button>

                <!-- {{ this.user_role }} -->
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "updateUsers",
    data() {
        return {
            id: "",
            nombre_clase: "",
            Descripcion: "",
            file: "",
            user_role: null,
            idclase: this.$route.params.id,
            roles: [],
            checked: [],
            strSuccess: "",
            strError: "",
        };
    },
    mounted() {
        this.user_role = window.Laravel.user_role;
        console.log(this.user_role[0]);
        console.log("dsadas");
        // console.log(window.Laravel.user.roles[0].nombre_role);
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/showClaseUpdate/${this.idclase}`)
                .then((response) => {
                    console.log(response.data);
                    this.nombre_clase = response.data.nombre_clase;
                    this.Descripcion = response.data.descripcion;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get("/api/roles")
                .then((response) => {
                    console.log(response);
                    this.roles = response.data;
                    console.log(this.roles);
                    this.existeRole();
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
        //belongsToMany para coger la relacion de los roles con usuarios
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/rolesUser/${this.$route.params.id}`)
                .then((response) => {
                    this.user_role = window.Laravel.user_role;
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    methods: {
        onChangeImg(e) {
            this.file = e.target.files[0];
            let reader = new FileReader();
            reader.addEventListener(
                "load",
                function () {
                    this.imgPreview = reader.result;
                }.bind(this),
                false
            );

            if (this.file) {
                if (/\.(jpe?g|png|gif)$/i.test(this.file.name)) {
                    reader.readAsDataURL(this.file);
                }
            }
        },
        existeRole() {
            let list_name_role = this.user_role.map((role) => role.nombre_role);
            this.roles.forEach((role, index) => {
                list_name_role.includes(role.nombre_role)
                    ? this.checked[index].push(role.id)
                    : null;
            });
        },
        updateClase(e) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                let existingObj = this;
                const config = {
                    headers: {
                        "content-type": "multipart/form-data",
                    },
                };

                const formData = new FormData();
                formData.append("nombre_clase", this.nombre_clase);
                formData.append("descripcion", this.Descripcion);
                formData.append("file", this.file);
                this.$axios
                    .post(
                        `/api/updateClase/${this.idclase}`,
                        formData,
                        config
                    )
                    .then((response) => {
                        existingObj.strError = "";
                        existingObj.strSuccess = response.data.success;
                    })
                    .catch(function (error) {
                        existingObj.strSuccess = "";
                        existingObj.strError = error.response.data.message;
                    });
            });
        },

        beforeRouteEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/";
            }
            next();
        },
    },
};
</script>
