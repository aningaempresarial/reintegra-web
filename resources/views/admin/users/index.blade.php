@extends('layouts.layout-admin')
@section('titulo', 'Reintegra | Usuários')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
@endsection
@section('conteudo')
@include('partials.searchbar')
<h1 class="page-title">Usuários cadastrados</h1>
<button type="button" class="btn btn-light btn-add-admin" data-bs-toggle="modal"
    data-bs-target="#addAdminModal">Adicionar administrador</button>
<div class="panel">
    <form action="/admin/users" method="get" id="filterForm">
        <select class="form-select" aria-label="Default select example" name="tipoEntidade" onchange="submitForm()">
            <option selected>Filtrar tipo de usuário</option>
            <option value="">Todos</option>
            <option value="admin0">Administrador Supremo</option>
            <option value="admin1">Administrador Comum</option>
            <option value="empresa">Empresa</option>
            <option value="ong">ONG</option>
            <option value="ex-detento">Ex Detento</option>
        </select>
    </form>

    <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
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
                    <td><a href="{{ url('admin/users/edit') }}"><img src="{{ asset('images/edit-icon.png') }}"
                                class="icon"></a></td>
                    <td><a href="{{ url('admin/dashboard/users/edit') }}"><img src="{{ asset('images/block-icon.png') }}"
                                class="icon"></a></td>
                    <td><a href="{{ url('admin/users/edit') }}"><img src="{{ asset('images/delete-icon.png') }}"
                                class="icon"></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
    }
</script>

@include('admin.users.create')

@endsection
