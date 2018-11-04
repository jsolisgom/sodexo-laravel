<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles';

    public function modulos(){
        return $this->belongsToMany(Modulo::class, 'modulos_por_perfil'); // segundo parametro nombre de tabla intermedia
    }
}
