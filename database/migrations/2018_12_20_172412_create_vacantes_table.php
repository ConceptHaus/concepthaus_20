<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantes', function (Blueprint $table) {
            $table->increments('id_vacante');
            $table->integer('id_area')->unsigned();
            $table->foreign('id_area')->references('id_area')->on('areas')->onDelete('cascade');
            $table->string('titulo');
            $table->string('descripcion');
            $table->integer('cv');
            $table->integer('portafolio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacantes');
    }
}
