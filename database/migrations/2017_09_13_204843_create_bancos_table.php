<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('banco_dados', function (Blueprint $table) {
            $table->increments('id_banco');
            $table->string('ambiente_banco', 45);
            $table->string('tecnologia_banco', 45);
            $table->string('ip_banco', 45);
            $table->string('usuario_banco', 100)->nullable();
            $table->string('senha_banco', 100)->nullable();
            $table->string('schema_banco', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('banco_dados');
    }
}
