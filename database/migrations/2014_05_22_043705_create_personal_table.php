<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->bigIncrements('id');/** carnet de identidad **/
            $table->string('ci');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('direccion');
            $table->integer('telefono');
            $table->date('fecha_nacimiento');
            $table->timestamps(); /** crea dos campos en la tabla  created_at y el otro updated_atp*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal');
    }
}
