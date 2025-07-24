@extends('layouts.app')
@section('titulo', 'Crear Cuenta')
@section('encabezado', 'Registro de Usuario')

@section('contenido')
<div class="container mb-3 mt-5">
    <div class="card shadow mx-auto border-0" style="max-width: 700px;">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Registro de Usuario</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
                <p style="color:red;">{{ $errors->first() }}</p>
            @endif
        </div>
    <form action="{{ url('/register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="correo_electronico" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
        </div>
        <div class="mb-3">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
        </div>
        <div class="mb-3">
            <label for="contraseña_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="contraseña_confirmation" name="contraseña_confirmation" required>
        </div>
        <div>
            <p>Ya tienes una cuenta? <a href="{{ url('/login') }}">Iniciar sesión</a></p>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
@endsection