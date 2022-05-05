<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('addCli')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdd">Nuevo cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Razón social</label></div>
                            <div class="col-12 col-md-9"><input maxlength="60" type="text" name="RAZON_SOCIAL" placeholder="Razón social" class="form-control"><small class="form-text text-muted">Añade la Razón social</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">RFC</label></div>
                            <div class="col-12 col-md-9"><input maxlength="15" type="text" name="RFC" placeholder="RFC" class="form-control"><small class="form-text text-muted">Añade el RFC</small></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
