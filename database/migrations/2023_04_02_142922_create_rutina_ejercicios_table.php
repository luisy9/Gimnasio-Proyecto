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
        Schema::create('rutina_ejercicios', function (Blueprint $table) {
            $table->integer('id_ejercicios')->unsigned();
            $table->foreign('id_ejercicios')->references('id_ejercicio')->on('ejercicios');
            $table->integer('id_rutina')->unsigned();
            $table->foreign('id_rutina')->references('id_rutina')->on('rutinas');
            $table->string('nombre_ejercicio');
            $table->string('imagen');
            $table->string('categporia');
            $table->string('tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_ejercicios');
    }
};
