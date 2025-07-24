<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo_electronico' => 'required|email',
            'contraseña' => 'required',
        ], [
            'correo_electronico.required' => 'El correo electronico es obligatorio.',
            'correo_electronico.email' => 'El correo no es válido.',
            'contraseña.required' => 'La contraseña es obligatoria.',
        ]);


        $usuario = Usuario::where('correo_electronico', $request->correo_electronico)->first();

        if ($usuario && Hash::check($request->contraseña, $usuario->contraseña)) {
            Auth::login($usuario);
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Bienvenido al sistema, ' . $usuario->nombre . '!');
        } else {
            return back()->with('generales', 'Las credenciales no son válidas.');
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
