<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;
use App\cliente;
use App\documento;
use App\documentorenglon;

class ventaControl extends Controller
{
    public function showVenta()
    {
        $clientes = cliente::all();
        $busq = producto::all();
        return view('venta.ventaModulo', ['bus' => $busq, 'clientes' => $clientes]);
    }
    public function consultarProducto($id)
    {
        $producto = producto::find($id);
        return $producto;
    }

    public function ventaStore(Request $request)
    {
        $cliente = cliente::find($request->cliente);

        $doc = new documento();
        $doc->IDCODIGO = $this->generadorId();
        $doc->IDCLIENTE = $cliente->IDCLIENTE;
        $doc->RAZON_SOCIAL = $cliente->RAZON_SOCIAL;
        $doc->RFC = $cliente->RFC;
        $doc->SUBTOTAL = $request->SUBTOTAL;
        $doc->IVA = $request->IVA;
        $doc->TOTAL = $request->TOTAL;
        $doc->save();

        $productos = $request->ventas;
        for ($i = 0; $i < count($productos); $i++) {
            $valores = array_count_values($productos);
            $material = producto::find($productos[$i]);

            for ($i = 0; $i < $valores[$material->IDMATERIAL]; $i++) {
                if (($clave = array_search($material->IDMATERIAL, $productos)) !== false) {
                    unset($productos[$clave]);
                }
            }

            $producto = new documentorenglon();
            $producto->IDCODIGO = $doc->IDCODIGO;
            $producto->IDMATERIAL = $material->IDMATERIAL;
            $producto->UNIDAD_MEDIDA = $material->UNIDADMEDIDA;
            $producto->CANTIDAD = $valores[$material->IDMATERIAL];
            $producto->PRECIO1 = $material->PRECIO1;
            $producto->save();
        }
    }

    private function generadorId()
    {
        $randomId = rand(100, 100000);
        return $randomId;
    }
}
