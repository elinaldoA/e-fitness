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
            $table->foreign('sexos_id')->references('id')->on('sexos');
            $table->bigInteger('sexos_id')->unsigned();
            $table->date('data');
            $table->time('hora');
            $table->string('altura');
            $table->string('peso');
            $table->string('torax');
            $table->string('quadril');
            $table->string('coxa_direita');
            $table->string('coxa_esquerda');
            $table->string('braco_direito');
            $table->string('braco_esquerdo');
            $table->string('panturilha_direita');
            $table->string('panturilha_esquerda');
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
