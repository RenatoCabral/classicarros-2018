/**
 * Created by renato on 01/08/17.
 */

$(".button-collapse").sideNav();

$(document).ready(function () {
    makeMasks();
    makeActiveMenu();

    jQuery('.select-searchform').select2();

    $('.collapsible').collapsible();
});

//http://kenwheeler.github.io/slick/
$('.item-slider').slick({
    dots: true,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2000,
    infinite: true,
    speed: 1000,
    fade: true,
    cssEase: 'linear'
});

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    dots: true
    // asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    arrows: false,
    dots: true,
    centerMode: true,
    focusOnSelect: true,
    adaptiveHeight: true
});


function makeMasks() {
    var cellphoneMask = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        cellphoneOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(cellphoneMask.apply({}, arguments), options);
            }
        };
    $('.phone').mask(cellphoneMask, cellphoneOptions);
    $('.input-cpf').mask('000.000.000-00', {reverse: true});
}


function makeActiveMenu() {
    var currentUrl = window.location.pathname.substr(1);
    if (currentUrl === '') {
        $('[data-menu="inicio"]').addClass('active');
    } else {
        $('[data-menu="' + currentUrl + '"]').addClass('active');
    }
}
