$(function () {
    //スライド
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        centeredSlides : true,
        loop: true,
        disableOnInteraction: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },

        pagination: {
            el: '.horizonal-pagination',
            clickable: true,
        },
        breakpoints: {
            375: {
                slidesPerView: 1,
                spaceBetween: 0
            }
        }
    });
})