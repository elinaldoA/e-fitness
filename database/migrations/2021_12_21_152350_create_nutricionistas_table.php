<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutricionistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutricionistas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(false);
            $table->string('nome');
            $table->foreign('cargos_id')->references('id')->on('cargos');
            $table->bigInteger('cargos_id')->unsigned();
            $table->foreign('sexos_id')->references('id')->on('sexos');
            $table->bigInteger('sexos_id')->unsigned();
            $table->foreign('estados_civils_id')->references('id')->on('estados_civils');
            $table->bigInteger('estados_civils_id')->unsigned();
            $table->date('nascimento');
            $table->string('cpf')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefone');
            $table->string('image');
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
        Schema::dropIfExists('nutricionistas');
    }
}
