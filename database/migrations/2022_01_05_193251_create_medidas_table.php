<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('professores_id')->references('id')->on('professores');
            $table->bigInteger('professores_id')->unsigned();
            $table->foreign('alunos_id')->references('id')->on('alunos');
            $table->bigInteger('alunos_id')->unsigned();
            $table->string('status');
            $table->date('data');
            $table->time('hora');
            $table->double('altura');
            $table->double('peso');
            $table->double('torax');
            $table->double('quadril');
            $table->double('coxa_direita');
            $table->double('coxa_esquerda');
            $table->double('braco_direito');
            $table->double('braco_esquerdo');
            $table->double('panturilha_direita');
            $table->double('panturilha_esquerda');
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
        Schema::dropIfExists('medidas');
    }
}
