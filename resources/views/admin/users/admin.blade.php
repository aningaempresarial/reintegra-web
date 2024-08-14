@extends('layouts.dashboard-layout')
@section('titulo', 'Reintegra | Usuários')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard-users.css') }}">
@endsection
@section('conteudo')
<div class="container-dashboard">
    <div class="searchbar">
        <form class="d-flex p-2" role="search">
            <input class="form-control search-input" type="search" placeholder="Procurar algo" aria-label="Search">
            <button class="btn btn-light" type="submit">Pesquisar</button>
        </form>
    </div>
    <h1 class="page-title">Administradores cadastrados</h1>
    <button type="button" class="btn btn-light btn-add-admin" data-bs-toggle="modal"
        data-bs-target="#addAdminModal">Adicionar administrador</button>
    <div class="panel">
        <table class="table table-hover align-middle text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
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
                    <td>Ativo</td>
                    <td><a href="{{ url('admin/dashboard/users/edit') }}"><img src="{{ asset('images/edit-icon.png') }}"
                                class="icon"></a></td>
                    <td><a href="{{ url('admin/dashboard/users/edit') }}"><img
                                src="{{ asset('images/block-icon.png') }}" class="icon"></a></td>
                    <td><a href="{{ url('admin/dashboard/users/edit') }}"><img
                                src="{{ asset('images/delete-icon.png') }}" class="icon"></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    @include('partials.dashboard-footer')
</div>

<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <label class="form-label">Nome</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Text input with dropdown button">
                        <select class="form-select">
                            <option selected>Nível</option>
                            <option value="1">Supremo</option>
                            <option value="2">Comum</option>
                        </select>
                    </div>
                    <label class="form-label">CPF</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Text input with dropdown button">
                    </div>
                    <label class="form-label">E-mail</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Text input with dropdown button">
                    </div>
                    <button type="submit" class="btn btn-light">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection