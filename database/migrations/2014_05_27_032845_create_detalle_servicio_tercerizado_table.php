<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleServicioTercerizadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_servicio_tercerizado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_st')->nullable();
            $table->string('descripcion');
            $table->date('fecha');

            $table->unsignedBigInteger('id_detTrab')->nullable();
            $table->timestamps();
            $table->foreign('id_st')->references('id')->on('servicio_tercerizado');
            $table->foreign('id_detTrab')->references('id')->on('detalle_trabajo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_servicio_tercerizado');
    }
}
