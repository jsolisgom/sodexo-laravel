<?php

use Illuminate\Database\Seeder;
use App\EstadoModulo;

class EstadoModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoModulo::create([
            'estado_modulo' => 'habilitado'
        ]);

        EstadoModulo::create([
            'estado_modulo' => 'deshabilitado'
        ]);
    }
}
