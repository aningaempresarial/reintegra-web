
document.addEventListener('DOMContentLoaded', function() {
    const cnpjInput = document.getElementById('cnpjOng');
    Inputmask({
        mask: '99.999.999/9999-99',
        placeholder: '',
        clearIncomplete: true,
    }).mask(cnpjInput);
});


function validaCNPJ(cnpj) {
    return new Promise((resolve, reject) => {
        fetch(`${API_URL}/user/verificar/cnpj/${cnpj.replaceAll('/', '').replaceAll('.', '')}`)
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
        fetch(`${API_URL}/user/verificar/email/${email.replaceAll('/', '')}`)
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

document.addEventListener('DOMContentLoaded', function () {
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

    emailInputOng.addEventListener('blur', validarFormulario);
    cnpjInputOng.addEventListener('blur', validarFormulario);
    senhaInputOng.addEventListener('blur', validarFormulario);
    validaSenhaInputOng.addEventListener('blur', validarFormulario);
});


document.addEventListener('DOMContentLoaded', function () {
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

    document.getElementById('btn-next-ong').addEventListener('click', function () {
        currentStep = 2;
        showStep(currentStep);
    });

    document.getElementById('btn-next-empresa').addEventListener('click', function () {
        currentStep = 3;
        showStep(currentStep);
    });


    const voltar = document.querySelectorAll('#voltar')
    voltar.forEach(e => {
        e.addEventListener('click', function () {
            currentStep -= 1;

            if (currentStep == 2) {
                currentStep = 1;
            }

            showStep(currentStep);
        });
    });
});

