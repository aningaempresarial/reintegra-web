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
    <select class="form-select" aria-label="Default select example">
        <option selected>Filtrar tipo de usuário</option>
        <option value="1">Administrador</option>
        <option value="2">Empresa</option>\
        <option value="3">ONG</option>\
    </select>
    <table class="table table-hover align-middle text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
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
            <tr>
                <td>1</td>
                <td>Aline</td>
                <td>alininha</td>
                <td>Administrador</td>
                <td>Ativo</td>
                <td><a href="{{ url('admin/users/edit') }}"><img src="{{ asset('images/edit-icon.png') }}"
                            class="icon"></a></td>
                <td><a href="{{ url('admin/dashboard/users/edit') }}"><img src="{{ asset('images/block-icon.png') }}"
                            class="icon"></a></td>
                <td><a href="{{ url('admin/users/edit') }}"><img src="{{ asset('images/delete-icon.png') }}"
                            class="icon"></a></td>
            </tr>
        </tbody>
    </table>
</div>

@include('admin.users.create')

@endsection