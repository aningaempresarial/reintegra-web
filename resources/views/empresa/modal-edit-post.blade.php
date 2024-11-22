<div class="modal fade" id="modalEditar{{ $publicacao['idPostagem'] }}" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Editar publicação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalEditBody">
                <div class="form-input">

                    <div class="mb-3" id="divTituloPosicao">
                        <label for="tituloPosicao" class="form-label">Título<span class="obrigatorio">*</span></label>
                        <input type="text" name="tituloPosicao" id="tituloPosicao" class="form-control form-control-lg"
                            placeholder="Título chamativo" required autocomplete="off" value="{{ $publicacao['tituloPostagem'] }}"/>
                        <span class="error-message" id="error-message-titulo-posicao"></span>
                    </div>

                    <div class="mb-3" id="divDescricaoVaga">
                        <label for="descricaoVaga" class="form-label">Descrição<span
                                class="obrigatorio">*</span></label>
                        <textarea id="descricaoVaga" class="form-control form-control-lg" rows="10"
                            placeholder="Fale sobre o processo seletivo, benefícios, etc.">{{ $publicacao['conteudoPostagem'] }}</textarea>
                        <span class="error-message" id="error-message-descricao-vaga"></span>
                    </div>

                    @if ($publicacao['categoriaPostagem'] == 'emprego')

                    <div class="mb-3" id="divRequisitosVaga">
                        <label for="requisitosVaga" class="form-label">Requisitos<span
                                class="obrigatorio">*</span></label>
                        <textarea id="requisitosVaga" class="form-control form-control-lg" rows="10"
                            placeholder="Enumere os requisitos da função.">{{ $vaga['requisitosVaga'] }}</textarea>
                        <span class="error-message" id="error-message-requisitos"></span>
                    </div>

                    <div class="mb-2" id="divSalarioVaga">
                        <label for="salarioVaga" class="form-label">Salário</label>
                        <div>
                            <input type="number" step="0.01" name="salarioVaga" id="salarioVaga"
                                placeholder="Digite o salário ofertado." required autocomplete="off"
                                class="form-control form-control-lg" value="{{ $vaga['salarioVaga'] }}"/>
                        </div>
                        <span class="error-message" id="error-message-salario"></span>
                    </div>

                    <div class="mb-3" id="divCheckSalario">
                        <div class="check-form">
                            <input type="checkbox" value="" id="checkSalario">
                            <label for="checkSalario">A combinar</label>
                        </div>
                    </div>

                    <div class="mb-3" id="divTipoContrato">
                        <label for="tipoContrato" class="form-label">Tipo de contrato<span
                                class="obrigatorio">*</span></label>
                        <select class="form-select" id="tipoContrato" name="tipoContrato" required>
                            <option value="" selected>Escolha uma opção</option>
                            <option value="CLT">CLT</option>
                            <option value="PJ">PJ</option>
                            <option value="Estágio">Estágio</option>
                            <option value="Aprendiz">Aprendiz</option>
                            <option value="Temporário">Temporário</option>
                        </select>
                        <span class="error-message" id="error-message-tipo-contrato"></span>
                    </div>

                    <div class="mb-3" id="divEscolaridadeVaga">
                        <label for="escolaridadeVaga" class="form-label">Escolaridade mínima<span
                                class="obrigatorio">*</span></label>
                        <select class="form-select" id="escolaridadeVaga" name="escolaridadeVaga" required>
                            <option selected>Escolha uma opção</option>
                            <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                            <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                            <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                            <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                            <option value="Técnico">Técnico</option>
                            <option value="Superior Incompleto">Superior Incompleto</option>
                            <option value="Superior Completo">Superior Completo</option>
                            <option value="Pós-Graduação">Pós-Graduação</option>
                            <option value="Mestrado">Mestrado</option>
                            <option value="Doutorado">Doutorado</option>
                        </select>
                        <span class="error-message" id="error-message-escolaridade"></span>
                    </div>

                    <div class="mb-3" id="divCargaHoraria">
                        <label for="cargaHoraria" class="form-label">Carga horária<span
                                class="obrigatorio">*</span><button class="tooltip-informacao" type="button"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="O horário de trabalho deve corresponder à carga horária, com uma tolerância de até 1 hora extra, caso haja intervalo.">
                                <img src="{{ asset('icons/pergunta.png') }}">
                            </button></label>

                        <div>
                            <input type="number" name="cargaHoraria" id="cargaHoraria"
                                placeholder="Digite as horas diárias de trabalho." required autocomplete="off"
                                class="form-control form-control-lg" />
                        </div>
                        <span class="error-message" id="error-message-carga-horaria"></span>
                    </div>

                    <div class="mb-3" id="divHorarioInicio">
                        <label for="horarioInicio" class="form-label">Horário de início<span
                                class="obrigatorio">*</span></label>
                        <input type="time" name="horarioInicio" id="horarioInicio" class="form-control form-control-lg"
                            placeholder="Horário de início do trabalho" required autocomplete="off" />
                        <span class="error-message" id="error-message-horario-inicio"></span>
                    </div>

                    <div class="mb-3" id="divHorarioTermino">
                        <label for="horarioTermino" class="form-label">Horário de término<span
                                class="obrigatorio">*</span></label>
                        <input type="time" name="horarioTermino" id="horarioTermino"
                            class="form-control form-control-lg" placeholder="Horário de término do trabalho" required
                            autocomplete="off" />
                        <span class="error-message" id="error-message-horario-termino"></span>
                    </div>

                    <div class="mb-3" id="divDtFim">
                        <label for="dtFim" class="form-label">Data final<span class="obrigatorio">*</span>
                            <button class="tooltip-informacao" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                data-bs-title="Data final de inscrições para o processo seletivo.">
                                <img src="{{ asset('icons/pergunta.png') }}">
                            </button>
                        </label>
                        <div>
                            <input type="date" name="dtFim" id="dtFim" class="form-control form-control-lg" required
                                autocomplete="off" />
                        </div>
                        <span class="error-message" id="error-message-data-fim"></span>
                    </div>

                    @endif

                    <div class="button-div">
                        <button type="button" class="btn-form btn btn-light" id="btnContinuar">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>