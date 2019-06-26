<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleUsoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_detalle_uso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->unsignedBigInteger('id_det')->nullable();
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->timestamps();

            $table->foreign('id_det')->references('id')->on('detalle_trabajo');
            $table->foreign('id_producto')->references('id')->on('producto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_detalle_uso');
    }
}
