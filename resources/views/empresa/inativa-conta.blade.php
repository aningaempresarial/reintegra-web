<div class="modal fade" id="inativaContaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tem certeza disso?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/inativar-empresa/' . $data['usuario']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p style="font-size: 0.9rem; color: gray">Ao inativar a conta, ela não será mais visível e ficará impedida de fazer qualquer interação. Reveja se deseja prosseguir.</p>
                    <label class="form-label">Digite a sua senha</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="senha">
                    </div>
                    <label class="form-label">Confirme a sua senha</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="confirma-senha">
                    </div>
                    <button type="submit" class="btn btn-light">Inativar</button>
                </form>
            </div>
        </div>
    </div>
</div>