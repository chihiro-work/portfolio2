$(function () {
    /* fv過ぎたら背景色を付ける */
    $(window).on('scroll', function () {
        let from_top = $(this).scrollTop();

        //トップページの場合
        if ($('body').attr('id') === '_top') {
            const top_page_height = ($('#concept').offset().top - 196);

            if (from_top > top_page_height) {
                $('header').css('background-color', '#282F35');
            } else {
                $('header').css('background-color', 'transparent');
            }
            return false;

        //トップページ以外の場合
        } else {
            const other_page_height = ($('#_js_fv_height').offset().top - 193);

            if (from_top > other_page_height) {
                $('header').css('background-color', '#282F35');
            } else {
                $('header').css('background-color', 'transparent');
            }
            return false;
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
        let target = $(position).offset().top;
        $('body, html').animate({scrollTop: target}, 800);
        return false;
    })

    /*============================================
    IE対策
    ============================================*/
    //右サイドバーのposition: stickyの代替
    //topに戻るボタンを付与
    const userAgent = window.navigator.userAgent.toLowerCase();
    
    if (userAgent.indexOf('msie') != -1 || userAgent.indexOf('trident') != -1) {
        const $btn_top = $('.btn-top');

        //スクロール量によってトップに戻るボタンの表示・非表示を分ける
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 200) {
                $btn_top.fadeIn()
            } else {
                $btn_top.fadeOut()
            }
        })

        //クリックすると1番上に戻る
        $btn_top.on('click', function () {
            $('body, html').animate({ scrollTop: 0 }, 500);
        })
    }
})