<div class="modal fade modalEliminarArchivo" id="modalEliminarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="text-center"><i class="mdi mdi-alert-circle-outline" style="font-size: 100px; color: #efa648ad;"></i></p>
                <h2 class="text-center" style="color: #777777;">¿Estás seguro?</h2>
                <h4 class="text-center" style="color: #777777;">Al eliminar éste archivo no podrás revertir la acción</h4>

                <form id="formuEliminarArchivo" method="post" action="{{ url('documentos/{id}/delete') }}">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control idArchivo">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button id="btnConfirmaEliminacion" type="button" class="btn btn-success">Confirmar</button>
            </div>
        </div>
    </div>
</div>