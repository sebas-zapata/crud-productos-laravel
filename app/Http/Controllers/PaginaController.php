<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function saludo()
    {
        $nombre = "Sebastián";
        return view('bienvenida', compact('nombre'));
    }
}
