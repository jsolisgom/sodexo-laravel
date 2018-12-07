<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Region;
use App\Comuna;
use App\User;
use App\DatoContacto;

class UsuarioController extends Controller
{
    public function index()
    {

        $usuario        = Auth::user();
        $datosContacto  = DatoContacto::with('comuna')->find($usuario->datos_contacto_id); //dd($datosContacto->comuna->region_id);
        $regiones       = Region::all();
        $comunas        = Comuna::all();

        return view('curriculum.micv')->with( compact('regiones', 'comunas', 'datosContacto') );
    }

    public function update(Request $request){
        $usuario     = Auth::user();

        $modelo      = $request->input('modelo');
        $nombreCampo = $request->input('campo');
        $valor       = $request->input('valor');

        if($modelo == 'usuario'){
            $usuario->$nombreCampo = $valor;
            $actualiza = $usuario->save();

        }elseif($modelo == 'datoContacto'){
            if ($usuario->datos_contacto_id) { //Si el usuario tiene datos de contacto 
                $datoContacto = DatoContacto::find($usuario->datos_contacto_id); //obtiene datos de tabla datos_contacto
                $datoContacto->$nombreCampo = $valor; // setea el dato de contacto
                $datoContacto->save(); //actualiza
            }else{ // si el usuario no tiene datos de contacto
                $datoContacto = new DatoContacto(); //crea instacia
                $datoContacto->$nombreCampo = $valor; // setea el dato de contacto
                $datoContacto->save(); //inserta el nuevo dato de contacto
                $usuario->datos_contacto_id = $datoContacto->id; //setea el id_datos_contacto del usuario
                $usuario->save(); //inserta el dato id_datos_contacto en la tabla users
            }
        }

        return "jose";
    }
}
