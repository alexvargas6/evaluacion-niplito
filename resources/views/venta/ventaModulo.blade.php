@extends('nav.all')
@section('cont')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>MODULO DE VENTA</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                                Añadir
                            </button>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif
            @if (\Session::has('ERROR'))
            <div class="alert alert-warning">
                <ul>
                    <li>{!! \Session::get('ERROR') !!}</li>
                </ul>
            </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">AÑADIDO AL TICKET</strong>
                    </div>
                    <div class="card-body">

                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-search"></i> Search
                                        </button>
                                    </div>
                                    <input type="text" id="input1-group2" name="input1-group2" placeholder="Número de material" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mr-2" onclick="agregarFila()">Agregar Fila</button>

                        <table id="ventaTab" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>C. Producto</th>
                                    <th>Descripción</th>
                                    <th>Unidad de medida</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>$320,800</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

@section('scr')
<script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/init/datatables-init.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>

<script>
    function agregarFila() {
        document.getElementById("ventaTab").insertRow(-1).innerHTML = ' <tr><td>Tiger</td><td>Tiger</td><td>Tiger</td><td>Tiger</td></tr>';
    }

    function eliminarFila() {
        var table = document.getElementById("ventaTab");
        var rowCount = table.rows.length;
        //console.log(rowCount);

        if (rowCount <= 1)
            alert('No se puede eliminar el encabezado');
        else
            table.deleteRow(rowCount - 1);
    }
</script>
@endsection
