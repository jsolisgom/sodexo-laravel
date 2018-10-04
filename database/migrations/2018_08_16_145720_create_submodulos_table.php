<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmodulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submodulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('submodulo');
            $table->string('url');
            $table->integer('orden');

            $table->boolean('estado');

            $table->integer('id_modulo')->unsigned()->nullable();
            $table->foreign('id_modulo')->references('id')->on('modulos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submodulos');
    }
}
