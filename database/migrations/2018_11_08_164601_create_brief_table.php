<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brief', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('pregunta_uno');
            $table->string('pregunta_dos');
            $table->string('pregunta_tres');
            $table->string('pregunta_cuatro');
            $table->string('pregunta_cinco');
            $table->string('pregunta_seis');
            $table->string('pregunta_siete');
            $table->string('pregunta_ocho');
            $table->string('pregunta_nueve');
            $table->string('pregunta_diez');
            $table->string('pregunta_once');
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
        Schema::dropIfExists('brief');
    }
}
