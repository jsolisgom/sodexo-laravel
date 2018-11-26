<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('respuesta');
            $table->integer('pregunta_id')->unsigned()->nullable();
            $table->integer('postulacion_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('pregunta_id')->references('id')->on('preguntas');
            $table->foreign('postulacion_id')->references('id')->on('postulaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
