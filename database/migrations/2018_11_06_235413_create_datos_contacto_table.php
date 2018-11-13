<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_contacto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion', 255);
            $table->string('fono_fijo', 20);
            $table->string('celular', 15);
            $table->string('email', 100);
            $table->timestamps();

            $table->integer('comuna_id')->unsigned()->nullable();
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
        Schema::dropIfExists('datos_contacto');
    }
}
