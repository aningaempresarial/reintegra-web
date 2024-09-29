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

    @include('modals.alerta')

    <div class="h2 title mt-4">Minhas Publicações</div>

    <div class="div-banner">

        <div class="div-pesquisa">

            <div class="flex-1">
                <h2>Navegue pelas Publicações</h2>
                <input type="text" name="" id="searchbar-input" placeholder="Vaga para Estágio">
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
                <h4 class="txt-post">Adicionar Publicação</h4>
                <img class="img-post" src="{{ asset('icons/add.png') }}" alt="">
            </div>
        </div>
    </div>

    <table id="publicacoes-table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($publicacoes as $publicacao)
                <tr>
                    <td>{{ $publicacao->titulo }}</td>
                    <td>{{ $publicacao->descricao }}</td>
                    <td>{{ $publicacao->data }}</td>
                    <td>{{ $publicacao->status }}</td>
                    <td>
                        <button class="btn btn-edit">Editar</button>
                        <button class="btn btn-delete">Excluir</button>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>

    <div id="nenhuma-publicacao" style="display: none; text-align: center; margin-top: 20px;">
        Nenhuma publicação encontrada.
    </div>

    <div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="modalPostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPostLabel">Criar Publicação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalPostBody">
                <h2>aa</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
            </div>
            </div>
        </div>
    </div>


@endsection


@section('footer')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

<script>

$(document).ready(() => {
    var tabelaVazia = $('#publicacoes-table tbody tr').length === 0;

    if (tabelaVazia) {
        $('#nenhuma-publicacao').show();
        $('#publicacoes-table').hide();
    }

    $('#searchbar-input').on('keyup', () => {
        var value = $(this).val().toLowerCase();
        var hasResults = false;

        $('#publicacoes-table tbody tr').filter(() => {
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
    })
});

</script>
@endsection
