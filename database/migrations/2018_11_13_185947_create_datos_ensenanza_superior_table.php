<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosEnsenanzaSuperiorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_ensenanza_superior', function (Blueprint $table) {
            $table->increments('id');
            $table->string('institucion', 255);
            $table->string('carrera', 255);
            $table->string('situacion', 100);
            $table->string('tipo_ensenanza', 100);
            $table->date('periodo_desde');
            $table->date('periodo_hasta');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_ensenanza_superior');
    }
}
