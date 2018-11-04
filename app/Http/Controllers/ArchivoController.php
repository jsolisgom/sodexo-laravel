<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Archivo;

class ArchivoController extends Controller
{
    public function index(){
        $usuario = Auth::user();
        $archivos = $usuario->archivos->sortByDesc('id');
        return view('documentos.documentos')->with( compact( 'usuario', 'archivos' ) ); //documentos/documentos.blade.php
    }

    public function store(Request $request){
        $documento      = $request->file('archivo');
        $nombreForm     = $request->input('titulo'); //nombre del archivo ingresado desde el formulario
        $descripcion    = $request->input('descripcion');
        $ruta           = public_path() . '/archivos_usuario' ;
        $url            = url('/archivos_usuario');
        $nombreArchivo  = uniqid() . $documento->getClientOriginalName(); //nombre del archivo fisico
        $extension      = $documento->extension();
        $cargaArchivo   = $documento->move($ruta, $nombreArchivo);
        $idUsuario      = Auth::id();

        $archivo = new Archivo();
        $archivo->nombre        = $nombreForm;
        $archivo->archivo       = $nombreArchivo;
        $archivo->formato       = $extension;
        $archivo->descripcion   = $descripcion;
        $archivo->user_id       = $idUsuario;
        $guardaArchivo          = $archivo->save();

        if ($guardaArchivo && $cargaArchivo) {
            $status  = true;
            $mensaje = "Archivo subido correctamente";
        }else{
            $status  = false;
            $mensaje = "Ha ocurrido un error, reintentar";
        }

        $respuesta = array(
            "id" => $archivo->id,
            "nombre" => $nombreForm,
            "archivo" => $nombreArchivo,
            "descripcion" => $descripcion,
            "ruta" => $ruta,
            "status" => $status,
            "mensaje" => $mensaje
        );

        return json_encode($respuesta);
    }

    public function update(Request $request, $id){
        $archivo = Archivo::find($id);
        
        $ruta = "";
        $nombreArchivo = "";
        $extension = "";
        $url = url('/archivos_usuario');
        
        if ($request->hasFile('archivo')) {
            $documento      = $request->file('archivo');
            $ruta           = public_path() . '/archivos_usuario';
            $nombreArchivo  = uniqid() . $documento->getClientOriginalName(); //nombre del archivo fisico
            $extension      = $documento->extension();

            if (file_exists($ruta."/".$archivo->archivo)) {
                unlink($ruta."/".$archivo->archivo);
            }

            $cargaArchivo = $documento->move($ruta, $nombreArchivo);

            $archivo->formato = $extension;
            $archivo->archivo = $nombreArchivo;
        }

        $nombreForm     = $request->input('titulo'); //nombre del archivo ingresado desde el formulario
        $descripcion    = $request->input('descripcion');

        $archivo->nombre      =  $nombreForm;
        $archivo->descripcion =  $descripcion;

        $guardaArchivo = $archivo->save();

        if ($guardaArchivo || $cargaArchivo) {
            $status  = true;
            $mensaje = "Archivo modificado correctamente";
        }else{
            $status  = false;
            $mensaje = "Ha ocurrido un error, reintentar";
        }

        $respuesta = array(
            "nombre" => $nombreForm,
            "archivo" => $nombreArchivo,
            "descripcion" => $descripcion,
            "ruta" => $ruta,
            "url" => $url,
            "status" => $status,
            "mensaje" => $mensaje
        );

        return $respuesta;
    }

    public function destroy($id){
        $archivo = Archivo::find($id); 

        $ruta = public_path() . '/archivos_usuario';

        if (file_exists($ruta."/".$archivo->archivo)) {
            unlink($ruta."/".$archivo->archivo);
        }
    
        $eliminaArchivo = $archivo->delete();

        if ($eliminaArchivo) {
            $status  = true;
            $mensaje = "Archivo eliminado correctamente";
        }else{
            $status  = false;
            $mensaje = "Ha ocurrido un error, reintentar";
        }

        $respuesta = array(
            "ruta" => $ruta,
            "status" => $status,
            "mensaje" => $mensaje
        );

        return $respuesta; //response()->json($respuesta); //json_encode($respuesta);
    }
}
