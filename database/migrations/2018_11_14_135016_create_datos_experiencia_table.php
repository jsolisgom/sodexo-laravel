<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosExperienciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_experiencia', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('empresa', 150);
            $table->string('sector', 150);
            $table->string('cargo', 150);
            $table->date('periodo_desde');
            $table->date('periodo_hasta');
            $table->text('funciones');
            $table->integer('anios_total_experiencia');
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('usuario_id')->unsigned()->nullable();

            $table->foreign('region_id')->references('id')->on('regiones');
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
        Schema::dropIfExists('datos_experiencia');
    }
}
