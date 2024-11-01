<div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="modalPostLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPostLabel">Nova publicação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalPostBody">

                <div class="step active">
                    <h2 class="title" style="padding-bottom: 50px">Selecione uma opção</h2>

                    <div class="div-publicacoes">

                        <div id="btn-next-emprego" class="publicacao publicacao-emprego">
                            <img src="{{ asset('icons/emprego1.png') }}" alt="">
                            <h2 class="subtitle">Emprego</h2>
                            <p>Publique uma vaga de emprego</p>
                        </div>

                        <div id="btn-next-divulgacao" class="publicacao publicacao-divulgacao">
                            <img src="{{ asset('icons/divulgacao1.png') }}" alt="">
                            <h2 class="subtitle">Divulgação</h2>
                            <p>Divulgue um evento, palestra, processo seletivo, etc.</p>
                        </div>

                        <div id="btn-next-informativo" class="publicacao publicacao-informativo">
                            <img src="{{ asset('icons/informativo1.png') }}" alt="">
                            <h2 class="subtitle">Informativo</h2>
                            <p>Publique um informativo</p>
                        </div>

                    </div>


                </div>

                <div class="step">

                    <div class="form-input">

                        <div class="mb-3" id="divTituloPosicao">
                            <label for="tituloPosicao" class="form-label">Título<span
                                    class="obrigatorio">*</span></label>
                            <input type="text" name="tituloPosicao" id="tituloPosicao"
                                class="form-control form-control-lg" placeholder="Título chamativo" required
                                autocomplete="off" />
                            <span class="error-message" id="error-message-titulo-posicao"></span>
                        </div>

                        <div class="mb-3" id="divDescricaoVaga">
                            <label for="descricaoVaga" class="form-label">Descrição<span
                                    class="obrigatorio">*</span></label>
                            <textarea id="descricaoVaga" class="form-control form-control-lg" rows="10"
                                placeholder="Fale sobre o processo seletivo, benefícios, etc."></textarea>
                            <span class="error-message" id="error-message-descricao-vaga"></span>
                        </div>

                        <div class="mb-3" id="divRequisitosVaga">
                            <label for="requisitosVaga" class="form-label">Requisitos<span
                                    class="obrigatorio">*</span></label>
                            <textarea id="requisitosVaga" class="form-control form-control-lg" rows="10"
                                placeholder="Enumere os requisitos da função."></textarea>
                            <span class="error-message" id="error-message-requisitos"></span>
                        </div>

                        <div class="mb-2" id="divSalarioVaga">
                            <label for="salarioVaga" class="form-label">Salário</label>
                            <div>
                                <input type="number" step="0.01" name="salarioVaga" id="salarioVaga"
                                    placeholder="Digite o salário ofertado." required autocomplete="off"
                                    class="form-control form-control-lg" />
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
                                    class="obrigatorio">*</span><button class="tooltip-informacao" type="button" data-bs-toggle="tooltip"
                                    data-bs-placement="top"
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
                            <input type="time" name="horarioInicio" id="horarioInicio"
                                class="form-control form-control-lg" placeholder="Horário de início do trabalho"
                                required autocomplete="off" />
                            <span class="error-message" id="error-message-horario-inicio"></span>
                        </div>

                        <div class="mb-3" id="divHorarioTermino">
                            <label for="horarioTermino" class="form-label">Horário de término<span
                                    class="obrigatorio">*</span></label>
                            <input type="time" name="horarioTermino" id="horarioTermino"
                                class="form-control form-control-lg" placeholder="Horário de término do trabalho"
                                required autocomplete="off" />
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

                        <div class="button-div">
                            <button type="button" class="btn-form btn btn-light" id="btnContinuar">Continuar</button>
                        </div>

                    </div>

                </div>


                <div class="step">
                    <div class="div-title-icon">
                        <div class="voltar-icon-div"><img class="voltar-icon" id="voltar"
                                src="{{ asset('icons/voltar.png') }}"></div>
                        <h2 class="title">Pré-visualizar publicação</h2>
                        <div class="voltar-icon-div"></div>
                    </div>

                    <div class="centered-item">
                        <div class="card">

                            <div class="card-body">
                                <div class="info-usuario">
                                    <img class="foto-perfil" src="{{ $API_URL . $data['fotoPerfil'] }}" alt=""
                                        srcset="">
                                    <p class="nome-perfil">{{ $data['nomeEmpresa'] ?? $nome ?? 'Martha' }}</p>
                                </div>
                                <h3 class="tituloPost">Titulo</h3>
                                <div class="textoPost">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic
                                    illo magnam voluptates ad magni nulla laborum placeat expedita repellat est,
                                    consectetur praesentium vel labore laudantium nisi minus numquam perferendis
                                    doloribus!</div>
                            </div>

                            <div class="card-top">
                                <div class="image-wrapper">
                                    <img class="foto-imagem" src="{{ asset('images/default/emprego.png') }}" alt=""
                                        srcset="">
                                    <div class="hover-overlay-imagem" id="overlay-imagem">
                                        <img src="{{ asset('icons/cam.png') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-info p-1">
                                <button class="btn btn-about">Saiba Mais</button>
                            </div>

                        </div>

                    </div>

                    <div class="button-div">
                        <button type="button" class="btn btn-danger btn-form" id="btnCancelar">Cancelar</button>
                        <button type="button" class="btn-form" id="btnCadastrar">Publicar</button>
                    </div>

                </div>

                <div class="step" id="">
                    <div class="div-title-icon">
                        <div class="voltar-icon-div"><img class="voltar-icon" id="voltar"
                                src="{{ asset('icons/voltar.png') }}"></div>
                        <h2 class="title">Adicionar imagem para vaga</h2>
                        <div class="voltar-icon-div"></div>
                    </div>

                    <input type="file" id="input" accept="image/*" />

                    <div class="cropper-wrapper">
                        <img id="preview" src="{{ asset('images/default/emprego.png') }}" alt="Preview"
                            style="max-width: 100%;" />
                    </div>

                    <div class="button-div">
                        <button type="button" class="btn-form" id="btnConcluir">Continuar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    let currentStep = 0;
    let tipo_post = '';
    const steps = document.querySelectorAll('.step');

    function showStep(step) {
        currentStep = step;
        steps.forEach((element, index) => {
            if (index === step) {
                element.classList.add('active');
            } else {
                element.classList.remove('active');
            }
        });
    }

    $('#btn-next-emprego').on('click', () => {
        tipo_post = 'emprego';
        showStep(1);
        $('#divRequisitosVaga').show();
        $('#divSalarioVaga').show();
        $('#divCheckSalario').show();
        $('#divTipoContrato').show();
        $('#divEscolaridadeVaga').show();
        $('#divCargaHoraria').show();
        $('#divHorarioInicio').show();
        $('#divHorarioTermino').show();
        $('#divDtFim').show();
    });

    $('#btn-next-divulgacao').on('click', () => {
        tipo_post = 'divulgacao';
        showStep(1);
        $('#divRequisitosVaga').hide();
        $('#divSalarioVaga').hide();
        $('#divCheckSalario').hide();
        $('#divTipoContrato').hide();
        $('#divEscolaridadeVaga').hide();
        $('#divCargaHoraria').hide();
        $('#divHorarioInicio').hide();
        $('#divHorarioTermino').hide();
        $('#divDtFim').hide();
    });

    $('#btn-next-informativo').on('click', () => {
        tipo_post = 'informativo';
        showStep(1);
        $('#divDtFim').hide();
    });

    const voltar = document.querySelectorAll('#voltar')
    voltar.forEach(e => {
        e.addEventListener('click', function () {
            currentStep -= 1;
            showStep(currentStep);
        });
    });
</script>


<script>
    $(document).ready(() => {
        $('#btnContinuar').click(() => {
            $('.error-message').text('');

            let tituloPosicao = $('#tituloPosicao').val();
            let descricaoVaga = $('#descricaoVaga').val();
            let requisitosVaga = $('#requisitosVaga').val();
            let salarioVaga = $('#salarioVaga').val();
            let tipoContrato = $('#tipoContrato').val();
            let escolaridadeVaga = $('#escolaridadeVaga').val();
            let horarioInicio = $('#horarioInicio').val();
            let horarioTermino = $('#horarioTermino').val();
            let cargaHoraria = $('#cargaHoraria').val();
            let dtFim = $('#dtFim').val();
            let dataHoje = new Date().toISOString().split('T')[0];
            let erro = false;

            let [horasInicio, minutosInicio] = horarioInicio.split(':').map(Number);
            let [horasTermino, minutosTermino] = horarioTermino.split(':').map(Number);
            minutosInicio += horasInicio * 60;
            minutosTermino += horasTermino * 60;
            tempoTrabalhado = (minutosTermino - minutosInicio);
            horasTrabalhadas = tempoTrabalhado / 60;

            if (!tituloPosicao) {
                $('#error-message-titulo-posicao').text('Título é obrigatório.');
                erro = true;
            }

            if (!descricaoVaga) {
                $('#error-message-descricao-vaga').text('Descrição é obrigatória.');
                erro = true;
            }

            if (!requisitosVaga) {
                $('#error-message-requisitos').text('Requisitos são obrigatórios.');
                erro = true;
            }

            if (!salarioVaga && !$('#checkSalario').is(':checked')) {
                $('#error-message-salario').text('Selecione a opção "a combinar" se não for definir o salário agora.');
                erro = true;
            }

            if (!tipoContrato) {
                $('#error-message-tipo-contrato').text('Tipo de contrato é obrigatório.');
                erro = true;
            }

            if (escolaridadeVaga === 'Escolha uma opção') {
                $('#error-message-escolaridade').text('Escolaridade é obrigatória.');
                erro = true;
            }

            if (!horarioInicio) {
                $('#error-message-horario-inicio').text('Horário de início é obrigatório.');
                erro = true;
            }

            if (!horarioTermino) {
                $('#error-message-horario-termino').text('Horário de término é obrigatório.');
                erro = true;
            }

            if (!cargaHoraria) {
                $('#error-message-carga-horaria').text('Carga horária é obrigatória.');
                erro = true;
            }

            if (parseInt(cargaHoraria, 10) + 1 < horasTrabalhadas || parseInt(cargaHoraria, 10) > horasTrabalhadas) {
                $('#error-message-carga-horaria').text('A carga horária não condiz com o horário de trabalho.');
                erro = true;
            }

            if (tipo_post === 'emprego') {
                if (!dtFim) {
                    $('#error-message-data-fim').text('Data final é obrigatória.');
                    erro = true;
                } else if (dtFim < dataHoje) {
                    $('#error-message-data-fim').text('A data final deve ser igual ou maior que a data de hoje.');
                    erro = true;
                }
            }

            if (erro) return;

            var descricaoComQuebras = descricaoVaga.replace(/\n/g, '<br>');

            var limiteCaracteres = 200;

            if (descricaoVaga.length > limiteCaracteres) {
                var textoResumido = descricaoVaga.substring(0, limiteCaracteres).replace(/\n/g, '<br>') + '...';
                var textoCompleto = descricaoComQuebras;

                $('.tituloPost').text(tituloPosicao);

                $('.textoPost').html(textoResumido + ' <a href="#" class="ver-mais">Ver mais</a>');

                $('.ver-mais').click((e) => {
                    e.preventDefault();
                    $('.textoPost').html(textoCompleto);
                });
            } else {
                $('.tituloPost').text(tituloPosicao);
                $('.textoPost').html(descricaoComQuebras);
            }

            showStep(2);
        });

        $('#overlay-imagem').on('click', () => {
            showStep(3);
        });

        $('#btnCancelar').click(() => {
            $('#modalPost').modal('hide');
            showStep(0);
        });

        $('#btnCadastrar').click(async () => {
            const formData = new FormData();
            formData.append('tituloPosicao', $('#tituloPosicao').val());
            formData.append('descricaoVaga', $('#descricaoVaga').val());
            formData.append('requisitosVaga', $('#requisitosVaga').val());
            formData.append('salarioVaga', $('#salarioVaga').val());
            formData.append('tipoContrato', $('#tipoContrato').val());
            formData.append('escolaridadeVaga', $('#escolaridadeVaga').val());
            formData.append('cargaHoraria', $('#cargaHoraria').val());
            formData.append('horarioInicio', $('#horarioInicio').val());
            formData.append('horarioTermino', $('#horarioTermino').val());

            if (tipo_post === 'emprego') {
                formData.append('dtFim', $('#dtFim').val());
            }

            formData.append('tipo', tipo_post);
            formData.append('token', "{{ session('token') }}");

            const fotoBlob = await imageToBlob(document.querySelector('.foto-imagem').src);
            formData.append('foto', fotoBlob);

            if (tipo_post === 'emprego') {
                $.ajax({
                    url: '/api/cadastrar-vaga',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        $('#modalPost').modal('hide');
                        showStep(0);


                        showAlert('Aviso', 'Vaga cadastrada com sucesso!');

                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    },
                    // error: (error) => {
                    //     $('#modalPost').modal('hide');
                    //     showStep(0);

                    //     showAlert('Aviso', 'Erro ao cadastrar vaga.');

                    //     console.error(error);
                    //     setTimeout(() => {
                    //         location.reload();
                    //     }, 3000);
                    // }
                });
            } else {
                $.ajax({
                    url: '/api/cadastrar-post',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        $('#modalPost').modal('hide');
                        showStep(0);


                        showAlert('Aviso', 'Publicação realizada com sucesso!');
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    },
                    error: (error) => {
                        console.error(error);
                        $('#modalPost').modal('hide');
                        showStep(0);

                        showAlert('Aviso', 'Erro ao publicar.');
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    }
                });
            }
        });

        function imageToBlob(imageElement) {
            return new Promise((resolve, reject) => {
                const img = new Image();
                img.crossOrigin = "Anonymous";
                img.src = imageElement;

                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    canvas.width = img.width;
                    canvas.height = img.height;

                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0);

                    canvas.toBlob((blob) => {
                        if (blob) {
                            resolve(blob);
                        } else {
                            reject(new Error('Conversion to Blob failed'));
                        }
                    }, 'image/jpg');
                };

                img.onerror = () => {
                    reject(new Error('Image load error'));
                };
            });
        }

        $('.btn-close').on('click', () => {
            showStep(0);
        })

        $('#overlay-imagem').on('click', () => {
            showStep(3);
        })

        const cropperConfig = {
            foto: { aspectRatio: 1.82 / 1, canvasWidth: 600, canvasHeight: 330 },
        };

        function setupCropper(inputId, previewId, cropButtonId, imageId, configKey) {
            let cropper;
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const cropButton = document.getElementById(cropButtonId);
            const images = document.querySelectorAll(imageId);

            cropper = new Cropper(preview, {
                aspectRatio: cropperConfig[configKey].aspectRatio,
                viewMode: 1,
                ready() {

                }
            });

            input.addEventListener('change', (event) => {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(preview, {
                        aspectRatio: cropperConfig[configKey].aspectRatio,
                        viewMode: 1,
                    });
                };
                reader.readAsDataURL(file);
            });

            cropButton.addEventListener('click', () => {
                const canvas = cropper.getCroppedCanvas({
                    width: cropperConfig[configKey].canvasWidth,
                    height: cropperConfig[configKey].canvasHeight,
                });
                canvas.toBlob((blob) => {
                    const url = URL.createObjectURL(blob);
                    images.forEach(image => {
                        image.src = url;
                    });
                    showStep(2);
                });
            });
        }

        setupCropper('input', 'preview', 'btnConcluir', '.foto-imagem', 'foto');


        $('#btnCancelar').click(() => {
            $('#modalPost').modal('hide');
            showStep(0);
        })

    });


</script>

<script>
    document.getElementById("checkSalario").addEventListener("change", function () {
        const salarioField = document.getElementById("salarioVaga");
        if (this.checked) {
            salarioField.disabled = true;
            salarioField.value = '';
            salarioField.placeholder = 'Esse campo ficará vazio.';
        } else {
            salarioField.disabled = false;
            salarioField.placeholder = 'Digite o salário ofertado.'
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>