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
        Schema::create('permisions_role', function (Blueprint $table) {
            $table->integer('id_permissions')->unsigned();
            $table->foreign('id_permissions')->references('id_permissions')->on('permissions');
            $table->integer('id_role')->unsigned();
            $table->foreign('id_role')->references('id_role')->on('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisions_role');
    }
};
