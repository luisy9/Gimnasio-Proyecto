<template>
<div class="seccion">
<div class="text-center text-titulo">
<h1>NUESTRAS TARIFAS</h1>
</div>
<main>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Free</h4>
          </div>
          <div class="card-body carta-color">
            <h1 class="card-title pricing-card-title">0€<small class="text-body-secondary fw-light">/mes</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Entrada de un día</li>
              <li>Acceso completo</li>
              <li>Email support</li>
              <li>Help center access</li>
            </ul>
            <button class="button-primary">Seleccionar</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-dark">
          <div class="card-header py-3 text-bg-dark border-dark">
            <h4 class="my-0 fw-normal">Enterprise</h4>
          </div>
          <div class="card-body carta-color">
            <h1 class="card-title pricing-card-title">29€<small class="text-body-secondary fw-light">/mes</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>30 users included</li>
              <li>15 GB of storage</li>
              <li>Phone and email support</li>
              <li>Help center access</li>
            </ul>
            <button class="button-primary">Seleccionar</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Pro</h4>
          </div>
          <div class="card-body carta-color">
            <h1 class="card-title pricing-card-title">15€<small class="text-body-secondary fw-light">/mes</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>20 users included</li>
              <li>10 GB of storage</li>
              <li>Priority email support</li>
              <li>Help center access</li>
            </ul>
            <button class="button-primary">Seleccionar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="seccion">
        <div class="text-center text-titulo">
            <h1>PAGAMIENTO</h1>
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
        <main></main>
    </div>
</template>



<script>
export default {
    name: "tarifa",
    data() {
        return {
            tarifas: null,
            tarfiasArray: [],
            idtarifa: this.$route.params.idtarifa,
        };
    },
    mounted() {
        // var self = this;
        // this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        //     this.$axios
        //         .get("/api/tarifasSelect")
        //         .then((response) => {
        //             this.tarifas = response.data;
        //             console.log(response.data);
        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         });
        // });
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

<style scoped></style>