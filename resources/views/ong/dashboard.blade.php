@extends('layouts.layout-ong')
@section('titulo', 'Reintegra | Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-ong.css') }}">
@endsection
@include('partials.profilebar')
@section('conteudo')
<h1 class="page-title">É um prazer recebê-la, ONG <b class="name-deco">X</b>!</h1>
<div class="panel cards-panel">
    <div class="card c1">
        <div class="card-body">
            <div class="card-data">10</div>
            <div class="card-text">Visualizações</div>
        </div>
    </div>
    <div class="card c2">
        <div class="card-body">
            <div class="card-data">2</div>
            <div class="card-text">Conexões</div>
        </div>
    </div>
    <div class="card c3">
        <div class="card-body">
            <div class="card-data">6</div>
            <div class="card-text">Publicações</div>
        </div>
    </div>
    <div class="card c4">
        <div class="card-body">
            <div class="card-data">13</div>
            <div class="card-text">Inscritos</div>
        </div>
    </div>
</div>
<div class="panel main-panel panel-ong">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="panel">
                    <div class="title-div">
                        <h1 class="page-subtitle">Últimas arrecadações</h1>
                        <a href="#" class="button-viewmore">Ver mais</a>
                    </div>
                    <div>
                        <ul class="list-group list-div">
                            <li class="list-group-item list-group-item-action"><img style="border-radius: 100%"
                                    src="{{ asset('images/image-icon.png') }}"> Fulano doou R$ X <span>Há 1
                                    minuto</span>
                            </li>
                            <li class="list-group-item list-group-item-action"><img style="border-radius: 100%"
                                    src="{{ asset('images/image-icon.png') }}"> Ciclano doou R$ Y <span>Há 1
                                    minuto</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel">
                    <h1 class="page-subtitle">Índice das arrecadações</h1>
                    <div id="my-chart">
                        <table class="charts-css area multiple">
                            <tr>
                                <td style="--start: 0.2; --end: 0.4; --color: #b8efcd"> <span class="data"> Jan </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="--start: 0.4; --end: 0.5; --color: #b8efcd"> <span class="data"> Fev </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="--start: 0.5; --end: 0.3; --color: #b8efcd"> <span class="data"> Mar </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="--start: 0.3; --end: 0.7; --color: #b8efcd"> <span class="data"> Abr </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-left: 30px" class="col-3">
            <div class="row">
                <div class="panel">
                    <div class="title-div">
                        <h1 class="page-subtitle">Área Pix</h1>
                    </div>
                    <div class="pix-div">
                        <div class="card" style="width: 18rem; margin: 0">
                            <img src="{{ asset('images/qrcode1.png') }}" class="card-img-top">
                            <div class="card-body" style="padding: 0">
                                <p class="card-text"></p>
                            </div>
                        </div>
                        <table class="table table-bordered" style="width: fit-content">
                            <tbody>
                                <tr>
                                    <th scope="row">Chave:</th>
                                    <td>000.000.000-00</td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="button-pix" href="">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection