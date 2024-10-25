<div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="modalPostLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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

                        <div class="input-div">
                            <label for="tituloPosicao">Título<span class="obrigatorio">*</span></label>
                            <div class="input-field">
                                <input type="text" name="tituloPosicao" id="tituloPosicao" placeholder="Título chamativo" required autocomplete="off"/>
                            </div>
                            <span class="error-message" id="error-message-titulo-posicao"></span>
                        </div>

                        <div class="input-div">
                            <label for="descricaoVaga">Descrição<span class="obrigatorio">*</span></label>
                            <textarea id="descricaoVaga" class="input-field" rows="10" placeholder="Fale sobre o processo seletivo, benefícios, etc."></textarea>
                            <span class="error-message" id="error-message-descricao-vaga"></span>
                        </div>

                        <div class="input-div">
                            <label for="requisitosVaga">Requisitos<span class="obrigatorio">*</span></label>
                            <textarea id="requisitosVaga" class="input-field" rows="10" placeholder="Enumere os requisitos da função."></textarea>
                            <span class="error-message" id="error-message-descricao-vaga"></span>
                        </div>

                        <div class="input-div" id="divDtFim">
                            <label for="dtFim">Data final<span class="obrigatorio">*</span><button class="tooltip-informacao" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Data final de inscrições para o processo seletivo."><img src="{{ asset('icons/pergunta.png') }}"></button></label>
                            <div class="input-field">
                                <input type="date" name="dtFim" id="dtFim" required autocomplete="off"/>
                            </div>
                            <span class="error-message" id="error-message-data-fim"></span>
                        </div>

                        <div class="button-div">
                            <button type="button" class="btn-form" id="btnContinuar">Continuar</button>
                        </div>

                    </div>

                </div>


                <div class="step">
                    <div class="div-title-icon">
                        <div class="voltar-icon-div"><img class="voltar-icon" id="voltar" src="{{ asset('icons/voltar.png') }}"></div>
                        <h2 class="title">Pré-visualizar Publicação</h2>
                        <div class="voltar-icon-div"></div>
                    </div>

                    <div class="centered-item">
                        <div class="card">

                            <div class="card-body">
                                <div class="info-usuario">
                                    <img class="foto-perfil" src="{{ $API_URL . $data['fotoPerfil'] }}" alt="" srcset="">
                                    <p class="nome-perfil">{{ $data['nomeEmpresa'] ?? $nome ?? 'Martha' }}</p>
                                </div>
                                <h3 class="tituloPost">Titulo</h3>
                                <div class="textoPost">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic illo magnam voluptates ad magni nulla laborum placeat expedita repellat est, consectetur praesentium vel labore laudantium nisi minus numquam perferendis doloribus!</div>
                            </div>

                            <div class="card-top">
                                <div class="image-wrapper">
                                    <img class="foto-imagem" src="{{ asset('images/default/emprego.png') }}" alt="" srcset="">
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
                        <div class="voltar-icon-div"><img class="voltar-icon" id="voltar" src="{{ asset('icons/voltar.png') }}"></div>
                        <h2 class="title">Adicionar Imagem para Vaga</h2>
                        <div class="voltar-icon-div"></div>
                    </div>

                    <input type="file" id="input" accept="image/*" />

                    <div class="cropper-wrapper">
                        <img id="preview" src="{{ asset('images/default/emprego.png') }}" alt="Preview" style="max-width: 100%;" />
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
        $('#divDtFim').show();
    });

    $('#btn-next-divulgacao').on('click', () => {
        tipo_post = 'divulgacao';
        showStep(1);
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
            let dtFim = $('#dtFim').val();
            let dataHoje = new Date().toISOString().split('T')[0];
            let erro = false;

            if (!tituloPosicao) {
                $('#error-message-titulo-posicao').text('Título é obrigatório.');
                erro = true;
            }

            if (!descricaoVaga) {
                $('#error-message-descricao-vaga').text('Descrição é obrigatória.');
                erro = true;
            }

            if (tipo_post === 'emprego') {
                if (!dtFim) {
                    $('#error-message-data-fim').text('Data Final é obrigatória.');
                    erro = true;
                } else if (dtFim < dataHoje) {
                    $('#error-message-data-fim').text('A Data Final deve ser igual ou maior que a data de hoje.');
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
                    error: (error) => {
                        $('#modalPost').modal('hide');
                        showStep(0);

                        showAlert('Aviso', 'Erro ao cadastrar vaga.');

                        console.error(error);
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    }
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
                        /*setTimeout(() => {
                            location.reload();
                        }, 3000);*/
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
