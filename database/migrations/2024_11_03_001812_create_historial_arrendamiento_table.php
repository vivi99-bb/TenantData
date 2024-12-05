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
        Schema::create('historial_arrendamiento', function (Blueprint $table) {
            $table->id('id_historial');
            $table->unsignedBigInteger('id_arrendatario');
            $table->unsignedBigInteger('id_propiedad');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->enum('estado_arrendamiento', ['activo', 'finalizado']);
            $table->foreign('id_arrendatario')->references('id_arrendatario')->on('arrendatarios');
            $table->foreign('id_propiedad')->references('id_propiedad')->on('propiedades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_arrendamiento');
    }
};
