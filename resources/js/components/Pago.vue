<template>
    <!--<div class="container">
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
    </div>-->

<section
        class="p-4 p-md-5"

    >
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="card card-default p-5">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <p class="mb-3 fw-normal titulo-form">
                                <b>
                                    Pago
                                </b>
                            </p>
                        </div>
                        <form action="">
                            <div class="form-floating">
                                <input id="name" type="text" class="form-control" v-model="name" required autofocus autocomplete="off" placeholder="Nombre completo"/>
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Nombre completo</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input id="name" type="text" class="form-control" v-model="name" required autofocus autocomplete="off" placeholder="Numero de tarjeta"/>
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Numero de tarjeta</label>
                            </div>
                            <br>
                            <div class="row mb-4">
                                <div class="col-4">
                                    <div class="form-floating">
                                        <input id="name" type="text" class="form-control" v-model="name" required autofocus autocomplete="off" placeholder="MM/YY"/>
                                        <label for="name" class="col-sm-4 col-form-label text-md-right">MM/YY</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-floating">
                                        <input id="name" type="text" class="form-control" v-model="name" required autofocus autocomplete="off" placeholder="CVV"/>
                                        <label for="name" class="col-sm-4 col-form-label text-md-right">CVV</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="button-primary">Pagar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-3">
                <div class="card card-default p-5">
                    <div class="card-body p-4"  v-for="(tarifa, index) in tarfiasArray"
                        :key="tarifa.id">
                        <div class="text-center mb-4">
                            <h3>{{ tarifa.tipo_tarifa }}</h3>
                        </div>
                        <div class="col">
                        <p>{{ tarifa.id }}</p>
                        <p>{{ tarifa.tipo_tarifa }}</p>
                        <p>{{ tarifa.precio }}</p>
                        <p>{{ tarifa.descripcion_tarifa}}</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>  
</section>
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
            window.location.href = "/login";
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
