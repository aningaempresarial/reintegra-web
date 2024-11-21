@extends('layouts.layout-admin')
@section('titulo', 'Reintegra | Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
@endsection
@include('partials.profilebar')
@section('conteudo')
<h1 class="page-title">Bem vindo, <b class="name-deco">{{ $nome }}!</b></h1>
<div class="panel cards-panel">
    <div class="card c1">
        <div class="card-body">
            <div class="card-data">{{ $stats['totalUsuarios'] }}</div>
            <div class="card-text">Usuários</div>
        </div>
    </div>
    <div class="card c2">
        <div class="card-body">
            <div class="card-data">{{ $stats['totalEmpresas'] }}</div>
            <div class="card-text">Empresas</div>
        </div>
    </div>
    <div class="card c3">
        <div class="card-body">
            <div class="card-data">{{ $stats['totalExDetentos'] }}</div>
            <div class="card-text">Ex-detentos</div>
        </div>
    </div>
    <div class="card c4">
        <div class="card-body">
            <div class="card-data">{{ $stats['totalVagas'] }}</div>
            <div class="card-text">Vagas de emprego</div>
        </div>
    </div>
</div>
<div class="panel main-panel panel-admin">
    <div class="row">
        <div class="col" style="padding-left: 0">
            <div class="panel">
                <h1 class="page-subtitle" style="padding-bottom: 0; margin-bottom: 0">Empresas por setor</h1>
                <div class="chart-container">
                    <div id="piechart_values"></div>
                </div>
            </div>
        </div>
        <div class="col-8" style="padding-right: 0">
            <div class="panel">
                <h1 class="page-subtitle" style="padding-bottom: 0; margin-bottom: 0">Vagas abertas por mês</h1>
                <div class="chart-container">
                    <div id="barchart_values"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8" style="padding-left: 0">
            <div class="panel">
                <h1 class="page-subtitle" style="padding-bottom: 0; margin-bottom: 0">Cadastros de usuários mensais</h1>
                <div class="chart-container">
                    <div id="linechart_values"></div>
                </div>
            </div>
        </div>
        <div class="col-4" style="padding-right: 0">
            <div class="panel">
                <div class="title-notificacao">
                    <h1 class="page-subtitle">Últimos cadastros</h1>
                    <a href="#" class="button-viewmore">Ver mais</a>
                </div>
                <ul class="list-group list-notificacao">
                    @foreach ($cadastros as $cadastro)
                            <li class="list-group-item list-group-item-action">
                            <img
                            src="{{ $API_URL . $cadastro['fotoPerfil'] }}" onerror="this.src='{{ asset('images/profile-photo.png') }}'">{{ $cadastro['nomeUsuario'] }} <span class="tiny-text">Cadastro feito {{ $cadastro['dataCriacao'] }}</span>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{ asset('js/admin-barchart.js') }}"></script>
<script src="{{ asset('js/admin-piechart.js') }}"></script>
<script src="{{ asset('js/admin-linechart.js') }}"></script>