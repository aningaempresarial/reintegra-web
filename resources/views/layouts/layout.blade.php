<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo')</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout-home.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('js/constantes.js') }}"></script>
        @yield('css')
        @yield('style')
    </head>
    <body>
        <div class="container-flex">
            <!-- Navbar -->
            @include('partials.navbar')
            <!-- Conteúdo -->
            @yield('conteudo')

        </div>
    </body>
</html>
