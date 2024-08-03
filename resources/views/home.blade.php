@extends('layouts.layout')
@section('titulo', 'Reintegra | Home')
@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('style')
<!-- Não deu para colocar a imagem de fundo pelo css, por isso está aqui -->
<style>
    .home-doacao {
        background-image: url("{{ asset('images/fundo.svg') }}");
    }
</style>
@endsection
@section('conteudo')
    <!-- Seção de doação -->
    <section id="doacao" class="home-doacao">
        <div>
            <img src="{{ asset('images/img-doacao.png') }}">
        </div>
        <div>
            <h1>Pix Reintegra</h1>
            <p>Fortaleça organizações que quebram o ciclo da criminalidade.</p>
            <a href="{{ url('/doacao') }}">Doar</a>
        </div>
    </section>
    <!-- Seção de divulgação do app -->
    <section id="app">
        <h1 class='title-app'>Conheça o app Reintegra!</h1>
        <div class="home-app">
            <div>
                <img src="{{ asset('images/img-app.png') }}" width="400">
            </div>
            <div>
                <h1>Disponível para baixar em:</h1>
                <a href=""><img src="{{ asset('images/img-googleplay.png') }}" width="200"></a>
                <a href=""><img src="{{ asset('images/img-appstore.png') }}" width="200"></a>
            </div>
        </div>
    </section>
@endsection

