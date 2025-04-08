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
            $table->string('nombre_cliente');
            $table->string('cedula');
            $table->unsignedBigInteger('fk_user')->nullable();
            $table->foreign('fk_user')->references('id')->on('users');
            // $table->unsignedBigInteger('fk_seguros');
            // $table->foreign('fk_seguros')->references('id')->on('seguros');
            $table->string('seguro');
            $table->unsignedBigInteger('fk_auto');
            $table->foreign('fk_auto')->references('id')->on('autos');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            // $table->boolean('Disponibilidad_vehiculo');
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
