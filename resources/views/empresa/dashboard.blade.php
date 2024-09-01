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
    <div class="panel main-panel panel-empresa">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="panel">
                        <h1 class="page-subtitle">Engajamento da última publicação</h1>
                        <div class="container-tables">
                            <table class="table table-publicacoes">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan='2' class="table-header">Publicação: Vaga de atendente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Visualizações:</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Curtidas:</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>Inscrições:</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-publicacoes">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan='2' class="table-header">Detalhes da vaga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quantidade de vagas:</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>Nível:</td>
                                        <td>Médio</td>
                                    </tr>
                                    <tr>
                                        <td>Habilidades desejadas:</td>
                                        <td>Comunicação</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel">
                        <h1 class="page-subtitle">Minhas publicações</h1>
                    </div>
                </div>
            </div>
            <div style="margin-left: 30px" class="col-4">
                <div class="row">
                    <div class="panel">
                        <h1 class="page-subtitle">Notificações</h1>
                        <ul class="list-group list-notificacao">
                            <li class="list-group-item"><img src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span></li>
                            <li class="list-group-item"><img src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span></li>
                            <li class="list-group-item"><img src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span></li>
                            <li class="list-group-item"><img src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span></li>
                            <li class="list-group-item"><img src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span></li>
                            <li class="list-group-item"><img src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span></li>
                            <li class="list-group-item"><img src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

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