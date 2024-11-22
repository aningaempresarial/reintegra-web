<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.modal').forEach(function (modal) {
            modal.addEventListener('show.bs.modal', function (event) {
                const modalElement = event.target;
                const idPostagem = modalElement.getAttribute('id').replace('modalVisualizar', '');
                
                const detailsContainer = modalElement.querySelector('.accordion-body');

                if (detailsContainer) {
                    detailsContainer.innerHTML = '<p>Carregando...</p>';

                    fetch(`post/vagas/${idPostagem}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data && data.vaga) {
                                detailsContainer.innerHTML = `
                                    <p>Requisitos: ${data.vaga.requisitosVaga || 'Não informado'}</p>
                                    <p>Salário: R$ ${data.vaga.salarioVaga || 'Não informado'}</p>
                                    <p>Tipo de contrato: ${data.vaga.tipoContrato || 'Não informado'}</p>
                                    <p>Escolaridade mínima: ${data.vaga.tipoEscolaridade || 'Não informado'}</p>
                                    <p>Carga horária: ${data.vaga.cargaHoraria || 'Não informado'} h</p>
                                    <p>Horário: ${data.vaga.horarioVaga || 'Não informado'}</p>
                                `;
                            } else {
                                detailsContainer.innerHTML = '<p>Detalhes não encontrados.</p>';
                            }
                        })
                        .catch(error => {
                            console.error('Erro ao buscar detalhes da vaga:', error);
                            detailsContainer.innerHTML = '<p>Erro ao carregar detalhes.</p>';
                        });
                }
            });
        });
    });
</script>

<div class="modal fade" id="modalVisualizar{{ $publicacao['idPostagem'] }}" tabindex="-1"
                            aria-labelledby="modalVisualizar{{ $publicacao['idPostagem'] }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalVisualizar{{ $publicacao['idPostagem'] }}Label">Exibição de postagem</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="padding: 30px">
                                        <div class="centered-item">
                                            <div class="card">

                                                <div class="card-body">
                                    
                                                    <h3 class="tituloPost">{{ $publicacao['tituloPostagem'] }}</h3>
                                                    <p class="textoPost">
                                                        {{$publicacao['conteudoPostagem']}}
                                                    </p>
                                                </div>

                                                <div class="card-top">
                                                    <div class="image-wrapper">
                                                        @if($publicacao['imagemPostagem'])
                                                            <img class="foto-imagem"
                                                                src="{{ $API_URL . $publicacao['imagemPostagem'] }}" alt="" srcset="">
                                                        @endif
                                                    </div>
                                                </div>

                                                @if ($publicacao['categoriaPostagem'] == 'emprego')
                                                <div class="accordion" id="accordionExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                                aria-expanded="false" aria-controls="collapseTwo">
                                                                Mais informações
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body" style="padding-bottom: 0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>