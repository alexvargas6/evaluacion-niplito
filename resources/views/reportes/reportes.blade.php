@extends('nav.all')
@section('cont')
<style>
    .abs-center {

        min-height: 100vh;
    }
</style>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>REPORTES</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-1">
        <div class="card-body">
            <div class="card-left pt-1 float-left">

            </div><!-- /.card-left -->

            <div class="card-right float-right text-right">
                <i class="icon fade-5 icon-lg pe-7s-cart"></i>
            </div><!-- /.card-right -->

        </div>

    </div>
</div>

@include('reportes.modalCliente')
<div class="content">
    <div class="animated fadeIn">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-1">
                <div class="card-body">
                    <div class="card-left pt-1 float-left">
                        <h3 class="mb-0 fw-r">
                            <span class="count">{{$docu->count()}}</span>
                        </h3>
                        <p class="text-light mt-1 m-0">VENTAS</p>
                    </div><!-- /.card-left -->

                    <div class="card-right float-right text-right">
                        <i class="icon fade-5 icon-lg pe-7s-cart"></i>
                    </div><!-- /.card-right -->

                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">AÑADIDO AL TICKET</strong>
                    </div>
                    <div class="card-body">
                        <div class="box-body">
                            <button type="button" data-toggle="modal" data-target="#mediumModal" class="btn btn-primary btn-lg active">Generar reporte por cliente</button>
                            <hr>
                            <form action="{{route('genRep')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <button type="submit" class="btn btn-primary btn-lg active">Generar reporte por producto</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>


    </div><!-- .animated -->
</div>
@endsection
