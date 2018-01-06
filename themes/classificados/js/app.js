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

/*FUNÇÃO PARA MENSAGEM ESTILO MAQUINA DE ESCREVER*/

var div = document.getElementById('log');
var textos = ['BEM VINDO AO CLASSICARROS, O SISTEMA CERTO PAR VENDER SEU(S) VEÍCULO(S)!', 'O QUE ESTÁ ESPERANDO? FAÇA SEU ANUNCIO, DE FORMA RÁPIDA E FÁCIL, E TENHA BONS NEGÓCIOS!', 'PARA FAZER SEU ANÚNCIO CLIQUE AQUI, OU EM MINHA CONTA!'];

function escrever(str, done) {
    var char = str.split('').reverse();
    var typer = setInterval(function() {
        if (!char.length) {
            clearInterval(typer);
            return setTimeout(done, 800); // só para esperar um bocadinho
        }
        var next = char.pop();
        div.innerHTML += next;
    }, 80);
}

function limpar(done) {
    var char = div.innerHTML;
    var nr = char.length;
    var typer = setInterval(function() {
        if (nr-- == 0) {
            clearInterval(typer);
            return done();
        }
        div.innerHTML = char.slice(0, nr);
    }, 60);
}

function rodape(conteudos, el) {
    var atual = -1;
    function prox(cb){
        if (atual < conteudos.length - 1) atual++;
        else atual = 0;
        var str = conteudos[atual];
        escrever(str, function(){
            limpar(prox);
        });
    }
    prox(prox);
}
rodape(textos);
