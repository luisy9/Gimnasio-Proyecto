<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarifa_clases', function (Blueprint $table) {
            $table->integer('id_tarifa')->unsigned();
            $table->foreign('id_tarifa')->references('id_tarifa')->on('tarifas');
            $table->integer('id_clase')->unsigned();
            $table->foreign('id_clase')->references('id_clase')->on('clases');
            $table->string('tipo_tarifa');
            $table->string('nombre_clase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifa_clases');
    }
};
