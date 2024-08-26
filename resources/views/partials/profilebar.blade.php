<div class="profilebar">
    <div class="profile-info">
        <p>{{ session('user') ?? $nome ?? 'Martha' }}</p>
        <img class="profile-photo" src="{{ asset('images/profile-photo.png') }}">
    </div>
</div>
