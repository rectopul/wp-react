<?php

namespace Elementor;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 *
 * swp-portfolio elementor Masonary
 *
 * @since 1.0
 */
class Swp_Portfolio_Tab extends Widget_Base
{

    public function get_name()
    {
        return 'tab';
    }

    public function get_title()
    {
        return esc_html__('Tab', 'swp-portfolio');
    }

    public function get_icon()
    {
        return 'eicon-post-list';
    }

    public function get_categories()
    {
        return ['swp-portfolio'];
    }

    protected function _register_controls()
    {


        // generel settings
        $this->start_controls_section(
            'ele_style_one_settings',
            [
                'label' => esc_html__('Generel Settings', 'swp-portfolio'),
            ]
        );


        $this->add_control(
            'ppr',
            [
                'label'   => esc_html__('Amount of post to display', 'swp-portfolio'),
                'type'    => Controls_Manager::TEXT,
                'default' => 6
            ]
        );

        $this->end_controls_section(); // End generel settings

        $this->start_controls_section(
            'Post_filter_settings',
            [
                'label' => esc_html__('Category Filter', 'swp-portfolio'),
            ]
        );


        $this->add_control(
            'select_cat',
            [
                'label'    => esc_html__('Select Category', 'swp-portfolio'),
                'type'     => Controls_Manager::SELECT2,
                'description' => esc_html__('Select Category To display Filter Option', 'swp-portfolio'),
                'multiple' => true,
                'options'  => swp_portfolio_post_category(),

            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__('Order by', 'swp-portfolio'),
                'type'    => Controls_Manager::SELECT2,
                'options' => array(
                    'author' => esc_html__('Author', 'swp-portfolio'),
                    'title'  => esc_html__('Title', 'swp-portfolio'),
                    'date'   => esc_html__('Date', 'swp-portfolio'),
                    'rand'   => esc_html__('Random', 'swp-portfolio'),
                ),
                'default' => 'date'

            ]
        );

        $this->add_control(
            'order',
            [
                'label'   => esc_html__('Order', 'swp-portfolio'),
                'type'    => Controls_Manager::SELECT2,
                'options' => array(
                    'desc' => esc_html__('DESC', 'swp-portfolio'),
                    'asc'  => esc_html__('ASC', 'swp-portfolio'),
                ),
                'default' => 'desc'

            ]
        );


        $this->end_controls_section(); // End Filter

        //title settings
        $this->start_controls_section(
            'tittle_settings',
            [
                'label' => esc_html__('Title Settings', 'swp-portfolio'),
            ]
        );

        $this->add_control(
            'dtitle',
            [
                'label'   => esc_html__('Display', 'swp-portfolio'),
                'type'    => Controls_Manager::SELECT2,
                'options' => array(
                    'full' => esc_html__('Full Title', 'swp-portfolio'),
                    'excerpt'  => esc_html__('Excerpt', 'swp-portfolio'),
                    'hide'  => esc_html__('Not Display', 'swp-portfolio'),
                ),
                'default' => 'full'

            ]
        );

        $this->add_control(
            'title_excerpt_length',
            [
                'label'   => esc_html__('Title Excerpt Length', 'swp-portfolio'),
                'type'    => Controls_Manager::TEXT,
                'default' => 3,
                'condition' => [
                    'dtitle' => 'excerpt'
                ]
            ]
        );

        $this->add_control(
            'titltag',
            [
                'label'   => esc_html__('Title Tag', 'swp-portfolio'),
                'type'    => Controls_Manager::SELECT,
                'condition' => [
                    'dtitle!' => 'hide'
                ],
                'options' => array(
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ),
                'default' => 'h2'

            ]
        );


        $this->end_controls_section(); // End title

        //sub title settings
        $this->start_controls_section(
            'sub_title_settings',
            [
                'label' => esc_html__('Sub Title Settings', 'swp-portfolio'),
            ]
        );

        $this->add_control(
            'enable_sub_title',
            [
                'label' => esc_html__('Display Sub Title', 'swp-portfolio'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'swp-portfolio'),
                'label_off' => esc_html__('Hide', 'swp-portfolio'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->end_controls_section(); // End sub title

        // url settings
        $this->start_controls_section(
            'url_settings',
            [
                'label' => esc_html__('URL Settings', 'swp-portfolio'),
            ]
        );

        $this->add_control(
            'portfolio-url',
            [
                'label'   => esc_html__('Portfolio Url', 'swp-portfolio'),
                'type'    => Controls_Manager::SELECT,
                'options' => array(
                    'default' => esc_html__('Default Post', 'swp-portfolio'),
                    'external' => esc_html__('External Url', 'swp-portfolio'),
                ),
                'default' => 'default'

            ]
        );

        $this->add_control(
            'open-url',
            [
                'label' => esc_html__('Open in new window ', 'swp-portfolio'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'swp-portfolio'),
                'label_off' => esc_html__('No', 'swp-portfolio'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->end_controls_section(); // End url settings

        //icon settings

        $this->start_controls_section(
            'Icon_settings',
            [
                'label' => esc_html__('Icon Settings', 'swp-portfolio'),
            ]
        );

        $this->add_control(
            'enable_icon',
            [
                'label' => esc_html__('Display Icon', 'swp-portfolio'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'swp-portfolio'),
                'label_off' => esc_html__('Hide', 'swp-portfolio'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'video_icon',
            [
                'label' => esc_html__('Video Icon', 'swp-portfolio'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'swp-portfolio'),
                'label_off' => esc_html__('Hide', 'swp-portfolio'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'enable_icon' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'disable_popup',
            [
                'label' => esc_html__('Disable Video Popup', 'swp-portfolio'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'swp-portfolio'),
                'label_off' => esc_html__('no', 'swp-portfolio'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'enable_icon' => 'yes',
                    'video_icon' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'image_icon',
            [
                'label' => esc_html__('Image Popup Icon', 'swp-portfolio'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'swp-portfolio'),
                'label_off' => esc_html__('Hide', 'swp-portfolio'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'enable_icon' => 'yes',
                ]
            ]
        );


        $this->add_control(
            'url_icon',
            [
                'label' => esc_html__('Url Icon', 'swp-portfolio'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'swp-portfolio'),
                'label_off' => esc_html__('Hide', 'swp-portfolio'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'enable_icon' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'title_icon',
            [
                'label' => esc_html__('Title Url Icon', 'swp-portfolio'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'swp-portfolio'),
                'label_off' => esc_html__('Hide', 'swp-portfolio'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'enable_icon' => 'yes',
                    'style' => 'style-2'
                ]
            ]
        );

        $this->end_controls_section(); // End icon settings


        //title style
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Title Style', 'swp-portfolio'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swp-single-inner .content-box .inner-title a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__('Title Hover Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swp-single-inner .content-box .inner-title:hover a' => 'color: {{VALUE}}',
                ],
            ]
        );

        //title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'           => 'title_typography',
                'label'          => esc_html__('Title Typography', 'swp-portfolio'),
                'selector'       => '{{WRAPPER}} .swp-single-inner .content-box .inner-title a',
                'fields_options' => [
                    // first mimic the click on Typography edit icon
                    'typography'  => ['default' => 'yes'],
                    // then redifine the Elementor defaults
                    'font_size'   => ['default' => ['size' => 20]],
                    'font_weight' => ['default' => 700],
                    'line_height' => ['default' => ['size' => 24]],
                ],
            ]
        );

        $this->end_controls_section();

        //sub title style
        $this->start_controls_section(
            'sub_title_style',
            [
                'label' => esc_html__('Sub Title Style', 'swp-portfolio'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label' => esc_html__('Sub Title Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swp-single-inner .content-box p' => 'color: {{VALUE}}',
                ],
            ]
        );

        //title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__('Sub Title Typography', 'swp-portfolio'),
                'selector'       => '{{WRAPPER}} .swp-single-inner .content-box p',
                'fields_options' => [
                    // first mimic the click on Typography edit icon
                    'typography'  => ['default' => 'yes'],
                    // then redifine the Elementor defaults
                    'font_size'   => ['default' => ['size' => 16]],
                    'font_weight' => ['default' => 400],
                    'line_height' => ['default' => ['size' => 26]],
                ],
            ]
        );

        $this->end_controls_section();


        //tab Button color
        $this->start_controls_section(
            'tab_btn_style',
            [
                'label' => esc_html__('Tab Button Style', 'swp-portfolio'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tab_btn_color',
            [
                'label' => esc_html__('Button  Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swp-tab-menu ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'tab_btn_bg_color',
            [
                'label' => esc_html__('Button Background  Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swp-tab-menu ul li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'tab_btn_active',
            [
                'label' => esc_html__('Active/Hover Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swp-tab-menu ul li a:hover, .swp-tab-menu ul li a.active' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'tab_btn_bg_active',
            [
                'label' => esc_html__('Active/Hover bg Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swp-tab-menu ul li a:hover, .swp-tab-menu ul li a.active' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        //btn typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'           => 'tab_btn_typography',
                'label'          => esc_html__('Typography', 'swp-portfolio'),
                'selector'       => '{{WRAPPER}} .portfolio-area .swp-isotope-btn button',
            ]
        );

        $this->end_controls_section();

        //icon color
        $this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__('Icon Style', 'swp-portfolio'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swp-readmore-arrow' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swp-readmore-arrow:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_bg_color',
            [
                'label' => esc_html__('Icon Hover Bg Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swp-readmore-arrow:hover' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings();

?>

        <section class="portfolio-area style-20">
            <div class="swp-container">
                <div class="swp-tab-menu">
                    <ul>
                        <?php
                        if (is_array($settings['select_cat'])) :
                            $i = 1;
                            foreach ($settings['select_cat'] as $term) :
                        ?>
                                <li>
                                    <a href="#" class="<?php echo ($i == 1 ? 'active ' : ''); ?>" data-rel="swp-tab-<?php echo esc_attr($i); ?>">
                                        <?php echo esc_html(swp_get_cat_name($term)); ?>
                                    </a>
                                </li>
                        <?php $i++;
                            endforeach;
                        endif; ?>
                    </ul>
                </div>
                <div class="swp-tab-main-box">
                    <?php
                    $i = 1;
                    if (is_array($settings['select_cat'])) :

                        foreach ($settings['select_cat'] as $term) :
                    ?>
                            <div class="swp-tab-box" id="swp-tab-<?php echo esc_attr($i); ?>" style="<?php echo ($i == 1 ? 'display:block ' : ''); ?>;">
                                <div class="swp-row">
                                    <?php
                                    $args = array(
                                        'post_type'      => 'portfolio',
                                        'post_status'    => 'publish',
                                        'posts_per_page' => $settings['ppr'],
                                        'tax_query'      => array(
                                            array(
                                                'taxonomy' => 'portfolio-category',
                                                'field'    => 'term_id',
                                                'terms'    => $term,
                                                'operator' => 'IN',
                                            ),
                                        ),
                                    );

                                    $args['orderby'] = $settings['orderby'];
                                    $args['order']   = $settings['order'];

                                    $query = new \WP_Query($args);
                                    if ($query->have_posts()) :

                                        while ($query->have_posts()) :

                                            $query->the_post();
                                            $swp_meta = get_post_meta(get_the_id(), 'swp_portfolio_meta');
                                            $src      = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false, '');

                                    ?>
                                            <div class="swp-col-lg-4 swp-col-sm-6">
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
                                                                            <a class="swp-readmore-arrow" <?php echo esc_attr(!empty($settings['open-url']) ? 'target="_blank"' : ''); ?> href="<?php the_permalink(); ?>"><i class="fas fa-angle-double-right"></i></a>
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
                                                                    <?php endif; ?>

                                                            </<?php echo esc_attr($settings['titltag']); ?>>
                                                            <?php if (!empty($swp_meta[0]['sub_title']) && $settings['enable_sub_title'] == 'yes') : ?>
                                                                <p><?php echo esc_html($swp_meta[0]['sub_title']); ?></p>
                                                            <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endwhile;
                                    endif; ?>
                                </div>
                            </div>
                        <?php $i++;
                        endforeach;
                    else : ?>
                        <h3><?php echo esc_html__('Please Select A Category', 'swp-portfolio'); ?></h3>
                    <?php endif;  ?>
                </div>
            </div>
            </div>

    <?php

    }
}

plugin::instance()->widgets_manager->register(new Swp_Portfolio_Tab());
