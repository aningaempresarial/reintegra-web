document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('cadastro-form');
    const progressBar = document.getElementById('progress-bar');
    const fields = form.querySelectorAll('input');
    const select = form.querySelector('select');
    const totalFields = fields.length;

    fields.forEach(field => {
        field.addEventListener('input', updateProgress);
    });

    select.addEventListener('change', updateProgress);

    function updateProgress() {
        let filledFields = 0;

        fields.forEach(field => {
            if (field.value.trim() !== '' && field.type !== 'submit') {
                filledFields++;
            }
        });

        if (select.value.trim() !== '' && select.value !== 'UF') {
            filledFields++;
        }

        const progress = (filledFields / totalFields) * 100;

        progressBar.style.width = progress + '%';
        progressBar.setAttribute('aria-valuenow', progress);
    }

    updateProgress();
});
