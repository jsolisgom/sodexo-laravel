<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoExperiencia extends Model
{
    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
