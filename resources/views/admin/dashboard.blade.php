@extends('layouts.dashboard-layout')
@section('titulo', 'Reintegra | Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('conteudo')
<div class="container-dashboard">
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
    <div class="panel"></div>
    @include('partials.dashboard-footer')
</div>
@endsection