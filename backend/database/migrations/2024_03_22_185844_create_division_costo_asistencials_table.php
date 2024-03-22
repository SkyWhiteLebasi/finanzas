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
        Schema::create('division_costo_asistencials', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_div_centro_costo');
            $table->string('descripcion');
            $table->string('sociedad')->nullable();
            $table->string('division')->nullable();
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
        Schema::dropIfExists('division_costo_asistencials');
    }
};
