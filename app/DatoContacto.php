<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoContacto extends Model
{
    protected $table = 'datos_contacto';

    public function comuna(){
        return $this->belongsTo(Comuna::class); //pertenece a
    }
}
