@extends('layouts.layout-empresa')
@section('titulo', 'Reintegra | Mensagens')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endsection
@include('partials.profilebar')
@section('conteudo')
<div class="panel main-panel panel-empresa" style="margin-bottom: 30px">
    <div class="row">
        <div class="col-4">
            <div class="panel panel-contato">
                <h1 class="title-chat">Chats</h1>
                <ul class="list-group list-chat list-contato">
                    @forelse ($mensagensAgrupadas as $contato)
                        <li class="list-group-item list-group-item-action list-item-contato"
                            data-id="{{ $contato['usuario'] }}" onclick="carregarMensagens(this)">
                            <img style="border-radius: 100%" src="{{ asset('images/image-icon.png') }}"><span
                                class="nomeContatoLista">{{ $contato['nomeUsuario'] }}</span>
                        </li>
                    @empty
                        <p>Nada para mostrar</p>
                    @endforelse
                </ul>
            </div>
            <div class="btn-novo-chat">
                <a class="btn btn-light btn-lg" data-bs-toggle="modal"
                data-bs-target="#chatModal">Novo contato</a>
            </div>
        </div>
        <div class="col">
            <div class="panel panel-contato">
                <h1 class="nome-contato">Inicie uma conversa!</h1>
                <ul class="list-group list-chat list-messages"></ul>
            </div>
            <form method="POST" action="{{ url('empresa/enviar-mensagem') }}">
                @csrf
                <div class="input-group">
                    <input name="conteudoMensagem" class="form-control chat-input form-control-lg" type="text"
                        placeholder="Digite uma mensagem" autocomplete="off">
                    <input type="hidden" name="destinatario" class="destinatario">
                    <input type="hidden" name="idDestinatario" class="idDestinatario">
                    <button class="btn btn-light btn-chat" type="submit">➤</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@include('empresa.modal-chat')
<script src="{{ asset('js/mensagens.js') }}"></script>

@php
    $contatoAtivo = session('idDestinatario');
@endphp

@if($contatoAtivo)

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const contato = document.querySelector(`[data-id='{{ $contatoAtivo }}']`);
            if (contato) {
                carregarMensagens(contato);
            }
        });
    </script>

@endif