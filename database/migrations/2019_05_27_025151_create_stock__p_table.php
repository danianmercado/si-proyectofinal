<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockPTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock__p', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Cantidad');
            $table->unsignedBigInteger('id_almacen')->nullable();
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->timestamps();
            $table->foreign('id_almacen')->references('id')->on('almacen');
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
        Schema::dropIfExists('stock__p');
    }
}
