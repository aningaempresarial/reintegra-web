<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar meus dados</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <label class="form-label">Usuário</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                    </div>
                    <label class="form-label">E-mail público</label>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control">
                    </div>
                    <label class="form-label">Endereços</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="Rua X" disabled>
                        <a class="btn btn-light" data-bs-toggle="modal"
                        data-bs-target="#editEnderecoModal">Editar</a>
                    </div>
                    <a style="display: block; width: fit-content; margin-bottom: 16px" class="btn btn-light" href="#">Novo endereço</a>
                    <label class="form-label">Senha</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                    </div>
                    <label class="form-label">Confirme a senha</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-light">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('empresa.edit-endereco')