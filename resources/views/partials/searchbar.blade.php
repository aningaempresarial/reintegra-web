<div class="searchbar">
    <form class="d-flex p-2" role="search">
        <input class="form-control search-input" type="search" placeholder="Procurar algo" aria-label="Search">
        <button class="btn btn-light" type="submit">Pesquisar</button>
    </form>
    <div class="profile-info">
        <p>{{ session('user') }}</p>
        <img class="profile-photo" src="{{ asset('images/profile-photo.png') }}">
    </div>
</div>