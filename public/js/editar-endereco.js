document.addEventListener("DOMContentLoaded", function () {
    var editButtons = document.querySelectorAll(".edit-endereco");
    var editModal = document.getElementById("editEnderecoModal");

    editButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var id = this.getAttribute("data-id");
            var cep = this.getAttribute("data-cep");
            var num = this.getAttribute("data-num");
            var estado = this.getAttribute("data-estado");
            var cidade = this.getAttribute("data-cidade");
            var logradouro = this.getAttribute("data-logradouro");
            var bairro = this.getAttribute("data-bairro");
            var complemento = this.getAttribute("data-complemento");

            editModal.querySelector('[name="id"]').value = id;
            editModal.querySelector('[name="cep"]').value = cep;
            editModal.querySelector('[name="num"]').value = num;
            editModal.querySelector('[name="estado"]').value = estado;
            editModal.querySelector('[name="cidade"]').value = cidade;
            editModal.querySelector('[name="logradouro"]').value = logradouro;
            editModal.querySelector('[name="bairro"]').value = bairro;
            editModal.querySelector('[name="complemento"]').value = complemento;
        });
    });
});
