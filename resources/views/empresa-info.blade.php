@extends('layouts.layout')
@section('titulo', 'Reintegra | Informações')
@section('css')
<link rel="stylesheet" href="{{ asset('css/infos.css') }}">
@endsection
@section('conteudo')
    <section class="container container-info">
        <h1 class="info-title">Impacto social</h1>
        <div class="card-group">
            <div class="card">
                <img class="img-qrcode" src="{{ asset('images/impacto-reintegrados.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">+ de <b>10.000</b> reintegrados</h5>
                </div>
            </div>
            <div class="card">
                <img class="img-qrcode" src="{{ asset('images/impacto-emprego.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">+ de <b>2.000</b> vagas de emprego</h5>
                </div>
            </div>
            <div class="card">
                <img class="img-qrcode" src="{{ asset('images/impacto-prj.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">+ de <b>100</b> projetos sociais</h5>
                </div>
            </div>
        </div>
        <div class="persuasao">
            <h1 class="info-title">Por que ajudar?</h1>
            <ul>
                <li><p class="info-text">Impacto social positivo</p></li>
                <li><p class="info-text">Valorização da sua marca</p></li>
                <li><p class="info-text">Benefícios econômicos</p></li>
            </ul>
            <a href="/login" class="btn btn-infos">Fazer parte dessa jornada</a>
        </div>
    </section>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>


@include('partials.footer')
@endsection

