<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexControl extends Controller
{
    public function showPrincipal()
    {
        return view('pri.principal');
    }
}
