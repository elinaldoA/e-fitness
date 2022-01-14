<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobrancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobrancas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('alunos_id')->references('id')->on('alunos');
            $table->bigInteger('alunos_id')->unsigned();
            $table->foreign('planos_id')->references('id')->on('mensalidades');
            $table->bigInteger('planos_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('mensalidades');
            $table->bigInteger('status_id')->unsigned();
            $table->foreign('formas_de_pagamentos_id')->references('id')->on('mensalidades');
            $table->bigInteger('formas_de_pagamentos_id')->unsigned();
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
        Schema::dropIfExists('cobrancas');
    }
}
