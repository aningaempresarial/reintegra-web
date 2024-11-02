<div class="modal fade" id="modalMessage" tabindex="-1" aria-labelledby="modalMessageLabel" aria-hidden="true" style="z-index: 10000 !important">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalMessageLabel">Envie uma mensagem</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modalMessageContato" method="POST">
                    @csrf
                    <label class="form-label">Digite um texto:</label>
                    <div class="input-group mb-3">
                        <textarea style="padding: 8px" class="form-control form-control-lg" placeholder="Olá, {{ $candidato['nome'] }}!" name="conteudoMensagem" required></textarea>
                        <input type="hidden" name="destinatario" class="destinatario" value="{{ $candidato['nome'] }}">
                        <input type="hidden" name="idDestinatario" class="idDestinatario" value="{{ $candidato['idUsuario'] }}">
                    </div>

                    <button type="submit" class="btn btn-light">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>