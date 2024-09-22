@extends('layouts.layout')
@section('titulo', 'Reintegra | Login')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@include('modals.alerta')

@section('conteudo')
<section id="login">
    <div class="container-login">

        <div class="row">
            <div class="col-md">
                <div class="image-banner">
                    <img src="{{ asset('images/logo-white.png') }}" alt="">
                    <h3>Abrindo portas, reescrevendo destinos.</h3>
                </div>
            </div>
            <div class="col-md">

                <div class="step ">

                    <form action="/login-usuario" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="title">Entrar na sua conta</h2>
                        <div class="input-field">
                            <img src="{{ asset('images/input-name.png') }}">
                            <input type="text" name="identificacao" placeholder="Usuário, CNPJ ou e-mail" required autocomplete="off"/>
                        </div>
                        <div class="input-field mb-5">
                            <img src="{{ asset('images/input-pass.png') }}">
                            <input type="password" name="senha" placeholder="Senha" required autocomplete="off"/>
                            <p class="esqueceu-senha">Esqueceu a Senha?</p>
                        </div>
                        <input type="submit" value="Entrar" class="btn solid"/>

                        <p class="new-account-text">Ainda não possui conta? <span class="destaque" id="btn-next">Criar uma conta!</span></p>
                    </form>

                </div>


                <div class="step active">

                    <form>
                        <h2 class="title">Escolha o tipo de conta:</h2>

                        <div class="div-contas">

                            <div class="conta conta-ong">
                                <img src="{{ asset('images/ong-icon.png') }}" alt="">
                                <h2>ONG</h2>
                            </div>

                            <div class="conta conta-empresa">
                                <img src="{{ asset('images/empresa-icon.png') }}" alt="">
                                <h2>Empresa</h2>
                            </div>
                        </div>

                        <p class="new-account-text">Já possui conta? <span class="destaque" id="btn-prev">Entre agora!</span></p>

                    </form>

                </div>

            </div>
        </div>

    </div>
</section>

    <script src="{{ asset('js/login.js') }}"></script>

@endsection

@if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        showAlert('Xiiii... Deu Erro!', '{{ $error }}');
    </script>
    @endforeach
@endif

