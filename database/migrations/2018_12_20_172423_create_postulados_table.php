<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostuladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulados', function (Blueprint $table) {
            $table->increments('id_postulado');
            $table->integer('id_vacante')->unsigned();
            $table->foreign('id_vacante')->references('id_vacante')->on('vacantes')->onDelete('cascade');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->string('url_cv')->nullable();
            $table->string('url_portafolio')->nullable();
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
        Schema::dropIfExists('postulados');
    }
}
