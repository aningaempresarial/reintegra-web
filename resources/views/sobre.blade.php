@extends('layouts.layout')
@section('titulo', 'Reintegra | Cadastro')
@section('css')
<link rel="stylesheet" href="{{ asset('css/sobre.css') }}">
@endsection
@section('conteudo')
<section class="sobre">
    <div class="box1">
        <video autoplay muted loop>
            <source src="{{ asset('videos/rio.mp4') }}" type="video/mp4">
            Seu navegador não suporta a tag de vídeo.
        </video>
    </div>
    <div class="box">
        <h1>Sobre nós</h1>
        <p>O Reintegra é uma plataforma inovadora criada para facilitar a reintegração de ex-presidiários na sociedade. Nossa missão é fornecer apoio e recursos essenciais, incluindo oportunidades de emprego, capacitação profissional e orientação pessoal, para que essas pessoas possam reconstruir suas vidas, superar desafios e contribuir positivamente para a comunidade.</p>
        <a class="btn btn-sobre" href="{{ url('/login') }}">Cadastrar minha empresa</a>
    </div>
</section>
@endsection