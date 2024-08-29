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
