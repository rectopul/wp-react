; (function ($) {
    "use strict";


    /*------------------------------------
      lasest post slider
    ------------------------------------*/
    var LatestPostSlider = function ($scope, $) {
        /* -----------------------------------------------------
             Variables
         ----------------------------------------------------- */
        var leftArrow = '<i class="fa fa-angle-left"></i>';
        var rightArrow = '<i class="fa fa-angle-right"></i>';

        /*------------------------------------------------
           slider
       ------------------------------------------------*/
        $('.swp-slider-1').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            center: true,
            smartSpeed: 1500,
            stagePadding: 0,
            navText: [leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 0,
                },
                576: {
                    items: 1,
                    stagePadding: 50,
                },
                768: {
                    items: 1,
                    stagePadding: 100,
                },
                992: {
                    items: 1,
                    stagePadding: 200,
                },
                1200: {
                    items: 1,
                    stagePadding: 270,
                },
            }
        });


        /*------------------------------------------------
            slider
        ------------------------------------------------*/
        $('.swp-slider-2').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            navText: [leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
            }
        });

        /*------------------------------------------------
            slider
        ------------------------------------------------*/
        $('.swp-slider-4').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            navText: [leftArrow, rightArrow],
            items: 2,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
            }
        });

        /*------------------------------------------------
            slider
        ------------------------------------------------*/
        $('.swp-slider-3').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            navText: [leftArrow, rightArrow],
            items: 1,
        });

        /*------------------------------------------------
            slider
        ------------------------------------------------*/
        $('.swp-portfolio-single-slider').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            navText: [leftArrow, rightArrow],
            items: 1,
        });

    }


    $(document).on('click', '.swp-ajax-pagination a.page-link', function (e) {

        e.preventDefault();

        if ($('.catfilter.active').length > 0) {
            var Cat = $('.catfilter.active').data('filter');
        } else {
            var Cat = '';
        }

        var AjaxId = $('.swp_ajaxid').data('swp_ajaxid');
        var Style = $('.swp_ajaxid').data('style');
        var paged = $(this).text();
        $.ajax({
            type: 'post',
            url: swp_portfolio_localize.ajax_url,
            data: {
                action: 'swp_portfolio_pagination',
                AjaxId: AjaxId,
                paged: paged,
                Style: Style,
                Cat: Cat
            },
            beforeSend: function () {
                // setting a timeout
                $('.modal').addClass('show');
            },
            success: function (res) {

                $('.swp_ajaxid .swpisotopefilter').remove();
                $('.swp_ajaxid .swp-row').remove();
                $('.modal').removeClass('show');
                $('.swpajaxapend').html(res);
            }
        });
    });

    $(document).on('click', '.catfilter', function (e) {

        e.preventDefault();

        var Cat = $(this).data('filter');
        var AjaxId = $('.swp_ajaxid').data('swp_ajaxid');
        var Style = $('.swp_ajaxid').data('style');
        $.ajax({
            type: 'post',
            url: swp_portfolio_localize.ajax_url,
            data: {
                action: 'swp_portfolio_pagination',
                AjaxId: AjaxId,
                Style: Style,
                Cat: Cat,
            },
            beforeSend: function () {
                // setting a timeout
                $('.modal').addClass('show');
            },
            success: function (res) {

                $('.swp_ajaxid .swpisotopefilter').remove();
                $('.swp_ajaxid .swp-row').remove();
                $('.modal').removeClass('show');
                $('.swpajaxapend').html(res);
            }
        });
    });

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/slider.default', LatestPostSlider);
    });

})(jQuery);
