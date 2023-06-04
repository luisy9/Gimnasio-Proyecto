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
        Schema::create('rutina_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rutina');
            $table->string('nombre_rutina');
            $table->string('dia_semana');
            $table->string('ejercicio');
            $table->unsignedBigInteger('series');
            $table->unsignedBigInteger('repeticiones');
            $table->string('descanso');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_users');
    }
};
