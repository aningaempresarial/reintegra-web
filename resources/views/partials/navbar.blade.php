<nav class="navbar sticky-top navbar-expand-lg">
    <div class="container-fluid">
        <img class="logo" src="{{ asset('images/logo.png') }}" alt="Navbar">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/sobre') }}">Sobre nós</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/cadastro') }}">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>