@extends('layouts.layout-empresa')
@section('titulo', 'Reintegra | Configurações')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
@endsection

@include('modals.alerta')
@section('conteudo')
    @include('partials.searchbar')
    <h1 class="page-title">Opções de configuração</h1>
    <div class="panel">
        <ul class="list-group list-group-flush">
            <a class="list-group-item button-config" data-bs-toggle="modal"
            data-bs-target="#editModalEmpresa">Editar dados da empresa</a>
            <a class="list-group-item button-config" data-bs-toggle="modal" data-bs-target="#editModal">Editar dados de usuário</a>
            <a class="list-group-item button-config" data-bs-toggle="modal" data-bs-target="#editModalPass">Atualizar senha</a>
            <a class="list-group-item button-config">Gerenciar templates de e-mail</a>
            <a class="list-group-item button-config">Gerar relatório completo</a>
            <a class="list-group-item button-config" data-bs-toggle="modal" data-bs-target="#inativaContaModal">Inativar conta</a>
        </ul>
    </div>

@include('empresa.edit')
@include('empresa.inativa-conta')
@include('user.edit')
@include('user.editpass')

<script src="{{ asset('js/cep.js') }}"></script>
<script src="{{ asset('js/editar-endereco.js') }}"></script>
@endsection

@section('footer')


<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            showAlert('ERRO','{{ $error }}');
        @endforeach
    @endif


    @if (session('success'))
        showAlert('AVISO','{{ session('success') }}');
    @endif
</script>

@endsection



@include('admin.users.create')
