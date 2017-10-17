<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemasDevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistemas_devs', function (Blueprint $table) {
            $table->integer('id_sistema');
            $table->integer('id_dev');

            $table->foreign('id_sistema')->references('id')->on('sistemas');
            $table->foreign('id_dev')->references('id')->on('dev');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sistemas_devs');
    }
}
