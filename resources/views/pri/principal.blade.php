@extends('nav.all')
@section('cont')
<style>
    .abs-center {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }
</style>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Página principal</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
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

            <div class="abs-center">
                <h1>Hola, Esta es mi prueba de desarrollo, utiliza el Menú lateral para visitar los modulos</h1>
            </div>

        </div>


    </div><!-- .animated -->
</div><!-- .content -->
@endsection
