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
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_cliente');
            $table->foreign('fk_cliente')->references('id')->on('clientes');
            $table->unsignedBigInteger('fk_seguros');
            $table->foreign('fk_seguros')->references('id')->on('seguros');
            $table->unsignedBigInteger('fk_auto');
            $table->foreign('fk_auto')->references('id')->on('autos');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('Disponibilidad_vehiculo');
            $table->integer('cantidad_dias_reservado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservaciones');
    }
};
