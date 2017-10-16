<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orgao_id');
            $table->integer('unidade_id');
            $table->string('no_dns', 100);
            $table->string('no_site', 100);
            $table->string('codigo_analytics', 100);
            $table->string('ip_html', 100);
            $table->string('ip_banco', 100);
            $table->string('usuario_banco', 100);
            $table->string('pwd_banco', 100);
            $table->string('esquema_banco', 100);
            $table->string('ds_website', 100);
            $table->string('tp_portal', 100);
            $table->string('prefixo_tabela', 100);
            $table->string('st_token', 3);
            $table->string('usuario_analytics', 100);
            $table->string('senha_analytics', 100);
            $table->datetime('dt_cadatro');
            $table->datetime('dt_atualizacao');

            $table->foreign('orgao_id')->references('id')->on('orgao');
            $table->foreign('unidade_id')->references('id')->on('unidade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('dns');
    }
}
