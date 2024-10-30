@extends('layouts.layout-empresa')
@section('titulo', 'Publicação | Reintegra')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
<link rel="stylesheet" href="{{ asset('css/cropper.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')  }}">
@endsection


@include('partials.profilebar')
@section('conteudo')

<div class="panel main-panel" style="padding-top: 0">
    <div class="h2 title mt-4">Minhas Publicações</div>

    <div class="div-banner">

        <div class="div-pesquisa">

            <div class="flex-1">
                <h2>Navegue pelas publicações</h2>
                <input type="text" name="" id="searchbar-input" placeholder="Ex.: Vaga para Estágio">
            </div>

        </div>

        <div class="div-image">
            <img src="{{ asset('images/pessoa-search.png') }}" alt="">
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-md-8"></div>
        <div class="col-md">
            <div class="div-add-post">
                <h4 class="txt-post">Nova Publicação</h4>
                <img class="img-post" src="{{ asset('icons/add.png') }}" alt="">
            </div>
        </div>
    </div>

    <table id="publicacoes-table" class="table table-hover align-middle table-lg">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Título</th>
                <th>Data Final</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($publicacoes as $publicacao)
                <tr>
                    <td>{{ $publicacao['categoriaPostagem'] }}</td>
                    <td>{{ $publicacao['tituloPostagem'] }}</td>
                    <td>{{ $publicacao['dataFim'] }}</td>
                    <td>{{ $publicacao['statusPostagem'] }}</td>
                    <td>
                        <button class="btn btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modalVisualizar{{ $publicacao['idPostagem'] }}"><img
                                src="{{ asset('images/view-icon.png') }}"></button>
                    </td>
                </tr>

                <div class="modal fade" id="modalVisualizar{{ $publicacao['idPostagem'] }}" tabindex="-1"
                    aria-labelledby="modalVisualizar{{ $publicacao['idPostagem'] }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalVisualizar{{ $publicacao['idPostagem'] }}Label">Veja sua
                                    publicação</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding: 30px">
                                <div class="centered-item">
                                    <div class="card">

                                        <div class="card-body">
                                            <div class="info-usuario">
                                                <img class="foto-perfil" src="{{ $API_URL . $data['fotoPerfil'] }}" alt=""
                                                    srcset="">
                                                <p class="nome-perfil">{{ $data['nomeEmpresa'] ?? $nome ?? 'Martha' }}</p>
                                            </div>
                                            <h3 class="tituloPost">{{ $publicacao['tituloPostagem'] }}</h3>
                                            <div class="textoPost">{!! nl2br(e($publicacao['conteudoPostagem'])) !!}</div>
                                        </div>

                                        <div class="card-top">
                                            <div class="image-wrapper">
                                                @if($publicacao['imagemPostagem'])
                                                    <img class="foto-imagem"
                                                        src="{{ $API_URL . $publicacao['imagemPostagem'] }}" alt="" srcset="">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Mais informações
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body" style="padding-bottom: 0">
                                                        @php
                                                        $vaga = null;
                                                        foreach ($vagas as $vagaItem) {
                                                            if ($vagaItem['idPostagem'] === $publicacao['idPostagem']) {
                                                                $vaga = $vagaItem;
                                                                break; 
                                                            }
                                                        }
                                                        @endphp
                                                        <p>Requisitos: {{ $vaga['requisitosVaga'] }}</p>
                                                        <p>Salário: R$ {{ $vaga['salarioVaga'] }}</p>
                                                        <p>Tipo de contrato: {{ $vaga['tipoContrato'] }}</p>
                                                        <p>Escolaridade mínima: {{ $vaga['tipoEscolaridade'] }}</p>
                                                        <p>Carga horária: {{ $vaga['cargaHoraria'] }} h</p>
                                                        <p>Horário: {{ $vaga['horarioVaga'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <hr>

                                <h2 class="title" style="font-size: 1.5rem">Candidatos</h2>
                                <p>Clodoaldo</p>
                                <p>Júnior</p>
                                <p>Ricardo</p>
                                @if (isset($publicacao['candidatos'][0]))
                                    <h2 class="title">Candidatos</h2>
                                    @foreach($publicacao['candidatos'] as $candidato)
                                        <p>{{ $candidato['nome'] }}</p>
                                    @endforeach
                                @endif

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </tbody>
    </table>

    <div id="nenhuma-publicacao" style="display: none; text-align: center; margin-top: 20px;">
        Nenhuma publicação encontrada.
    </div>
</div>

@endsection


@section('footer')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/dataTables.min.js') }}"></script>
<script src="{{ asset('js/cropper.min.js') }}"></script>

@include('empresa.modal-create-post')

@include('modals.alerta')

<script>

    $(document).ready(() => {
        var tabelaVazia = $('#publicacoes-table tbody tr').length === 0;

        if (tabelaVazia) {
            $('#nenhuma-publicacao').show();
            $('#publicacoes-table').hide();
        }

        $('#searchbar-input').on('keyup', function () {
            var value = $(this).val().toLowerCase();
            var hasResults = false;

            $('#publicacoes-table tbody tr').filter(function () {
                var match = $(this).text().toLowerCase().indexOf(value) > -1;
                $(this).toggle(match);
                if (match) hasResults = true;
            });

            if (!hasResults) {
                $('#nenhuma-publicacao').show();
            } else {
                $('#nenhuma-publicacao').hide();
            }
        });

        $('.div-add-post').on('click', () => {
            var modalPost = new bootstrap.Modal($('#modalPost'));
            modalPost.show();
        });
    });

    /*var modalPost = new bootstrap.Modal($('#modalPost'));
    modalPost.show();*/

</script>
@endsection