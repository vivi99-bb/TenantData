<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar las credenciales de entrada
        $request->validate([
            'email' => 'required|email',
            'contraseña' => 'required|string|min:8',
        ]);

        // Buscar el usuario por email
        $usuario = Usuario::where('email', $request->email)->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($usuario && Hash::check($request->contraseña, $usuario->contraseña)) {
            // Iniciar sesión manualmente
            Auth::login($usuario);

            // Mostrar los datos para verificar si se recuperó correctamente el usuario
            //dd($usuario);  // Aquí deberías ver los datos del usuario si todo es correcto

            // Redirigir según el rol
            if ($usuario->rol === 'arrendador') {
                return redirect()->route('arrendadores.dashboard')->with('message', 'Bienvenido, Arrendador');
            } elseif ($usuario->rol === 'agencia_arrendamiento') {
                return redirect()->route('agencia.dashboard')->with('message', 'Bienvenido, Agencia de Arrendamiento');
            } elseif ($usuario->rol === 'administrador') {
                return redirect()->route('admin.dashboard')->with('message', 'Bienvenido, Administrador');
            }
        }

        // Si las credenciales son incorrectas
        return back()->withErrors(['email' => 'Las credenciales no son correctas']);
    }

    // Función para cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
