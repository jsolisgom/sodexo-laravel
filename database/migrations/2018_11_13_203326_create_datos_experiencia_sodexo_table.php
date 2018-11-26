<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosExperienciaSodexoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_experiencia_sodexo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anios');
            $table->string('cargo', 150);
            $table->string('lugar', 255);
            $table->integer('comuna_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('comuna_id')->references('id')->on('comunas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_experiencia_sodexo');
    }
}
