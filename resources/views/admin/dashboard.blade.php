@extends('layouts.layout-admin')
@section('titulo', 'Reintegra | Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
@endsection
@include('partials.profilebar')
@section('conteudo')
<h1 class="page-title">Bem vindo, {{ $nome }}!</h1>
<div class="panel cards-panel">
    <div class="card c1">
        <div class="card-body">
            <div>830</div>
            <div>Usuários</div>
        </div>
    </div>
    <div class="card c2">
        <div class="card-body">
            <div>47</div>
            <div>Empresa</div>
        </div>
    </div>
    <div class="card c3">
        <div class="card-body">
            <div>403</div>
            <div>Vagas de emprego</div>
        </div>
    </div>
    <div class="card c4">
        <div class="card-body">
            <div>521</div>
            <div>ONGs</div>
        </div>
    </div>
</div>
<div class="panel main-panel">
    <div id="my-chart">
        <table class="charts-css column show-labels show-heading">

            <caption style="text-align: center; padding-bottom: 10px"> Taxa de emprego por mês em 2024</caption>

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
@endsection
