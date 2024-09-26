
const steps = document.querySelectorAll('.step');
let currentStep = 0;

function showStep(step) {
    steps.forEach((element, index) => {
        if (index === step) {
            element.classList.add('active');
        } else {
            element.classList.remove('active');
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    let tipo_acesso = '';
    let usuario = '';
})


document.addEventListener('DOMContentLoaded', function() {
    const cnpjInputONG = document.getElementById('cnpjOng');
    Inputmask({
        mask: '99.999.999/9999-99',
        placeholder: '',
        clearIncomplete: true,
    }).mask(cnpjInputONG);


    const cnpjInputEmpresa = document.getElementById('cnpjEmpresa');
    Inputmask({
        mask: '99.999.999/9999-99',
        placeholder: '',
        clearIncomplete: true,
    }).mask(cnpjInputEmpresa);


    const cepInput = document.getElementById('cep');
    Inputmask({
        mask: '99999-999',
        placeholder: '',
        clearIncomplete: true,
    }).mask(cepInput);

    const telefoneInput = document.getElementById('telefone');
    Inputmask({
        mask: ['(99) 9999-9999', '(99) 99999-9999'],
        placeholder: '',
        clearIncomplete: true,
    }).mask(telefoneInput);

});


function validaCNPJ(cnpj) {
    return new Promise((resolve, reject) => {
        fetch(`/api/user/verificar/cnpj/${cnpj.replaceAll('/', '').replaceAll('.', '')}`)
            .then(response => response.json())
            .then(data => {
                if (data.existe) {
                    resolve([false, data.mensagem]); // CNPJ já existe
                } else {
                    resolve([true]); // CNPJ válido
                }
            })
            .catch(error => {
                reject([false, 'Erro inesperado.']); // Erro na requisição
            });
    });
}

function validaEmail(email) {
    return new Promise((resolve, reject) => {
        fetch(`/api/user/verificar/email/${email.replaceAll('/', '')}`)
            .then(response => response.json())
            .then(data => {
                if (data.existe) {
                    resolve([false, data.mensagem]); // Email já existe
                } else {
                    resolve([true]); // Email válido
                }
            })
            .catch(error => {
                reject([false, 'Erro inesperado.']); // Erro na requisição
            });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const submitBtnOng = document.getElementById('submitBtnOng');

    const nomeInputOng = document.getElementById('nomeOng');
    const emailInputOng = document.getElementById('emailOng');
    const cnpjInputOng = document.getElementById('cnpjOng');
    const senhaInputOng = document.getElementById('senhaOng');
    const validaSenhaInputOng = document.getElementById('validaSenhaOng');

    async function validarFormulario() {
        let nomeValido = nomeInputOng.value !== '';
        let emailValido = emailInputOng.value !== '';
        let cnpjValido = cnpjInputOng.value !== '';
        let senhaValida = senhaInputOng.value !== '' && senhaInputOng.value === validaSenhaInputOng.value;



        if (cnpjValido) {
            const cnpjError = document.getElementById('cnpj-error');
            const validacaoCNPJ = await validaCNPJ(cnpjInputOng.value)

            if (validacaoCNPJ[0]) {
                cnpjError.innerText = '';
            } else {
                cnpjValido = false;
                cnpjError.innerText = validacaoCNPJ[1];
            }
        }


        if (emailValido) {
            const emailError = document.getElementById('email-error');
            const validacaoEmail = await validaEmail(emailInputOng.value);


            if (validacaoEmail[0]) {
                emailError.innerText = '';
            } else {
                emailValido = false
                emailError.innerText = validacaoEmail[1];
            }
        }

        const senhaError = document.getElementById('senha-error');
        if (!senhaValida) {
            if (validaSenhaInputOng.value !== '') {
                senhaValida = false
                senhaError.innerText = 'As senhas não coincidem.'
            }
        } else {
            senhaError.innerText = ''
        }

        if (nomeValido && emailValido && cnpjValido && senhaValida) {
            submitBtnOng.disabled = false;
        } else {
            submitBtnOng.disabled = true;
        }

    }

    nomeInputOng.addEventListener('blur', validarFormulario);
    emailInputOng.addEventListener('blur', validarFormulario);
    cnpjInputOng.addEventListener('blur', validarFormulario);
    senhaInputOng.addEventListener('blur', validarFormulario);
    validaSenhaInputOng.addEventListener('blur', validarFormulario);
});


document.addEventListener('DOMContentLoaded', () => {
    const submitBtnEmpresa = document.getElementById('submitBtnEmpresa');

    const nomeInputEmpresa = document.getElementById('nomeEmpresa');
    const emailInputEmpresa = document.getElementById('emailEmpresa');
    const cnpjInputEmpresa = document.getElementById('cnpjEmpresa');
    const areaAtuacaoEmpresa = document.getElementById('areaAtuacao');
    const senhaInputEmpresa = document.getElementById('senhaEmpresa');
    const validaSenhaInputEmpresa = document.getElementById('validaSenhaEmpresa');

    async function validarFormulario() {
        let nomeValido = nomeInputEmpresa.value !== '';
        let emailValido = emailInputEmpresa.value !== '';
        let cnpjValido = cnpjInputEmpresa.value !== '';
        let areaAtuacaoValido = areaAtuacaoEmpresa.value > 0;
        let senhaValida = senhaInputEmpresa.value !== '' && senhaInputEmpresa.value === validaSenhaInputEmpresa.value;

        if (cnpjValido) {
            const cnpjError = document.getElementById('cnpj-error-empresa');
            const validacaoCNPJ = await validaCNPJ(cnpjInputEmpresa.value);

            if (validacaoCNPJ[0]) {
                cnpjError.innerText = '';
            } else {
                cnpjValido = false;
                cnpjError.innerText = validacaoCNPJ[1];
            }
        }

        if (emailValido) {
            const emailError = document.getElementById('email-error-empresa');
            const validacaoEmail = await validaEmail(emailInputEmpresa.value);

            if (validacaoEmail[0]) {
                emailError.innerText = '';
            } else {
                emailValido = false;
                emailError.innerText = validacaoEmail[1];
            }
        }

        const senhaError = document.getElementById('senha-error-empresa');
        if (!senhaValida) {
            if (validaSenhaInputEmpresa.value !== '') {
                senhaValida = false;
                senhaError.innerText = 'As senhas não coincidem.';
            }
        } else {
            senhaError.innerText = '';
        }

        if (nomeValido && emailValido && cnpjValido && senhaValida && areaAtuacaoValido) {
            submitBtnEmpresa.disabled = false;
        } else {
            submitBtnEmpresa.disabled = true;
        }
    }

    nomeInputEmpresa.addEventListener('blur', validarFormulario);
    emailInputEmpresa.addEventListener('blur', validarFormulario);
    cnpjInputEmpresa.addEventListener('blur', validarFormulario);
    senhaInputEmpresa.addEventListener('blur', validarFormulario);
    areaAtuacaoEmpresa.addEventListener('change', validarFormulario);
    validaSenhaInputEmpresa.addEventListener('blur', validarFormulario);
});

document.addEventListener('DOMContentLoaded', () => {

    const cepInput = document.getElementById('cep');
    const logradouroInput = document.getElementById('logradouro');
    const bairroInput = document.getElementById('bairro');
    const cidadeInput = document.getElementById('cidade');
    const estadoInput = document.getElementById('estado');
    const numeroInput = document.getElementById('numero');
    const telefoneInput = document.getElementById('telefone');
    const complementoInput = document.getElementById('complemento');
    const submitBtn = document.getElementById('proximaEtapa');

    function validarFormulario() {
        const camposValidos =
            logradouroInput.value !== '' &&
            cepInput.value !== '' &&
            numeroInput.value !== '' &&
            estadoInput.value !== '0' &&
            cidadeInput.value !== '' &&
            bairroInput.value !== '' &&
            telefoneInput.value !== '';

        submitBtn.disabled = !camposValidos;
    }

    async function buscarCEP(cep) {
        try {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (!data.erro) {
                logradouroInput.value = data.logradouro || '';
                bairroInput.value = data.bairro || '';
                cidadeInput.value = data.localidade || '';
                telefoneInput.value = data.localidade || '';
                estadoInput.value = data.uf || '';
                numeroInput.focus();
            } else {
                alert('CEP não encontrado.');
            }
        } catch (error) {
            console.error('Erro ao buscar CEP:', error);
            alert('Não foi possível buscar o CEP. Tente novamente.');
        }
    }

    cepInput.addEventListener('blur', function () {
        const cep = cepInput.value.replace(/\D/g, '');
        if (cep.length === 8) {
            buscarCEP(cep);
        }
    });

    numeroInput.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '');
    });

    const inputs = [logradouroInput, numeroInput, estadoInput, cepInput, cidadeInput, bairroInput, telefoneInput];
    inputs.forEach(input => {
        input.addEventListener('blur', validarFormulario);
    });
})

document.addEventListener('DOMContentLoaded', () => {

    document.getElementById('btn-next').addEventListener('click', function () {
        currentStep = 1;
        showStep(currentStep);

        setTimeout(() => {
            showAlert('É novo por aqui?', '<p>Ficamos muito feliz em recebê-los! Estaremos prontos a responder qualquer outra dúvida pontual!</p><img class="w-100 mb-2" src="/images/reintegra.gif"></img><p>Nessa etapa, você irá selecionar que tipo de pessoa você representa (<b>ONG</b> ou <b>Empresa</b>) e será redirecionado para as demais etapas do cadastro.</p>')
        }, 500);
    });

    const els = document.querySelectorAll('#btn-prev')
    els.forEach(e => {
            e.addEventListener('click', function () {
            currentStep = 0;
            showStep(currentStep);
        })
    })

    document.getElementById('btn-next-ong').addEventListener('click', () => {
        currentStep = 2;
        showStep(currentStep);
    });

    document.getElementById('btn-next-empresa').addEventListener('click', () => {
        currentStep = 3;
        showStep(currentStep);
    });

    document.getElementById('submitBtnEmpresa').addEventListener('click', () => {
        currentStep = 4;
        showStep(currentStep);
        tipo_acesso = 'empresa';
    });


    document.getElementById('submitBtnOng').addEventListener('click', () => {
        currentStep = 4;
        showStep(currentStep);
        tipo_acesso = 'ong';
    });

    async function criarUsuario() {

        if (tipo_acesso === 'empresa') {
            const dados = {
                nome: document.getElementById('nomeEmpresa').value,
                email: document.getElementById('emailEmpresa').value,
                cnpj: document.getElementById('cnpjEmpresa').value,
                atuacao: document.getElementById('areaAtuacao').value,
                senha: document.getElementById('senhaEmpresa').value,
                logradouro: document.getElementById('logradouro').value,
                numero: document.getElementById('numero').value,
                complemento: document.getElementById('complemento').value,
                cep: document.getElementById('cep').value,
                bairro: document.getElementById('bairro').value,
                cidade: document.getElementById('cidade').value,
                estado: document.getElementById('estado').value,
                telefone: document.getElementById('telefone').value,
            };

            axios.post('/api/empresa/criar', dados)
            .then(res => {
                const perfilImagem = document.getElementById('perfilImage');
                perfilImagem.src = res.data.foto_usuario;
                usuario = res.data.usuario;
                currentStep = 5;
                showStep(currentStep);
            })
        } else {
            const dados = {
                nome: document.getElementById('nomeOng').value,
                email: document.getElementById('emailOng').value,
                cnpj: document.getElementById('cnpjOng').value,
                senha: document.getElementById('senhaOng').value,
                logradouro: document.getElementById('logradouro').value,
                numero: document.getElementById('numero').value,
                complemento: document.getElementById('complemento').value,
                cep: document.getElementById('cep').value,
                bairro: document.getElementById('bairro').value,
                cidade: document.getElementById('cidade').value,
                estado: document.getElementById('estado').value,
                telefone: document.getElementById('telefone').value,
            };

            axios.post('/api/ong/criar', dados)
            .then(res => {
                const perfilImagem = document.getElementById('perfilImage');
                perfilImagem.src = res.data.foto_usuario;
                usuario = res.data.usuario;
                currentStep = 5;
                showStep(currentStep);
            })
        }

    }

    async function confirmData() {
        let mensagem = '';

        if (tipo_acesso === 'empresa') {
            mensagem += `
                <h3>Dados da Empresa:</h3>
                <p><b>Nome:</b> ${document.getElementById('nomeEmpresa').value}</p>
                <p><b>Email:</b> ${document.getElementById('emailEmpresa').value}</p>
                <p><b>CNPJ:</b> ${document.getElementById('cnpjEmpresa').value}</p>
                <p><b>Área de Atuação:</b> ${document.getElementById('areaAtuacao').getDisplayValue()}</p>
            `;
        } else if (tipo_acesso === 'ong') {
            mensagem += `
                <h3>Dados da ONG:</h3>
                <p><b>Nome:</b> ${document.getElementById('nomeOng').value}</p>
                <p><b>Email:</b> ${document.getElementById('emailOng').value}</p>
                <p><b>CNPJ:</b> ${document.getElementById('cnpjOng').value}</p>
            `;
        }

        mensagem += `
            <h3>Dados de Endereço e Telefone:</h3>
            <p><b>Logradouro:</b> ${document.getElementById('logradouro').value}</p>
            <p><b>Número:</b> ${document.getElementById('numero').value}</p>
            <p><b>Complemento:</b> ${document.getElementById('complemento').value}</p>
            <p><b>Bairro:</b> ${document.getElementById('bairro').value}</p>
            <p><b>Cidade:</b> ${document.getElementById('cidade').value}</p>
            <p><b>Estado:</b> ${document.getElementById('estado').value}</p>
            <p><b>CEP:</b> ${document.getElementById('cep').value}</p>
            <p><b>Telefone:</b> ${document.getElementById('telefone').value}</p>
        `;

        mensagem += '<p>Você pode CONFIRMAR ou REVISAR. Confirmando, você aceita os nossos <a href="#" class="termo-servico">Termos de Serviço</a>.</p>'

        const res = await showConfirm('ATENÇÃO! Revise os seus dados!', mensagem, 'Confirmar', 'Revisar');

        if (res) {
            criarUsuario();
        }
    }

    document.getElementById('proximaEtapa').addEventListener('click', () => {
        confirmData();
    })


    const voltar = document.querySelectorAll('#voltar')
    voltar.forEach(e => {
        e.addEventListener('click', function () {
            currentStep -= 1;

            if (currentStep == 2) {
                currentStep = 1;
            }

            if (currentStep == 3) {
                if (tipo_acesso != 'empresa') {
                    currentStep -= 1;
                }
            }

            showStep(currentStep);
        });
    });

    VirtualSelect.init({
        ele: '#areaAtuacao',
        placeholder: 'Selecione a área de atuação',
        noSearchResultsTex: 'Nenhum resultado encontrado',
        noOptionsText: 'Nenhum resultado encontrado',
        searchPlaceholderText: 'Digite...',
        allOptionsSelectedText: 'Todas',
    });
});


document.addEventListener('DOMContentLoaded', () => {

    const cropperConfig = {
        perfil: { aspectRatio: 1 / 1, canvasWidth: 500, canvasHeight: 500 },
    };

    function setupCropper(modalId, inputId, previewId, cropButtonId, imageId, configKey) {
        let cropper;
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const cropButton = document.getElementById(cropButtonId);
        const image = document.querySelector(imageId);

        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
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

        cropButton.addEventListener('click', function() {
            const canvas = cropper.getCroppedCanvas({
                width: cropperConfig[configKey].canvasWidth,
                height: cropperConfig[configKey].canvasHeight,
            });
            canvas.toBlob(function(blob) {
                const url = URL.createObjectURL(blob);
                image.src = url;
                const modal = bootstrap.Modal.getInstance(document.getElementById(modalId));
                modal.hide();
                document.getElementById('saveChangesAlert').style.display = 'block';
            });
        });
    }

    setupCropper('imageCropperFotoPerfil', 'imageInputPerfil', 'imagePreviewPerfil', 'cropButtonPerfil', '#perfilImage', 'perfil');

});


