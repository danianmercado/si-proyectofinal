<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenTrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_trabajo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tiempo_estimado');

            $table->unsignedBigInteger('id_recepcion')->nullable();
            $table->unsignedBigInteger('id_trabajador')->nullable();
            $table->timestamps();

            $table->foreign('id_recepcion')->references('id')->on('recepcion');
            $table->foreign('id_trabajador')->references('id')->on('trabajador');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_trabajo');
    }
}
