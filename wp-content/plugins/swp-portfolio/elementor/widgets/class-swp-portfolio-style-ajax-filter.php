<?php

namespace Elementor;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 *
 * swp-portfolio elementor Isotop widget.
 *
 * @since 1.0
 */
class Swp_Portfolio_Ajax_Isotop extends Widget_Base
{

    public function get_name()
    {
        return 'swp_ajax';
    }

    public function get_title()
    {
        return esc_html__('Ajax', 'swp-portfolio');
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


        // general settings
        $this->start_controls_section(
            'ele_style_one_settings',
            [
                'label' => esc_html__('General Settings', 'swp-portfolio'),
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

        $this->add_control(
            'style',
            [
                'label'   => esc_html__('Select Style', 'swp-portfolio'),
                'type'    => Controls_Manager::SELECT2,
                'options' => array(
                    'style-1' => esc_html__('Style 1', 'swp-portfolio'),
                    'style-2'  => esc_html__('Style 2', 'swp-portfolio'),
                    'style-3'  => esc_html__('Style 3', 'swp-portfolio'),
                    'style-4'  => esc_html__('Style 4', 'swp-portfolio'),
                    'style-5'  => esc_html__('Style 5', 'swp-portfolio'),
                ),
                'default' => 'style-1'

            ]
        );


        $this->end_controls_section(); // End generel settings

        $this->start_controls_section(
            'Post_filter_settings',
            [
                'label' => esc_html__('Post Filter', 'swp-portfolio'),
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
            'exclude_cat',
            [
                'label'    => esc_html__('Exclude Category', 'swp-portfolio'),
                'type'     => Controls_Manager::SELECT2,
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


        //title settings
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
            ]
        );

        $this->end_controls_section();


        //filter hover color
        $this->start_controls_section(
            'filter_btn_style',
            [
                'label' => esc_html__('Filter Button Style', 'swp-portfolio'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'filter_btn_color',
            [
                'label' => esc_html__('Button  Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-area .swp-isotope-btn button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'filter_btn_bg_color',
            [
                'label' => esc_html__('Button Background  Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-area .swp-isotope-btn button' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'filter_btn_active',
            [
                'label' => esc_html__('Active/Hover  Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-area .swp-isotope-btn button:hover, .portfolio-area .swp-isotope-btn button.active' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'filter_btn_bg_active',
            [
                'label' => esc_html__('Active/Hover bg Color', 'swp-portfolio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-area .swp-isotope-btn button:hover, .portfolio-area .swp-isotope-btn button.active' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        //btn typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'           => 'filter_btn_typography',
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

        if (is_front_page()) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        } else {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        }

        $args  = array(
            'post_type'           => 'portfolio',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => $settings['ppr'],
            'paged' => $paged,
        );

        $args['orderby'] = $settings['orderby'];
        $args['order']   = $settings['order'];


        if (!empty($settings['exclude_cat'])) {
            $args['tax_query'][] = array(
                'taxonomy' => 'portfolio-category',
                'field'    => 'id',
                'terms'    => array_values($settings['exclude_cat']),
                'operator' => 'NOT IN'
            );
        }

        if (!empty($settings['select_cat'])) {
            $args['tax_query'][] = array(
                'taxonomy' => 'portfolio-category',
                'field'    => 'id',
                'terms'    => array_values($settings['select_cat'])
            );
        }


        $posts_query = new \WP_Query($args);

        $ajaxapend = 'swp_ajax';
        $ajaxclass = ' swp_ajaxid ';

        update_option($this->get_id(), $settings);



        if ($settings['style'] == 'style-2') { ?>
            <section class="portfolio-area style-2 <?php echo esc_attr($ajaxclass); ?>" data-filter-section="<?php echo esc_attr(uniqid()); ?>" data-swp_ajaxid="<?php echo esc_attr($this->get_id()); ?>" data-style="ajax-filter-style-two">
                <div class="swp-container">
                    <div class="modal"></div>
                    <?php

                    include SWP_PORTFOLIO_ELEMENTOR . '/templates/ajax-filter-style-two.php';


                    //pagination template
                    include SWP_PORTFOLIO_ELEMENTOR . '/templates/ajax-pagination.php';

                    ?>
                    <div class="swpajaxapend"></div>
                </div>
            </section>
        <?php } elseif ($settings['style'] == 'style-3') { ?>
            <section class="portfolio-area style-3 <?php echo esc_attr($ajaxclass); ?>" data-filter-section="<?php echo esc_attr(uniqid()); ?>" data-swp_ajaxid="<?php echo esc_attr($this->get_id()); ?>" data-style="ajax-filter-style-three">
                <div class="swp-container ">
                    <div class="modal"></div>
                    <?php

                    include SWP_PORTFOLIO_ELEMENTOR . '/templates/ajax-filter-style-three.php';

                    //pagination template
                    include SWP_PORTFOLIO_ELEMENTOR . '/templates/ajax-pagination.php';
                    ?>
                    <div class="swpajaxapend"></div>
                </div>
            </section>
        <?php } elseif ($settings['style'] == 'style-4') { ?>
            <section class="portfolio-area style-4 <?php echo esc_attr($ajaxclass); ?>" data-filter-section="<?php echo esc_attr(uniqid()); ?>" data-swp_ajaxid="<?php echo esc_attr($this->get_id()); ?>" data-style="ajax-filter-style-four">
                <div class="swp-container">
                    <div class="modal"></div>
                    <?php

                    include SWP_PORTFOLIO_ELEMENTOR . '/templates/ajax-filter-style-four.php';

                    //pagination template
                    include SWP_PORTFOLIO_ELEMENTOR . '/templates/ajax-pagination.php';
                    ?>
                    <div class="swpajaxapend"></div>
                </div>
            </section>
        <?php  } elseif ($settings['style'] == 'style-5') { ?>
            <section class="portfolio-area style-5 <?php echo esc_attr($ajaxclass); ?>" data-filter-section="<?php echo esc_attr(uniqid()); ?>" data-swp_ajaxid="<?php echo esc_attr($this->get_id()); ?>" data-style="ajax-filter-style-five">
                <div class="swp-container">
                    <div class="modal"></div>
                    <?php

                    include SWP_PORTFOLIO_ELEMENTOR . '/templates/ajax-filter-style-five.php';

                    //pagination template
                    include SWP_PORTFOLIO_ELEMENTOR . '/templates/ajax-pagination.php';
                    ?>
                    <div class="swpajaxapend"></div>
                </div>
            </section>
        <?php } else { ?>
            <section class="portfolio-area style-7 <?php echo esc_attr($ajaxclass); ?>" data-filter-section="<?php echo esc_attr(uniqid()); ?>" data-swp_ajaxid="<?php echo esc_attr($this->get_id()); ?>" data-style="ajax-filter-style-one">
                <div class="swp-container">
                    <div class="modal"></div>
                    <?php

                    include SWP_PORTFOLIO_ELEMENTOR . '/templates/ajax-filter-style-one.php';

                    include SWP_PORTFOLIO_ELEMENTOR . '/templates/ajax-pagination.php';

                    ?>
                    <div class="swpajaxapend"></div>
                </div>
            </section>
        <?php  }  ?>

<?php

    }
}

plugin::instance()->widgets_manager->register_widget_type(new Swp_Portfolio_Ajax_Isotop());
