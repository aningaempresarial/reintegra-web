@extends('layouts.layout')
@section('titulo', 'Sobre | Reintegra')
@section('css')
<link rel="stylesheet" href="{{ asset('css/sobre.css') }}">
@endsection
@section('conteudo')

<section class="full-screen-image">
    <img src="{{ asset('images/imagem1.jfif') }}" class="background-image">
    <div class="full-screen-text">
        <h1>Quem Somos</h1>
        <p>Somos uma empresa dedicada à reintegração de ex-presidiários na sociedade, acreditando na importância de
            oferecer oportunidades para reconstrução de vidas.</p>

    </div>
</section>

<section class="content-section">
    <div class="content-text">
        <h2>CONHEÇA NOSSA JORNADA</h2>
        <p>Desde o início de nossa missão, temos nos dedicado à reintegração de ex-presidiários na sociedade,
            acreditando que todos merecem uma segunda chance. Nossa jornada começou com a identificação das barreiras
            enfrentadas por aqueles que deixam o sistema prisional, incluindo estigmas sociais, dificuldades em
            encontrar emprego e acesso limitado a recursos de apoio.
            Através de parcerias com instituições, organizações não governamentais e a comunidade, desenvolvemos
            programas que oferecem capacitação profissional, apoio psicológico e orientação legal. Cada história de
            sucesso representa não apenas a superação individual, mas também um passo em direção a uma sociedade mais
            inclusiva e justa.

        <h2>NOSSA VISÃO</h2>
        <p>Um mundo inclusivo e acolhedor, onde ex-presidiários tenham a oportunidade de reconstruir suas vidas,
            contribuindo positivamente para a sociedade, livres do estigma e da marginalização.</p>

        <h2>NOSSA MISSÃO</h2>
        <p>Promover a reintegração de ex-presidiários por meio de programas de capacitação, apoio psicológico e
            oportunidades de emprego, buscando a transformação social e a diminuição da criminalidade, além de garantir
            dignidade e respeito a todos.</p>

        <h2>NOSSOS VALORES</h2>
        <p>•Respeito e Dignidade</p>
        <p>•Equidade e Justiça</p>
        <p>•Integridade</p>
        <p>•Solidariedade</p>
        <p>•IHumildad</p>

    </div>
    <div class="content-video">
        <video controls width="100%">
            <source src="{{ asset('videos/pit.mp4') }}" type="video/mp4">
        </video>
    </div>
</section>

@include('partials.footer')
@endsection