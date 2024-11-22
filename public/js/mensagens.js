function carregarMensagens(contato) {
    const idContato = contato.getAttribute("data-id");

    const elementosLista = document.querySelectorAll('.list-item-contato');
    elementosLista.forEach(elemento => {
        elemento.style.backgroundColor = '#e8f4ffa2';
    });

    const contatoLista = document.querySelector(`[data-id="${idContato}"]`);
    contatoLista.style.backgroundColor = "b6e9ff";

    fetch(`/mensagens/${idContato}`)
        .then((response) => response.json())
        .then((data) => {
            const mensagensContainer = document.querySelector(".list-messages");
            mensagensContainer.innerHTML = "";

            let ultimaData = null;

            data.mensagens.forEach((mensagem) => {
                const tipoMensagem = mensagem.idRemetente == idContato ? "recebido" : "enviado";

                const dataMensagem = mensagem.data;
                if (!dataMensagem || dataMensagem.indexOf('/') === -1) {
                    console.error("Data inválida:", dataMensagem);
                    return;
                }

                const dataFormatada = formatarData(dataMensagem);

                if (dataFormatada !== ultimaData) {
                    ultimaData = dataFormatada;

                    const header = document.createElement("div");
                    header.classList.add("message-date-header");
                    header.textContent = dataFormatada;
                    mensagensContainer.appendChild(header);
                }

                const li = document.createElement("li");
                li.classList.add("list-group-item");

                const BASE_URL = "http://localhost:8080/";

                const fotoPerfil = mensagem.fotoPerfil != null ? BASE_URL + mensagem.fotoPerfil : `http://127.0.0.1:8000/images/image-icon.png`;

                const img = document.createElement("img");
                img.src = fotoPerfil;
                img.style.borderRadius = "100%";

                img.onerror = () => {
                    img.src = `http://127.0.0.1:8000/images/image-icon.png`;
                };

                const messageBox = document.createElement("div");
                messageBox.classList.add("message-box", tipoMensagem);
                messageBox.textContent = mensagem.conteudoMensagem;

                const horario = document.createElement("span");
                horario.classList.add("message-time");
                horario.textContent = mensagem.horario;

                messageBox.appendChild(horario);

                if (tipoMensagem == "recebido") {
                    li.appendChild(img);
                    li.appendChild(messageBox);
                } else {
                    li.appendChild(messageBox);
                    li.appendChild(img);
                }

                mensagensContainer.appendChild(li);
                mensagensContainer.scrollTop = mensagensContainer.scrollHeight;
            });

            const nomeContato = contato.querySelector(".nomeContatoLista").innerText;
            document.querySelector(".nome-contato").innerText = `Conversa com ${nomeContato}`;

            const inputDestinatario = document.querySelector(".destinatario");
            inputDestinatario.value = nomeContato;

            const inputIdDestinatario = document.querySelector(".idDestinatario");
            inputIdDestinatario.value = idContato;
        })
        .catch((error) => {
            console.error("Erro ao carregar as mensagens:", error);
        });
}

function formatarData(data) {
    const dataObj = new Date(data.split('/').reverse().join('-'));

    if (isNaN(dataObj)) {
        console.error("Data inválida:", data);
        return "Data inválida";
    }

    const diasDaSemana = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"];
    const meses = ["janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"];

    const dia = dataObj.getDate();
    const mes = meses[dataObj.getMonth()];
    const ano = dataObj.getFullYear();
    const diaSemana = diasDaSemana[dataObj.getDay()];

    return `${diaSemana}, ${dia} de ${mes} de ${ano}`;
}
