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
        Schema::create('centro_red_asistencials', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_centro_asistencial');
            $table->string('nombre');
            $table->string('abreviatura')->nullable();
            $table->string('estado')->nullable();
            $table->unsignedBigInteger('red_asistencial_id'); //objeto
            $table->foreign('red_asistencial_id')->references('id')->on('red_asistencials')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centro_red_asistencials');
    }
};
