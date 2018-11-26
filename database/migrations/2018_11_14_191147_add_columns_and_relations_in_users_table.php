<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsAndRelationsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('fecha_ingreso')->nullable()->default(NULL);
            $table->string('rut');
            $table->string('rut_completo');
            $table->string('password_estado');
            $table->string('password_fecha_hora');
            $table->string('apaterno');
            $table->string('amaterno');
            $table->string('cargo');
            $table->string('estado');
            $table->string('genero');
            $table->string('ceco');

            $table->integer('datos_contacto_id')->unsigned()->nullable();
            $table->integer('datos_academicos_id')->unsigned()->nullable();
            $table->integer('datos_interes_id')->unsigned()->nullable();
            $table->integer('datos_experiencia_sodexo_id')->unsigned()->nullable();
            $table->integer('perfil_id')->unsigned()->nullable();

            $table->foreign('datos_contacto_id')->references('id')->on('datos_contacto');
            $table->foreign('datos_academicos_id')->references('id')->on('datos_academicos');
            $table->foreign('datos_interes_id')->references('id')->on('datos_interes');
            $table->foreign('datos_experiencia_sodexo_id')->references('id')->on('datos_experiencia_sodexo');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['datos_contacto_id']);
            $table->dropForeign(['datos_academicos_id']);
            $table->dropForeign(['datos_interes_id']);
            $table->dropForeign(['datos_experiencia_sodexo_id']);
            $table->dropForeign(['perfil_id']);

            $table->dropColumn('nombre');
            $table->dropColumn('rut_completo');
            $table->dropColumn('password_estado');
            $table->dropColumn('password_fecha_hora');
            $table->dropColumn('apaterno');
            $table->dropColumn('amaterno');
            $table->dropColumn('cargo');
            $table->dropColumn('estado');
            $table->dropColumn('genero');
            $table->dropColumn('ceco');
            $table->dropColumn('fecha_ingreso');
            $table->dropColumn('datos_contacto_id');
            $table->dropColumn('datos_academicos_id');
            $table->dropColumn('datos_interes_id');
            $table->dropColumn('datos_experiencia_sodexo_id');
            $table->dropColumn('perfil_id');
            
        });
    }
}
