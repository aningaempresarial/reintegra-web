@extends('layouts.layout-admin')
@section('titulo', 'Reintegra | Configurações')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/config.css') }}">
@endsection
@include('partials.profilebar')
@section('conteudo')
<h1 class="page-title">Opções de configuração</h1>
<div class="panel">
    <ul class="list-group list-group-flush">
        <a class="list-group-item button-config" data-bs-toggle="modal" data-bs-target="#editModal">Editar dados de usuário</a>
        <a class="list-group-item button-config" data-bs-toggle="modal" data-bs-target="#editModalPass">Atualizar senha</a>
        <a class="list-group-item button-config">Gerenciar templates de e-mail</a>
        <a class="list-group-item button-config">Gerar relatório completo</a>
    </ul>
</div>

@include('user.edit')
@include('user.editpass')

@endsection


<script>
    @if (session('success'))
        alert('{{ session('success') }}');
    @endif
</script>

@include('admin.users.create-adm')


@if ($errors->any())
    <script>
            @foreach ($errors->all() as $error)
                alert('{{ $error }}')
            @endforeach
    </script>
@endif

