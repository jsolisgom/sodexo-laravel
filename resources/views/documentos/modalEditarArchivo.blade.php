<div class="modal fade modalEditarArchivo" id="modalEditarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-4"><i class="mdi mdi-pencil"></i> Editar archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" id="formuEditarArchivo" method="post" action="{{ url('documentos/{id}/edit') }}">
                {{ csrf_field() }}
                <input type="hidden" class="form-control idArchivo">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Título archivo *</label>
                        <input type="text" class="form-control titulo" id="tituloEditar">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Descripción *</label>
                        <textarea id="descripcionEditar" class="form-control descripcion" id="message-text"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="archivo" class="col-form-label">Archivo <small>(Si no selecciona un nuevo archivo, se mantendrá el existente)</small></label><br>
                        <input type="file" id="archivoEditar" name="archivo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Editar archivo</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>