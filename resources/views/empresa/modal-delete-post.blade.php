<div class="modal fade" id="modalDeletar{{ $publicacao['idPostagem'] }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir postagem</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="font-size: 1.4rem; text-align: center">Tem certeza de que quer excluir essa postagem?</p>
                <form action="{{ url('delete-post/' . $publicacao['idPostagem']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Não</button>
                        <button type="submit" class="btn btn-danger">Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>