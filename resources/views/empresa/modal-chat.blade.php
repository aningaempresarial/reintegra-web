<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo contato</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="form-label">Usuário</label>
                    <div class="input-group mb-3">
                        <input id="searchbar-input" type="text" class="form-control">
                    </div>

                    <div id="nenhum-contato" style="display: none; text-align: center; margin-top: 20px;">
                        Nenhum usuário encontrado.
                    </div>

                    <button type="submit" class="btn btn-light">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>