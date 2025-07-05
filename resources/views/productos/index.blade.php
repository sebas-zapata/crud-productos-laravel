@extends('layouts.app')

@section('titulo', 'Lista de Productos')
@section('encabezado', 'Productos registrados')

@section('contenido')
<div class="container-fluid my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('productos.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> Crear nuevo producto</a>
    </div>

    @if (count($productos) > 0)
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>DIsponible</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td class="text-center align-middle">
                        @if ($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}"
                            alt="Imagen del producto"
                            class="img-fluid rounded shadow"
                            style="width: 100px; height: auto;">
                        @else
                        <img src="{{ asset('images/sin-imagen.jpg') }}"
                            alt="Sin imagen"
                            class="img-fluid rounded shadow"
                            style="width: 120px; height: auto;">
                        @endif
                    </td>


                    <td>{{ $producto->nombre }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>
                        @if($producto->stock > 0)
                        <span class="badge bg-success">{{ $producto->stock }}</span>
                        @else
                        <span class="badge bg-danger">{{ $producto->stock }}</span>
                        @endif
                    </td>

                    <td>
                        @if($producto->disponible)
                        <i class="bi bi-check-circle text-success"></i> Disponible
                        @else
                        <i class="bi bi-x-circle text-danger"></i> No disponible
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary m-1"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-eliminar m-1" data-nombre="{{ $producto->nombre }}"><i class="bi bi-trash"></i></button>
                        </form>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-secondary m-1"><i class="bi bi-eye"></i></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $productos->links() }}
        </div>

    </div>
    @else
    <div class="alert alert-warning text-center">
        No hay productos registrados.
    </div>
    @endif
</div>
@endsection