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
        Schema::create('rutina_user', function (Blueprint $table) {
            $table->integer('id_rutina')->unsigned();
            $table->foreign('id_rutina')->references('id_rutina')->on('rutina');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id_usuario')->on('users');
            $table->string('nombre_rutina');
            $table->string('tipo');
            $table->integer('id_role')->unsigned();
            $table->foreign('id_role')->references('id_role')->on('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_user');
    }
};
