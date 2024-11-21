@extends('layouts.layout-admin')
@section('titulo', 'Reintegra | Posts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/posts-admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')  }}">
@endsection

@include('partials.profilebar')
@section('conteudo')
<div class="panel main-panel" style="padding-top: 0">
    <div class="h2 title mt-4">Postagens criadas</div>

    <div class="div-banner">

        <div class="div-pesquisa">

            <div class="flex-1">
                <h2 class="subtitle">Encontre uma postagem</h2>
                <input type="text" id="searchbar-input" placeholder="Ex.: Vaga de atendente">
            </div>

        </div>

        <div class="div-image">
            <img src="{{ asset('images/boneco-post.png') }}">
        </div>

    </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center" id="publicacoes-table">
                <thead class="style-thead">
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Título</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Data de criação</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        @if ($post['statusPostagem'] == 'ativo')
                        <tr>
                            <td><img src="{{ $API_URL . $post['imagemPostagem'] }}" class="img-post" onerror="this.src='{{ asset('images/imagem-padrao.png') }}'"></td>
                            <td>{{ $post['tituloPostagem'] }}</td>
                            <td>{{ $post['categoriaPostagem'] }}</td>
                            <td>{{ $post['dataCriacao'] }}</td>
                            <td>
                                <form action="{{ url('delete-post/' . $post['idPostagem']) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este conteúdo?');"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="usuario" value="{{ $post['idPostagem'] }}">
                                    <input type="hidden" name="status" value="excluido">
                                    <button type="submit" style="border: none; background: none;">
                                        <img src="{{ asset('images/delete-icon.png') }}" class="icon delete-icon"
                                            alt="Excluir">
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="nenhuma-publicacao" style="display: none; text-align: center; margin-top: 20px;">
            Nenhum usuário encontrado.
        </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>

    <script>
        function submitForm() {
            document.getElementById('filterForm').submit();
        }

        @if (session('success'))
            alert('{{ session('success') }}');
        @endif
    </script>

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
        });

    </script>

    @include('admin.users.create-adm')
</div>
@endsection


@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            alert('{{ $error }}')
        @endforeach
    </script>
@endif