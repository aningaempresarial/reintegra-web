<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar meus dados</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/atualizar-empresa/' . $data['usuario']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="form-label">Nome da empresa</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $data['nomeEmpresa'] }}" name="nome">
                    </div>
                    <label class="form-label">E-mail público</label>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" value="{{ $data['emailEmpresaContato'] }}" name="email">
                    </div>
                    <label class="form-label">Endereços</label>
                    <div class="input-group mb-3">
                        @foreach ($data['enderecos'] as $item)
                        <input type="text" class="form-control" value="{{ $item['logradouroEnderecoEmpresa'] }}, {{ $item['numEnderecoEmpresa'] }}, {{ $item['bairroEnderecoEmpresa'] }}, {{ $item['estadoEnderecoEmpresa'] }}" disabled>
                        @endforeach
                        <a class="btn btn-light" data-bs-toggle="modal"
                        data-bs-target="#editEnderecoModal">Editar</a>
                    </div>
                    <a style="display: block; width: fit-content; margin-bottom: 16px" class="btn btn-light" href="#">Novo endereço</a>
                    <button type="submit" class="btn btn-light">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('empresa.edit-endereco')