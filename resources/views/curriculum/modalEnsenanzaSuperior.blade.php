<div class="modal fade modalAgregarEnsenanzaSuperior" id="modalAgregarEnsenanzaSuperior" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-4"><i class="mdi mdi-pencil"></i> Agregar Enseñanza superior</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" id="formAgregarEnsenanzaSuperior" method="post" action="{{ url('micv/store') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tipo</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                    <option disabled selected value="">Seleccionar</option>
                                    @foreach ($tipoSuperior as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                    @endforeach
                                </select>
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
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Carrera</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" placeholder="Ingresar carrera">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Situación</label>
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
                </div>

                <div class="row">
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
            </form>
        </div>
    </div>
</div>