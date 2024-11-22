@extends('layouts.layout-admin')
@section('titulo', 'Reintegra | Usuários')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/users-admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')  }}">
@endsection


@include('modals.alerta')

@include('partials.profilebar')
@section('conteudo')
<div class="panel main-panel" style="padding-top: 0">
    <div class="h2 title mt-4">Usuários cadastrados</div>

    <div class="div-banner">

        <div class="div-pesquisa">

            <div class="flex-1">
                <h2 class="subtitle">Encontre um usuário</h2>
                <input type="text" id="searchbar-input" placeholder="Ex.: Maria José">
            </div>

        </div>

        <div class="div-image">
            <img src="{{ asset('images/boneco-adm.png') }}">
        </div>

    </div>

    <!-- <button type="button" class="btn btn-light btn-add-admin" data-bs-toggle="modal"
        data-bs-target="#addAdminModal">Adicionar administrador</button> -->

        <div class="table-responsive mt-3">
            <table class="table table-hover align-middle text-center" id="publicacoes-table">
                <thead class="style-thead">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Tipo de usuário</th>
                        <th scope="col">Status</th>
                        <th>Visualizar</th>
                        <th>Bloquear</th>
                        <th>Banir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario['nomeUsuario'] }}</td>
                            <td>{{ $usuario['usuario'] }}</td>
                            <td>{{ $usuario['tipoEntidade'] }}</td>
                            <td>{{ $usuario['statusEntidade'] }}</td>
                            <td>
                            <button type="button" style="border: none; background: none;" onclick="viewUserProfile({{ json_encode($usuario) }})">
                                <img src="{{ asset('images/view-icon.png') }}" class="icon edit-icon" alt="Visualizar">
                            </button>
                            </td>

                            <td>
                                <button type="button" style="border: none; background: none;" onclick="handleBlockUser('{{ $usuario['usuario'] }}')">
                                    <img src="{{ asset('images/block-icon.png') }}" class="icon block-icon" alt="Bloquear">
                                </button>
                            </td>
                            <td>
                                <button type="button" style="border: none; background: none;" onclick="handleBanUser('{{ $usuario['usuario'] }}')">
                                    <img src="{{ asset('images/delete-icon.png') }}" class="icon delete-icon" alt="Banir">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="nenhuma-publicacao" style="display: none; text-align: center; margin-top: 20px;">
            Nenhum usuário encontrado.
        </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>

    <script>
        function submitForm() {
            document.getElementById('filterForm').submit();
        }

        @if (session('success'))
            showAlert('Sucesso!', '{{ session('success') }}');
        @endif
    </script>

    <script>

        $(document).ready(() => {
            var tabelaVazia = $('#publicacoes-table tbody tr').length === 0;

            if (tabelaVazia) {
                $('#nenhuma-publicacao').show();
                $('#publicacoes-table').hide();
            }

            $('#searchbar-input').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                var hasResults = false;

                $('#publicacoes-table tbody tr').filter(function () {
                    var match = $(this).text().toLowerCase().indexOf(value) > -1;
                    $(this).toggle(match);
                    if (match) hasResults = true;
                });

                if (!hasResults) {
                    $('#nenhuma-publicacao').show();
                } else {
                    $('#nenhuma-publicacao').hide();
                }
            });
        });

    </script>

    @include('admin.users.create-adm')
</div>


<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="confirmModalBody"></p>
        <textarea id="confirmModalTextarea" class="form-control" rows="4" placeholder="Digite o motivo aqui..."></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="confirmCancelButton">Cancelar</button>
        <button type="button" class="btn btn-primary" id="confirmOkButton">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userProfileModalLabel">Perfil do Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="topProfile">
          <div class="image-wrapper">
            <img id="userBanner" class="bannerPerfil" src="" alt="Banner do Usuário">
          </div>
          <div class="image-wrapper-absolute">
            <img id="userProfilePic" class="fotoPerfil" src="" alt="Foto do Usuário">
          </div>
        </div>
        <h2 id="userName" class="mt-3"></h2>
        <p id="userDescription" class="descricaoPerfil"></p>
        <div id="userLocation" class="mt-3"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


@endsection

<script>
    function showConfirmWithReason(title, message, okText = "Confirmar", cancelText = "Cancelar") {
    return new Promise((resolve) => {
        document.getElementById('confirmModalLabel').textContent = title;
        document.getElementById('confirmModalBody').textContent = message;
        document.getElementById('confirmModalTextarea').value = "";

        const okButton = document.getElementById('confirmOkButton');
        const cancelButton = document.getElementById('confirmCancelButton');
        okButton.textContent = okText;
        cancelButton.textContent = cancelText;

        const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        confirmModal.show();

        okButton.onclick = function () {
            const reason = document.getElementById('confirmModalTextarea').value.trim();
            confirmModal.hide();
            resolve({ confirmed: true, reason: reason });
        };

        cancelButton.onclick = function () {
            confirmModal.hide();
            resolve({ confirmed: false, reason: null });
        };
    });
}

function handleBlockUser(usuario) {
    showConfirmWithReason(
        "Bloquear Usuário",
        "Tem certeza que deseja bloquear este usuário? Informe o motivo abaixo."
    ).then((result) => {
        if (result.confirmed) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/admin/change';
            form.innerHTML = `
                @csrf
                <input type="hidden" name="usuario" value="${usuario}">
                <input type="hidden" name="status" value="bloqueado">
                <input type="hidden" name="motivo" value="${result.reason}">
            `;
            document.body.appendChild(form);
            form.submit();
        }
    });
}

function handleBanUser(usuario) {
    showConfirmWithReason(
        "Banir Usuário",
        "Tem certeza que deseja banir este usuário? Informe o motivo abaixo."
    ).then((result) => {
        if (result.confirmed) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/admin/change';
            form.innerHTML = `
                @csrf
                <input type="hidden" name="usuario" value="${usuario}">
                <input type="hidden" name="status" value="excluido">
                <input type="hidden" name="motivo" value="${result.reason}">
            `;
            document.body.appendChild(form);
            form.submit();
        }
    });
}

function viewUserProfile(usuario) {
    const API_URL = "{{ $API_URL }}";

    document.getElementById('userBanner').src = API_URL + usuario.bannerPerfil;
    document.getElementById('userProfilePic').src = API_URL + usuario.fotoPerfil;
    document.getElementById('userName').textContent = usuario.nomeUsuario || 'Nome não informado';
    document.getElementById('userDescription').innerHTML = usuario.descricaoPerfil
        ? usuario.descricaoPerfil.replace(/\n/g, '<br>')
        : 'Descrição não disponível.';

    const profileModal = new bootstrap.Modal(document.getElementById('userProfileModal'));
    profileModal.show();
}

function nl2br(str) {
    return str.replace(/\n/g, '<br>');
}


</script>


@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            showAlert('ERRO!', '{{ $error }}')
        @endforeach
    </script>
@endif
