<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ventaControl extends Controller
{
    public function showVenta()
    {
    return view('venta.ventaModulo');
    }
}
