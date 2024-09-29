function carregarMensagens(contato) {
    const idContato = contato.getAttribute("data-id");

    fetch(`/mensagens/${idContato}`)
        .then((response) => response.json())
        .then((data) => {
            const mensagensContainer = document.querySelector(".list-messages");
            mensagensContainer.innerHTML = "";

            data.mensagens.forEach((mensagem) => {
                const tipoMensagem =
                    mensagem.idRemetente == idContato ? "enviado" : "recebido";

                const li = document.createElement("li");
                li.classList.add("list-group-item");

                const img = document.createElement("img");
                img.classList.add("profile-photo");
                img.src = `{{! asset(images/profile-photo.png) !}}`;
                img.style.borderRadius = "100%";

                const messageBox = document.createElement("div");
                messageBox.classList.add("message-box", tipoMensagem);
                messageBox.textContent = mensagem.conteudoMensagem;

                li.appendChild(img);
                li.appendChild(messageBox);

                mensagensContainer.appendChild(li);
            });

            const nomeContato =
                contato.querySelector(".nomeContatoLista").innerText;
            document.querySelector(
                ".nome-contato"
            ).innerText = `Conversa com ${nomeContato}`;
        })
        .catch((error) => {
            console.error("Erro ao carregar as mensagens:", error);
        });
}
