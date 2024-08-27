@extends('layouts.layout')
@section('titulo', 'Reintegra | Cadastro')
@section('css')
<link rel="stylesheet" href="{{ asset('css/sobre.css') }}">
@endsection
@section('conteudo')
<section class="sobre">
    <div class="sobre-text">
        <h1>Sobre <span>nós</span></h1>
        <p>O projeto "Reintegra" visa facilitar a reintegração de ex-presidiários à sociedade, abordando as complexas
            questões enfrentadas por essa população ao sair do sistema prisional. A iniciativa se propõe a oferecer
            apoio integral, incluindo assistência psicológica, orientação profissional e suporte social, para reduzir a
            reincidência criminal e promover uma reintegração bem-sucedida</p>
        <button>Learn More</button>
    </div>
    <div class="sobre-image">
        <img src="{{ asset('images/sobre.gif') }}">
    </div>
</section>
@endsection