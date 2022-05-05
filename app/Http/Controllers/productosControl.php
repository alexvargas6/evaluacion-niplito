<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;
use Validator;

class productosControl extends Controller
{
    public function showProductos()
    {
        $productos = producto::all();
        $responsev = ['producto' => $productos];
        return view('productos.productosM', $responsev);
    }


    public function delete(Request $request, $id)
    {
        try {
            $post = producto::find($id);
            $post->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('ERROR', $e);
        }
        return redirect()->back()->with('success', 'Producto eliminado');
    }

    public function modPro(Request $request)
    {
        $rules = [
            'id' => 'required|numeric',
            'DESCRIPCION' => 'required|max:60',
            'UNIDADMEDIDA' => 'required|max:10',
            'PRECIO1' => 'required|numeric|max:10000000000'
        ];

        $messages = [
            'id.required' => 'SE REQUIERE EL ID',
            'DESCRIPCION.required' => 'SE REQUIERE LA DESCRIPCIÓN',
            'UNIDADMEDIDA.required' => 'SE REQUIERE LA UNIDAD DE MEDIDA',
            'PRECIO1.required' => 'SE NECESITA UN PRECIO',
            'DESCRIPCION.max' => 'EXCEDISTE EL LIMITE DE CARACTERES',
            'UNIDADMEDIDA.max' => 'EXCEDISTE EL LIMITE DE CARACTERES',
            'PRECIO1.numeric' => 'EL PRECIO DEBE SER NÚMERICO',
            'id.numeric' => 'EL ID DEBE SER NÚMERICO'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('ERROR', $errors);
        }

        try {
            $pro = producto::find($request->id);
            $pro->DESCRIPCION = $request->DESCRIPCION;
            $pro->UNIDADMEDIDA = $request->UNIDADMEDIDA;
            $pro->PRECIO1 = $request->PRECIO1;
            $pro->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('ERROR', $e);
        }
        return redirect()->back()->with('success', 'Se modifico el producto exitosamente');
    }

    public function addProducto(Request $request)
    {
        $rules = [
            'DESCRIPCION' => 'required|max:60',
            'UNIDADMEDIDA' => 'required|max:10',
            'PRECIO1' => 'required|numeric|max:10000000000'
        ];

        $messages = [
            'DESCRIPCION.required' => 'SE REQUIERE LA DESCRIPCIÓN',
            'UNIDADMEDIDA.required' => 'SE REQUIERE LA UNIDAD DE MEDIDA',
            'PRECIO1.required' => 'SE NECESITA UN PRECIO',
            'DESCRIPCION.max' => 'EXCEDISTE EL LIMITE DE CARACTERES',
            'UNIDADMEDIDA.max' => 'EXCEDISTE EL LIMITE DE CARACTERES',
            'PRECIO1.numeric' => 'EL PRECIO DEBE SER NÚMERICO'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('ERROR', $errors);
        }
        try {
            $pro = new producto();
            $pro->IDMATERIAL = $this->generadorId();
            $pro->DESCRIPCION = $request->DESCRIPCION;
            $pro->UNIDADMEDIDA = $request->UNIDADMEDIDA;
            $pro->PRECIO1 = $request->PRECIO1;
            $pro->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('ERROR', $e);
        }
        return redirect()->back()->with('success', 'Se creo el registro exitosamente');
    }

    private function generadorId()
    {
        $randomId = rand(100, 100000);
        return $randomId;
    }
}
