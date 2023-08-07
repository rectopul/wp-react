<?php
/*
 * @package swp-portfolio
 * @since 1.0.0
*/

//portfolio post meta
if ( class_exists( 'CSF' ) ) {

 $swp_portfolio_prefix = 'swp';

    CSF::createMetabox($swp_portfolio_prefix.'_portfolio_meta',array(
        'title' => esc_html__('Portfolio Info','swp-portfolio'),
        'post_type' => 'portfolio',
    ));

    CSF::createSection($swp_portfolio_prefix.'_portfolio_meta',array(
        'fields' => array(
            array(
                'id' => 'sub_title',
                'type' => 'text',
                'title' => esc_html__('Sub Title','swp-portfolio'),
                'desc' =>  esc_html__( 'Write Portfolio Sub Title', 'swp-portfolio' )
            ),            
            array(
                'id' => 'video-id',
                'type' => 'text',
                'title' => esc_html__('Video Url','swp-portfolio'),
                'desc' =>  esc_html__( 'Enter youtube/vimeo video url ', 'swp-portfolio' ),
                'default'=> 'https://www.youtube.com/watch?v=cReIHnePBT0'
            ),            
            array(
                'id' => 'url',
                'type' => 'text',
                'title' => esc_html__('Portfolio Url','swp-portfolio'),
                'desc' =>  esc_html__( 'You can add external link for your portfolio', 'swp-portfolio' )
            ),
            array(
                  'id'        => 'info',
                  'type'      => 'group',
                  'title'     => esc_html__( 'Portfolio Info', 'swp-portfolio' ),
                  'fields'    => array(
                    array(
                      'id'    => 'type',
                      'type'  => 'text',
                      'title' => esc_html__( 'Info Type', 'swp-portfolio' ),
                    ),                    
                    array(
                      'id'    => 'details',
                      'type'  => 'textarea',
                      'title' => esc_html__( 'Info Details', 'swp-portfolio' ),
                    ),

                  ),
            ),
            array(
                  'id'        => 'social',
                  'type'      => 'group',
                  'title'     => esc_html__( 'Social Profile', 'swp-portfolio' ),
                  'fields'    => array(
                    array(
                      'id'    => 'icon',
                      'type'  => 'icon',
                      'title' => esc_html__( 'Social Icon', 'swp-portfolio' ),
                    ),                    
                    array(
                      'id'    => 'url',
                      'type'  => 'text',
                      'title' => esc_html__( 'Social Profile Url', 'swp-portfolio' ),
                    ),

                  ),
            ),
            array(
              'id'    => 'gallery',
              'type'  => 'gallery',
              'title' => esc_html__( 'Portfolio Details Page Slider Image', 'swp-portfolio' ),
            ),
            array(
              'id'    => 'related_post',
              'type'  => 'switcher',
              'title' => esc_html__( 'Display Related Post', 'swp-portfolio' ),
              'default'=> false
            ),
            array(
              'id' => 'related_text',
              'type' => 'text',
              'title' => esc_html__('Related Post Title','swp-portfolio'),
              'default' =>  esc_html__( 'Related Post ', 'swp-portfolio' )
          ), 
            
        )
    )); 

}