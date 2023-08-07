<?php 
/*
 * swp portfolio
*/
get_header();
$swp_portfolio_related_post_meta = get_post_meta( get_queried_object_id(), 'swp_portfolio_meta' );
while ( have_posts() ) :   the_post();
$swp_portfolio_info = get_post_meta( get_the_id(), 'swp_portfolio_meta', true ); 

$swp_gallery_opt = $swp_portfolio_info['gallery']; // for eg. 15,50,70,125
$swp_gallery_ids = explode( ',', $swp_gallery_opt );
$swp_portfolio_meta = get_post_meta( get_the_id(), 'swp_portfolio_meta' );
?>

<div class="swp-portfolio-single-area">
    <?php if ( ! empty( $swp_gallery_ids ) ) : ?>
        <div class="swp-container">
            <div class="swp-row">
              <div class="swp-col-lg-12">
                 <div class="swp-portfolio-single-slider slider-control-base owl-carousel">
                    <?php foreach( $swp_gallery_ids as $gallery_item_id ) : ?>
                        <div class="item">
                            <div class="thumb" style="background-image: url( '<?php echo esc_url( wp_get_attachment_url( $gallery_item_id ) ); ?>' )"></div>
                        </div>
                    <?php endforeach; ?>
                 </div>
             </div>
          </div>
      </div>
    <?php endif; ?>
    <div class="swp-container">
        <div class="swp-row">
            <div class="swp-col-lg-8">
                <div class="swp-portfolio-single-inner">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="swp-col-lg-4">
                <div class="swp-portfolio-single-sitebar">
                     <?php if( isset( $swp_portfolio_info[ 'info' ] ) && is_array( $swp_portfolio_info[ 'info' ] ) ): ?>
                        <ul>
                            <?php foreach( $swp_portfolio_info[ 'info' ] as $item ) : ?>
                                <li><strong><?php echo esc_html( $item[ 'type' ] ); ?></strong> <span><?php echo esc_html( $item[ 'details' ] ); ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if( isset( $swp_portfolio_info[ 'social' ] ) && is_array( $swp_portfolio_info[ 'social' ] ) ): ?>
                    <div class="swp-social-area">
                        <?php foreach( $swp_portfolio_info[ 'social' ] as $item ) : ?>
                          <a target="_blank" href="<?php echo esc_url( $item[ 'url' ] ); ?>"><i class="<?php echo esc_attr( $item[ 'icon' ] ); ?>"></i></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php


endwhile;
if( 1 == $swp_portfolio_related_post_meta[0][ 'related_post' ] ) :
//get the taxonomy terms of custom post type
$SwpTaxonomyTerms = wp_get_object_terms( $post->ID, 'portfolio-category', array('fields' => 'ids') );

$args = array(
    'post_type' => 'portfolio',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'tax_query' => array(
        array(
            'taxonomy' => 'portfolio-category',
            'field' => 'id',
            'terms' => $SwpTaxonomyTerms
        )
    ),
    'post__not_in' => array ($post->ID),
);


?>
<section class="portfolio-area style-1 swp-related">
    <div class="swp-container">
        <div class="swp-row">
            <div class="swp-col-12">
                <div class="style-number">
                    <h3><?php echo esc_html( $swp_portfolio_related_post_meta[0][ 'related_text' ] ); ?></h3>
                </div>
            </div>
        </div>
        <div class="swp-row">
        <?php
        //the query
        $swp_portfolio_related_post = new WP_Query( $args );

        if ( $swp_portfolio_related_post->have_posts() ):
            while ( $swp_portfolio_related_post->have_posts() ): $swp_portfolio_related_post->the_post();
            $swp_portfolio_meta = get_post_meta( get_the_id(), 'swp_portfolio_meta' );
            $src      = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false, '' );
        ?>
            <div class="swp-col-lg-4 swp-col-sm-6">
                <div class="swp-single-inner style-1">
                    <?php if( has_post_thumbnail() ) : ?>
                        <div class="icon-img">
                            <?php  the_post_thumbnail( 'swp-portfolio-related' ); ?>
                            <div class="swp-readmore-arrow-wrap">
                                <a class="swp-readmore-arrow swp-video-play-btn" href="<?php echo esc_url( $swp_portfolio_meta[0][ 'video-id' ] ); ?>" data-effect="mfp-zoom-in"><i class="fas fa-play"></i></a>
                                <a class="swp-readmore-arrow" href="<?php the_permalink(); ?>"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div> 
                    <?php endif; ?>
                    <div class="content-box">
                        <h3 class="inner-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html( $swp_portfolio_meta[0][ 'sub_title' ] ); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section> 

<?php endif;  get_footer(); ?>