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
        Schema::create('datos_pacs', function (Blueprint $table) {
            $table->id();
            $table->string('nro_proceso');
            $table->string('indice');
            $table->unsignedBigInteger('tipo_contrato_id'); //objeto
            $table->unsignedBigInteger('tipo_proceso_id');
            $table->decimal('monto_referencial');
            $table->date('fecha');
            $table->unsignedBigInteger('usuario_id');
            $table->string('cuenta_pac');
            $table->string('descripcion');
            $table->string('observacion');
            $table->unsignedBigInteger('centro_red_asistencial_id');
            $table->unsignedBigInteger('codigo_generado');
            $table->unsignedBigInteger('estructura_id');

            $table->foreign('tipo_contrato')->references('id')->on('tipo_contratos')->onDelete('cascade');
            $table->foreign('tipo_proceso_id')->references('id')->on('tipo_procesos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');

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
        Schema::dropIfExists('datos_pacs');
    }
};
