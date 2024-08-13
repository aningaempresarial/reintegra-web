@extends('layouts.dashboard-layout')
@section('titulo', 'Reintegra | Usuários')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('conteudo')
<div class="container-dashboard">
    <h1>Usuários cadastrados</h1>
    <div class="panel">
        <form class="d-flex" role="search">
            <input class="form-control" type="search" placeholder="Procurar usuário" aria-label="Search">
            <button class="btn btn-light" type="submit">Pesquisar</button>
        </form>
        <select class="form-select" aria-label="Default select example">
            <option selected>Filtrar tipo de usuário</option>
            <option value="1">Administrador</option>
            <option value="2">Empresa</option>\
            <option value="3">ONG</option>\
        </select>
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Tipo de usuário</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Aline</td>
                    <td>alininha</td>
                    <td>Administrador</td>
                    <td>Ativo</td>
                    <td><a href="{{ url('admin/dashboard/users/edit') }}"><img src="{{ asset('images/edit-icon.png') }}" class="edit-icon"></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection