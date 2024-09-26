<nav class="navbar sticky-top navbar-expand-lg">
    <div class="container-fluid">
        <a href="{{ url('/') }}">
            <img class="logo" src="{{ asset('images/logo.png') }}" alt="Navbar">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item {{ Request::is('/') ? 'selected-item' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Início</a>
                </li>
                <li class="nav-item {{ Request::is('sobre') ? 'selected-item' : '' }}">
                    <a class="nav-link" href="{{ url('/sobre') }}">Sobre nós</a>
                </li>
                <li class="nav-item {{ Request::is('login') ? 'selected-item' : '' }}">
                    <a class="nav-link" href="{{ url('/login') }}">Entrar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
