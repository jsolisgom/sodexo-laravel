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
        $estados = collect([
            (object)(['id' => 0, 'estado' => 'Incompleta']),
            (object)(['id' => 1, 'estado' => 'Completa'])
        ]);

        $cursosBasica = collect([
            (object)(['id' => 0, 'curso' => '1° Básico']),
            (object)(['id' => 1, 'curso' => '2° Básico']),
            (object)(['id' => 2, 'curso' => '3° Básico']),
            (object)(['id' => 3, 'curso' => '4° Básico']),
            (object)(['id' => 4, 'curso' => '5° Básico']),
            (object)(['id' => 5, 'curso' => '6° Básico']),
            (object)(['id' => 6, 'curso' => '7° Básico']),
            (object)(['id' => 7, 'curso' => '8° Básico'])
        ]);

        $cursosMedia = collect([
            (object)(['id' => 0, 'curso' => '1° Medio']),
            (object)(['id' => 1, 'curso' => '2° Medio']),
            (object)(['id' => 2, 'curso' => '3° Medio']),
            (object)(['id' => 3, 'curso' => '4° Medio'])
        ]);

        $tipoMedia = collect([
            (object)(['id' => 0, 'tipo' => 'Técnico Profesional']),
            (object)(['id' => 1, 'tipo' => 'Científico - Humanista'])
        ]);

        $areaMedia = collect([
            (object)(['id' => 0, 'area' => 'Alimentación / Gastronomia']),
            (object)(['id' => 1, 'area' => 'Industrial / Electrónica / Mantención']),
            (object)(['id' => 2, 'area' => 'Parvulos']),
            (object)(['id' => 3, 'area' => 'Contabilidad / Finanzas']),
            (object)(['id' => 4, 'area' => 'Administración de Empresas']),
            (object)(['id' => 5, 'area' => 'Secretariado / Recepcionista']),
            (object)(['id' => 6, 'area' => 'Agrícola / Agropecuario']),
            (object)(['id' => 7, 'area' => 'Hotelería / Turismo']),
            (object)(['id' => 8, 'area' => 'Tecnologia / Comunicaciones'])
        ]);

        $tipoSuperior = collect([
            (object)(['id' => 0, 'tipo' => 'Sin enseñanza superior']),
            (object)(['id' => 1, 'tipo' => 'Universitario']),
            (object)(['id' => 2, 'tipo' => 'Instituto Profesional']),
            (object)(['id' => 3, 'tipo' => 'Centro de Formación Técnica'])
        ]);

        $usuario        = Auth::user();
        $datosContacto  = DatoContacto::with('comuna')->find($usuario->datos_contacto_id); //dd($datosContacto->comuna->region->region);
        $regiones       = Region::all();
        $comunas        = Comuna::all(); 

        return view('curriculum.micv')->with( compact('regiones', 'comunas', 'datosContacto', 'estados', 'cursosBasica', 'cursosMedia', 'tipoMedia', 'areaMedia', 'tipoSuperior') );
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
