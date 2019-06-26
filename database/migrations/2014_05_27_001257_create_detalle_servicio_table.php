<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_servicio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_servicio')->nullable();
            $table->unsignedBigInteger('id_detalle_trabajo')->nullable();
            $table->string('Descripcion');
            $table->timestamps();
            $table->foreign('id_servicio')->references('id')->on('servicio');
            $table->foreign('id_detalle_trabajo')->references('id')->on('detalle_trabajo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_servicio');
    }
}
