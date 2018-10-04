<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    //$modulo->submodulos
    public function submodulos(){
        return $this->hasMany(Submodulo::class);
    }

    public function getTipoEnlaceAttribute(){
        if( count($this->submodulos) >= 1 ){
            return "href=#submodulos-dropdown-$this->id data-toggle=collapse aria-expanded=false aria-controls='submodulos-dropdown-$this->id";
        }else{
            return "href= $this->url";
        }
    }

}
