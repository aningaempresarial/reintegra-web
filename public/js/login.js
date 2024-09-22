document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.step');
    let currentStep = 0;

    function showStep(step) {
        steps.forEach((element, index) => {
            if (index === step) {
                element.classList.add('active');
            } else {
                element.classList.remove('active');
            }
        });
    }

    document.getElementById('btn-next').addEventListener('click', function() {
        currentStep = 1;
        showStep(currentStep);
    });


    document.getElementById('btn-prev').addEventListener('click', function() {
        currentStep = 0;
        showStep(currentStep);
    });


});
