<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(false);
            $table->string('sobrenome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreign('cargos_id')->references('id')->on('cargos');
            $table->bigInteger('cargos_id')->unsigned();
            $table->foreign('sexos_id')->references('id')->on('sexos');
            $table->bigInteger('sexos_id')->unsigned();
            $table->foreign('estados_civils_id')->references('id')->on('estados_civils');
            $table->bigInteger('estados_civils_id')->unsigned();
            $table->date('nascimento');
            $table->string('cpf')->unique();
            $table->string('telefone');
            $table->string('image');
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('recepcaos');
    }
}
