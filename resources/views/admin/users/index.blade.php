@extends('layouts.layout-admin')
@section('titulo', 'Reintegra | Usuários')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/users-admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')  }}">
@endsection

@include('partials.profilebar')
@section('conteudo')
<div class="h2 title mt-4">Usuários cadastrados</div>

<div class="div-banner">

    <div class="div-pesquisa">

        <div class="flex-1">
            <h2 class="subtitle">Encontre um usuário</h2>
            <input type="text" id="searchbar-input" placeholder="Ex.: Maria José">
        </div>

    </div>

    <div class="div-image">
        <img src="{{ asset('images/boneco-adm.png') }}">
    </div>

</div>

<button type="button" class="btn btn-light btn-add-admin" data-bs-toggle="modal"
    data-bs-target="#addAdminModal">Adicionar administrador</button>
<div class="panel main-panel">
    <div class="table-responsive">
        <table class="table table-hover align-middle text-center" id="publicacoes-table">
            <thead class="style-thead">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Tipo de usuário</th>
                    <th scope="col">Status</th>
                    <th>Editar</th>
                    <th>Bloquear</th>
                    <th>Banir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario['nomeUsuario'] }}</td>
                        <td>{{ $usuario['usuario'] }}</td>
                        <td>{{ $usuario['tipoEntidade'] }}</td>
                        <td>{{ $usuario['statusEntidade'] }}</td>
                        <td><a href="admin/users/edit"><img src="{{ asset('images/edit-icon.png') }}" class="icon edit-icon"></a></td>

                        <td>
                            <form action="/admin/change" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja bloquear este usuário?');"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="usuario" value="{{ $usuario['usuario'] }}">
                                <input type="hidden" name="status" value="bloqueado">
                                <button type="submit" style="border: none; background: none;">
                                    <img src="{{ asset('images/block-icon.png') }}" class="icon block-icon" alt="Excluir">
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="/admin/change" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="usuario" value="{{ $usuario['usuario'] }}">
                                <input type="hidden" name="status" value="excluido">
                                <button type="submit" style="border: none; background: none;">
                                    <img src="{{ asset('images/delete-icon.png') }}" class="icon delete-icon" alt="Excluir">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="nenhuma-publicacao" style="display: none; text-align: center; margin-top: 20px;">
        Nenhum usuário encontrado.
    </div>
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

        $('#searchbar-input').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            var hasResults = false;

            $('#publicacoes-table tbody tr').filter(function() {
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

@endsection


@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            alert('{{ $error }}')
        @endforeach
    </script>
@endif