let slideIndex = 0;
let autoSlideInterval;

function showSlides() {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');

    // Resetando todas as bolinhas e escondendo os slides
    for (let i = 0; i < slides.length; i++) {
        dots[i].classList.remove('active');
    }

    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1; }

    // Movendo as imagens de forma suave com transição
    const slideWidth = slides[0].clientWidth;
    const slidesContainer = document.querySelector('.slides');
    slidesContainer.style.transform = `translateX(${-slideWidth * (slideIndex - 1)}px)`;

    // Ativando a bolinha correspondente ao slide
    dots[slideIndex - 1].classList.add('active');

    autoSlideInterval = setTimeout(showSlides, 7000); // Muda a cada 6 segundos
}

function currentSlide(n) {
    clearTimeout(autoSlideInterval);  // Para a rotação automática quando clicar
    slideIndex = n - 1;
    showSlides();
}

// Inicializa o carrossel
showSlides();