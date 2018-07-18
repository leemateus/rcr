<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContraRreferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contra_rreferencias', function (Blueprint $table) {
            $table->text('condutaAdotada');
            $table->text('diagnostico');

            $table->integer('referencia_id')->unsigned();
            $table->foreign('referencia_id')->references('id')->on('referencias')->onDelete('cascade');
            $table->primary('referencia_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contra_rreferencias');
    }
}
