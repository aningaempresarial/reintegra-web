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