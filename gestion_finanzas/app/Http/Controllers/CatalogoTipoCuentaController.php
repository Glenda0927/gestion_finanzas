<?php

namespace App\Http\Controllers;

use App\Models\catalogo_tipo_cuenta;
use Illuminate\Http\Request;

class CatalogoTipoCuentaController extends Controller
{
    public function index()
    {
        $catalogo_tipo_cuentas = catalogo_tipo_cuenta::all();
        return response()->json($catalogo_tipo_cuentas);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        $catalogo_tipo_cuenta = new catalogo_tipo_cuenta();
        $catalogo_tipo_cuenta->nombre = $data['nombre'];
        $catalogo_tipo_cuenta->save();

        return response()->json(['message' => 'Tipo de cuenta creado correctamente'], 201);
    }

    public function show($id)
    {
        $catalogo_tipo_cuenta = catalogo_tipo_cuenta::find($id);

        if ($catalogo_tipo_cuenta) {
            return response()->json($catalogo_tipo_cuenta);
        } else {
            return response()->json(['message' => 'Tipo de cuenta no encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        $catalogo_tipo_cuenta = catalogo_tipo_cuenta::find($id);

        if (!$catalogo_tipo_cuenta) {
            return response()->json(['error' => 'Tipo de cuenta no encontrado'], 404);
        }

        $catalogo_tipo_cuenta->nombre = $data['nombre'];
        $catalogo_tipo_cuenta->save();

        return response()->json(['message' => 'Tipo de cuenta actualizado correctamente']);
    }

    public function destroy($id)
    {
        $catalogo_tipo_cuenta = catalogo_tipo_cuenta::find($id);

        if (!$catalogo_tipo_cuenta) {
            return response()->json(['error' => 'Tipo de cuenta no encontrado'], 404);
        }

        $catalogo_tipo_cuenta->delete();

        return response()->json(['message' => 'Tipo de cuenta eliminado correctamente']);
    }
}
