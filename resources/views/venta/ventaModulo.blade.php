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
                            <li><a href="#">IVA: <label id="iva">0.00</label> </a></li>
                            <li><a href="#">SUBTOTAL:<label id="sub">0.00</label></a></li>
                            <li class="active">TOTAL:<label id="total">0.00</label></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('venta.modalCliente')

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
                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                    Generar compra
                </button>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">AÑADIDO AL TICKET</strong>
                    </div>

                    <div class="card-body">
                        <div class="box-body">

                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <select class="form-control selectpicker" id="busqueda" data-live-search="true">
                                            @foreach($bus as $buq)
                                            <option value="{{$buq->IDMATERIAL}}" data-tokens="{{$buq->DESCRIPCION}}">{{$buq->DESCRIPCION}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-sm-3"><input type="number" id="num" placeholder="Ingrese la cantidad de productos" class="form-control"></div>
                                <button type="button" id="boton_buscar" class="btn btn-primary mr-2">Añadir</button>
                            </div>
                            {{$buq->DESCRIPCION}}
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
    <script type="text/javascript">
        $(document).ready(function() {
            $('#ventaTab').DataTable();
        });
    </script>
    <script>
        var myArray = [];

        $("#boton_ingresar").click(function() {
            var idValue = $("#clien123").val();
            var subtotal = document.getElementById('sub').innerHTML;
            var iva = document.getElementById("iva").innerHTML;
            var total = document.getElementById("total").innerHTML;

            if (idValue == null) {
                alert('No ha seleccionado cliente');
                return false;
            }

            if (!myArray.length) {
                alert("Al menos captura un producto");
                return false;
            }

            $.ajax({
                url: "{{route('addV')}}",
                type: "Post",
                data: JSON.stringify({
                    cliente: idValue,
                    SUBTOTAL: subtotal,
                    IVA: iva,
                    TOTAL: total,
                    ventas: myArray
                }),
                contentType: 'application/json; charset=utf-8',
                success: function(data) {
                    alert('Venta agregada !!!');
                    window.location.reload();
                },
                failure: function(data) {
                    alert(data.responseText);
                },
                error: function(data) {
                    alert(data.responseText);
                }
            });
        });

        function num(theObject) {
            var total = theObject;
            var tt = document.getElementById("total").innerHTML;
            var totalf = (Number(total) + Number(tt));
            var iva1 = document.getElementById("iva").innerHTML;
            var tasa = 12;
            var iva = (totalf * tasa) / 100;
            var sub = document.getElementById("sub").innerHTML;
            var subt = (Number(totalf) - Number(iva));
            document.getElementById('sub').innerHTML = subt;
            document.getElementById('iva').innerHTML = iva;
            document.getElementById('total').innerHTML = totalf;
        }

        $("#boton_buscar").click(function() {
            var x = 1;

            if ($('#num').val().length == 0) {
                x = 1;
            } else {
                var x = $("#num").val();
            }

            var id = $("#busqueda").val();

            $.ajax({
                type: "GET",
                url: "{{route('consultar')}}" + "/" + id,
                dataType: "json",

                success: function(data, textStatus, jqXHR) {
                    var rows =
                        "<tr>" +
                        "<td>" + data.IDMATERIAL + "</td>" +
                        "<td>" + data.DESCRIPCION + "</td>" +
                        "<td>" + data.UNIDADMEDIDA + "</td>" +
                        "<td>" + data.PRECIO1 + "</td>" +
                        "</tr>";
                    for (var i = 0; i < x; i++) {
                        $('#ventaTab').append(rows);
                        console.log(data);
                        num(data.PRECIO1);
                        var myArray2 = [data.IDMATERIAL];
                        myArray = myArray.concat(myArray2);
                    }
                    document.getElementById("busqueda").value = "";
                    document.getElementById("num").value = "";
                    //alert(myArray);
                },
                failure: function(data) {

                    alert(data.responseText);
                },
                error: function(data) {

                    alert(data.responseText);
                }

            });

        });
    </script>
    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>
    @endsection
