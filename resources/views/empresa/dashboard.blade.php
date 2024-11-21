@extends('layouts.layout-empresa')
@section('titulo', 'Reintegra | Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
@endsection
@include('partials.profilebar')
<?php 
    use Carbon\Carbon;
Carbon::setLocale('pt_BR');
if (isset($post['dtPostagem'])) {
    $post['dtPostagem'] = Carbon::parse($post['dtPostagem'])->diffForHumans();
}
?>
@section('conteudo')
@if (!empty($data) && is_array($data))
    <h1 class="page-title">É um prazer recebê-la, empresa <b class="name-deco">{{ $data['nomeEmpresa'] }}</b>!</h1>
    <div class="panel cards-panel">
        <div class="card c1">
            <div class="card-body">
                <div class="card-data">{{ $dados['totalCandidatos'] }}</div>
                <div class="card-text">Candidatos</div>
            </div>
        </div>
        <div class="card c2">
            <div class="card-body">
                <div class="card-data">{{ $dados['totalVagas'] }}</div>
                <div class="card-text">Vagas</div>
            </div>
        </div>
        <div class="card c3">
            <div class="card-body">
                <div class="card-data">{{ $dados['totalDivulgacoes'] }}</div>
                <div class="card-text">Divulgações</div>
            </div>
        </div>
        <div class="card c4">
            <div class="card-body">
                <div class="card-data">{{ $dados['totalInformativos'] }}</div>
                <div class="card-text">Informativos</div>
            </div>
        </div>
    </div>
    <div class="panel main-panel panel-empresa">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="panel">
                        <h1 class="page-subtitle">Engajamento da última publicação de emprego</h1>
                        @if (isset($post['tituloPostagem']))
                            <div class="card last-post">
                                <img src="{{ $API_URL . $post['imagemPostagem'] }}" class="card-last-post-img-top">
                                <div class="card-last-post-body">
                                    <h5 class="card-last-post-title">{{ $post['tituloPostagem'] }}</h5>
                                    <p class="card-last-post-text">{{ $post['conteudoPostagem'] }}</p>
                                    <p class="card-last-post-text"><small class="text-body-secondary">Postado
                                            {{ $post['dtPostagem'] }}</small></p>
                                    <h4><span class="badge text-bg-primary">{{ $post['candidatos'] }} candidato(s)</span></h4>
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
                            <a href="{{ url('/empresa/posts') }}" class="button-viewmore">Ver mais</a>
                        </div>
                        <?php 
                                $i = 0
                            ?>
                        @if (count($posts) > 0)
                                <div class="posts-panel">
                                    @php        $i = 0; @endphp
                                    @foreach ($posts as $ps)
                                                @if ($i < 2)
                                                            <div class="card card-post mb-3">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4 card-post-img">
                                                                        <img src="{{ $API_URL . $ps['imagemPostagem'] }}" class="img-fluid rounded-start">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-post-body">
                                                                            <h5 class="card-post-title">{{ $ps['tituloPostagem'] }}</h5>
                                                                            @php
                                                                                Carbon::setLocale('pt_BR');
                                                                                $ps['dtPostagem'] = Carbon::parse($ps['dtPostagem'])->diffForHumans();

                                                                                $maxLength = 50;

                                                                                if (strlen($ps['conteudoPostagem']) > $maxLength) {
                                                                                    $cortada = substr($ps['conteudoPostagem'], 0, $maxLength) . "...";
                                                                                } else {
                                                                                    $cortada = $ps['conteudoPostagem'];
                                                                                }
                                                                            @endphp
                                                                            <p class="card-post-text">{{ $cortada }}</p>
                                                                            <p class="card-post-text"><small
                                                                                    class="text-body-secondary">{{ $ps['dtPostagem'] }}</small></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @php                $i++; @endphp
                                                @else
                                                    @break
                                                @endif
                                    @endforeach
                                </div>
                        @else
                            <p style="margin: 20px; padding: 8px; margin-top: 0; font-size: 1.3rem">Nenhuma postagem para
                                mostrar ainda.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div style="margin-left: 30px" class="col-4">
                <div class="row">
                    <div class="panel">
                        <div class="title-notificacao">
                            <h1 class="page-subtitle">Candidatações</h1>
                            <a href="{{ url('/empresa/posts') }}" class="button-viewmore">Ver mais</a>
                        </div>
                        <ul class="list-group list-notificacao">
                            @php
                                $candidatosAtivos = collect($candidatacoes)->filter(function ($candidato) {
                                    return $candidato['statusCandidato'] === 'ativo';
                                });
                            @endphp

                            @if ($candidatosAtivos->isNotEmpty())
                                @foreach ($candidatosAtivos as $candidato)
                                    <li class="list-group-item list-group-item-action">
                                        <img src="{{ $API_URL . $candidato['fotoPerfil'] }}"
                                            onerror="this.src='{{ asset('images/profile-photo.png') }}'">
                                        {{ $candidato['nomeExDetento'] }}
                                        <p style="margin: 5px; font-size: 1.3rem">
                                            Candidatou-se a {{ $candidato['nomeVaga'] }}
                                        </p>
                                    </li>
                                @endforeach
                            @else
                                <p style="margin: 20px; margin-top: 0; font-size: 1.3rem">Nenhum candidato para mostrar.</p>
                            @endif
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