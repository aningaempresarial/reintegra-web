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
            data-bs-target="#editModal">Editar dados de perfil</a>
            <a class="list-group-item button-config">Gerenciar templates de e-mail</a>
            <a class="list-group-item button-config">Gerar relatório completo</a>
        </ul>
    </div>
@include('empresa.edit')

@endsection