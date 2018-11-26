<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function datosContacto(){
        return $this->hasMany(DatoContacto::class);
    }

    public function datosExperienciaSodexo(){
        return $this->hasMany(DatosExperienciaSodexo::class);
    }
}
