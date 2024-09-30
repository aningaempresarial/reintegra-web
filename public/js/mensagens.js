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

            data.mensagens.forEach((mensagem) => {
                const tipoMensagem =
                    mensagem.idRemetente == idContato ? "recebido" : "enviado";

                const li = document.createElement("li");
                li.classList.add("list-group-item");

                const img = document.createElement("img");
                img.src = `http://127.0.0.1:8000/images/image-icon.png`;
                img.style.borderRadius = "100%";

                const messageBox = document.createElement("div");
                messageBox.classList.add("message-box", tipoMensagem);

                messageBox.textContent = mensagem.conteudoMensagem;

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

            const nomeContato =
                contato.querySelector(".nomeContatoLista").innerText;
            document.querySelector(
                ".nome-contato"
            ).innerText = `Conversa com ${nomeContato}`;

            const inputDestinatario = document.querySelector(".destinatario");
            inputDestinatario.value = nomeContato;

            const inputIdDestinatario =
                document.querySelector(".idDestinatario");
            inputIdDestinatario.value = idContato;
        })
        .catch((error) => {
            console.error("Erro ao carregar as mensagens:", error);
        });
}
