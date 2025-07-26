@extends('layouts.app')

@section('titulo', 'Iniciar Sesión')
@section('encabezado', 'Iniciar Sesión')

@section('contenido')
<div class="container my-5">
    <div class="card shadow-lg mx-auto border-0 rounded-4" style="max-width: 500px;">
        
        <div class="card-header bg-dark text-white text-center rounded-top-4 p-5">
            <h4 class="mb-0 py-2">Bienvenido</h4>
            <p class="mb-1 small">Por favor, ingresa tus credenciales</p>
        </div>

                @if (session('generales'))
        <div class="alert alert-danger alert-dismissible fade show text-center m-3 mb-0 rounded-3" role="alert">
            {{ session('generales') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
        
            @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show text-center m-3 mb-0 rounded-3" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" class="p-4">
            @csrf

            {{-- Correo electrónico --}}
            <div class="mb-3">
                <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                <input type="email" 
                       class="form-control @error('correo_electronico') is-invalid @enderror" 
                       id="correo_electronico" 
                       name="correo_electronico" 
                       value="{{ old('correo_electronico') }}" 
                       placeholder="ejemplo@correo.com"
                       >
                @error('correo_electronico')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Contraseña --}}
            <div class="mb-4">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" 
                       class="form-control @error('contraseña') is-invalid @enderror" 
                       id="contraseña" 
                       name="contraseña" 
                       placeholder="***"
                       >
                @error('contraseña')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                <button type="submit" class="btn btn-dark px-4">Iniciar Sesión</button>
                <a href="{{ route('registrar') }}" class="btn btn-outline-secondary">Registrarse</a>
            </div>
        </form>
    </div>
</div>
@endsection
