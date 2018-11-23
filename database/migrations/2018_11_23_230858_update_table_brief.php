<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableBrief extends Migration
{
    public function up()
    {
        Schema::table('brief', function (Blueprint $table) {
            $table->string('pregunta_web');
            $table->string('pregunta_redes');
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
