<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoExperienciaSodexo extends Model
{
    public function comuna(){
        return $this->belongsTo(Comuna::class);
    }
}
