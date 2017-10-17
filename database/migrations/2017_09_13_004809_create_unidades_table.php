<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('unidade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_unidade', 100);
            $table->string('no_sigla', 45)->nullable();
            $table->string('no_endereco', 100)->nullable();
            $table->string('nu_cep', 45)->nullable();
            $table->integer('status');
            $table->datetime('dt_cadastro');
            $table->datetime('dt_atualizacao');
            $table->integer('orgao_id');
            $table->integer('cidade_id');

            $table->foreign('orgao_id')->references('id')->on('orgao');
            $table->foreign('cidade_id')->references('id')->on('cidade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('unidade');
    }
}
