<div class="border-right bg-light sidebar" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <a href="{{ url('/admin/dashboard') }}" class="list-group-item list-group-item-action bg-light"><img src="{{ asset('images/logo-icon.png') }}" width="60px"></a>
        <a href="{{ url('/admin/dashboard') }}" class="list-group-item list-group-item-action bg-light"><img src="{{ asset('images/home-icon.png') }}" width="60px"><p>Início</p></a>
        <a href="{{ url('/admin/perfil') }}" class="list-group-item list-group-item-action bg-light"><img src="{{ asset('images/user-icon.png') }}" width="60px"><p>Meu perfil</p></a>
        <a href="{{ url('/admin/users') }}" class="list-group-item list-group-item-action bg-light"><img src="{{ asset('images/read-icon.png') }}" width="60px"><p>Gerenciar usuários</p></a>
        <a href="{{ url('/admin/posts') }}" class="list-group-item list-group-item-action bg-light"><img src="{{ asset('images/posts-icon.png') }}" width="60px"><p>Gerenciar postagens</p></a>
        <!-- <a href="{{ url(' ') }}" class="list-group-item list-group-item-action bg-light"><img src="{{ asset('images/read-icon.png') }}" width="60px"><p>Painel de relatórios</p></a> -->
        <a href="{{ url('/admin/config') }}" class="list-group-item list-group-item-action bg-light"><img src="{{ asset('images/config-icon.png') }}" width="60px"><p>Configurações</p></a>
        <a href="{{ url('/') }}" class="list-group-item list-group-item-action bg-light"><img src="{{ asset('images/logout-icon.png') }}" width="60px"><p>Desconectar</p></a>
    </div>
</div>
