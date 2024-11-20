<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = usuario::select('id', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'email', 'telefono', 'direccion', 'fecha_nacimiento', 'username')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        try {


            $data = request()->validate([
                'primer_nombre' => 'required',
                'segundo_nombre' => 'required',
                'primer_apellido' => 'required',
                'segundo_apellido' => 'required',
                'email' => 'required',
                'telefono' => 'required',
                'direccion' => 'required',
                'fecha_nacimiento' => 'required',
            ]);

            $validator = Validator::make($data, [
                'email' => 'required|email|unique:usuarios',
                'telefono' => 'required|numeric',
                'fecha_nacimiento'   => 'nullable|date|date_format:Y-m-d',
                'primer_nombre' => 'required|string',
                'segundo_nombre' => 'required|string',

            ], [
                'email.required' => 'El campo email es obligatorio',
                'email.email' => 'El campo email debe ser un correo válido',
                'email.unique' => 'El email ya se encuentra registrado',
                'telefono.required' => 'El campo teléfono es obligatorio',
                'telefono.numeric' => 'El campo teléfono debe ser un número',
                'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha',
                'fecha_nacimiento.date_format' => 'El campo fecha de nacimiento debe tener el formato Y-m-d',
                'primer_nombre.required' => 'El campo primer nombre es obligatorio',
                'primer_nombre.string' => 'El campo primer nombre debe ser una cadena',
                'segundo_nombre.required' => 'El campo segundo nombre es obligatorio',
                'segundo_nombre.string' => 'El campo segundo nombre debe ser una cadena',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            //generar password
            $password = substr(md5(microtime()), 1, 8);

            //generar un usearname
            $username = strtolower($data['primer_nombre'][0] . $data['primer_apellido']);

            $usuario = new usuario();
            $usuario->primer_nombre = $data['primer_nombre'];
            $usuario->segundo_nombre = $data['segundo_nombre'];
            $usuario->primer_apellido = $data['primer_apellido'];
            $usuario->segundo_apellido = $data['segundo_apellido'];
            $usuario->email = $data['email'];
            $usuario->telefono = $data['telefono'];
            $usuario->direccion = $data['direccion'];
            $usuario->fecha_nacimiento = $data['fecha_nacimiento'];
            $usuario->username = $username;
            $usuario->password = bcrypt($password);
            $usuario->save();
        } catch (\Exception $e) {
            return view('usuarios.create');
        }
    }

    public function update(Request $request, $id)
{
    $data = $request->validate([
        'primer_nombre' => 'required|string',
        'segundo_nombre' => 'required|string',
        'primer_apellido' => 'required|string',
        'segundo_apellido' => 'required|string',
        'email' => 'required|email|unique:usuarios,email,' . $id,
        'telefono' => 'required|numeric',
        'direccion' => 'required|string',
        'fecha_nacimiento' => 'nullable|date|date_format:Y-m-d',
    ]);

    $usuario = Usuario::find($id);

    if (!$usuario) {
        return response()->json(['error' => 'Usuario no encontrado'], 404);
    }

    $usuario->primer_nombre = $data['primer_nombre'];
    $usuario->segundo_nombre = $data['segundo_nombre'];
    $usuario->primer_apellido = $data['primer_apellido'];
    $usuario->segundo_apellido = $data['segundo_apellido'];
    $usuario->email = $data['email'];
    $usuario->telefono = $data['telefono'];
    $usuario->direccion = $data['direccion'];
    $usuario->fecha_nacimiento = $data['fecha_nacimiento'];
    $usuario->save();

    return response()->json($usuario);
}

    public function destroy($id)
    {
        $usuario = usuario::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }
}
