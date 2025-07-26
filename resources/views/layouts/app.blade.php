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
    <div class="container-fluid">
        <!-- Marca / título -->
        <a class="navbar-brand" href="#">{{ config('app.name', 'Mi App') }} - @yield('encabezado')</a>

        <!-- Botón hamburguesa para pantallas pequeñas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Alternar navegación">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Contenido colapsable -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarContenido">
            @auth
            <ul class="navbar-nav align-items-center gap-2">
                
                <!-- Texto de bienvenida -->
                <li class="nav-item text-white">
                    Bienvenido, {{ Auth::user()->nombre }}
                </li>
                <!-- Botón Dashboard -->
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-light btn-sm">Ir al Dashboard</a>
                </li>

                <!-- Botón cerrar sesión -->
                <li class="nav-item">
                    <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>


    <!-- Contenido principal -->
    <div class="container-fluid">
        @yield('contenido')

    </div>

</body>

</html>