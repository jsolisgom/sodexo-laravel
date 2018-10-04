@extends('layouts.app')

@section('content')
        <div class="col-md-12"> 
            <h3>Carga de documentos</h3> <br>

            <div class="card">
                <div class="card-body">
                    En el siguiente ITEM podrás subir y descargar archivos: Ejemplo: CV, Certificados, etc. 
                </div>
            </div> <br>

            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-12">
                            <h5>Lista de archivos</h5>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <button type="button" class="btn btn-outline-info float-right" data-toggle="modal" data-target="#modalCargarArchivo"><i class="icon-plus"></i>  Nuevo archivo</button>
                        </div> 
                    </div><hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead style="background-color: #028676; color: white">
                                    <tr>
                                        <th><b>Nombre archivo</b></th>
                                        <th><b>Descripción</b></th>
                                        <th><b>Acciones</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($archivos as $archivo)
                                        <tr id="tr{{ $archivo->id }}">
                                            <td id="tdNombre{{ $archivo->id }}">{{ $archivo->nombre }}</td>
                                            <td id="tdDesc{{ $archivo->id }}">{{ $archivo->descripcion }}</td>
                                            <td class="text-danger">
                                                <a href="{{ asset('archivos_usuario/'.$archivo->archivo) }}" download="{{$archivo->archivo}}" class="btn btn-icons btn-rounded btn-outline-primary"><i class="mdi mdi-cloud-download"></i></a>
                                                <button id="btnEditarArchivo" class="btnEditarArchivo btn btn-icons btn-rounded btn-outline-warning" data-toggle="modal" data-id="{{ $archivo->id }}" data-nombre="{{ $archivo->nombre }}" data-desc="{{ $archivo->descripcion }}" data-target="#modalEditarArchivo"><i class="mdi mdi-pencil"></i></button>
                                                <!-- <a href="" class="btn btn-icons btn-rounded btn-outline-danger"><i class="mdi mdi-close-circle"></i></a> -->
                                                <button class="btn btn-icons btn-rounded btn-outline-danger" data-toggle="modal" data-target="#modalEliminarArchivo"><i class="mdi mdi-close-circle"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        @include('documentos.modalNuevoArchivo')
        @include('documentos.modalEditarArchivo')
        @include('documentos.modalConfirmaEliminarArchivo')
@endsection