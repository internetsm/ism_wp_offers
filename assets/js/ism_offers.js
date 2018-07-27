var ism = window.ism || {};

ism.initOffersDatepickers = function () {

    jQuery("#datepicker-arrival").datepicker({
        dateFormat: 'dd-mm-yy',
    });

    jQuery("#datepicker-departure").datepicker({
        dateFormat: 'dd-mm-yy',
    });
};

ism.initOffersCarousels = function () {
    jQuery(".slick-carousel").each(function () {
        var carousel = jQuery(this);
        var columns = carousel.data("columns");
        var columnsTablet = carousel.data("columns-tablet");
        var columnsMobile = carousel.data("columns-mobile");
        var scroll_columns = carousel.data("scroll_columns");
        var autoplay = carousel.data("autoplay");
        var autoplay_speed = carousel.data("autoplay-speed");
        var speed = carousel.data("speed");
        var arrows = carousel.data("arrows");
        var dots = carousel.data("dots");

        carousel.slick({
            slidesToShow: columns,
            slidesToScroll: scroll_columns,
            arrows: arrows,
            dots: dots,
            speed: speed,
            autoplay: autoplay,
            autoplaySpeed: autoplay_speed,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: columnsTablet,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: columnsMobile,
                        slidesToScroll: 1
                    }
                }
            ]

        });
    });
};

jQuery(function () {
    ism.initOffersDatepickers();
    ism.initOffersCarousels();
});