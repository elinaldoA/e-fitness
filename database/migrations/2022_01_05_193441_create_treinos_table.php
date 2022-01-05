<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('alunos_id')->references('id')->on('alunos');
            $table->bigInteger('alunos_id')->unsigned();
            $table->foreign('professores_id')->references('id')->on('professores');
            $table->bigInteger('professores_id')->unsigned();
            $table->date('data_inicio');
            $table->string('objetivo');
            $table->string('observacao');
            $table->string('aquecimento');
            $table->string('nivel');
            $table->integer('numero');
            $table->string('exercicios');
            $table->string('series');
            $table->string('repeticoes');
            $table->string('cargas');
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
        Schema::dropIfExists('treinos');
    }
}
