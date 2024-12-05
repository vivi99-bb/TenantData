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
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id('id_propiedad');
            $table->unsignedBigInteger('id_arrendador')->nullable();
            $table->unsignedBigInteger('id_agencia')->nullable();
            $table->string('direccion', 255);
            $table->enum('tipo_propiedad', ['casa', 'apartamento', 'oficina']);
            $table->enum('estado', ['disponible', 'no disponible']);
            $table->foreign('id_arrendador')->references('id_arrendador')->on('arrendadores');
            $table->foreign('id_agencia')->references('id_agencia')->on('agencias_arrendamiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
