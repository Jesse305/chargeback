<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircuitoMplsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('circuitompls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nu_lote', 11);
            $table->string('ip_lan', 45);
            $table->string('ip_mascara', 45);
            $table->string('wan_cliente', 45);
            $table->string('no_designacao', 45);
            $table->integer('itemdeconfiguracao_id');
            $table->foreign('itemdeconfiguracao_id')
            ->references('id')->on('itemdeconfiguracao');
            $table->integer('categoriaitem_id');
            $table->foreign('categoriaitem_id')
            ->references('id')->on('categoriaitem');
            $table->integer('responsavel_id');
            $table->foreign('responsavel_id')
            ->references('id')->on('responsavel');
            $table->integer('unidade_id');
            $table->foreign('unidade_id')
            ->references('id')->on('unidade');
            $table->integer('orgao_id');
            $table->foreign('orgao_id')
            ->references('id')->on('orgao');
            $table->datetime('dt_cadastro');
            $table->datetime('dt_atualizacao');
            $table->text('ds_observacao');
            $table->integer('nu_usuarios', 11)->unsigned();
            $table->datetime('dt_instalacao');
            $table->datetime('dt_homologacao');
            $table->string('wan_operadora', 45);
            $table->string('nu_dhcp', 45);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('circuitompls');
    }
}
