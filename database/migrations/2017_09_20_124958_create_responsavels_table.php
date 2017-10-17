<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsavelsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('responsavel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_responsavel', 100);
            $table->string('nu_telefone', 15);
            $table->string('nu_celular', 15)->nullable();
            $table->string('no_email', 30)->nullable();
            $table->string('status', 45);
            $table->text('ds_observacao')->nullable();
            $table->datetime('dt_cadastro');
            $table->datetime('dt_atualizacao');
            $table->integer('orgao_id');
            $table->integer('unidade_id');

            $table->foreign('orgao_id')->references('id')->on('orgao');
            $table->foreign('unidade_id')->references('id')->on('unidade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('responsavel');
    }
}
