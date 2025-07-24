<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('titulo')</title>

    @if (session('alerta'))
    <meta name="mensaje-sistema" content="{{ session('alerta') }}">
    @endif

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Meta mensaje desde Laravel -->
    <!-- Tu JS personalizado -->
    <script src="{{ asset('js/alerts.js') }}"></script>
</head>

<body>

    <!-- Encabezado principal -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="#">{{ config('app.name', 'Mi App') }} - @yield('encabezado')</a>

        @auth
        <div class="d-flex align-items-center gap-3">
            <span class="text-white mb-0">Bienvenido, {{ Auth::user()->nombre }}</span>
            <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-light">Cerrar Sesión</button>
            </form>
        </div>
        @endauth
    </div>
</nav>


    <!-- Contenido principal -->
    <div class="container-fluid">
        @yield('contenido')

    </div>

</body>

</html>