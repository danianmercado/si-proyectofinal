<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaReparacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_nota_reparacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('Fecha_entrega');
            $table->string('observaciones');
            $table->integer('total');
            $table->unsignedBigInteger('id_ot')->nullable();
            $table->timestamps();
            $table->foreign('id_ot')->references('id')->on('orden_trabajo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_nota_reparacion');
    }
}
