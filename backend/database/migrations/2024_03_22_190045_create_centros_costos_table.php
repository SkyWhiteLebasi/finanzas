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
        Schema::create('centros_costos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('div_costo_asistencial_id');
            $table->unsignedBigInteger('centro_red_asistencial_id');
            $table->string('codigo_generado');
            $table->unsignedBigInteger('estructura_id');

            $table->foreign('div_costo_asistencial_id')->references('id')->on('division_costo_asistencials')->onDelete('cascade');
            $table->foreign('centro_red_asistencial_id')->references('id')->on('centro_red_asistencials')->onDelete('cascade');
            $table->foreign('estructura_id')->references('id')->on('estructuras')->onDelete('cascade');

             //para relacionar con la red asistencial principal
             $table->unsignedBigInteger('red_asistencial_id'); 
             $table->foreign('red_asistencial_id')->references('id')->on('red_asistencials')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centros_costos');
    }
};
