<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="confirmModalBody">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="confirmCancelButton"></button>
        <button type="button" class="btn btn-success" id="confirmOkButton"></button>
      </div>
    </div>
  </div>
</div>

<script>
    function showConfirm(title, message, okText = "OK", cancelText = "Cancelar") {
        return new Promise((resolve) => {
            document.getElementById('confirmModalLabel').textContent = title;
            document.getElementById('confirmModalBody').innerHTML = message;

            const okButton = document.getElementById('confirmOkButton');
            const cancelButton = document.getElementById('confirmCancelButton');
            okButton.textContent = okText;
            cancelButton.textContent = cancelText;

            var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            confirmModal.show();

            okButton.onclick = function() {
                confirmModal.hide();
                resolve(true);
            };

            cancelButton.onclick = function() {
                confirmModal.hide();
                resolve(false);
            };
        });
    }
</script>
