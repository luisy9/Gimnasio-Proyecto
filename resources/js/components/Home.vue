<template>
<!-- BANNER-->
<div class="banner-home">
    <div class="<banner-text>">
        <p class="text-white">Transforma tu cuerpo y mejora tu salud con nuestro gimnasio. Entrenamiento personalizado, clases de fitness y planes nutricionales para alcanzar tus objetivos. ¡Abónate hoy mismo y comienza tu transformación!</p>
        <a href="/Tarifa">
          <button class="button-secondary ">Abonarse</button>
        </a>
    </div>
</div>
<!-- SEC1 TARIFAS-->
<div class="seccion">
<div class="text-center text-titulo">
<h1>NUESTRAS TARIFAS</h1>
</div>
<main>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-dark">
          <div class="card-header py-3 border-dark">
            <h4 class="my-0 fw-normal">CUOTA BÁSICA</h4>
          </div>
          <div class="card-body carta-color tarjeta">
            <h1 class="card-title pricing-card-title">19,90€<small class="text-body-secondary fw-light">/mes</small></h1>
            <ul class="list-unstyled mt-3 mb-4 ">
              <li>Horario de 7 a 14</li>
              <li>Sin reserva</li>
              <li>Acceso a sala de musculación</li>
              <li>Mes de apertura gratuito</li>
              <li>Acceso ilimitado</li>
            </ul>
            <button class="button-primary">Seleccionar</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-dark">
          <div class="card-header py-3 text-bg-dark border-dark">
            <h4 class="my-0 fw-normal">CUOTA PREMIUM</h4>
          </div>
          <div class="card-body carta-color tarjeta">
            <h1 class="card-title pricing-card-title">29,90€<small class="text-body-secondary fw-light">/mes</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Acceso a horario completo</li>
              <li>Reserva con 48h de antelacion</li>
              <li>Planes de entrenamiento online</li>
              <li>Acceso a todas las salas</li>
              <li>Mes de apertura gratuito</li>
              <li>Acceso ilimitado</li>
            </ul>
            <button class="button-primary">Seleccionar</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm  border-dark">
          <div class="card-header py-3  border-dark">
            <h4 class="my-0 fw-normal">CUOTA PRO</h4>
          </div>
          <div class="card-body carta-color tarjeta">
            <h1 class="card-title pricing-card-title">25,70€<small class="text-body-secondary fw-light">/mes</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Acceso a horario completo</li>
              <li>Reserva con 36h de antelacion</li>
              <li>Acceso a sala de musculación</li>
              <li>Mes de apertura gratuito</li>
              <li>Acceso ilimitado</li>
            </ul>
            <button class="button-primary">Seleccionar</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  </div>

<!-- SEC2  ELEGIRNOS-->
<div class="seccion mx-0 mb-0">
<div class="text-center text-titulo">
<h1>NUESTRO CLUB</h1>
</div>
<div class="row">
  <div class="col-md-7 imagen-prueba"></div>
  <div class="col-md-5">
    <div style="height: 500px; width: 600px; margin-top: 100px; margin-left: -100px;">
      <h2>¿PARA QUÉ?</h2>
      <ul class="list-unstyled listaguion mt-3 mb-4">
        <li>Desarrollar el crecimiento muscular y la fuerza física.</li>
        <li>Para obtener una mayor resistencia y unos músculos más tonificados y prominentes.</li>
        <li>Aumentar la masa muscular reduciendo la grasa.</li>
        <li>Fortalecer la resistencia ósea combatiendo la pérdida de densidad (osteoporosis) con cargas progresivas</li>
        <li>Estimular la confianza personal ayudándote a conseguir un cuerpo con el que te sientas bien.</li>
      </ul>
    </div>
  </div>
</div>
</div>
</template>

<script>
export default {
    name: "Home",
};
</script>

<style scoped></style>
