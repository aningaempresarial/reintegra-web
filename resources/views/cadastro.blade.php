@extends('layouts.layout')
@section('titulo', 'Reintegra | Cadastro')
@section('css')
<link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
@endsection
@section('conteudo')
<div class="container form-container">
    <h2 class="title">Agora, falta pouco!</h2>
    <form action="{{ url('/cadastrar-infos-empresa') }}">
        <div class="input-field">
            <input type="text" placeholder="Telefone" required autocomplete="off" name="telefone"/>
        </div>
        <div class="input-field">
            <input type="text" placeholder="CEP" required autocomplete="off" name="cep" id="cep" onblur="consultarCep()"/>
        </div>
        <div class="input-field input-group">
            <input type="text" placeholder="Logradouro" required autocomplete="off" name="logradouro" id="logradouro">
            <input type="text" placeholder="Nº" required autocomplete="off" name="num">
        </div>
        <div class="input-field">
            <input type="text" placeholder="Bairro" required autocomplete="off" name="bairro" id="bairro"/>
        </div>
        <div class="input-field input-group">
            <input type="text" placeholder="Cidade" required autocomplete="off" name="cidade" id="cidade">
            <input type="text" placeholder="UF" required autocomplete="off" name="estado" id="uf">
        </div>
        <input class="btn" type="submit" value="Enviar">
    </form>
</div>
@endsection
<script src="{{ asset("js/cep.js") }}"></script>