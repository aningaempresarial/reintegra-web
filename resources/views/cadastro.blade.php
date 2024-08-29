@extends('layouts.layout')
@section('titulo', 'Reintegra | Cadastro')
@section('css')
<link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
@endsection
@section('conteudo')
<div class="container form-container">
    <h2 class="title">Agora, falta pouco!</h2>
    <form action="{{ url('/cadastrar-infos-empresa') }}">
        <div class="input-field">
            <input type="text" placeholder="Telefone" required autocomplete="off" name="telefone" />
        </div>
        <div class="input-field">
            <input type="text" placeholder="CEP" required autocomplete="off" name="cep" id="cep"
                onblur="consultarCep()" />
        </div>
        <div class="input-field input-group">
            <input type="text" placeholder="Logradouro" required autocomplete="off" name="logradouro" id="logradouro">
            <input type="text" placeholder="Nº" required autocomplete="off" name="num">
        </div>
        <div class="input-field input-group">
            <input type="text" placeholder="Bairro" required autocomplete="off" name="bairro" id="bairro" />
            <select class="form-select" aria-label="Default select example" id="uf" name="estado" required>
                <option disabled selected>UF</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SP">SP</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>
            </select>
        </div>
        <input class="btn" type="submit" value="Enviar">
    </form>
</div>
@endsection
<script src="{{ asset("js/cep.js") }}"></script>