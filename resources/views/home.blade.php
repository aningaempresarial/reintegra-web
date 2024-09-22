@extends('layouts.layout')
@section('titulo', 'Reintegra | Home')
@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
@endsection
@section('style')
<!-- Não deu para colocar a imagem de fundo pelo css, por isso está aqui -->
<style>
    .home-doacao {
        background-image: url("{{ asset('images/fundo.svg') }}");
    }
</style>
@endsection

<!-- Esquecendo sessão -->
{{session()->flush();}}

@section('conteudo')
<!-- Seção de doação -->
<section id="doacao" class="home-doacao">
    <div>
        <img class="img-doacao" src="{{ asset('images/img-doacao.png') }}">
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
        <div class="img-app">
            <img src="{{ asset('images/img-app.png') }}">
        </div>
        <div class="img-install">
            <h1>Disponível para baixar em:</h1>
            <a href=""><img src="{{ asset('images/img-googleplay.png') }}"></a>
            <a href=""><img src="{{ asset('images/img-appstore.png') }}"></a>
        </div>
    </div>
</section>
<!-- Seção de destaques -->
<section class="destaques">
    <h1 class="destaques-title">Destaques</h1>
    <div class="carousel">
        <div class="carousel-item">
            <div class="card">
                <img src="{{ asset('images/d1.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Dunder Mifflin</h1>
                    <p class="card-text">Fornecendo soluções de papel personalizadas e de alta qualidade.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <img src="{{ asset('images/d2.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Inclusão Já</h1>
                    <p class="card-text">Promovendo a igualdade e a integração social através de ações transformadoras.
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <img src="{{ asset('images/d3.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Escola de Todos</h1>
                    <p class="card-text">Transformando vidas através da educação inclusiva e de qualidade.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <img src="{{ asset('images/d4.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Vozes da liberdade</h1>
                    <p class="card-text">Defendendo a liberdade de expressão em todas as suas formas.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-info">
    <h1 class="info-title">Quem pode ajudar?</h1>
    <div class="card-group">
        <div class="card">
            <img class="img-qrcode" src="{{ asset('images/ong-info.png') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">ONGs</h5>
                <a href="#" class="btn btn-infos">
                    <p>Saiba mais</p>
                </a>
            </div>
        </div>
        <div class="card">
            <img class="img-qrcode" src="{{ asset('images/empresa-info.png') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Empresas</h5>
                <a href="/info-empresa" class="btn btn-infos">
                    <p>Saiba mais</p>
                </a>
            </div>
        </div>
        <div class="card">
            <img class="img-qrcode" src="{{ asset('images/pessoas-info.png') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Pessoas</h5>
                <a class="btn btn-infos" href="">
                    <p>Saiba mais</p>
                </a>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="{{ asset('js/home.js') }}"></script>


@include('partials.footer')
@endsection

