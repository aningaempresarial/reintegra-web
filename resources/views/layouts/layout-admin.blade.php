<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo')</title>
        <link rel="stylesheet" href="{{ asset('css/charts.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        @yield('css')
        @yield('style')
    </head>
    <body>
        <!-- Navbar -->
        @include('partials.navbar-admin')
        <div class="container-dashboard">
            <!-- Conteúdo -->
            @yield('conteudo')
            <!-- Footer -->
            @include('partials.footer-dashboard')
        </div>
        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    </body>
</html>