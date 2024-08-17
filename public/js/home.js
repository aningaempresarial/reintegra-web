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
