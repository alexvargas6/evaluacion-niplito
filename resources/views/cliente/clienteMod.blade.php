@extends('nav.all')
@section('cont')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>CLIENTES</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#modalAdd">
                                Añadir
                            </button>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('cliente.modalAdd')

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

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$cliente->count()}}</span></div>
                                    <div class="stat-heading">Clientes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tabla de clientes</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Razón social</th>
                                    <th>RFC</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cliente as $cli)
                                @include('cliente.modificar')
                                <tr>
                                    <td>{{$cli->IDCLIENTE}}</td>
                                    <td>{{$cli->RAZON_SOCIAL}}</td>
                                    <td>{{$cli->RFC}}</td>
                                    <td> <button type="button" data-toggle="modal" data-target="#modal-{{$cli->IDCLIENTE}}" class="btn btn-warning btn-lg">Modificar</button>
                                        <hr>
                                        <form action="{{route('deleteCli',$cli->IDCLIENTE)}}" method="POST">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button onclick="return confirm('¿Esta seguro de querer eliminar este cliente?')" class="btn btn-danger btn-lg">Eliminar</button>
                                        </form>
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
@endsection
