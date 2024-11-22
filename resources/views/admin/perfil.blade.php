@extends('layouts.layout-admin')
@section('titulo', 'Perfil | Reintegra')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard-empresa.css') }}">
<link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
<link rel="stylesheet" href="{{ asset('css/cropper.min.css') }}">
@endsection


@include('partials.profilebar')
@section('conteudo')

    @include('modals.alerta')
    <h1 class="page-title">Meu perfil</h1>


    <div class="divider">
        <div class="profile">
            <div class="topProfile">
                <div class="image-wrapper">
                    <img class="bannerPerfil" id="bannerImage" src="{{ $API_URL . $data['bannerPerfil'] }}">
                    <div class="hover-overlay" data-bs-toggle="modal" data-bs-target="#imageCropperModalBanner">
                        <img src="{{ asset('icons/cam.png') }}">
                    </div>
                </div>

                <div class="image-wrapper-absolute">
                    <img class="fotoPerfil" id="perfilImage" src="{{ $API_URL . $data['fotoPerfil'] }}">
                    <div class="hover-overlay-perfil" data-bs-toggle="modal" data-bs-target="#imageCropperFotoPerfil">
                        <img src="{{ asset('icons/cam.png') }}">
                    </div>
                </div>
            </div>
            <h2>{{ $data['nomeAdmin'] ?? $nome ?? 'Martha' }}</h2>


            <p class="descricaoPerfil">
                    <span class="short-text">
                        {!! nl2br(e(Str::limit($data['descricaoPerfil'], 180))) !!}
                    </span>
                    <span class="full-text" style="display: none;">
                        {!! nl2br(e($data['descricaoPerfil'])) !!}
                    </span>
                    @if (strlen($data['descricaoPerfil']) > 100)
                        <a href="javascript:void(0);" class="ver-tudo">Ver tudo</a>
                    @endif

                @if (isset($data['descricaoPerfil']))
                    <img class="img-editar" src="{{ asset('icons/edit.png') }}" data-bs-toggle="modal" data-bs-target="#editDescriptionModal">
                @else
                    <div class="desc-empresa" id="desc-empresa" data-bs-toggle="modal" data-bs-target="#editDescriptionModal">Adicionar descrição do perfil.</div>
                @endif


            </p>

            <div id="saveChangesAlert" class="save-changes-alert" style="display: none;">
                <p>Você têm alterações pendentes. Deseja salvar as mudanças?</p>
                <button id="saveChangesButton" class="btn btn-success">Salvar</button>
                <button id="discardChangesButton" class="btn btn-danger">Descartar</button>
            </div>

        </div>

        <div class="publicacoes">

        </div>
    </div>

    @include('modals.image-cropper', ['modalId' => 'imageCropperModalBanner', 'title' => 'Cortar Imagem do Banner', 'inputId' => 'imageInputBanner', 'previewId' => 'imagePreviewBanner', 'cropButtonId' => 'cropButtonBanner', 'imageId' => 'bannerImage', 'aspectRatio' => '4.5 / 1', 'canvasWidth' => 1800, 'canvasHeight' => 400])
    @include('modals.image-cropper', ['modalId' => 'imageCropperFotoPerfil', 'title' => 'Cortar Imagem do Perfil', 'inputId' => 'imageInputPerfil', 'previewId' => 'imagePreviewPerfil', 'cropButtonId' => 'cropButtonPerfil', 'imageId' => 'perfilImage', 'aspectRatio' => '1 / 1', 'canvasWidth' => 500, 'canvasHeight' => 500])

    <div class="modal fade" id="editDescriptionModal" tabindex="-1" aria-labelledby="editDescriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDescriptionModalLabel">Editar Descrição</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea id="editDescricao" rows="15" maxlength="1000" class="form-control">{{ $data['descricaoPerfil'] }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" id="saveEditButton">Salvar Alterações</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const verTudoLinks = document.querySelectorAll('.ver-tudo');

    verTudoLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                const descricaoPerfil = this.parentElement;
                const shortText = descricaoPerfil.querySelector('.short-text');
                const fullText = descricaoPerfil.querySelector('.full-text');

                if (fullText.style.display === "none") {
                    shortText.style.display = "none";
                    fullText.style.display = "inline";
                    this.innerText = "Ver menos";
                } else {
                    shortText.style.display = "inline";
                    fullText.style.display = "none";
                    this.innerText = "Ver tudo";
                }
            });
        });
    });
</script>


<script src="{{ asset('js/leaflet.js') }}"></script>
<script src="{{ asset('js/cropper.min.js') }}"></script>


<script>
     function imageToBlob(imageElement) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.crossOrigin = "Anonymous";
            img.src = imageElement;

            img.onload = function() {
                const canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;

                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);

                canvas.toBlob(function(blob) {
                    if (blob) {
                        resolve(blob);
                    } else {
                        reject(new Error('Conversion to Blob failed'));
                    }
                }, 'image/jpg');
            };

            img.onerror = function() {
                reject(new Error('Image load error'));
            };
        });
    }

    async function sendImage() {
        const formData = new FormData();

        try {
            const bannerBlob = await imageToBlob(document.getElementById('bannerImage').src);
            const fotoBlob = await imageToBlob(document.getElementById('perfilImage').src);

            formData.append('banner', bannerBlob, 'banner.jpg');
            formData.append('foto', fotoBlob, 'foto.jpg');

            const response = await fetch('{{ $API_URL }}/perfil/usuario/{{ $data['usuario'] }}', {
                method: 'PUT',
                body: formData
            });

            const data = await response.json();

            if (data) {
                showAlert('Sucesso!', 'Informações salvas com êxito!');
            }

        } catch (error) {
            showAlert('Xiiii... Deu Erro!', 'Ocorreu um erro ao salvar as informações. Tente novamente mais tarde!');
        }

    }

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const cropperConfig = {
            banner: { aspectRatio: 4.5 / 1, canvasWidth: 1800, canvasHeight: 400 },
            perfil: { aspectRatio: 1 / 1, canvasWidth: 500, canvasHeight: 500 },
        };

        function setupCropper(modalId, inputId, previewId, cropButtonId, imageId, configKey) {
            let cropper;
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const cropButton = document.getElementById(cropButtonId);
            const image = document.querySelector(imageId);

            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(preview, {
                        aspectRatio: cropperConfig[configKey].aspectRatio,
                        viewMode: 1,
                    });
                };
                reader.readAsDataURL(file);
            });

            cropButton.addEventListener('click', function() {
                const canvas = cropper.getCroppedCanvas({
                    width: cropperConfig[configKey].canvasWidth,
                    height: cropperConfig[configKey].canvasHeight,
                });
                canvas.toBlob(function(blob) {
                    const url = URL.createObjectURL(blob);
                    image.src = url;
                    const modal = bootstrap.Modal.getInstance(document.getElementById(modalId));
                    modal.hide();
                    document.getElementById('saveChangesAlert').style.display = 'block';
                });
            });
        }

        setupCropper('imageCropperModalBanner', 'imageInputBanner', 'imagePreviewBanner', 'cropButtonBanner', '#bannerImage', 'banner');
        setupCropper('imageCropperFotoPerfil', 'imageInputPerfil', 'imagePreviewPerfil', 'cropButtonPerfil', '#perfilImage', 'perfil');

        const saveButton = document.getElementById('saveChangesButton');
        const discardButton = document.getElementById('discardChangesButton');

        saveButton.addEventListener('click', function() {
            sendImage();
            document.getElementById('saveChangesAlert').style.display = 'none';
        });

        discardButton.addEventListener('click', function() {
            location.reload();
        });

        async function uploadDesc(desc) {
            const formData = new FormData();

            try {
                formData.append('descricao', desc);

                const response = await fetch('{{ $API_URL }}/perfil/usuario/desc/{{ $data['usuario'] }}', {
                    method: 'PUT',
                    body: formData
                });

                const data = await response.json();

                if (data) {
                    showAlert('Sucesso!', 'Informações salvas com êxito!');
                }

            } catch (error) {
                showAlert('Xiiii... Deu Erro!', 'Ocorreu um erro ao salvar as informações. Tente novamente mais tarde!');
            }
        }


        const saveDescricao = document.getElementById('saveEditButton');
        saveDescricao.addEventListener('click', function() {
            const newDescription = document.getElementById('editDescricao').value;

            const shortTextElement = document.querySelector('.short-text');
            const fullTextElement = document.querySelector('.full-text');
            shortTextElement.textContent = newDescription.length > 180 ? newDescription.substring(0, 180) + '...' : newDescription;
            fullTextElement.textContent = newDescription;

            const editModal = bootstrap.Modal.getInstance(document.getElementById('editDescriptionModal'));
            editModal.hide();
            uploadDesc(newDescription);
        })
    })
</script>

@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <ul style="list-style: none; margin: 0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



