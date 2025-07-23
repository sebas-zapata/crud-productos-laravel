@extends('layouts.app')

@section('titulo', 'Detalle del Producto')
@section('encabezado', 'Información del producto')

@section('contenido')
<div class="container mb-3 mt-5">
    <div class="card shadow mx-auto" style="max-width: 700px;">
        <div class="row align-items-center g-0">
            <div class="col-md-5 text-center p-3">
                @if ($producto->imagen)
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen"
                    class="img-fluid rounded shadow">
                @else
                <img src="{{ asset('images/sin-imagen.jpg') }}"
                    alt="Sin imagen"
                    class="img-fluid rounded shadow">
                @endif
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h4 class="card-title text-center text-primary">{{ $producto->nombre }}</h4>
                    <p class="card-text"><strong>Identificador:</strong> #{{ $producto->id }}</p>
                    <p class="card-text"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                    <p class="card-text"><strong>Categoría:</strong> {{ $producto->categoria ?? 'Sin categoría' }}</p>
                    <p class="card-text"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
                    <p class="card-text">
                        <strong>Stock:</strong>
                        @if ($producto->stock > 0)
                        <span class="badge bg-success">{{ $producto->stock }}</span>
                        @else
                        <span class="badge bg-danger">Agotado</span>
                        @endif
                    </p>
                    <p class="card-text">
                        <strong>Disponible:</strong>
                        @if ($producto->disponible)
                        <span class="badge bg-success">Sí</span>
                        @else
                        <span class="badge bg-danger">No</span>
                        @endif
                    </p>
                    <p class="card-text"><small class="text-muted">Creado el {{ $producto->created_at->format('d/m/Y') }}</small></p>
                    <p class="card-text"><small class="text-muted">Actualizado el {{ $producto->updated_at->format('d/m/Y') }}</small></p>

                    <div class="mt-4 d-flex justify-content-end gap-3">
                        <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">← Volver</a>
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary"> <i class="bi bi-pencil"></i> Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection