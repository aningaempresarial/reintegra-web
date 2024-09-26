function consultarCep() {
    const cep = document.getElementById("cep").value;

    if (cep.length === 8 || cep.length === 9) {
        fetch(`/cep/${cep}`)
            .then((response) => response.json())
            .then((data) => {
                if (!data.erro) {
                    document.getElementById("logradouro").value =
                        data.logradouro;
                    document.getElementById("bairro").value = data.bairro;
                    document.getElementById("uf").value = data.uf;
                } else {
                    alert("CEP não encontrado.");
                }
            })
            .catch((error) => console.error("Erro ao consultar o CEP:", error));
    }
}

function consultarCepEmModal(input) {
    const modalBody = input.closest('.modal-body');

    const logradouroInput = modalBody.querySelector('#logradouro');
    const bairroInput = modalBody.querySelector('#bairro');
    const ufSelect = modalBody.querySelector('#uf');
    const cidadeSelect = modalBody.querySelector('#cidade');

    const cep = input.value.replace(/\D/g, '');

    if (cep.length === 8) {
        fetch(`/cep/${cep}`)
            .then((response) => response.json())
            .then((data) => {
                if (!data.erro) {
                    logradouroInput.value = data.logradouro;
                    bairroInput.value = data.bairro;
                    ufSelect.value = data.uf;
                    cidadeSelect.value = data.localidade;
                } else {
                    alert("CEP não encontrado.");
                }
            })
            .catch((error) => console.error("Erro ao consultar o CEP:", error));
    } else {
        alert("CEP inválido.");
    }
}
