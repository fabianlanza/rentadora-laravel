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
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('motor');
            $table->string('color');
            $table->string('año');
            $table->string('placa');
            $table->integer('Numero_asientos');
            $table->string('Aire_acondicionado');
            $table->longText('Detalles_desperfectos');
            $table->boolean('Disponibilidad_vehiculo');
            $table->double('Precio_base');
            $table->string('imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
