<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submodulo extends Model
{
    //submodulo->modulo
    public function modulo(){
        return $this->belongsTo(Modulo::class); //pertenece a
    }
}
