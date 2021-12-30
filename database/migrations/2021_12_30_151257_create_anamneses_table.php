<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamnesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamneses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->default(false);
            $table->foreign('alunos_id')->references('id')->on('alunos');
            $table->bigInteger('alunos_id')->unsigned();
            $table->string('motivo');
            $table->string('doenca_familiar');
            $table->string('doenca');
            $table->string('medicamentos');
            $table->string('historico_social');
            $table->string('atividade_fisica');
            $table->string('motivo_pratica');
            $table->string('tempo_pratica');
            $table->string('suplementos');
            $table->string('refeicoes');
            $table->string('alimentos');
            $table->string('observacoes');
            $table->string('agua');
            $table->string('diagnostico');
            $table->string('conduta_dieta');
            $table->string('data_revisao');
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
        Schema::dropIfExists('anamneses');
    }
}
