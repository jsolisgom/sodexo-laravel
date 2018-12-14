@extends('layouts.app')

@section('content')
<div class="row profile-page">
    <div class="col-12">
        <h3>Mi CV</h3>

        <div class="profile-header text-white d-none d-md-block">
            <div class="d-flex justify-content-around">
                <div class="profile-info d-flex justify-content-center align-items-md-center">
                    <img class="rounded-circle img-lg" src="../../images/faces/face12.jpg" alt="profile image">
                    <div class="wrapper pl-4">
                        <p class="profile-user-name">{{ Auth::user()->name }} (Programador)</p>
                        <div class="wrapper d-flex align-items-center">
                            <p class="profile-user-designation">19061308-9</p>
                        </div>
                        <i class="flag-icon flag-icon-cl" title="cl" id="cl"></i>
                    </div>
                </div>
                 <div class="details">
                    <div class="detail-col ">
                    <p>Projects</p>
                    <p>130</p>
                    </div>
                    <div class="detail-col ">
                    <p>Projects</p>
                    <p>130</p>
                    </div>
                </div> 
            </div>
        </div> <br>

        <!-- DATOS DE CONTACTO -->
        <div class="card">
            <div class="card-body">
                <h4><i class="icon-user"></i> Datos de contacto</h4><br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control guardarRespuesta" data-modelo="usuario" data-campo="email" placeholder="Ingresar correo" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Dirección</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control guardarRespuesta" data-modelo="datoContacto" data-campo="direccion" placeholder="Ingresar Dirección" value="{{ !empty($datosContacto->direccion) ? $datosContacto->direccion : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Región</label>
                            <div class="col-sm-9">
                                <select id="selectRegion" class="form-control" data->
                                    <option selected value="">Seleccionar</option>
                                        @foreach ($regiones as $region)
                                            @if ( !empty($datosContacto->comuna->region_id) && $datosContacto->comuna->region_id == $region->id)
                                                <option selected value="{{ $region->id }}">{{ $region->region }}</option>
                                            @else
                                                <option value="{{ $region->id }}">{{ $region->region }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Comuna</label>
                            <div class="col-sm-9">
                                <select id="selectComuna" class="form-control guardarRespuesta" data-modelo="datoContacto" data-campo="comuna_id" data-seleccion="{{ !empty($datosContacto->comuna->id) ? $datosContacto->comuna->id : '' }}">
                                    <option selected value="">Seleccionar</option>
                                </select>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Telefono fijo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control guardarRespuesta" placeholder="Ingresar telefono fijo" data-modelo="datoContacto" data-campo="fono_fijo" value="{{ !empty($datosContacto->fono_fijo) ? $datosContacto->fono_fijo : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Telefono celular</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control guardarRespuesta" placeholder="ingresar telefono celular" data-modelo="datoContacto" data-campo="celular" value="{{ !empty($datosContacto->celular) ? $datosContacto->celular : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <br>
        <!-- DATOS DE CONTACTO -->

        <!-- DATOS ACADEMICOS -->
        <div class="card">
            <div class="card-body">
                <h4><i class="icon-badge"></i> Datos académicos</h4><br>
                <!-- ENSEÑANZA BASICA -->
                <div>
                    <h5 style="color:#2A295C;">Enseñanza básica</h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Estado</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option selected value="">Seleccionar</option>
                                        @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->estado }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Último curso aprobado</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option selected value="">Seleccionar</option>
                                        @foreach ($cursosBasica as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->curso }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div> 
                <!-- /ENSEÑANZA BASICA -->

                <!-- ENSEÑANZA MEDIA -->
                <div>
                    <h5 style="color:#2A295C;">Enseñanza media</h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Estado</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option selected value="">Seleccionar</option>
                                        @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->estado }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Último curso aprobado</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option selected value="">Seleccionar</option>
                                        @foreach ($cursosMedia as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->curso }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tipo</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option disabled selected value="">Seleccionar</option>
                                        @foreach ($tipoMedia as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Área de estudio</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option selected value="">Seleccionar</option>
                                        @foreach ($areaMedia as $area)
                                        <option value="{{ $area->id }}">{{ $area->area }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div> 
                <!-- /ENSEÑANZA MEDIA -->

                <!-- ENSEÑANZA SUPERIOR -->
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 style="color:#2A295C;">Enseñanza superior</h5>
                            <a href="#" class="text-success font-weight-bold" style="font-size: 13px;" data-toggle="modal" data-target="#modalAgregarEnsenanzaSuperior"> <i class="icon-plus"></i> Agregar</a>
                        </div>
                    </div> <br>
                    <hr>
                </div>
                <!-- /ENSEÑANZA SUPERIOR -->

                <!-- OTROS ESTUDIOS -->
                <!-- <div>
                    <h5 style="color:#2A295C;">Otros estudios</h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nombre estudios</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" placeholder="Ingresar institución">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Institución</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" placeholder="Ingresar institución">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Situación</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option disabled selected value="">Seleccionar</option>
                                        <option value="2">Completa</option>
                                        <option value="3">Incompleta</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Periodo</label>
                                <div class="col-sm-4">
                                    <input class="form-control" data-inputmask="'alias': 'date'" placeholder="Desde" />
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" data-inputmask="'alias': 'date'" placeholder="Hasta" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- /OTROS ESTUDIOS-->
            </div>
        </div> <br>
        <!-- /DATOS ACADEMICOS -->

        <!-- MANEJO DE IDIOMAS -->
        <div class="card">
            <div class="card-body">
                <h4><i class="icon-user"></i> Manejo de idiomas</h4><br>

                <div class="row form-inline repeater">
                    <div data-repeater-list="group-a">
                        <div data-repeater-item>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Idioma</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option disabled selected value="">Seleccionar</option>
                                            <option value="2">Ingles</option>
                                            <option value="3">Frances</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Nivel</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option disabled selected value="">Seleccionar</option>
                                            <option value="2">Basico</option>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-2">
                        <button data-repeater-create type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                            <i class="mdi mdi-plus"></i>
                        </button>
                    </div>
                </div>

                <!-- <div class="form-inline repeater">
                    <div data-repeater-list="group-a">
                        <div data-repeater-item class="d-flex mb-2">
                            <label class="sr-only" for="inlineFormInputGroup1">Users</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup1" placeholder="Add user">
                            </div>
                            <label class="sr-only">Password</label>
                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </div>
                    </div>
                    <button data-repeater-create type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                        <i class="mdi mdi-plus"></i>
                    </button>
                </div> -->


            </div>
        </div> <br>
        <!--MANEJO DE IDIOMAS -->

    </div>
</div>

@include('curriculum.modalEnsenanzaSuperior')
@endsection