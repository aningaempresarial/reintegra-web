<div class="searchbar">
    <form class="d-flex p-2" role="search" action="/admin/users">
        <input class="form-control search-input" type="search" placeholder="Procurar algo" aria-label="Search" name="nome">
        <button class="btn btn-light" type="submit">Pesquisar</button>
    </form>
    <div class="profile-info">
        <p>{{ $data['nomeEmpresa'] ?? $nome ?? 'Martha' }}</p>
        <img class="profile-photo" src="{{ $API_URL . $usuario['fotoPerfil'] ?? asset('images/profile-photo.png') }}">
    </div>
</div>
