@extends('layouts.app')

@section('titulo', 'Crear Cuenta')
@section('encabezado', 'Registro de Usuario')

@section('contenido')
<div class="container my-5">
    <div class="card shadow-lg mx-auto border-0 rounded-4" style="max-width: 500px;">
        
        <div class="card-header bg-dark text-white text-center rounded-top-4 p-5">
            <h4 class="mb-0 py-2">Crear Cuenta</h4>
            <p class="mb-1 small">Completa el formulario para registrarte</p>
        </div>

        <form action="{{ url('/register') }}" method="POST" class="p-4">
            @csrf

            {{-- Nombre --}}
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" 
                       class="form-control @error('nombre') is-invalid @enderror" 
                       id="nombre" 
                       name="nombre" 
                       value="{{ old('nombre') }}" 
                       placeholder="Tu nombre completo">
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Correo electrónico --}}
            <div class="mb-3">
                <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                <input type="email" 
                       class="form-control @error('correo_electronico') is-invalid @enderror" 
                       id="correo_electronico" 
                       name="correo_electronico" 
                       value="{{ old('correo_electronico') }}" 
                       placeholder="ejemplo@correo.com">
                @error('correo_electronico')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Contraseña --}}
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" 
                       class="form-control @error('contraseña') is-invalid @enderror" 
                       id="contraseña" 
                       name="contraseña" 
                       placeholder="Mínimo 8 caracteres">
                @error('contraseña')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirmación de contraseña --}}
            <div class="mb-4">
                <label for="contraseña_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" 
                       class="form-control @error('contraseña') is-invalid @enderror" 
                       id="contraseña_confirmation" 
                       name="contraseña_confirmation"
                       placeholder="Repite la contraseña">

                @error('contraseña')
                    @if ($message == 'Las contraseñas no coinciden.' || $message == 'La contraseña es obligatoria.')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                @enderror
            </div>

            {{-- Botones --}}
            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                <button type="submit" class="btn btn-dark px-4">Registrarse</button>
                <a href="{{ route('login') }}" class="btn btn-outline-secondary">Iniciar sesión</a>
            </div>
        </form>
    </div>
</div>
@endsection
