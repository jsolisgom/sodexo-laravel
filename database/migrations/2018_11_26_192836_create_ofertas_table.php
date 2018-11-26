<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('fecha_publicacion');
            $table->string('cargo');
            $table->integer('experiencia_minima');
            $table->text('descripcion');
            $table->text('requisitos');
            $table->text('beneficios');
            $table->integer('vacantes');
            $table->string('nivel_estudios');
            $table->string('especialidad');
            $table->integer('turnos');
            $table->string('especificacion_turnos');
            $table->timestamps();

            $table->integer('comuna_id')->unsigned()->nullable();
            $table->integer('tipo_contrato_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('jornada_id')->unsigned()->nullable();
            $table->integer('segmento_id')->unsigned()->nullable();

            $table->foreign('comuna_id')->references('id')->on('comunas');
            $table->foreign('tipo_contrato_id')->references('id')->on('tipos_contratos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jornada_id')->references('id')->on('jornadas');
            $table->foreign('segmento_id')->references('id')->on('segmentos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertas');
    }
}
