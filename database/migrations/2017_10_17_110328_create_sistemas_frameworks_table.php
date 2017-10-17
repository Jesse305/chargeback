<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemasFrameworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistemas_frameworks', function (Blueprint $table) {
            $table->integer('id_sistemas');
            $table->integer('id_framework');

            $table->foreign('id_sistemas')->references('id')->on('sistemas');
            $table->foreign('id_framework')->references('id')->on('frameworks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sistemas_frameworks');
    }
}
