<?php
/*
 * grid style one template
*/
?>

<div class="swp-row">
    <?php
    if ($posts_query->have_posts()) :
        while ($posts_query->have_posts()) : $posts_query->the_post();
            $swp_meta = get_post_meta(get_the_id(), 'swp_portfolio_meta');
            $src      = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false, '');

    ?>
            <div class="swp-col-lg-<?php echo esc_attr($settings['layout']); ?> swp-col-sm-6">
                <div class="swp-single-inner style-1">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="icon-img">
                            <?php the_post_thumbnail('swp-portfolio-card'); ?>
                            <?php if ('yes' == $settings['enable_icon']) : ?>
                                <div class="swp-readmore-arrow-wrap">
                                    <?php if ('yes' == $settings['video_icon']) : ?>
                                        <a class="swp-readmore-arrow <?php echo esc_attr(($settings['disable_popup'] != 'yes' ? 'swp-video-play-btn' : '')); ?>" href="<?php echo esc_url($swp_meta[0]['video-id']); ?>" data-effect="mfp-zoom-in"><i class="fas fa-play"></i></a>
                                    <?php endif; ?>
                                    <?php if ('yes' == $settings['image_icon']) : ?>
                                        <a class="swp-readmore-arrow swp-image-popup" href="<?php echo esc_url($src[0]); ?>"><i class="fas fa-plus"></i></a>
                                    <?php endif; ?>
                                    <?php if ('yes' == $settings['url_icon']) : ?>
                                        <?php if ($settings['portfolio-url'] == 'default') : ?>
                                            <a <?php echo esc_attr(!empty($settings['open-url']) ? 'target="_blank"' : ''); ?> class="swp-readmore-arrow" href="<?php the_permalink(); ?>"><i class="fas fa-angle-double-right"></i></a>
                                        <?php else : ?>
                                            <a class="swp-readmore-arrow" <?php echo esc_attr(!empty($settings['open-url']) ? 'target="_blank"' : ''); ?> href="<?php echo esc_url($swp_meta[0]['url']); ?>"><i class="fas fa-angle-double-right"></i></a>
                                    <?php endif;
                                    endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
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

                        <?php if (!empty($swp_meta[0]['sub_title']) && $settings['enable_sub_title'] == 'yes') : ?>

                            <p><?php echo esc_html($swp_meta[0]['sub_title']); ?></p>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
    <?php endwhile;
    endif; ?>
</div>
<div class="swpajaxapend"></div>