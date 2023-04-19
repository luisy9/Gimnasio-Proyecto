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
  </main>
  </div>

</template>

<script>
export default {
    name: "tarifa",
};
</script>

<style scoped></style>
