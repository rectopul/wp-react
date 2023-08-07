; (function ($) {
    "use strict";

    $(document).ready(function () {

        /*------------------------------------------------
            portfolio single page slider
        ------------------------------------------------*/
        $('.swp-portfolio-single-slider').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            smartSpeed:1500,
            items: 1,
        });

        /* -------------------------------------------------
            Magnific JS Video
        ------------------------------------------------- */
        $('.swp-video-play-btn').magnificPopup({
            type: 'iframe',
            removalDelay: 260,
            mainClass: 'mfp-zoom-in',
            gallery:{
                enabled:true
            },
        });
        $.extend(true, $.magnificPopup.defaults, {
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/', 
                        id: function(url) {        
                            var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
                            if ( !m || !m[1] ) return null;
                            return m[1];
                        },
                        src: '//www.youtube.com/embed/%id%?autoplay=1' 
                    }
                }
            }
        });

        $('.swp-tab-menu li a').on('click', function(){
            var target = $(this).attr('data-rel');
            $('.swp-tab-menu li a').removeClass('active');
            $(this).addClass('active');
            $("#"+target).fadeIn('slow').siblings(".swp-tab-box").hide();
            return false;
        });

            
          /* -------------------------------------------------------------
           swp isotope
        ------------------------------------------------------------- */
        if ($(".swp-isotope").length) {

            var filterArea = $(".portfolio-area");
                
                filterArea.each(function () {

                var filterAreaId = $(this).data("filter-section");

                var Self = $(this);

                Self.find( '.swp-isotope' ).addClass( filterAreaId );

            var $galleryFilterArea = $( '.'+filterAreaId );

            //button            
            Self.find( '.isotope-filters' ).addClass( 'swp'+filterAreaId );
                
            var $galleryFilterMenu = $( '.swp'+filterAreaId);

                /*Filter*/
                $galleryFilterMenu.on( 'click', 'button, a', function() {
                    var $this = $(this),
                    $filterValue = $this.attr('data-filter');
                    $galleryFilterMenu.find('button, a').removeClass('active');
                    $this.addClass('active');
                    $galleryFilterArea.isotope({ filter: $filterValue });
                });
                /*Grid*/
                $galleryFilterArea.each(function(){
                    var $this = $(this),
                    $galleryFilterItem = '.swp-item';
                    $this.imagesLoaded( function() {
                        $this.isotope({
                            itemSelector: $galleryFilterItem,
                            percentPosition: true,
                            masonry: {
                                columnWidth: '.swp-sizer',
                            }
                        });
                    });
                });

            });   

        }


    });
})(jQuery);