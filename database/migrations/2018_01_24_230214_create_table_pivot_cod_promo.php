<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePivotCodPromo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_cod_promo', function (Blueprint $table) {
            $table->increments('id_pivot_cod_promo');
            $table->integer('id_codigo_promo')->unsigned();
            $table->integer('id_registro')->unsigned();
            $table->foreign('id_registro')->references('id_registro')->on('registros')->onDelete('cascade');
            $table->foreign('id_codigo_promo')->references('id_codigo_promo')->on('codigos_promo')->onDelete('cascade');
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
        Schema::dropIfExists('pivot_cod_promo');
    }
}
