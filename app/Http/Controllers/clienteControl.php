<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cliente;
use Validator;

class clienteControl extends Controller
{
    public function showClientes()
    {
        $cliente = cliente::all();
        $responsev = ['cliente' => $cliente];
        return view('cliente.clienteMod', $responsev);
    }

    public function delete(Request $request, $id)
    {
        try {
            $Cliente = cliente::find($id);
            $Cliente->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('ERROR', $e);
        }
        return redirect()->back()->with('success', 'Cliente eliminado');
    }

    private function generadorId()
    {
        $randomId = rand(100, 100000);
        return $randomId;
    }

    public function modCli(Request $request)
    {
        $rules = [
            'id' => 'required|numeric',
            'RAZON_SOCIAL' => 'required|max:60',
            'RFC' => 'required|max:15'
        ];

        $messages = [
            'RAZON_SOCIAL.required' => 'SE REQUIERE LA RAZÓN SOCIAL',
            'RFC.required' => 'SE REQUIERE EL RFC',
            'RAZON_SOCIAL.max' => 'EXCEDISTE EL LIMITE DE CARACTERES EN RAZÓN SOCIAL',
            'RFC.max' => 'EXCEDISTE EL LIMITE DE CARACTERES EN EL RFC'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('ERROR', $errors);
        }

        try {
            $pro = cliente::find($request->id);
            $pro->RAZON_SOCIAL = $request->RAZON_SOCIAL;
            $pro->RFC = $request->RFC;
            $pro->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('ERROR', $e);
        }
        return redirect()->back()->with('success', 'Se modifico el producto exitosamente');
    }

    public function addCliente(Request $request)
    {
        $rules = [
            'RAZON_SOCIAL' => 'required|max:60',
            'RFC' => 'required|max:15'
        ];

        $messages = [
            'RAZON_SOCIAL.required' => 'SE REQUIERE LA RAZÓN SOCIAL',
            'RFC.required' => 'SE REQUIERE EL RFC',
            'RAZON_SOCIAL.max' => 'EXCEDISTE EL LIMITE DE CARACTERES EN RAZÓN SOCIAL',
            'RFC.max' => 'EXCEDISTE EL LIMITE DE CARACTERES EN EL RFC'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('ERROR', $errors);
        }
        try {
            $cli = new cliente();
            $cli->IDCLIENTE = $this->generadorId();
            $cli->RAZON_SOCIAL = $request->RAZON_SOCIAL;
            $cli->RFC = $request->RFC;
            $cli->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('ERROR', $e);
        }
        return redirect()->back()->with('success', 'Se creo el registro del cliente exitosamente');
    }
}
