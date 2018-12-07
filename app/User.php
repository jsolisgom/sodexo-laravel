<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function archivos(){
        return $this->hasMany(Archivo::class);
    }

    public function datosContacto(){
        return $this->hasOne(DatoContacto::class);
    }

    public function datosEnseñanzaSuperior(){
        return $this->hasMany(DatoEnsenanzaSuperior::class);
    }

    public function datosExperiencia(){
        return $this->hasMany(DatoExperiencia::class);
    }

    public function datosInformaticos(){
        return $this->hasMany(DatoInformatico::class);
    }
    
    public function datosIdiomas(){
        return $this->hasMany(DatoIdioma::class);
    }
}
