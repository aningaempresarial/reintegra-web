@extends('layouts.layout')
@section('titulo', 'Reintegra | Login')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('conteudo')
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="#" class="sign-in-form">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="CNPJ ou e-mail" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Senha" />
                    </div>
                    <input type="submit" value="Entrar" class="btn solid"/>
                </form>
                <form action="#" class="sign-up-form">
                    <h2 class="title">Cadastre-se</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nome da empresa" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="CNPJ" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="E-mail" />
                    </div>
                    <input type="submit" class="btn" value="Continuar"/>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>É novo por aqui?</h3>
                    <p>
                    Estamos felizes em tê-lo! No Reintegra, acreditamos no poder da segunda chance.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Cadastrar
                    </button>
                </div>
                <img class="image" src="{{ asset('images/login.svg') }}">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Já tem uma conta?</h3>
                    <p>Sua empresa demonstra compromisso com a construção de uma sociedade mais justa e inclusiva!</p>
                    <button class="btn transparent" id="sign-in-btn">
                        Entrar
                    </button>
                </div>
                <img class="image" src="{{ asset('images/login.svg') }}">
            </div>
        </div>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>
@endsection