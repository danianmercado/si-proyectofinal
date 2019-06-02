<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockHTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock__h', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Cantidad');
            $table->unsignedBigInteger('id_almacen')->nullable();
            $table->unsignedBigInteger('id_herramienta')->nullable();
            $table->timestamps();
            $table->foreign('id_almacen')->references('id')->on('almacen');
            $table->foreign('id_herramienta')->references('id')->on('herramienta');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock__h');
    }
}
