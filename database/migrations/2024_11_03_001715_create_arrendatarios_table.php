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
        Schema::create('arrendatarios', function (Blueprint $table) {
            $table->id('id_arrendatario');
            $table->unsignedBigInteger('id_usuario');
            $table->string('identificacion', 20)->unique();
            $table->string('telefono', 15)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('direccion_actual', 255)->nullable();
            $table->enum('estado_cumplimiento_pagos', ['cumplido', 'moroso', 'en disputa']);
            $table->string('referencias_personales', 255)->nullable();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arrendatarios');
    }
};
