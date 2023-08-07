<?php

/**
 * Insert all Customizes Panels in one function
 */
function rmb_customize_panels($wp_customize)
{
    $wp_customize->add_panel('pods_theme_options', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'title'          => 'Opções tema WePink',
        'description'    => 'Edite e altere informações do tema Wepink',
    ));
}
add_action('customize_register', 'rmb_customize_panels');

/**
 * Insert all Customizes Sections in one function
 */
function rmb_customize_sections($wp_customize)
{
    //Residence message
    $wp_customize->add_section('logo_theme', array(
        'title'    => __('Logo da loja', 'score'),
        'capability' => 'edit_theme_options',
        'description' => __('Altere o logo da loja'),
        'priority' => 1,
        'panel'            => 'pods_theme_options'
    ));
    $wp_customize->add_section('banners_theme', array(
        'title'    => __('Banners do tema', 'score'),
        'capability' => 'edit_theme_options',
        'description' => __('Edite os banners do tema'),
        'priority' => 1,
        'panel'            => 'pods_theme_options'
    ));

    // $wp_customize->add_section('text__title_slider_1', array(
    //     'title'    => __('Titulo do texto no topo', 'score'),
    //     'capability' => 'edit_theme_options',
    //     'description' => __('Altere o Titulo do texto no topo'),
    //     'priority' => 1,
    //     'panel'            => 'score_theme_options'
    // ));

    $wp_customize->add_section('informations_theme', array(
        'title'    => __('Informações da loja', 'score'),
        'capability' => 'edit_theme_options',
        'description' => __('Altere Informações da loja'),
        'priority' => 1,
        'panel'            => 'pods_theme_options'
    ));

    //advice
    $wp_customize->add_section('central_row', array(
        'title'    => __('Colunas Centrais', 'score'),
        'capability' => 'edit_theme_options',
        'description' => __('Altere As colunas centrais'),
        'priority' => 1,
        'panel'            => 'score_theme_options'
    ));

    //advice
    $wp_customize->add_section('ruler', array(
        'title'    => __('Régua de opções', 'score'),
        'capability' => 'edit_theme_options',
        'description' => __('Altere a régua de opções'),
        'priority' => 1,
        'panel'            => 'score_theme_options'
    ));
    $wp_customize->add_section('contact', array(
        'title'    => __('Opções de contato', 'score'),
        'capability' => 'edit_theme_options',
        'description' => __('Altere as opções de contato'),
        'priority' => 1,
        'panel'            => 'score_theme_options'
    ));
    $wp_customize->add_section('footer_images', array(
        'title'    => __('Imagens do rodapé', 'score'),
        'capability' => 'edit_theme_options',
        'description' => __('Altere as imagens do rodapé'),
        'priority' => 1,
        'panel'            => 'score_theme_options'
    ));
}
add_action('customize_register', 'rmb_customize_sections');

/**
 * Insert all Customizes Settings in one function
 */
function rmb_customize_settings($wp_customize)
{
    /**
     * Home page title
     * section: home_title
     */
    $wp_customize->add_setting('logo_theme', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('banner_theme_1', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('text__title_slider_1', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('text_slider_1', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('banner_theme_2', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_setting('insta_image_1', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('insta_image_2', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_setting('phone_number', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_setting('face_link', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('insta_link', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('instagram_link', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('about_shop', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('default_color', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('default_text_color', array(
        'default'           => '',
        'transport' => 'postMessage',
    ));
}

add_action('customize_register', 'rmb_customize_settings');

function rmb_custom_controls($wp_customize)
{
    /****
     * Clients
     */
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'logo_theme',
            [
                'label' => __('Logo da loja', 'theme_textdomain'),
                'section' => 'logo_theme',
                'mime_type' => 'image', // other options, e.g. audio 
            ]
        )
    );

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'default_color',
        array(
            'label'    => __('Cor principal do tema', 'text-domain'),
            'section'  => 'banners_theme',
            'settings' => 'default_color',
        )
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'default_text_color',
        array(
            'label'    => __('Cor principal do texto no tema', 'text-domain'),
            'section'  => 'banners_theme',
            'settings' => 'default_text_color',
        )
    ));



    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'banner_theme_1',
            [
                'label' => __('Imagem Topo', 'theme_textdomain'),
                'section' => 'banners_theme',
                'mime_type' => 'image', // other options, e.g. audio 
            ]
        )
    );
    $wp_customize->add_control('text__title_slider_1', array(
        'type' => 'text',
        'section' => 'banners_theme', // // Add a default or your own section
        'label' => __('Link do banner to topo'),
        'description' => __('Link do banner to top.'),
    ));
    $wp_customize->add_control('text_slider_1', array(
        'type' => 'text',
        'section' => 'banners_theme', // // Add a default or your own section
        'label' => __('Texto abaixo do titulo'),
        'description' => __('Altere o Texto abaixo do titulo.'),
    ));


    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'banner_theme_2',
            [
                'label' => __('Imagem Centro', 'theme_textdomain'),
                'section' => 'banners_theme',
                'mime_type' => 'image', // other options, e.g. audio 
            ]
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'insta_image_1',
            [
                'label' => __('Primeira imagem instagram', 'theme_textdomain'),
                'section' => 'banners_theme',
                'mime_type' => 'image', // other options, e.g. audio 
            ]
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'insta_image_2',
            [
                'label' => __('Segunda imagem instagram', 'theme_textdomain'),
                'section' => 'banners_theme',
                'mime_type' => 'image', // other options, e.g. audio 
            ]
        )
    );

    $wp_customize->add_control('phone_number', array(
        'type' => 'text',
        'section' => 'informations_theme', // // Add a default or your own section
        'label' => __('Informe o número para contato com a loja'),
        'description' => __('Altere o número para contato.'),
    ));

    $wp_customize->add_control('face_link', array(
        'type' => 'text',
        'section' => 'informations_theme', // // Add a default or your own section
        'label' => __('Link do facebook da loja'),
        'description' => __('Altere o Link do facebook da loja.'),
    ));
    $wp_customize->add_control('insta_link', array(
        'type' => 'text',
        'section' => 'informations_theme', // // Add a default or your own section
        'label' => __('Link do Instagram da loja'),
        'description' => __('Altere o Link do Instagram da loja.'),
    ));
    $wp_customize->add_control('instagram_link', array(
        'type' => 'text',
        'section' => 'informations_theme', // // Add a default or your own section
        'label' => __('Link do Instagram da loja'),
        'description' => __('Altere o Link do Instagram da loja.'),
    ));
}

add_action('customize_register', 'rmb_custom_controls');

function rmb_custom_partials($wp_customize)
{
    //Message credit
    $wp_customize->selective_refresh->add_partial(
        'section_message_residence',
        [
            'selector' => '.message-residencia span',
            'render_callback' => 'theme_custom_first_message',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );
    //Image Logo
    $wp_customize->selective_refresh->add_partial(
        'logo_casa_nova',
        [
            'selector' => '.message-residencia figure',
            'render_callback' => 'theme_customize_logo_image',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );
    $wp_customize->selective_refresh->add_partial(
        'image_center',
        [
            'selector' => '.image-center figure',
            'render_callback' => 'theme_customize_center_image',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );

    $wp_customize->selective_refresh->add_partial(
        'central_row_2',
        [
            'selector' => '.mosaic-informations .wrap div:first-child',
            'render_callback' => 'block_image_1',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );
    $wp_customize->selective_refresh->add_partial(
        'central_row_2',
        [
            'selector' => '.mosaic-informations .wrap div:nth-child(2)',
            'render_callback' => 'block_image_2',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );

    $wp_customize->selective_refresh->add_partial(
        'contraction_content',
        [
            'selector' => '.contraction_content p',
            'render_callback' => 'theme_customize_contraction_content',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );
    $wp_customize->selective_refresh->add_partial(
        'contract_title_content',
        [
            'selector' => '.contract_title_content',
            'render_callback' => 'theme_customize_contraction_title_content',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );

    $wp_customize->selective_refresh->add_partial(
        'advice_subtitle',
        [
            'selector' => '.advice_subtitle > h6',
            'render_callback' => 'theme_customize_advice_subtitle',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );
    $wp_customize->selective_refresh->add_partial(
        'advice_title',
        [
            'selector' => '.advice_title > h6',
            'render_callback' => 'theme_customize_advice_title',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );

    $wp_customize->selective_refresh->add_partial(
        'advice_content_1_title',
        [
            'selector' => '.advice_content_1_title > h6',
            'render_callback' => 'theme_customize_advice_content_1_title',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );
    $wp_customize->selective_refresh->add_partial(
        'advice_content_1',
        [
            'selector' => '.advice_content_1_title > p',
            'render_callback' => 'theme_customize_advice_content_1',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );

    $wp_customize->selective_refresh->add_partial(
        'advice_content_2_title',
        [
            'selector' => '.advice_content_2_title > h6',
            'render_callback' => 'theme_customize_advice_content_2_title',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );
    $wp_customize->selective_refresh->add_partial(
        'advice_content_2',
        [
            'selector' => '.advice_content_2_title > p',
            'render_callback' => 'theme_customize_advice_content_2',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );

    $wp_customize->selective_refresh->add_partial(
        'clients_subtitle',
        [
            'selector' => '.clients_title > h6',
            'render_callback' => 'theme_customize_clients_subtitle',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );

    $wp_customize->selective_refresh->add_partial(
        'clients_title',
        [
            'selector' => '.clients_title > h2',
            'render_callback' => 'theme_customize_clients_title',
            'container_inclusive' => false,
            'fallback_refresh' => false
        ]
    );
}

add_action('customize_register', 'rmb_custom_partials');

function block_image_1()
{
    echo '<div style="background-image: url(' . wp_get_attachment_image_src(get_theme_mod('central_row_1'), 'view_large')[0] . ');"></div>';
}
function block_image_2()
{
    echo '<div style="background-image: url(' . wp_get_attachment_image_src(get_theme_mod('central_row_2'), 'view_large')[0] . ');"></div>';
}

function theme_customize_center_image()
{
    echo wp_get_attachment_image(get_theme_mod('image_center'), 'view_large');
}
function theme_customize_logo_image()
{
    echo wp_get_attachment_image(get_theme_mod('logo_casa_nova'), 'view_large');
}

function theme_custom_first_message()
{
    echo nl2br(get_theme_mod('section_message_residence'));
}

function theme_customize_clients_subtitle()
{
    echo nl2br(get_theme_mod('clients_subtitle'));
}
function theme_customize_clients_title()
{
    echo nl2br(get_theme_mod('clients_title'));
}
function theme_customize_advice_content_1()
{
    echo nl2br(get_theme_mod('advice_content_1'));
}
function theme_customize_advice_content_1_title()
{
    echo nl2br(get_theme_mod('advice_content_1_title'));
}
function theme_customize_advice_content_2()
{
    echo nl2br(get_theme_mod('advice_content_2'));
}
function theme_customize_advice_content_2_title()
{
    echo nl2br(get_theme_mod('advice_content_2_title'));
}

function theme_customize_advice_subtitle()
{
    echo nl2br(get_theme_mod('advice_subtitle'));
}

function theme_customize_advice_title()
{
    echo nl2br(get_theme_mod('advice_title'));
}



function theme_customize_contraction_title_content()
{
    echo nl2br(get_theme_mod('contract_title_content'));
}
function theme_customize_contraction_content()
{
    echo nl2br(get_theme_mod('contraction_content'));
}

function theme_customize_message_score()
{
    echo nl2br(get_theme_mod('message_credit'));
}

function theme_customize_contraction_title()
{
    echo nl2br(get_theme_mod('contraction_title'));
}
function theme_customize_contraction_text()
{
    echo nl2br(get_theme_mod('contraction_text'));
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function auaha_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function auaha_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function auaha_customize_preview_js()
{
    wp_enqueue_script('auaha_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'auaha_customize_preview_js');

/**
 * Media gallery
 */

function featured_image_gallery_customize_register($wp_customize)
{

    if (!class_exists('CustomizeImageGalleryControl\Control')) {
        return;
    }

    $wp_customize->add_section('featured_image_gallery_section', array(
        'title'      => __('Gallery Section'),
        'description' => __('As imagens do bloco de clientes'),
        'capability' => 'edit_theme_options',
        'priority'   => 25,
        'panel'            => 'score_theme_options'
    ));
    $wp_customize->add_setting('featured_image_gallery', array(
        'default' => array(),
        'sanitize_callback' => 'wp_parse_id_list',
    ));


    $wp_customize->add_control(new CustomizeImageGalleryControl\Control(
        $wp_customize,
        'featured_image_gallery',
        array(
            'label'    => __('Imagens Carrossel'),
            'section'  => 'clients',
            'settings' => 'featured_image_gallery',
            'type'     => 'image_gallery',
        )
    ));
}
add_action('customize_register', 'featured_image_gallery_customize_register');
