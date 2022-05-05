<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'productos/store',
        'productos/modificar',
        'clientes/store',
        'clientes/mod',
        'ventas/store',
        'reportes/PDF/cleinte',
        'reportes/PDF/producto'
    ];
}
