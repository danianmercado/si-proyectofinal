<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleDeTrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_trabajo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_ot')->nullable();
            $table->unsignedBigInteger('id_servicio')->nullable();
            $table->string('descripcion');
            $table->integer('precio');
            $table->timestamps();
            $table->foreign('id_ot')->references('id')->on('orden_trabajo');
            $table->foreign('id_servicio')->references('id')->on('servicio');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_de_trabajo');
    }
}
