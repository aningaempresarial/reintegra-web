@extends('layouts.layout-empresa')
@section('titulo', 'Reintegra | Mensagens')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
@endsection
@include('partials.profilebar')
@section('conteudo')
<div class="panel main-panel panel-empresa">
    <div class="row">
        <div class="col-4">
            <div class="panel">
                <ul class="list-group list-contato">
                    <li class="list-group-item list-group-item-action">
                        <img style="border-radius: 100%" src="{{ asset('images/image-icon.png') }}"><span>Fulano</span>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <img style="border-radius: 100%" src="{{ asset('images/image-icon.png') }}"><span>Fulano</span>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <img style="border-radius: 100%" src="{{ asset('images/image-icon.png') }}"><span>Fulano</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="panel">
                <h1 class="nome-contato">Fulano</h1>
                <ul class="list-group list-contato">
                    <li class="list-group-item list-group-item-action list-message-contato">
                        <img style="border-radius: 100%" src="{{ asset('images/image-icon.png') }}">
                        <div class="rabinho-contato"></div>
                        <div class="message-box-contato">
                        a
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action list-message">
                        <div class="message-box">
                        a
                        </div>
                        <div class="rabinho"></div>
                        <img style="border-radius: 100%" src="{{ asset('images/image-icon.png') }}">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection