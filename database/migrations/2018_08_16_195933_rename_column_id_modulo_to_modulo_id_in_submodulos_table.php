<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnIdModuloToModuloIdInSubmodulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submodulos', function (Blueprint $table) {
            $table->renameColumn('id_modulo', 'modulo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submodulos', function (Blueprint $table) {
            $table->renameColumn('modulo_id', 'id_modulo');
        });
    }
}
