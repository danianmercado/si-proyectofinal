<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabaja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_trabajador')->nullable();
            $table->unsignedBigInteger('id_orden_trabajo')->nullable();
            $table->timestamps();

            $table->foreign('id_trabajador')->references('id')->on('trabajador');
            $table->foreign('id_orden_trabajo')->references('id')->on('orden_trabajo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabaja');
    }
}
