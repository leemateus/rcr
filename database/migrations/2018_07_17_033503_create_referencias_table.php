<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descricaoCaso');

            $table->integer('especialidade_id')->unsigned();
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');

            $table->integer('instituicao_id')->unsigned();
            $table->foreign('instituicao_id')->references('id')->on('instituicaos')->onDelete('cascade');

            $table->string('numSus_id');
            $table->foreign('numSUs_id')->references('numSus')->on('pacientes')->onDelete('cascade');

            $table->string('numConselho_id');
            $table->foreign('numConselho_id')->references('numConselho')->on('profissionals')->onDelete('cascade');

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
        Schema::dropIfExists('referencias');
    }
}
