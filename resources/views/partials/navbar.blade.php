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
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/sobre') }}">Sobre nós</a>
                </li>
                <li class="nav-item login-button">
                    <a class="nav-link" href="{{ url('/login') }}">Cadastro</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
