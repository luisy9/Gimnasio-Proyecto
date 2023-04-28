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
        Schema::create('tarifa_clase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tarifa_id');
            $table->foreign('tarifa_id')->references('id')->on('tarifas');
            $table->unsignedBigInteger('clase_id');
            $table->foreign('clase_id')->references('id')->on('clase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifa_clase');
    }
};
