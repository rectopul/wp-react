<?php
/*
 * @package swp-portfolio
 * @since 1.0.0
*/
if (!class_exists('Swp_Portfolio_Custom_Post_Type')){
class Swp_Portfolio_Custom_Post_Type {

	private static $instance;

    function __construct() {

        add_action( 'init', array( $this, 'create_post_type' ) );

    }

    /**
	 * getInstance();
	 * @since 1.0.0
	 * */
	public static function getInstance(){
		if (null == self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}

    function create_post_type() {
    	$labels = array(
		'name'                  => esc_html__( 'Portfolios',  'swp-portfolio' ),
		'singular_name'         => esc_html__( 'Portfolio',  'swp-portfolio' ),
		'menu_name'             => esc_html__( 'Portfolio', 'swp-portfolio' ),
		'name_admin_bar'        => esc_html__( 'Portfolio', 'swp-portfolio' ),
        'add_new'            => esc_html__( 'Add New Portfolio', 'swp-portfolio'),
        'add_new_item'       => esc_html__( 'Add New Portfolio', 'swp-portfolio' ),
        'new_item'           => esc_html__( 'New Portfolio', 'swp-portfolio' ),
        'edit_item'          => esc_html__( 'Edit Portfolio', 'swp-portfolio' ),
        'view_item'          => esc_html__( 'View Portfolio', 'swp-portfolio' ),
        'all_items'          => esc_html__( 'All Portfolios', 'swp-portfolio' ),
        'search_items'       => esc_html__( 'Search Portfolios', 'swp-portfolio' ),
        'parent_item_colon'  => esc_html__( 'Parent : Portfolio', 'swp-portfolio' ),
        'not_found'          => esc_html__( 'No Portfolio found.', 'swp-portfolio'),
        'not_found_in_trash' => esc_html__( 'No Portfolio found in Trash.', 'swp-portfolio' ),
        'not_found_in_trash' => esc_html__( 'Portfolios', 'swp-portfolio' ),
        // Overrides the “Featured Image” label
        'featured_image'        => esc_html__( 'Portfolio Image', 'swp-portfolio' ),

        // Overrides the “Set featured image” label
        'set_featured_image'    => esc_html__( 'Set Portfolio image', 'swp-portfolio' ),

        // Overrides the “Remove featured image” label
        'remove_featured_image' => esc_html__( 'Remove Portfolio image', 'swp-portfolio' ),

        // Overrides the “Use as featured image” label
        'use_featured_image'    => esc_html__( 'Use as Portfolio image', 'swp-portfolio' ),

	);

        register_post_type( 
            'portfolio',
            array(
                'labels'             => $labels,
                'public'             => true,
                'supports'            =>array( 'title', 'editor','thumbnail', 'author' ),
                'hierarchical'       => false,
                'rewrite'            => array( 'slug' => 'portfolio' ),
                'menu_icon'          => 'dashicons-images-alt2',
                'has_archive' => true,
            )
        );

    }

} // end class


 if (class_exists('Swp_Portfolio_Custom_Post_Type')){
		Swp_Portfolio_Custom_Post_Type::getInstance();
	}

} //endif 


