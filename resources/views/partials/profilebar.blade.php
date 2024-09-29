<div class="profilebar">
    <div class="profile-info">
        <p>{{ $data['nomeEmpresa'] ?? $nome ?? 'Martha' }}</p>
        <img class="profile-photo" src="{{ $API_URL . $data['fotoPerfil'] ?? asset('images/profile-photo.png') }}">
    </div>
</div>
