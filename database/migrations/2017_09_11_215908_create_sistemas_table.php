<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sistemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_sistema', 200);
            $table->string('no_sigla', 20)->nullable();
            $table->integer('id_orgao');
            $table->integer('id_unidade');
            $table->integer('id_banco');
            $table->integer('id_amb');
            $table->string('desenvolvimento', 100);
            $table->string('tp_acesso', 45);
            $table->string('status', 45);
            $table->datetime('dt_cadastro');
            $table->datetime('dt_atualizacao');

            $table->foreign('id_orgao')->references('id')->on('orgao');
            $table->foreign('id_unidade')->references('id')->on('unidade');
            $table->foreign('id_banco')->references('id_banco')->on('banco_dados');
            $table->foreign('id_amb')->references('id')->on('ambientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('sistemas');
    }
}
