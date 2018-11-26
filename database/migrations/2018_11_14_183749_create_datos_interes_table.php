<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosInteresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_interes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('traslado');
            $table->string('actividad');
            $table->string('otra_region');
            $table->string('otro_pais');
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('segmento_id')->unsigned()->nullable();
            $table->timestamps();


            $table->foreign('region_id')->references('id')->on('regiones');
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
        Schema::dropIfExists('datos_interes');
    }
}
