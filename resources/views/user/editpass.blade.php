<div class="modal fade" id="editModalPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar senha</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/usuario/atualizar-senha" method="POST">
                    @csrf
                    <input type="hidden" value="{{$usuario['usuario'] ?? 'meunick'}}" name="usuario"/>
                    <label class="form-label">Nova Senha</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="new_senha">
                    </div>
                    <label class="form-label">Confirmar Nova Senha</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="">
                    </div>
                    <label class="form-label">Senha Atual</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="senha">
                    </div>
                    <button type="submit" class="btn btn-light">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
