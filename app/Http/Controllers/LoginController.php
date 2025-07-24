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
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo_electronico' => 'required|email',
            'contraseña' => 'required',
        ]);

        $usuario = Usuario::where('correo_electronico', $request->correo_electronico)->first();

        if ($usuario && Hash::check($request->contraseña, $usuario->contraseña)) {
            Auth::login($usuario);
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.',
        ]);
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
