<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTable2Brief extends Migration
{
    public function up()
    {
        Schema::table('brief', function (Blueprint $table) {
            $table->string('pregunta_doce')->nullable();
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
