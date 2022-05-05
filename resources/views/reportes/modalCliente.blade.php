<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('genCli')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Nuevo reporte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <select name="id" class="form-control selectpicker" id="clien123" data-live-search="true">
                                @foreach($clientes as $cli)
                                <option value="{{$cli->IDCLIENTE}}" data-tokens="{{$cli->RAZON_SOCIAL}}">{{$cli->RAZON_SOCIAL}} || {{$cli->RFC}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Generar</button>
                </div>
            </form>
        </div>
    </div>
</div>
