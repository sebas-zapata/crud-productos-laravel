<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|email|unique:usuarios,correo_electronico',
            'contraseña' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario en la base de datos
        Usuario::create([
            'nombre' => $request->nombre,
            'correo_electronico' => $request->correo_electronico,
            'contraseña' => Hash::make($request->password),
        ]);

        // Redirigir al login o dashboard
        return redirect('/login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }
}
