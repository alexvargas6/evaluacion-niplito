<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\documentorenglon;
use App\documento;
use App\cliente;
use App\producto;

class reportesControl extends Controller
{
    public function showR()
    {
        $clientes = cliente::all();
        $doc = documento::all();
        return view('reportes.reportes', ['docu' => $doc, 'clientes' => $clientes]);
    }

    public function generarReporte(Request $request)
    {
        $cliente = cliente::find($request->id);
        $doc = documento::where('IDCLIENTE', $request->id)->get();
        $data = [
            'cliente' => $cliente
        ];
        $pdf = \PDF::loadView('reportes.reportCli', $data);

        $arch = 'reporteCliente-' . $request->id . '.pdf';
        return $pdf->download($arch);
    }

    public function generarReporteProducto(Request $request)
    {
        //$pdf = app('dompdf.wrapper');
        $piezas =
        DB::table('documentorenglons')->select('productos.IDMATERIAL', 'productos.DESCRIPCION', DB::raw('SUM(documentorenglons.cantidad) as PIEZAS'),DB::raw('SUM(documentorenglons.PRECIO1) as SUBTOTAL'))
            ->join('productos', 'documentorenglons.IDMATERIAL', '=', 'productos.IDMATERIAL')
            ->groupBy('IDMATERIAL')
            ->get();
        $data = [
            'Producto' => $piezas
        ];

        /*SELECT p.IDMATERIAL, p.DESCRIPCION, sum(d.cantidad) PIEZAS, sum(d.PRECIO1) subtotal  FROM documentorenglons d
INNER JOIN  productos p ON d.IDMATERIAL = p.IDMATERIAL GROUP BY IDMATERIAL;*/

        $pdf = \PDF::loadView('reportes.reportePro', $data);

        $arch = 'reporte-piezas.pdf';
        return $pdf->download($arch);
    }
}
