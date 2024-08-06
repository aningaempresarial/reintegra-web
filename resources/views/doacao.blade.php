@extends('layouts.layout')
@section('titulo', 'Reintegra | Doação')
@section('css')
<link rel="stylesheet" href="{{ asset('css/doacao.css') }}">
@endsection
@section('style')
    <style>
        .doacao-cards {
            background-image: url("{{ asset('images/fundo-doacao.png') }}");
        }
    </style>
@endsection
@section('conteudo')
    <section class="doacao-cards">
        <h1>Faça o bem que o resto vem!</h1>
        <div class="card-group">
            <div class="card">
                <img class="img-qrcode" src="{{ asset('images/qrcode1.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">R$ 1,00</h5>
                    <a href=""><p>Copiar</p></a>
                </div>
            </div>
            <div class="card">
                <img class="img-qrcode" src="{{ asset('images/qrcode1.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">R$ 5,00</h5>
                    <a href=""><p>Copiar</p></a>
                </div>
            </div>
            <div class="card">
                <img class="img-qrcode" src="{{ asset('images/qrcode1.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">R$ 10,00</h5>
                    <a href=""><p>Copiar</p></a>
                </div>
            </div>
        </div>
    </section>
@endsection