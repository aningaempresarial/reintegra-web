$(document).ready(function(){
    var $carousel = $('.carousel');

    $carousel.slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 3000,
        cssEase: 'linear',
        arrows: false,
        dots: false
    });

    $carousel.on('mouseenter', function() {
        $carousel.slick('slickSetOption', 'autoplay', false, true);
    });

    $carousel.on('mouseleave', function() {
        $carousel.slick('slickSetOption', 'autoplay', true, true);
    });
});

var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    navigation: {
        nextEl: '.next',
        prevEl: '.prev',
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 50,
        },
    },
});
