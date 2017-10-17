<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemConfigsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('itemdeconfiguracao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_item', 150);
            $table->text('ds_descricao')->nullable();
            $table->string('ds_configuracao', 100)->nullable();
            $table->integer('status');
            $table->decimal('nu_custo_mensal', 10, 2);
            $table->datetime('dt_cadastro');
            $table->datetime('dt_atualizacao');
            $table->integer('categoriaitem_id');

            $table->foreign('categoriaitem_id')->references('id')->on('categoriaitem');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('itemdeconfiguracao');
    }
}
