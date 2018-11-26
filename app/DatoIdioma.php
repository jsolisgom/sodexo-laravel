<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoIdioma extends Model
{
    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
