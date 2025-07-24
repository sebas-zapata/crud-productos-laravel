@extends('layouts.app')
@section('titulo', 'Iniciar Sesión')

@section('encabezado', 'Iniciar Sesión')
@section('contenido')
<div class="container mb-3 mt-5">
    <div class="card shadow mx-auto p-2 border-0" style="max-width:
700px;">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Iniciar Sesión</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
                <p style="color:red;">{{ $errors->first() }}</p>
            @endif
        </div>
    <form action="{{ url('/login') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="correo_electronico" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
        </div>
        <div class="mb-3">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
    @endsection