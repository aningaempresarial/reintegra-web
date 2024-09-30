function carregarMensagens(contato) {
    const idContato = contato.getAttribute("data-id");

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

                if (tipoMensagem == 'recebido') {
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

            const inputDestinatario = document.querySelector('.destinario');
            inputDestinatario.value = nomeContato;
        })
        .catch((error) => {
            console.error("Erro ao carregar as mensagens:", error);
        });
}
