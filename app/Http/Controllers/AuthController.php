<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Arrendador;
use App\Models\AgenciaArrendamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    public function register(Request $request)
{

   
    // Validar los datos del formulario
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:100',
        'apellido' => 'required|string|max:100',
        'email' => 'required|string|email|max:150|unique:usuarios',
        'contraseña' => 'required|string|min:8',
        'rol' => 'required|string|in:arrendador,agencia_arrendamiento',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Crear el usuario
    $usuario = Usuario::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'email' => $request->email,
        'contraseña' => Hash::make($request->contraseña),
        'rol' => $request->rol,
    ]);

    // Crear el arrendador o agencia de arrendamiento según el rol
    if ($request->rol === 'arrendador') {
        Arrendador::create([
            'id_usuario' => $usuario->id_usuario,
            'identificacion' => $request->identificacion,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'tel_contacto' => $request->tel_contacto,
            'correo_electronico' => $request->correo_electronico,
        ]);
    } else if ($request->rol === 'agencia_arrendamiento') {
        AgenciaArrendamiento::create([
            'id_usuario' => $usuario->id_usuario,
            'nombre_agencia' => $request->nombre_agencia,
            'direccion' => $request->direccion_agencia,
            'telefono' => $request->telefono_agencia,
            'nit' => $request->nit,
            'tel_contacto_agencia' => $request->tel_contacto_agencia,
            'correo_contacto_agencia' => $request->correo_contacto_agencia,
        ]);
    }

    // Registro exitoso
    return redirect()->route('register.custom')->with('message', 'Registro exitoso');

}



}


