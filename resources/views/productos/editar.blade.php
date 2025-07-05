@extends('layouts.app')

@section('titulo', 'Editar Producto')
@section('encabezado', 'Editar producto')

@section('contenido')
<div class="container mb-3 mt-5">
    <div class="card shadow mx-auto border-0" style="max-width: 700px;">
        <div class="card-header bg-primary text-light text-center">
            <h4 class="mb-0">Editar producto - {{ $producto->nombre }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($producto->imagen)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen actual"
                        class="img-thumbnail rounded shadow" style="width: 150px;">
                    <p class="mt-2 text-muted">Imagen actual</p>
                </div>
                @endif
                <!-- Dentro del form ya existente -->
                <div class="mb-3">
                    <label for="imagen" class="form-label">Cambiar imagen (opcional)</label>
                    <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror">
                    @error('imagen')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo nombre -->
                <div class="mb-3 col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre"
                        value="{{ old('nombre', $producto->nombre) }}">
                    @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo categoria -->
                <div class="mb-3 col-md-6">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" class="form-control @error('categoria') is-invalid @enderror" id="categoria" name="categoria"
                        value="{{ old('categoria', $producto->categoria) }}">
                    @error('categoria')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo descripcion -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo precio -->
                <div class="mb-3 col-md-4">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio"
                        value="{{ old('precio', $producto->precio) }}">
                    @error('precio')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo stock -->
                <div class="mb-3 col-md-4">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" min="0"
                        value="{{ old('stock', $producto->stock) }}">
                    @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo disponible -->
                <div class="mb-3 col-md-4">
                    <label for="disponible" class="form-label">Disponible</label>
                    <select name="disponible" class="form-select @error('disponible') is-invalid @enderror">
                        <option value="1" {{ old('disponible', $producto->disponible) == 1 ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ old('disponible', $producto->disponible) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    @error('disponible')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="d-flex justify-content-end pt-3 gap-3">
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">← Volver</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil"></i> Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection