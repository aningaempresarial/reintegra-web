<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar meus dados</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/usuario/atualizar-dados" method="POST">
                    @csrf
                    <input type="hidden" value="{{$usuario ?? 'meunick'}}" name="usuario"/>
                    <label class="form-label">Usuário</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="new_usuario" value="{{ $usuario ?? 'meunick' }}">
                    </div>
                    <label class="form-label">E-mail</label>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="new_email" value="{{ $email ?? 'meuemail@email.com' }}">
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
