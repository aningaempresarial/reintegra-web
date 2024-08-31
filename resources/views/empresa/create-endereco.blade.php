<div class="modal fade" id="createEnderecoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar endereço</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/cadastrar-endereco-empresa/' . $data['usuario']) }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id" value="{{$data['idEmpresa']}}">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">CEP</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onblur="consultarCep()" id="cep" name="cep">
                            </div>
                            <label class="form-label">Número</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="num">
                            </div>
                            <label class="form-label">Estado</label>
                            <div class="input-group mb-3">
                                <select class="form-select" aria-label="Default select example" id="uf" name="estado">
                                    <option value="" disabled selected>UF</option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">Logradouro</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="logradouro" name="logradouro">
                            </div>
                            <label class="form-label">Bairro</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="bairro" name="bairro">
                            </div>
                            <label class="form-label special-label">Conclua:</label>
                            <button type="submit" class="btn btn-light btn-update">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>