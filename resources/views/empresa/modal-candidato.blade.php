<?php
function calcularIdade($dataNascimento)
{
    $dataNascimento = new DateTime($dataNascimento);
    $dataAtual = new DateTime();
    $diferenca = $dataNascimento->diff($dataAtual);

    return $diferenca->y;
}

$dataNasc = $candidato['dataNasc'];
$idade = calcularIdade($dataNasc);
?>

<div class="modal fade" id="modalCandidato{{ $candidato['idUsuario'] }}" tabindex="-1"
    aria-labelledby="modalCandidatoLabel{{ $candidato['idUsuario'] }}" aria-hidden="true"
    style="z-index: 10000 !important">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCandidatoLabel{{ $candidato['idUsuario'] }}">Currículo do
                    candidato
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <h1 class="modal-title fs-5 mb-3">Dados pessoais</h1>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Nome completo</label>
                                <textarea rows="1" class="form-control form-control-lg"
                            disabled>{{ $candidato['nome'] }}</textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <textarea rows="1" class="form-control form-control-lg"
                            disabled>{{ $candidato['email'] }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Sexo</label>
                                <textarea rows="1" class="form-control form-control-lg"
                            disabled>{{ $candidato['sexo'] }}</textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Idade</label>
                                <textarea rows="1" class="form-control form-control-lg" disabled>{{ $idade }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Endereço</label>
                        <textarea rows="1" class="form-control form-control-lg"
                            disabled>{{ $candidato['logradouro'] }}, {{ $candidato['bairro'] }}, {{ $candidato['cidade'] }} - {{ $candidato['estado'] }}</textarea>
                    </div>
                    <hr>
                    <h1 class="modal-title fs-5 mb-3">Educação</h1>
                    @if (count($candidato['educacao']) > 0)
                        @foreach ($candidato['educacao'] as $educacao)
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <textarea rows="1" class="form-control form-control-lg"
                                        disabled>{{ $educacao['escola'] }} - {{ $educacao['curso'] }}</textarea>
                                    </div>
                                </div>
                                <div class="col">
                                <div class="mb-3">
                                        <textarea rows="1" class="form-control form-control-lg"
                                        disabled>Período: {{ \Carbon\Carbon::parse($educacao['dataInicioCurso'])->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($educacao['dataFimCurso'])->format('d/m/Y') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="candidatos-text" style="padding: 0">Nada para mostrar.</p>
                    @endif
                    <hr>
                    <h1 class="modal-title fs-5 mb-3">Experiência profissional</h1>
                    @if (count($candidato['experiencia']) > 0)
                        @foreach ($candidato['experiencia'] as $experiencia)
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <textarea rows="1" class="form-control form-control-lg"
                                        disabled>{{ $experiencia['empresa'] }} - {{ $educacao['cargo'] }}</textarea>
                                    </div>
                                </div>
                                <div class="col">
                                <div class="mb-3">
                                        <textarea rows="1" class="form-control form-control-lg"
                                        disabled>Período: {{ \Carbon\Carbon::parse($experiencia['dataInicioExperiencia'])->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($experiencia['dataFimExperiencia'])->format('d/m/Y') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="candidatos-text" style="padding: 0">Nada para mostrar.</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>