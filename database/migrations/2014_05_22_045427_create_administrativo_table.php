<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrativo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('area');
            /** a la llave foranea siempre ponerle eso :v */
            $table->unsignedBigInteger('id_personal')->nullable();
            $table->timestamps();

            $table->foreign('id_personal')->references('id')->on('personal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrativo');
    }
}
