<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfissionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionals', function (Blueprint $table) {
            $table->string('numConselho',15);
            $table->primary('numConselho');
            $table->string('nome',70);

            $table->integer('especialidade_id')->unsigned();
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');

            $table->integer('instituicao_id')->unsigned();
            $table->foreign('instituicao_id')->references('id')->on('instituicaos')->onDelete('cascade');

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
        Schema::dropIfExists('profissionals');
    }
}
