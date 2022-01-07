<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasNutricionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas_nutricionais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('alunos_id')->references('id')->on('alunos');
            $table->bigInteger('alunos_id')->unsigned();
            $table->foreign('nutricionistas_id')->references('id')->on('nutricionistas');
            $table->bigInteger('nutricionistas_id')->unsigned();
            $table->string('status');
            $table->string('email');
            $table->string('telefone');
            $table->date('data');
            $table->date('hora');
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
        Schema::dropIfExists('consultas_nutricionais');
    }
}
