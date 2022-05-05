<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <select class="form-control selectpicker" id="clien123" data-live-search="true">
                                @foreach($clientes as $cli)
                                <option value="{{$cli->IDCLIENTE}}" data-tokens="{{$cli->RAZON_SOCIAL}}">{{$cli->RAZON_SOCIAL}} || {{$cli->RFC}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="boton_ingresar" class="btn btn-primary btn-lg active">Hacer compra</button>
            </div>
        </div>
    </div>
</div>
