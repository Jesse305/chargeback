<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgaosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orgao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_orgao', 100);
            $table->string('no_sigla', 15)->nullable();
            $table->integer('tp_orgao');
            $table->integer('status');
            $table->datetime('dt_cadastro');
            $table->datetime('dt_atualizacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('orgao');
    }
}
