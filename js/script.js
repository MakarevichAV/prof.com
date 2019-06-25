            // Плавный скрол при клике по пунктам меню 

$('.menu-item').click( function () {

    let target = $(this).attr('href');

    if ( target != undefined && target != '' ) {
        $('html, body').animate( {
            scrollTop: $(target).offset().top
        }, 400 );
    }
    console.log($(target).offset().top);
    return false;

} );



            // Проверка форм на заполнение

// Функция для проверки пустоты инпута
function checkForEmpty(inp, text) {
    if ( inp.val() == '' ) {
        inp.css({
            'border-color' : 'red'
        });
        let err = document.createElement('p');
        err.className = "error";

        if (text == undefined) {
            err.innerText = 'Заполните поле';
        } else {
            err.innerText = text;
        }

        if ( !inp.prev().is('.error') ) {
            inp.before(err);
        }
    } else {
        inp.removeAttr('style');
        if ( inp.prev().is('.error') ) {
            inp.prev().remove();
        }
    }
};


// Валидация форм отправки заявки о вступлении в профком и формы обращения
$('.form').submit( function () {
    
    let fio = $('[name="fio"]'),
        position = $('[name="position"]'),
        unit = $('[name="unit"]'),
        tel = $('[name="tel"]'),
        email = $('[name="email"]');
    
    let textArea = $('[name="appeal"]');
    
    if (    fio.val() == '' || 
            position.val() ==  '' || 
            unit.val() == '' || 
            tel.val() == '' || 
            email.val() == '' || 
            textArea.val() == ''
        ) {
                checkForEmpty(fio);
                checkForEmpty(position);
                checkForEmpty(unit);
                checkForEmpty(tel);
                checkForEmpty(email);
                checkForEmpty(textArea, 'Напишите хотя бы в двух словах');
    } else {
        $('.form').submit();
    }

    return false;

} );

// Валидация формы входа в аккаунт
$('.form-enter').submit( function () {
    
    let login = $('[name="login"]'),
        password = $('[name="password"]');

    if (    login.val() == '' || 
            password.val() ==  '' 
        ) {
                checkForEmpty(login);
                checkForEmpty(password);
    } else {
        $('.form-enter').submit();
    }

    return false;

} );

        // Проверка на нажатие клавиш внутри полей формы
$('input').keyup( function () {

    // let inputValue = $(this).val();
    checkForEmpty( $(this ) );

} );

$('textarea').keyup( function () {

    // let inputValue = $(this).val();
    checkForEmpty( $(this ), 'Напишите хотя бы в двух словах' );

} );

// Проверка совпадения паролей при регистрации

let passwordReg = $('.password-reg');
let password1 = $('#password1'),
    password2 = $('#password2');

let submit = document.querySelector('#submit');

let mark = document.createElement('div');
// mark.classList.add('mark');
passwordReg.append(mark);
// passwordReg.forEach( function (value, index) {
//     console.log(value);
// } );


password2.keyup( function () {

    if ( password2.val() === password1.val() ) {
        mark.classList.remove('cross-inp');
        mark.classList.add('mark');
        document.querySelector('#submit').removeAttribute('disabled');
        document.querySelector('#submit').classList.remove('disabled-button');
        return false;
    } else {
        mark.classList.remove('mark');
        mark.classList.add('cross-inp');
        document.querySelector('#submit').classList.add('disabled-button');
        document.querySelector('#submit').setAttribute('disabled', '');
        return false;
    }

} );

// console.log(passwordReg);

            // Всплывающее окно входа 
// при клике на "Войти" открытие всплывающего окна popup
let enter = $('.enter');
let popup = $('.popup');      // окно входа
    popupHi = $('.popupHi');  // окно приветствия

enter.click( function () {

    popup.addClass('flex');

} );

// закрытие popup при нажатии на крестик или на "Вступить в профсоюз"
let cross = $('.cross');     // крестик окна входа
    crossHiButton = $('.crossHi, .button'); // крестик и кнопка окна приветствия
let join = $('.join');

cross.click( function () {

    popup.removeClass('flex');

} );

crossHiButton.click( function () {  // по крестику в окне приветствия

    popupHi.addClass('none');

} );

join.click( function () {

    popup.removeClass('flex');

} );


            // Действия со стрелкой вверх "в начало страницы" 
// Появление стрелки вверх при пролистывании
let arrow = $('.arrow-up');

$(window).scroll( function () {

    if ( window.scrollY > 200 ) {
        arrow.addClass('block');
    } else {
        arrow.removeClass('block');
    }

} );

// Клик по стрелке и переход в начало страницы
arrow.click( function () {

    let target = $(this).attr('href');

    if ( target != undefined && target != '' ) {
        $('html, body').animate( {
            scrollTop: $(target).offset().top
        }, 400 );
    }
    return false;

} );


            // Открытие и закрытие меню в мобильной верстке

let clickExit = $('.cross-menu, .menu-item');
let menuButton = $('.menu-button, .line');
// let crossMenu = $('.cross-menu');
// let menuItem = $('.menu-item');
let nav = $('.nav');

menuButton.click( function () {
    // let nav = $('.nav');
    nav.addClass('right-0');
} );

clickExit.click( function () {
    nav.removeClass('right-0');
} );

$(document).click( function (e) {
    if ( !nav.is(e.target) && !menuButton.is(e.target) ) {
        nav.removeClass('right-0');
    }
} );


            // Разворачивание и сворачивание новостей

let clickSlide = $('.click-slide');
clickSlide.click( function () {

    let slideDiv = $(this).next('.slide');
    // slideDiv.slideDown();
    if ( slideDiv.attr('style') != 'display: block;' ) {
        slideDiv.slideDown();
        $(this).find( $('.up-down') ).html('Свернуть&#9650;');
    } else {
        slideDiv.slideUp();
        $(this).find( $('.up-down') ).html('Читать&#9660;');
    }

} );