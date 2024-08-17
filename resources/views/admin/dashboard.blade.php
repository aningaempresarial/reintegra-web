@extends('layouts.layout-admin')
@section('titulo', 'Reintegra | Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
@endsection
@section('conteudo')
<h1 class="page-title">Bem vindo, Administrador!</h1>
<div class="panel cards-panel">
    <div class="card c1">
        <div class="card-body">
            This is some text within a card body.
        </div>
    </div>
    <div class="card c2">
        <div class="card-body">
            This is some text within a card body.
        </div>
    </div>
    <div class="card c3">
        <div class="card-body">
            This is some text within a card body.
        </div>
    </div>
    <div class="card c4">
        <div class="card-body">
            This is some text within a card body.
        </div>
    </div>
</div>
<div class="panel main-panel">
    <div id="my-chart">
        <table class="charts-css column multiple">
            <tr>
                <td style="--size: 0.4"> <span class="data"> $ 40K </span> </td>
                <td style="--size: 0.4"> <span class="data"> $ 40K </span> </td>
                <td style="--size: 0.4"> <span class="data"> $ 40K </span> </td>
            </tr>
        </table>
    </div>
</div>
@endsection