<?php
/*
 * style one template
*/
?>
<div class="swp-row swp-ajax-pagination">
    <div class="swp-col-lg-12 text-center">
        <?php

        $add_args = [];

        $big = 999999999; 
        $pages = paginate_links( array( 
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format'       => '?page=%#%',
                'current'      => max( 1,$paged ),
                'total'        => $posts_query->max_num_pages,
                'type'         => 'array',
                'show_all'     => false,
                'end_size'     => 3,
                'mid_size'     => 1,
                'prev_next'    => false,
                'next_text'    => false,
                'add_args'     => $add_args,
                'add_fragment' => ''
             )
        );

        if ( is_array( $pages ) ) {
            $pagination = '<div class="swp-pagination-wrapper"><ul class="swp-pagination">';

            foreach ( $pages as $page ) {
               $pagination .= '<li class="page-item '.(strpos($page, 'current') !== false ? 'active' : '').'"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
            }

            $pagination .= '</ul></div>';

            echo wp_kses_post( $pagination );

        }

        wp_reset_postdata();
        ?>

    </div>
</div>