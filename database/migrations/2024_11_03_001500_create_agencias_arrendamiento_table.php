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
        Schema::create('agencias_arrendamiento', function (Blueprint $table) {
            $table->id('id_agencia');
            $table->unsignedBigInteger('id_usuario');
            $table->string('nombre_agencia', 255);
            $table->string('direccion', 255)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('nit', 20)->nullable();
            $table->string('tel_contacto_agencia', 15)->nullable();
            $table->string('correo_contacto_agencia', 150)->nullable();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencias_arrendamiento');
    }
};
