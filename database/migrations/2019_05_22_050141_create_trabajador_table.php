<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajador', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('especialidad');
           /** nullable :v que puede ser nulo lel */
            $table->timestamps();

            $table->foreign('id')->references('id')->on('personal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajador');
    }
}
