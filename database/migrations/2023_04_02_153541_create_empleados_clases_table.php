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
        Schema::create('empleados_clases', function (Blueprint $table) {
            $table->integer('id_empleado')->unsigned();
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados');
            $table->integer('id_clase')->unsigned();
            $table->foreign('id_clase')->references('id_clase')->on('clases');
            $table->string('nombre');
            $table->string('tipo');
            $table->string('nombre_clase');
            $table->string('horario');
            $table->integer('id_sala')->unsigned();
            $table->foreign('id_sala')->references('id_sala')->on('salas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados_clases');
    }
};
