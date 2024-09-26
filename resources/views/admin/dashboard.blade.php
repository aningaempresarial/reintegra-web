@extends('layouts.layout-admin')
@section('titulo', 'Reintegra | Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
@endsection
@include('partials.profilebar')
@section('conteudo')
<h1 class="page-title">Bem vindo, <b class="name-deco">{{ $nome }}!</b></h1>
<div class="panel cards-panel">
    <div class="card c1">
        <div class="card-body">
            <div class="card-data">830</div>
            <div class="card-text">Usuários</div>
        </div>
    </div>
    <div class="card c2">
        <div class="card-body">
            <div class="card-data">47</div>
            <div class="card-text">Empresas</div>
        </div>
    </div>
    <div class="card c3">
        <div class="card-body">
            <div class="card-data">403</div>
            <div class="card-text">Vagas de emprego</div>
        </div>
    </div>
    <div class="card c4">
        <div class="card-body">
            <div class="card-data">521</div>
            <div class="card-text">ONGs</div>
        </div>
    </div>
</div>
<div class="panel main-panel panel-admin">
    <div class="row">
        <div class="panel">
            <h1 class="page-subtitle">Taxa de emprego por mês em 2024</h1>
            <div id="my-chart">
                <table class="charts-css column show-labels">

                    <caption class="title-chart">Taxa de emprego por mês em 2024</caption>

                    <tbody>
                        <tr>
                            <th scope="row"> Jan </th>
                            <td style="--size: 0.3; --color: #ffbaba"> <span class="data"> 30 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Fev </th>
                            <td style="--size: 0.5; --color: #ffdfba"> <span class="data"> 50 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Mar </th>
                            <td style="--size: 0.8; --color: #ffffba"> <span class="data"> 80 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Abr </th>
                            <td style="--size: 0.9; --color: #d0ffba"> <span class="data"> 90 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Mai </th>
                            <td style="--size: 0.65; --color: #bafffc"> <span class="data"> 65 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Jun </th>
                            <td style="--size: 0.45; --color: #bae2ff"> <span class="data"> 45 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Jul </th>
                            <td style="--size: 0.15; --color: #babfff"> <span class="data"> 15 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Ago </th>
                            <td style="--size: 0.32; --color: #e6baff"> <span class="data"> 32 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Set </th>
                            <td style="--size: 0.6; --color: #ffbaf9"> <span class="data"> 60 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Out </th>
                            <td style="--size: 0.9; --color: #ffbaba"> <span class="data"> 90 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Nov </th>
                            <td style="--size: 0.55; --color: #ffdfba"> <span class="data"> 55 </span> </td>
                        </tr>
                        <tr>
                            <th scope="row"> Dez </th>
                            <td style="--size: 0.4; --color: #ffffba"> <span class="data"> 40 </span> </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8" style="padding-left: 0">
            <div class="panel">
                <h1 class="page-subtitle">Crescimento dos usuários</h1>
                <div id="my-chart">
                    <table class="charts-css line multiple">
                        <caption class="title-chart">Crescimento da base de ex-presidiários
                            e empresas cadastradas
                        </caption>
                        <tr>
                            <td style="--start: 0.2; --end: 0.4;"> <span class="data"> Jan </span> </td>
                            <td style="--start: 0.4; --end: 0.6;"> <span class="data"> Jan </span> </td>
                        </tr>
                        <tr>
                            <td style="--start: 0.4; --end: 0.5;"> <span class="data"> Fev </span> </td>
                            <td style="--start: 0.6; --end: 0.6;"> <span class="data"> Fev </span> </td>
                        </tr>
                        <tr>
                            <td style="--start: 0.5; --end: 0.7;"> <span class="data"> Mar </span> </td>
                            <td style="--start: 0.6; --end: 0.6;"> <span class="data"> Mar </span> </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
        <div class="col-4" style="padding-right: 0">
            <div class="panel">
                <div class="title-notificacao">
                    <h1 class="page-subtitle">Notificações</h1>
                    <a href="#" class="button-viewmore">Ver mais</a>
                </div>
                <ul class="list-group list-notificacao">
                    <li class="list-group-item list-group-item-action"><img
                            src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span>
                    </li>
                    <li class="list-group-item list-group-item-action"><img
                            src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span>
                    </li>
                    <li class="list-group-item list-group-item-action"><img
                            src="{{ asset('images/image-icon.png') }}">Curso de estética <span>Há 1 minuto</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection