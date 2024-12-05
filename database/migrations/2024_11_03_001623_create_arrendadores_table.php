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
        Schema::create('arrendadores', function (Blueprint $table) {
            $table->id('id_arrendador');
            $table->unsignedBigInteger('id_usuario');
            $table->string('identificacion', 20)->unique();
            $table->string('direccion', 255)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('tel_contacto', 15)->nullable();
            $table->string('correo_electronico', 150)->nullable();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arrendadores');
    }
};
