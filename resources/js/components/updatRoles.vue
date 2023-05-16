<template>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 mb-2"></div>

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

            <form @submit.prevent="updateRole" enctype="multipart/form-data">
                <h1 class="h3 mb-3 fw-normal">Update Roles</h1>
                <br />
                <div class="form-floating">
                    <input
                        id="nombre_role"
                        type="text"
                        class="form-control"
                        v-model="nombre_role"
                        autofocus
                        autocomplete="off"
                        placeholder="Nombre"
                    />
                    <label
                        for="nombre_role"
                        class="col-sm-4 col-form-label text-md-right"
                        >Nombre Role</label
                    >
                </div>
                <br />
                <button type="submit" class="button-primary">Update</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "updateRoles",
    data() {
        return {
            id: "",
            nombre_role: "",
            strSuccess: "",
            strError: "",
            imgPreview: null,
        };
    },

    created() {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
            this.$axios
                .get(`/api/posts/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.name = response.data["name"];
                    this.description = response.data["description"];
                    this.img = "/img/" + response.data["image"];
                    this.imgPreview = this.img;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    },
    methods: {
        onChange(e) {
            this.img = e.target.files[0];
            let reader = new FileReader();
            reader.addEventListener(
                "load",
                function () {
                    this.imgPreview = reader.result;
                }.bind(this),
                false
            );

            if (this.img) {
                if (/\.(jpe?g|png|gif)$/i.test(this.img.name)) {
                    reader.readAsDataURL(this.img);
                }
            }
        },
        updateRole(e) {
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                let existingObj = this;
                const config = {
                    headers: {
                        "content-type": "multipart/form-data",
                    },
                };

                const formData = new FormData();
                formData.append("nombre_role", this.nombre_role);

                this.$axios
                    .post(
                        `/api/updateRoles/${this.$route.params.id}`,
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
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    },
};
</script>
