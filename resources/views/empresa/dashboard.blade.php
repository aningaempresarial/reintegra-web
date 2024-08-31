@extends('layouts.layout-empresa')
@section('titulo', 'Reintegra | Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
@endsection
@include('partials.profilebar')
@section('conteudo')
@if (!empty($data) && is_array($data))
    <h1 class="page-title">É um prazer recebê-la, empresa <b>{{ $data['nomeEmpresa'] }}</b>!</h1>
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

    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="welcomeModalLabel">Cadastro concluído 🥳</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bem-vinda ao Reintegra, empresa <b>{{ $data['nomeEmpresa'] }}</b>. Estamos felizes de tê-la conosco!
                </div>
            </div>
        </div>
    </div>
@else
    <p>Nenhum dado disponível para exibir.</p>
@endif

@if (session('acesso') == 'primeiro')
    {{ session(['acesso' => '']) }}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
            myModal.show();
        });
    </script>
@endif
@endsection