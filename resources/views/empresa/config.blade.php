@extends('layouts.layout-empresa')
@section('titulo', 'Reintegra | Configurações')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
@endsection
@section('conteudo')
    @include('partials.searchbar')
    <h1 class="page-title">Opções de configuração</h1>
    <div class="panel">
        <ul class="list-group list-group-flush">
            <a class="list-group-item button-config" data-bs-toggle="modal"
            data-bs-target="#editModalEmpresa">Editar dados da empresa</a>
            <a class="list-group-item button-config" data-bs-toggle="modal" data-bs-target="#editModal">Editar dados de usuário</a>
            <a class="list-group-item button-config" data-bs-toggle="modal" data-bs-target="#editModalPass">Atualizar senha</a>
            <a class="list-group-item button-config">Gerenciar templates de e-mail</a>
            <a class="list-group-item button-config">Gerar relatório completo</a>
            <a class="list-group-item button-config">Inativar conta</a>
        </ul>
    </div>

@include('empresa.edit')
@include('user.edit')
@include('user.editpass')

<script src="{{ asset('js/cep.js') }}"></script>
@endsection

@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <ul style="list-style: none; margin: 0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    @if (session('success'))
        alert('{{ session('success') }}');
    @endif
</script>

@include('admin.users.create')
