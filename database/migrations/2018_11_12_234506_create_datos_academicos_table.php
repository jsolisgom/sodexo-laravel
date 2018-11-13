<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_academicos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado_basica');//completa true, incompleta false
            $table->string('ultimo_curso_basica', 100);
            $table->boolean('estado_media'); //completa true, incompleta false
            $table->string('ultimo_curso_media', 100);
            $table->string('area_media', 100); //Area de estudio
            $table->string('tipo_media', 100); //Tecnico profesional - Cientifico humanista
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
        Schema::dropIfExists('datos_academicos');
    }
}
