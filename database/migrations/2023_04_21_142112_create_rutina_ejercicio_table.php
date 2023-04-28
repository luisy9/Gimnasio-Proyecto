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
            $table->unsignedBigInteger('rutina_id');
            $table->foreign('rutina_id')->references('id')->on('rutina');
            $table->unsignedBigInteger('ejercicio_id');
            $table->foreign('ejercicio_id')->references('id')->on('ejercicio'); 
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
