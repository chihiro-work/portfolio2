$(function () {
    //fv過ぎたら背景色を付ける
    $(window).on('scroll', function () {
        let from_top = $(this).scrollTop();

        //トップページ用
        if ($('body').attr('id') === ('_top')) {

            if (($(this).width()) > 1000) {
                if (from_top > 656) {
                    $('header').css('background-color', '#282F35');
                } else {
                    $('header').css('background-color', 'transparent');
                }
                return false;
            }
            else if (($(this).width()) <= 1000) {
                if (from_top > 450) {
                    $('header').css('background-color', '#282F35');
                } else {
                    $('header').css('background-color', 'transparent');
                }
                return false;
            }
        }

        //コンタクトページ用
        else if ($('body').attr('id') === ('_contact')) {
            if (($(this).width()) > 1440) {
                if (from_top > 300) {
                    $('header').css('background-color', '#282F35');
                } else {
                    $('header').css('background-color', 'transparent');
                }
                return false;
            }
            else if (($(this).width()) <= 959) {
                if (from_top > 300) {
                    $('header').css('background-color', '#282F35');
                } else {
                    $('header').css('background-color', 'transparent');
                }
                return false;
            }
        }
    })

    /* ハンバーガーメニュー */
    $('.sp-menu-icon').on('click', function () {
        $('.humbergur').addClass('open');
    })
    $('.sp-close-icon').on('click', function () {
        $('.humbergur').removeClass('open');
    })

    /* スムーススクロール */
    const $from = $('a[href^="#"]');

    $from.on('click', function () {
        $('.humbergur').removeClass('open');
        let position = $(this).attr('href');
        let $target = $(position).offset().top;
        $('body, html').animate({scrollTop: $target}, 800);
        return false;
    })
})