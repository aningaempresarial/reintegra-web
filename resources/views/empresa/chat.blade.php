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
            <div class="panel panel-contato">
                <ul class="list-group list-chat list-contato">
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
            <div class="panel panel-contato">
                <h1 class="nome-contato">Conversa com Fulano</h1>
                <ul class="list-group list-chat list-messages">
                    <li class="list-group-item">
                        <img style="border-radius: 100%" src="{{ asset('images/image-icon.png') }}">
                        <div class="message-box recebido">
                        abcde
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="message-box enviado">
                        a
                        </div>
                        <img style="border-radius: 100%" src="{{ asset('images/image-icon.png') }}">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection