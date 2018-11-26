<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regiones';

    public function comunas(){
        return $this->hasMany(Comuna::class);
    }

    public function datosExperiencia(){
        return $this->hasMany(DatosExperiencia::class);
    }
}
