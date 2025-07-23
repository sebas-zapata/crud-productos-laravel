@extends('layouts.app')

@section('titulo', 'Crear Producto')
@section('encabezado', 'Formulario de creación de productos')

@section('contenido')
<div class="container mb-3 mt-5">
    <div class="card shadow mx-auto border-0" style="max-width: 700px;">
        <div class="card-header bg-success text-white text-center">
            <h4 class="mb-0">Crear nuevo producto</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Imagen --}}
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen del producto</label>
                    <input type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen">
                    @error('imagen')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    {{-- Nombre --}}
                    <div class="mb-3 col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}">
                        @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Categoría --}}
                    <div class="mb-3 col-md-6">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input type="text" class="form-control @error('categoria') is-invalid @enderror" name="categoria" value="{{ old('categoria') }}">
                        @error('categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Descripción --}}
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    {{-- Precio --}}
                    <div class="mb-3 col-md-4">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}">
                        @error('precio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Stock --}}
                    <div class="mb-3 col-md-4">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', 0) }}" min="0">
                        @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Disponible --}}
                    <div class="mb-3 col-md-4">
                        <label for="disponible" class="form-label">Disponible</label>
                        <select class="form-select @error('disponible') is-invalid @enderror" name="disponible">
                            <option value="1" {{ old('disponible') == '1' ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('disponible') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('disponible')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Botones --}}
                <div class="d-flex justify-content-end pt-3 gap-3">
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Guardar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection