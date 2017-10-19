<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServidorVmsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('servidorvm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_servidor', 50);
            $table->string('no_dns', 45);
            $table->string('ip_endereco', 45);
            $table->string('cloud_server', 45);
            $table->string('sis_operacional', 60);
            $table->integer('nu_cpu');
            $table->integer('nu_espaco_sas');
            $table->integer('nu_espaco_sata');
            $table->string('ds_observacao', 45);
            $table->datetime('dt_cadastro');
            $table->datetime('dt_atualizacao');
            $table->integer('responsavel_id');
            $table->integer('unidade_id');
            $table->integer('orgao_id');
            $table->string('no_arquivo', 100);
            $table->integer('status');

            $table->foreign('responsavel_id')
            ->references('id')->on('responsavel');
            $table->foreign('unidade_id')
            ->references('id')->on('unidade');
            $table->foreign('orgao_id')
            ->references('id')->on('orgao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('servidorvm');
    }
}
