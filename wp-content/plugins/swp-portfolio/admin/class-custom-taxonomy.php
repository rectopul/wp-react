<?php
/*
 * @package Quray-extra
 * @since 1.0.0
*/
if (!class_exists('Swp_Portfolio_Custom_Taxonomy')){
class Swp_Portfolio_Custom_Taxonomy {

	private static $instance;

    function __construct() {

        add_action( 'init', array( $this, 'create_taxonomy' ) );

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

    function create_taxonomy() {
        $labels = array(
                'name'              => esc_html__( 'Categories',  'swp-portfolio' ),
                'singular_name'     => esc_html__( 'Category', 'swp-portfolio' ),
                'search_items'      => esc_html__( 'Search Categories', 'swp-portfolio' ),
                'all_items'         => esc_html__( 'All Categories', 'swp-portfolio' ),
                'parent_item'       => esc_html__( 'Parent Category', 'swp-portfolio' ),
                'parent_item_colon' => esc_html__( 'Parent Category:', 'swp-portfolio' ),
                'edit_item'         => esc_html__( 'Edit Category', 'swp-portfolio' ),
                'update_item'       => esc_html__( 'Update Category', 'swp-portfolio' ),
                'add_new_item'      => esc_html__( 'Add New Category', 'swp-portfolio' ),
                'new_item_name'     => esc_html__( 'New Category Name', 'swp-portfolio' ),
                'menu_name'         => esc_html__( 'Category', 'swp-portfolio' ),
            );

            $args = array(
                'hierarchical'      => true,
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => array( 'slug' => 'portfolio-category' ),
            );

        register_taxonomy( 'portfolio-category', array( 'portfolio' ), $args );

    } //end function



} // end class


 if (class_exists('Swp_Portfolio_Custom_Taxonomy')){
		Swp_Portfolio_Custom_Taxonomy::getInstance();
	}

} //endif 