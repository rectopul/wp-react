<?php
/*
 * isotope ajax filter js
*/
if (!\Elementor\Plugin::$instance->editor->is_edit_mode()) : ?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            if (jQuery(".swp-isotope").length) {

                var filterArea = jQuery(".portfolio-area");

                filterArea.each(function() {

                    var filterAreaId = jQuery(this).data("filter-section");

                    var Self = jQuery(this);

                    Self.find('.swp-isotope').addClass(filterAreaId);

                    var $galleryFilterArea = jQuery('.' + filterAreaId);

                    //button            
                    Self.find('.isotope-filters').addClass('swp' + filterAreaId);

                    var $galleryFilterMenu = jQuery('.swp' + filterAreaId);

                    /*Filter*/
                    $galleryFilterMenu.on('click', 'button, a', function() {
                        var $this = jQuery(this),
                            $filterValue = $this.attr('data-filter');
                        $galleryFilterMenu.find('button, a').removeClass('active');
                        $this.addClass('active');
                        $galleryFilterArea.isotope({
                            filter: $filterValue
                        });
                    });
                    /*Grid*/
                    $galleryFilterArea.each(function() {
                        var $this = jQuery(this),
                            $galleryFilterItem = '.swp-item';
                        $this.imagesLoaded(function() {
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
    </script>
<?php endif; ?>