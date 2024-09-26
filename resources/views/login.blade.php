@extends('layouts.layout')
@section('titulo', 'Entrar | Reintegra')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/virtual-select.min.css') }}"/>
@endsection

@include('modals.alerta')
@include('modals.confirm')

@section('conteudo')
<section id="login">
    <div class="container-login">

        <div class="row">
            <div class="col-md">
                <div class="image-banner">
                    <img src="{{ asset('images/logo-white.png') }}" alt="">
                    <h3>Abrindo portas, reescrevendo destinos.</h3>
                </div>
            </div>
            <div class="col-md">

                <div class="step active">
                    <form action="/login-usuario" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="title">Entrar na sua conta</h2>
                        <div class="input-field">
                            <img src="{{ asset('images/input-name.png') }}">
                            <input type="text" name="identificacao" placeholder="Usuário, CNPJ ou e-mail" required autocomplete="off"/>
                        </div>
                        <div class="input-field mb-5">
                            <img src="{{ asset('images/input-pass.png') }}">
                            <input type="password" name="senha" placeholder="Senha" required autocomplete="off"/>
                            <p class="esqueceu-senha">Esqueceu a Senha?</p>
                        </div>
                        <input type="submit" value="Entrar" class="btn btn-form solid"/>

                        <p class="new-account-text">Ainda não possui conta? <span class="destaque" id="btn-next">Criar uma conta!</span></p>
                    </form>

                </div>


                <div class="step">

                    <form>
                        <h2 class="title">Escolha o tipo de conta</h2>

                        <div class="div-contas">

                            <div id="btn-next-ong" class="conta conta-ong">
                                <img src="{{ asset('images/ong-icon.png') }}" alt="">
                                <h2>Sou ONG</h2>
                            </div>

                            <div id="btn-next-empresa" class="conta conta-empresa">
                                <img src="{{ asset('images/empresa-icon.png') }}" alt="">
                                <h2>Sou Empresa</h2>
                            </div>
                        </div>

                        <p class="new-account-text">Já possui conta? <span class="destaque" id="btn-prev">Entre agora!</span></p>

                    </form>

                </div>


                <div class="step">
                    <form>
                        <div class="div-title-icon">
                            <div class="voltar-icon-div"><img class="voltar-icon" id="voltar" src="{{ asset('icons/voltar.png') }}"></div>
                            <div class="title">Informações Básicas</div>
                            <div class="voltar-icon-div"></div>
                        </div>
                        <p>Etapa 1 de 3</p>

                        <div class="form-input">


                            <div class="input-div">
                                <label for="nomeOng">Nome da ONG<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="nomeOng" id="nomeOng" placeholder="ONG Maria da Graças..." required autocomplete="off"/>
                                </div>
                            </div>

                        </div>

                        <div class="form-input">
                            <div class="input-div">
                                <label for="emailOng">Email da ONG<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="emailOng" id="emailOng" placeholder="ong@gmail.com" required autocomplete="off"/>
                                </div>
                                <span id="email-error" class="error-message"></span>
                            </div>


                            <div class="input-div">
                                <label for="cnpjOng">CNPJ da ONG<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="cnpjOng" id="cnpjOng" placeholder="**.***.***/****-**" required autocomplete="off"/>
                                </div>
                                <span id="cnpj-error" class="error-message"></span>
                            </div>
                        </div>

                        <div class="form-input">
                            <div class="input-div">
                                <label for="senhaOng">Senha<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="password" name="senhaOng" id="senhaOng" required autocomplete="off"/>
                                </div>
                            </div>


                            <div class="input-div">
                                <label for="validaSenhaOng">Confirmação de Senha<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="password" name="validaSenhaOng" id="validaSenhaOng" required autocomplete="off"/>
                                </div>
                                <span id="senha-error" class="error-message"></span>
                            </div>
                        </div>

                        <div class="form-input form-input-button">
                            <button type="button" class="btn btn-form solid" id="submitBtnOng" disabled>Próxima Etapa</button>
                        </div>


                        <p class="new-account-text">Já possui conta? <span class="destaque" id="btn-prev">Entre agora!</span></p>
                    </form>
                </div>


                <div class="step">
                    <form>
                        <div class="div-title-icon">
                            <div class="voltar-icon-div"><img class="voltar-icon" id="voltar" src="{{ asset('icons/voltar.png') }}"></div>
                            <div class="title">Informações Básicas</div>
                            <div class="voltar-icon-div"></div>
                        </div>
                        <p>Etapa 1 de 3</p>


                        <div class="form-input">


                            <div class="input-div">
                                <label for="nomeEmpresa">Nome da Empresa<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="nomeEmpresa" id="nomeEmpresa" placeholder="Empresa X..." required autocomplete="off"/>
                                </div>
                            </div>

                        </div>


                        <div class="form-input">


                            <div class="input-div">
                                <label for="areaAtuacao">Área de Atuação<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <select type="text" name="areaAtuacao" id="areaAtuacao" data-search="true" required autocomplete="off">
                                        @foreach($areas as $area)
                                            <option value="{{ $area['idAreaAtuacao'] }}">{{ $area['nomeAreaAtuacao'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-input">
                            <div class="input-div">
                                <label for="emailEmpresa">Email da Empresa<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="emailEmpresa" id="emailEmpresa" placeholder="empresa@gmail.com" required autocomplete="off"/>
                                </div>
                                <span id="email-error-empresa" class="error-message"></span>
                            </div>


                            <div class="input-div">
                                <label for="cnpjEmpresa">CNPJ da Empresa<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="cnpjEmpresa" id="cnpjEmpresa" placeholder="**.***.***/****-**" required autocomplete="off"/>
                                </div>
                                <span id="cnpj-error-empresa" class="error-message"></span>
                            </div>
                        </div>


                        <div class="form-input">
                            <div class="input-div">
                                <label for="senhaEmpresa">Senha<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="password" name="senhaEmpresa" id="senhaEmpresa" required autocomplete="off"/>
                                </div>
                            </div>


                            <div class="input-div">
                                <label for="validaSenhaEmpresa">Confirmação de Senha<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="password" name="validaSenhaEmpresa" id="validaSenhaEmpresa" required autocomplete="off"/>
                                </div>
                                <span id="senha-error-empresa" class="error-message"></span>
                            </div>
                        </div>

                        <div class="form-input form-input-button">
                            <button type="button" class="btn btn-form solid" id="submitBtnEmpresa" disabled>Próxima Etapa</button>
                        </div>



                        <p class="new-account-text">Já possui conta? <span class="destaque" id="btn-prev">Entre agora!</span></p>
                    </form>
                </div>

                <div class="step">
                    <form>
                        <div class="div-title-icon">
                            <div class="voltar-icon-div"><img class="voltar-icon" id="voltar" src="{{ asset('icons/voltar.png') }}"></div>
                            <div class="title">Dados Adicionais</div>
                            <div class="voltar-icon-div"></div>
                        </div>
                        <p>Etapa 2 de 3</p>

                        <div class="form-input">

                            <div class="input-div flex-2">
                                <label for="cep">CEP<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="cep" id="cep" required autocomplete="off"/>
                                </div>
                            </div>

                            <div class="input-div div-small">
                                <label for="numero">Número<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="numero" id="numero" required autocomplete="off"/>
                                </div>
                            </div>

                        </div>

                        <div class="form-input">


                            <div class="input-div flex-2">
                                <label for="logradouro">Logradouro<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="logradouro" id="logradouro" placeholder="Av. São João" required autocomplete="off"/>
                                </div>
                            </div>

                            <div class="input-div div-small">
                                <label for="estado">Estado<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <select type="text" name="estado" id="estado" placeholder="Empresa X..." required autocomplete="off">
                                        @foreach($estados as $estado)
                                            <option value="{{ $estado }}">{{ $estado }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>


                        <div class="form-input">

                            <div class="input-div">
                                <label for="cidade">Cidade<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="cidade" id="cidade" required autocomplete="off"/>
                                </div>
                            </div>


                            <div class="input-div">
                                <label for="bairro">Bairro<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="bairro" id="bairro" required autocomplete="off"/>
                                </div>
                            </div>

                        </div>

                        <div class="form-input">
                            <div class="input-div">
                                <label for="complemento">Complemento</label>
                                <div class="input-field">
                                    <input type="text" name="complemento" id="complemento" placeholder="Próximo ao Metrô..." required autocomplete="off"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-input">
                            <div class="input-div">
                                <label for="telefone">Telefone<span class="obrigatorio">*</span></label>
                                <div class="input-field">
                                    <input type="text" name="telefone" placeholder="(11) 3923-1239" id="telefone" required autocomplete="off"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-input form-input-button">
                            <button value="Próxima Etapa" class="btn btn-form solid" id="proximaEtapa" disabled>Próxima Etapa</button>
                        </div>



                        <p class="new-account-text">Já possui conta? <span class="destaque" id="btn-prev">Entre agora!</span></p>
                    </form>
                </div>

            </div>
        </div>

    </div>
</section>


<script src="{{ asset('js/login.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/virtual-select.js') }}"></script>
@endsection


@if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showAlert('Xiiii... Deu Erro!', '{{ $error }}');
        });
    </script>
    @endforeach
@endif

