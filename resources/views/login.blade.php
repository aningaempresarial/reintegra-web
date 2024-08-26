@extends('layouts.layout')
@section('titulo', 'Reintegra | Login')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('conteudo')
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="/cadastrar-empresa" method="POST" class="sign-in-form" enctype="multipart/form-data">
                    @csrf
                    <h2 class="title">Cadastre-se</h2>
                    <div class="input-field">
                        <img src="{{ asset('images/input-name.png') }}">
                        <input type="text" placeholder="Nome da empresa" required autocomplete="off" name="nome"/>
                    </div>
                    <div class="input-field">
                        <img src="{{ asset('images/input-doc.png') }}">
                        <input type="text" placeholder="CNPJ" required autocomplete="off" name="cnpj"/>
                    </div>
                    <div class="input-field">
                        <img src="{{ asset('images/input-email.png') }}">
                        <input type="email" placeholder="E-mail" required autocomplete="off" name="email"/>
                    </div>
                    <div class="input-field">
                        <img src="{{ asset('images/input-pass.png') }}">
                        <input type="password" placeholder="Senha" required autocomplete="off" name="senha"/>
                    </div>
                    <div class="input-field">
                        <img src="{{ asset('images/input-pass.png') }}">
                        <input type="password" placeholder="Confirme a senha" required autocomplete="off" name="senha_confirmation"/>
                    </div>
                    <input class="btn" type="submit" value="Continuar">
                </form>
                <form action="/login-usuario" method="POST" class="sign-up-form" enctype="multipart/form-data">
                    @csrf
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <img src="{{ asset('images/input-name.png') }}">
                        <input type="text" name="identificacao" placeholder="Usuário, CNPJ ou e-mail" required autocomplete="off"/>
                    </div>
                    <div class="input-field">
                        <img src="{{ asset('images/input-pass.png') }}">
                        <input type="password" name="senha" placeholder="Senha" required autocomplete="off"/>
                    </div>
                    <input type="submit" value="Entrar" class="btn solid"/>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Já tem uma conta?</h3>
                    <p>
                    Sua empresa demonstra compromisso com a construção de uma sociedade mais justa e inclusiva!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Entrar
                    </button>
                </div>
                <img class="image" src="{{ asset('images/login.svg') }}">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>É novo por aqui?</h3>
                    <p>Estamos felizes em tê-lo! No Reintegra, acreditamos no poder da segunda chance.</p>
                    <button class="btn transparent" id="sign-in-btn">
                        Cadastrar
                    </button>
                </div>
                <img class="image" src="{{ asset('images/login.svg') }}">
            </div>
        </div>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>
@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
