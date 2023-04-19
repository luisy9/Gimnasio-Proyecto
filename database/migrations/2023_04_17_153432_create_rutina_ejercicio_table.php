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
        Schema::create('rutina_ejercicio', function (Blueprint $table) {
            $table->integer('id_ejercicio')->unsigned();
            $table->foreign('id_ejercicio')->references('id_ejercicio')->on('ejercicio');
            $table->integer('id_rutina')->unsigned();
            $table->foreign('id_rutina')->references('id_rutina')->on('rutina');
            $table->string('nombre_ejercicio');
            $table->string('imagen');
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_ejercicio');
    }
};
