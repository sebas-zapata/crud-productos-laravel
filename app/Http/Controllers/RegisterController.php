<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('register');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|email|unique:usuarios,correo_electronico',
            'contraseña' => 'required|string|min:8|confirmed',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'correo_electronico.required' => 'El correo electronico es obligatorio.',
            'correo_electronico.email' => 'El correo no es válido.',
            'correo_electronico.unique' => 'El correo ya está en uso.',
            'contraseña.required' => 'La contraseña es obligatoria.',
            'contraseña.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'contraseña.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        // Crear el usuario en la base de datos
        $usuarioLogueado = Usuario::create([
            'nombre' => $request->nombre,
            'correo_electronico' => $request->correo_electronico,
            'contraseña' => Hash::make($request->contraseña),
        ]);

        Auth::login($usuarioLogueado);
        // Redirigir al login o dashboard
        return redirect()->route('dashboard')->with('success', 'Bienvenido ' . $usuarioLogueado->nombre . '! Tu cuenta ha sido creada exitosamente.');
    }
}
