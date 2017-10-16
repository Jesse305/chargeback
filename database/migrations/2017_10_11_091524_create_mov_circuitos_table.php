<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovCircuitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacaocircuito', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('circuitompls_id');
            $table->foreign('circuitompls_id')
            ->references('id')->on('circuitompls');

            $table->string('ip_lan', 45);
            $table->string('ip_mascara', 45);
            $table->string('wan_cliente', 45);
            $table->string('wan_operadora', 45);
            $table->string('no_designacao', 45);
            $table->text('ds_observacao');
            $table->datetime('dt_instalacao');
            $table->datetime('dt_homologacao');
            $table->datetime('dt_cadastro');
            $table->datetime('dt_atualizacao');

            $table->integer('itemdeconfiguracao_id');
            $table->foreign('itemdeconfiguracao_id')
            ->references('id')->on('itemdeconfiguracao');

            $table->integer('responsavel_id');
            $table->foreign('responsavel_id')
            ->references('id')->on('responsavel');
            
            $table->integer('unidade_id');
            $table->foreign('unidade_id')
            ->references('id')->on('unidade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacaocircuito');
    }
}
