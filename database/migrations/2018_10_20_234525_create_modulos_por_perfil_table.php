<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosPorPerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_por_perfil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modulo_id')->unsigned()->nullable();
            $table->integer('perfil_id')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('modulo_id')->references('id')->on('modulos');
            $table->foreign('perfil_id')->references('id')->on('perfiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos_por_perfil');
    }
}
