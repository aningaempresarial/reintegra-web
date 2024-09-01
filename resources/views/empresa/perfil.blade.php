@extends('layouts.layout-empresa')
@section('titulo', 'Reintegra | Perfil')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
@endsection
@section('conteudo')
    @include('partials.searchbar')
    <h1 class="page-title">Meu perfil</h1>
    <div class="panel">
        
    </div>
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