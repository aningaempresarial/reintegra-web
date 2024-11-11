@extends('layouts.layout-empresa')
@section('titulo', 'Reintegra | Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
@endsection
@include('partials.profilebar')
<?php 
    use Carbon\Carbon;
    Carbon::setLocale('pt_BR');
    $post['dtPostagem'] = Carbon::parse($post['dtPostagem'])->diffForHumans();
?>
@section('conteudo')
@if (!empty($data) && is_array($data))
    <h1 class="page-title">É um prazer recebê-la, empresa <b class="name-deco">{{ $data['nomeEmpresa'] }}</b>!</h1>
    <div class="panel cards-panel">
        <div class="card c1">
            <div class="card-body">
                <div class="card-data">10</div>
                <div class="card-text">Visualizações</div>
            </div>
        </div>
        <div class="card c2">
            <div class="card-body">
                <div class="card-data">2</div>
                <div class="card-text">Conexões</div>
            </div>
        </div>
        <div class="card c3">
            <div class="card-body">
                <div class="card-data">6</div>
                <div class="card-text">Publicações</div>
            </div>
        </div>
        <div class="card c4">
            <div class="card-body">
                <div class="card-data">13</div>
                <div class="card-text">Inscritos</div>
            </div>
        </div>
    </div>
    <div class="panel main-panel panel-empresa">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="panel">
                        <h1 class="page-subtitle">Engajamento da última publicação</h1>
                        @if (isset($post['tituloPostagem']))
                            <div class="card last-post">
                                <img src="{{ $API_URL . $post['imagemPostagem'] }}" class="card-last-post-img-top">
                                <div class="card-last-post-body">
                                    <h5 class="card-last-post-title">{{ $post['tituloPostagem'] }}</h5>
                                    <p class="card-last-post-text">{{ $post['conteudoPostagem'] }}</p>
                                    <p class="card-last-post-text"><small class="text-body-secondary">Postado {{ $post['dtPostagem'] }}</small></p>
                                    <h4><span class="badge text-bg-primary">{{ $post['candidatos'] }} candidatos</span></h4>
                                </div>
                            </div>
                        @else
                            <p style="margin: 20px; padding: 8px; margin-top: 0; font-size: 1.3rem">Nenhuma postagem publicada.
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="panel">
                        <div class="title-notificacao">
                            <h1 class="page-subtitle">Minhas últimas postagens</h1>
                            <a href="#" class="button-viewmore">Ver mais</a>
                        </div>
                        <div class="posts-panel">
                            <div class="card card-post mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4 card-post-img">
                                        <img src="{{ asset('images/postagem-pic.png') }}" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-post-body">
                                            <h5 class="card-post-title">Curso de datilografia</h5>
                                            <p class="card-post-text">Uma pequena descrição sobre a publicação.</p>
                                            <p class="card-post-text"><small class="text-body-secondary">12
                                                    visualizações</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-post mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4 card-post-img">
                                        <img src="{{ asset('images/postagem-pic.png') }}" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-post-body">
                                            <h5 class="card-post-title">Curso de datilografia</h5>
                                            <p class="card-post-text">Uma pequena descrição sobre a publicação.</p>
                                            <p class="card-post-text"><small class="text-body-secondary">12
                                                    visualizações</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-left: 30px" class="col-4">
                <div class="row">
                    <div class="panel">
                        <div class="title-notificacao">
                            <h1 class="page-subtitle">Notificações</h1>
                            <a href="#" class="button-viewmore">Ver mais</a>
                        </div>
                        <ul class="list-group list-notificacao">
                            <li class="list-group-item list-group-item-action"><img
                                    src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span>
                            </li>
                            <li class="list-group-item list-group-item-action"><img
                                    src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span>
                            </li>
                            <li class="list-group-item list-group-item-action"><img
                                    src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span>
                            </li>
                            <li class="list-group-item list-group-item-action"><img
                                    src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span>
                            </li>
                            <li class="list-group-item list-group-item-action"><img
                                    src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span>
                            </li>
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