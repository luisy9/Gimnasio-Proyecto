<template>
    <div class="row align-items-start sticky-top bg-light pt-2 mb-2">
        <p class="col-6">Musculo por ejemplo hombro</p>
        <div class="col-6 text-right pl-3 mt-2">
            <a class="link-negro float-end mx-2" type="button">Ordenar</a>
            <a
                class="link-negro float-end mx-2"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse1"
                aria-expanded="false"
                aria-controls="collapseExample"
                >Filtros</a
            >
        </div>
    </div>
    <div class="container">
        <div class="row align-items-start mb-4">
            <div class="col-2 collapse" id="collapse1">
                <h3>Filtos</h3>
            </div>
            <div class="col-3 mx-auto mb-4">
                <div class="mb-3">
                    <img
                        class="img-fluid"
                        src="../../img/musculos/hombro2.webp"
                    />
                    <div class="card-body">
                        <h4 class="card-title">Hombro</h4>
                    </div>
                </div>
            </div>
            <div class="col-3 mx-auto mb-4">
                <div class="mb-3">
                    <img
                        class="img-fluid"
                        src="../../img/musculos/hombro2.webp"
                    />
                    <div class="card-body">
                        <h4 class="card-title">Hombro</h4>
                    </div>
                </div>
            </div>
            <div class="col-3 mx-auto mb-4">
                <div class="mb-3">
                    <img
                        class="img-fluid"
                        src="../../img/musculos/hombro2.webp"
                    />
                    <div class="card-body">
                        <h4 class="card-title">Hombro</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-start mb-4">
            <div class="col-2 collapse" id="collapse1"></div>
            <div class="col-3 mx-auto mb-4">
                <div class="mb-3">
                    <img
                        class="img-fluid"
                        src="../../img/musculos/hombro2.webp"
                    />
                    <div class="card-body">
                        <h4 class="card-title">Hombro</h4>
                    </div>
                </div>
            </div>
            <div class="col-3 mx-auto mb-4">
                <div class="mb-3">
                    <img
                        class="img-fluid"
                        src="../../img/musculos/hombro2.webp"
                    />
                    <div class="card-body">
                        <h4 class="card-title">Hombro</h4>
                    </div>
                </div>
            </div>
            <div class="col-3 mx-auto mb-4">
                <div class="mb-3">
                    <img
                        class="img-fluid"
                        src="../../img/musculos/hombro2.webp"
                    />
                    <div class="card-body">
                        <h4 class="card-title">Hombro</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { onMounted } from "vue";

export default {
    name: "Musculo",

    data() {},

    mounted() {},
};
</script>
<style scoped></style>
