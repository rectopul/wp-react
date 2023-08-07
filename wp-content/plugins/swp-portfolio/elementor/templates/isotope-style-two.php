<?php
/*
 * isotope style two
*/
?>
<div class="swpisotopefilter">
    <div class="isotope-filters swp-isotope-btn swp-isotope-btn-radius text-lg-left text-center">
        <button class="button active" data-filter="*"><?php echo esc_html__('All', 'swp-portfolio'); ?></button>
        <?php
        if (is_array($settings['select_cat'])) :
            foreach ($settings['select_cat'] as $term) :
        ?>
                <button class="button" data-filter=".<?php echo strtolower(preg_replace('/[^a-zA-Z]+/', '-', swp_portfolio_get_cat_slug($term))); ?>"><?php echo esc_html(swp_get_cat_name($term)); ?></button>
                <?php endforeach;
        else :
            $taxonomy = 'portfolio-category';
            $terms = get_terms($taxonomy); // Get all terms of a taxonomy
            if ($terms && !is_wp_error($terms)) :
                foreach ($terms as $term) { ?>
                    <button class="button" data-filter=".<?php echo strtolower(preg_replace('/[^a-zA-Z]+/', '-', $term->slug)); ?>"><?php echo esc_html($term->name); ?></button>
        <?php }
            endif;
        endif; ?>
    </div>

    <div class="swp-section">
        <div class="swp-isotope swp-row ">
            <div class="swp-sizer col-1"></div>
            <?php
            if ($posts_query->have_posts()) :
                while ($posts_query->have_posts()) : $posts_query->the_post();
                    $swp_meta = get_post_meta(get_the_id(), 'swp_portfolio_meta');
                    $src      = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false, '');
                    $terms = get_the_terms(get_the_ID(), 'portfolio-category');
            ?>
                    <div class="swp-item swp-col-lg-4 swp-col-sm-6 <?php foreach ($terms as $term) {
                                                                        echo strtolower(preg_replace('/[^a-zA-Z]+/', '-', $term->slug)) . ' ';
                                                                    } ?>">
                        <div class="swp-single-inner style-2">
                            <div class="icon-img">
                                <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail('swp-portfolio-card');
                                endif; ?>
                                <?php if ('yes' == $settings['enable_icon']) : ?>
                                    <div class="swp-readmore-arrow-wrap">
                                        <?php if ('yes' == $settings['video_icon']) : ?>
                                            <a class="swp-readmore-arrow <?php echo esc_attr(($settings['disable_popup'] != 'yes' ? 'swp-video-play-btn' : '')); ?> " href="<?php echo esc_attr($swp_meta[0]['video-id']); ?>" data-effect="mfp-zoom-in"><i class="fas fa-play"></i></a>
                                        <?php endif; ?>
                                        <?php if ('yes' == $settings['image_icon']) : ?>
                                            <a class="swp-readmore-arrow swp-image-popup" href="<?php echo esc_url($src[0]); ?>"><i class="fas fa-plus"></i></a>
                                        <?php endif; ?>
                                        <?php if ('yes' == $settings['url_icon']) : ?>
                                            <?php if ($settings['portfolio-url'] == 'default') : ?>
                                                <a class="swp-readmore-arrow" <?php echo esc_attr(!empty($settings['open-url']) ? 'target="_blank"' : ''); ?> href="<?php the_permalink(); ?>"><i class="fas fa-angle-double-right"></i></a>
                                            <?php else : ?>
                                                <a class="swp-readmore-arrow" <?php echo esc_attr(!empty($settings['open-url']) ? 'target="_blank"' : ''); ?> href="<?php echo esc_url($swp_meta[0]['url']); ?>"><i class="fas fa-angle-double-right"></i></a>
                                        <?php endif;
                                        endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="content-box">
                                <?php
                                //check if not hide title
                                if ('hide' != $settings['dtitle']) :

                                ?>
                                    <<?php echo esc_attr($settings['titltag']); ?> class="inner-title">

                                        <?php if ($settings['portfolio-url'] == 'default') : ?>

                                            <a <?php echo esc_attr(!empty($settings['open-url']) ? 'target="_blank"' : ''); ?> href="<?php the_permalink(); ?>">

                                            <?php else : ?>

                                                <a <?php echo esc_attr(!empty($settings['open-url']) ? 'target="_blank"' : ''); ?> href="<?php echo esc_url($swp_meta[0]['url']); ?>">

                                                <?php endif; ?>

                                                <?php
                                                if ('full' == $settings['dtitle']) :

                                                    the_title();

                                                else :
                                                    echo esc_html(wp_trim_words(get_the_title(), $settings['title_excerpt_length'], ''));
                                                endif;
                                                ?>
                                                </a>

                                    </<?php echo esc_attr($settings['titltag']); ?>>

                                <?php endif; ?>
                                <?php if (!empty($swp_meta[0]['sub_title'])) : ?>
                                    <p><?php echo esc_html($swp_meta[0]['sub_title']); ?></p>

                                    <?php

                                    if ('yes' == $settings['enable_icon'] && 'yes' == $settings['title_icon']) :

                                        if ($settings['portfolio-url'] == 'default') : ?>
                                            <a <?php echo esc_attr(!empty($settings['open-url']) ? 'target="_blank"' : ''); ?> class="swp-readmore-arrow" href="<?php the_permalink(); ?>"><i class="fas fa-angle-double-right"></i></a>
                                        <?php else : ?>
                                            <a class="swp-readmore-arrow" <?php echo esc_attr(!empty($settings['open-url']) ? 'target="_blank"' : ''); ?> href="<?php echo esc_url($swp_meta[0]['url']); ?>"><i class="fas fa-angle-double-right"></i></a>
                                    <?php endif;
                                    endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
    <?php include SWP_PORTFOLIO_ELEMENTOR . '/templates/isotope-filter-js.php'; ?>
</div>