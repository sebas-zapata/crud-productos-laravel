@extends('layouts.app')

@section('titulo', 'Bienvenido')
@section('encabezado', 'Sistema de Administración de Productos')

@section('contenido')
<div class="container text-center mt-5">
    <h2 class="mb-4">¡Bienvenido a nuestra aplicación de gestión de productos!</h2>
    <p class="lead">Aquí podrás crear, editar, eliminar y ver todos tus productos fácilmente.</p>
    <a href="{{ route('productos.index') }}" class="btn btn-dark mt-4">
        <i class="bi bi-box-seam"></i> Ver productos
    </a>
</div>
@endsection
