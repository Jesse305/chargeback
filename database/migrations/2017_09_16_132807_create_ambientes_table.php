<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbientesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ambientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('desc_amb', 200);
            $table->string('ip_trein', 45)->nullable();
            $table->string('usuario_trein', 100)->nullable();
            $table->string('senha_trein', 100)->nullable();
            $table->string('ip_homol', 45);
            $table->string('usuario_homol', 100);
            $table->string('senha_homol', 100);
            $table->string('ip_prod', 45);
            $table->string('usuario_prod', 100);
            $table->string('senha_prod', 100);
            $table->string('link_prod', 200);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ambientes');
    }
}
