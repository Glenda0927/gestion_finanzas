<?php

namespace App\Http\Controllers;

use App\Models\cuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function cuenta(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'numero' => 'required|string|max:20|unique:cuentas,numero',
            'id_tipo_cuenta' => 'required|exists:catalogo_tipo_cuentas,id',
            'balance_inicial' => 'required|numeric',
        ]);

        $cuenta = new Cuenta();
        $cuenta->nombre = $data['nombre'];
        $cuenta->numero = $data['numero'];
        $cuenta->usuario_id = 3; // Set the user ID to 3
        $cuenta->id_tipo_cuenta = $data['id_tipo_cuenta'];
        $cuenta->balance_inicial = $data['balance_inicial'];
        $cuenta->save();

        return response()->json(['message' => 'Cuenta creada correctamente'], 201);
    }

    public function index ()
    {
        $cuentas = Cuenta::all();

        return response()->json($cuentas);
    }

    public function show($id)
    {
        $cuenta = Cuenta::find($id);

        if($cuenta){
            return response()->json($cuenta);
        }else{
            return response()->json(['message' => 'Cuenta no encontrada'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'numero' => 'required|string|max:20|unique:cuentas,numero,' . $id,
            'id_tipo_cuenta' => 'required|exists:catalogo_tipo_cuentas,id',
            'balance_inicial' => 'required|numeric',
        ]);

        $cuenta = Cuenta::find($id);

        if (!$cuenta) {
            return response()->json(['error' => 'Cuenta no encontrada'], 404);
        }

        $cuenta->nombre = $data['nombre'];
        $cuenta->numero = $data['numero'];
        $cuenta->id_tipo_cuenta = $data['id_tipo_cuenta'];
        $cuenta->balance_inicial = $data['balance_inicial'];
        $cuenta->save();

        return response()->json($cuenta);
    }

    public function destroy($id)
    {
        $cuenta = Cuenta::find($id);

        if (!$cuenta) {
            return response()->json(['error' => 'Cuenta no encontrada'], 404);
        }

        $cuenta->delete();

        return response()->json(['message' => 'Cuenta eliminada correctamente']);
    }
}
