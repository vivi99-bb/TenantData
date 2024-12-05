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
        Schema::create('verificaciones', function (Blueprint $table) {
            $table->id('id_verificacion');
            $table->unsignedBigInteger('id_arrendador')->nullable();
            $table->unsignedBigInteger('id_agencia')->nullable();
            $table->unsignedBigInteger('id_arrendatario');
            $table->date('fecha_verificacion');
            $table->enum('resultado_verificacion', ['aprobado', 'rechazado']);
            $table->foreign('id_arrendador')->references('id_arrendador')->on('arrendadores');
            $table->foreign('id_agencia')->references('id_agencia')->on('agencias_arrendamiento');
            $table->foreign('id_arrendatario')->references('id_arrendatario')->on('arrendatarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificaciones');
    }
};
