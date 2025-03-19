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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_empleados');
            $table->foreign('fk_empleados')->references('id')->on('empleados');
            $table->unsignedBigInteger('fk_reservaciones');
            $table->foreign('fk_reservaciones')->references('id')->on('reservaciones');
            $table->unsignedBigInteger('fk_metodos_pagos');
            $table->foreign('fk_metodos_pagos')->references('id')->on('metodo_pagos');
            $table->double('precio_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
