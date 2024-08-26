@extends('layouts.layout-empresa')
@section('titulo', 'Reintegra | Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
@endsection
@include('partials.profilebar')
@section('conteudo')
    <h1 class="page-title">É um prazer recebê-la, empresa <b>{{ session('nome') }}</b>!</h1>
    <div class="panel cards-panel">
        <div class="card c1">
            <div class="card-body">
                <div>10</div>
                <div>Visualizações</div>
            </div>
        </div>
        <div class="card c2">
            <div class="card-body">
                <div>2</div>
                <div>Conexões</div>
            </div>
        </div>
        <div class="card c3">
            <div class="card-body">
                <div>6</div>
                <div>Publicações</div>
            </div>
        </div>
        <div class="card c4">
            <div class="card-body">
                <div>13</div>
                <div>Inscritos</div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
@endsection