<template>
    <div class="container">
        <div class="login-pag px-5">
            <div class="row jutify-content-center w-50 mx-auto">
                <div class="row jutify-content-center">
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
                                <h1 class="h3 mb-3 fw-normal">
                                    Metodo de Pago
                                </h1>
                                <br />
                                <div class="form-floating">
                                    <input
                                        id="email"
                                        type="text"
                                        class="form-control"
                                        v-model="email"
                                        required
                                        autofocus
                                        autocomplete="off"
                                        placeholder="Enter your email"
                                    />
                                    <label
                                        for="email"
                                        class="col-sm-4 col-form-label text-md-right"
                                        >E-Mail Address</label
                                    >
                                </div>
                                <br />
                                <div class="form-floating">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        v-model="password"
                                        required
                                        autocomplete="off"
                                        placeholder="Enter your password"
                                    />
                                    <label
                                        for="password"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Password</label
                                    >
                                </div>
                                <br />
                                <div class="text-center">
                                    <button
                                        type="submit"
                                        class="button-primary"
                                        @click="doLogin"
                                    >
                                        Continuar
                                    </button>
                                </div>
                                <div class="text-center mt-3">
                                    <small class="text-muted">
                                        No tienes un cuenta?
                                        <router-link
                                            class="link-login"
                                            to="/register"
                                        >
                                            Registrate
                                        </router-link>
                                    </small>
                                </div>
                            </form>
                        </main>
                    </div>
                    <div
                        class="col"
                        v-for="(tarifa, index) in tarfiasArray"
                        :key="tarifa.id"
                    >
                        <p>{{ tarifa.id }}</p>
                        <p>{{ tarifa.tipo_tarifa }}</p>
                        <p>{{ tarifa.precio }}</p>
                        <p>{{ tarifa.descripcion_tarifa }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <section
        class="p-4 p-md-5"
        style="
            background-image: url(https://mdbcdn.b-cdn.net/img/Photos/Others/background3.webp);
        "
    >
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="card rounded-3">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h3>Settings</h3>
                            <h6>Payment</h6>
                        </div>
                        <form action="">
                            <p class="fw-bold mb-4 pb-2">Saved cards:</p>

                            <div
                                class="d-flex flex-row align-items-center mb-4 pb-1"
                            >
                                <img
                                    class="img-fluid"
                                    src="https://img.icons8.com/color/48/000000/mastercard-logo.png"
                                />
                                <div class="flex-fill mx-3">
                                    <div class="form-outline">
                                        <input
                                            type="text"
                                            id="formControlLgXc"
                                            class="form-control form-control-lg"
                                            value="**** **** **** 3193"
                                        />
                                        <label
                                            class="form-label"
                                            for="formControlLgXc"
                                            >Card Number</label
                                        >
                                    </div>
                                </div>
                                <a href="#!">Remove card</a>
                            </div>

                            <div
                                class="d-flex flex-row align-items-center mb-4 pb-1"
                            >
                                <img
                                    class="img-fluid"
                                    src="https://img.icons8.com/color/48/000000/visa.png"
                                />
                                <div class="flex-fill mx-3">
                                    <div class="form-outline">
                                        <input
                                            type="text"
                                            id="formControlLgXs"
                                            class="form-control form-control-lg"
                                            value="**** **** **** 4296"
                                        />
                                        <label
                                            class="form-label"
                                            for="formControlLgXs"
                                            >Card Number</label
                                        >
                                    </div>
                                </div>
                                <a href="#!">Remove card</a>
                            </div>

                            <p class="fw-bold mb-4">Add new card:</p>

                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    id="formControlLgXsd"
                                    class="form-control form-control-lg"
                                    value="Anna Doe"
                                />
                                <label class="form-label" for="formControlLgXsd"
                                    >Cardholder's Name</label
                                >
                            </div>

                            <div class="row mb-4">
                                <div class="col-7">
                                    <div class="form-outline">
                                        <input
                                            type="text"
                                            id="formControlLgXM"
                                            class="form-control form-control-lg"
                                            value="1234 5678 1234 5678"
                                        />
                                        <label
                                            class="form-label"
                                            for="formControlLgXM"
                                            >Card Number</label
                                        >
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-outline">
                                        <input
                                            type="password"
                                            id="formControlLgExpk"
                                            class="form-control form-control-lg"
                                            placeholder="MM/YYYY"
                                        />
                                        <label
                                            class="form-label"
                                            for="formControlLgExpk"
                                            >Expire</label
                                        >
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-outline">
                                        <input
                                            type="password"
                                            id="formControlLgcvv"
                                            class="form-control form-control-lg"
                                            placeholder="Cvv"
                                        />
                                        <label
                                            class="form-label"
                                            for="formControlLgcvv"
                                            >Cvv</label
                                        >
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success btn-lg btn-block">
                                Add card
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- </section> -->
</template>

<script>
export default {
    name: "Pago",
    data() {
        return {
            tarifas: null,
            tarfiasArray: [],
            idtarifa: this.$route.params.idtarifa,
            isLoggedin: false,
        };
    },
    created() {
        if (!window.Laravel.isLoggedin) {
            this.isLoggedin = true;
        }
    },
    mounted() {
        if (this.isLoggedin) {
            window.location.href = "/";
        }
        this.$axios
            .post("/api/tarifasSelect", {
                id: this.idtarifa,
            })
            .then((response) => {
                var tarifas = response.data;
                this.tarfiasArray.push(tarifas);
                console.log(tarifas);
            })
            .catch(function (error) {
                console.error(error);
            });
    },
};
</script>
