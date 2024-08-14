@extends('layouts.layout')
@section('titulo', 'Reintegra | Cadastro')
@section('css')
<link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
@endsection
@section('conteudo')
<div class="container form-container">
    <h2 class="title">Cadastro</h2>
    <form action="{{ url('/confirmar-email') }}">
        <div class="input-field">
            <input type="text" placeholder="Telefone" required autocomplete="off"/>
        </div>
        <div class="input-field input-group">
            <input type="text" placeholder="Logradouro" required autocomplete="off">
            <input type="text" placeholder="Nº" required autocomplete="off">
        </div>
        <div class="input-field">
            <input type="text" placeholder="CEP" required autocomplete="off"/>
        </div>
        <div class="input-field">
            <input type="text" placeholder="Bairro" required autocomplete="off"/>
        </div>
        <div class="input-field input-group">
            <input type="text" placeholder="Cidade" required autocomplete="off">
            <input type="text" placeholder="UF" required autocomplete="off">
        </div>
        <div class="input-field">
            <input type="password" placeholder="Senha" required autocomplete="off"/>
        </div>
        <div class="input-field">
            <input type="password" placeholder="Confirme a senha" required autocomplete="off"/>
        </div>
        <input class="btn" type="submit" value="Enviar">
    </form>
</div>
@endsection