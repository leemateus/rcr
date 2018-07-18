<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('numero');
            $table->string('cidade');
            $table->string('complemento')->nullable();

            $table->string('numSUs_id',15);
            $table->foreign('numSus_id')->references('numSus')->on('pacientes')->onDelete('cascade');
            $table->primary('numSUs_id');
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
        Schema::dropIfExists('enderecos');
    }
}
