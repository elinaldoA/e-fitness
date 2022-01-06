<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensalidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alunos_id');
            $table->foreign('planos_id')->references('id')->on('planos');
            $table->bigInteger('planos_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('pagamentos');
            $table->bigInteger('status_id')->unsigned();
            $table->double('valor');
            $table->foreign('formas_de_pagamentos_id')->references('id')->on('pagamentos');
            $table->bigInteger('formas_de_pagamentos_id')->unsigned();
            $table->integer('vencimento');
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
        Schema::dropIfExists('mensalidades');
    }
}
