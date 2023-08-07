<?php

/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Auaha
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. 
    ?>
    <?php wp_head(); ?>
</head>
<body class="opacity-active" <?php body_class(); ?> data-nonce="<?php echo wp_create_nonce( 'wc_store_api' ); ?>">

    <style>
        :root {
            --color_default: <?php echo get_theme_mod('default_color', '#ff0080'); ?>;
            --color_text_default: <?php echo get_theme_mod('default_text_color', '#1D2547'); ?>;
        }
    </style>


    <?php wp_body_open(); ?>

    <?php get_template_part('components/content', 'cart'); ?>
    <!-- ? Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/furn/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start-->
    <header>
        <div class="info-bar">
            <span>Lançamento! Perfume Red. <a>Comprar agora!</a></span>
        </div>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row menu-wrapper align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?php echo get_home_url(); ?>">
                                <?php the_custom_logo(); ?>
                            </a>
                        </div>
                        <div class="header-left d-flex align-items-center">
                            <!-- Main-menu -->
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <?php  
                                    
                                        wp_nav_menu( array( 
                                            'theme_location' => 'menu-1', 
                                            'container_class' => 'menu-class',
                                            'menu_id' => 'navigation' ) );

                                    ?>
                                </nav>
                            </div>
                        </div>
                        <div class="header-right1 d-flex align-items-center">
                            <div class="search">
                                <ul class="d-flex align-items-center">
                                    <li id="search-app">
                                        <!-- Search Box -->
                                    </li>
                                    <li>
                                        <?php
                                        if (is_user_logged_in()) {
                                        ?><a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="account-btn" target="_blank">Minha conta</a><?php
                                                                                                                                                                                } else {
                                                                                                                                                                                    ?> <a href="<?php echo get_permalink(wc_get_page_id('myaccount')) . '?action=register'; ?>" class="account-btn" target="_blank">Login/Registro</a><?php
                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                ?>
                                    </li>
                                    <li>
                                        <a href="<?php echo wc_get_cart_url(); ?>">
                                            <div class="card-stor">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff0080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                                                <span>
                                                    <?php
                                                    global $woocommerce;

                                                    echo WC()->cart->get_cart_contents_count();
                                                    ?>
                                                </span>
                                            </div>
                                        </a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <!-- header end -->

    <?php wp_reset_query(); ?>