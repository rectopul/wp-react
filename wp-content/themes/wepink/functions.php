<?php

/**
 * auaha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package auaha
 */

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
define( 'WP_ENVIRONMENT_TYPE', 'development' );
//after wp_enqueue_script

if (!function_exists('get_installment')) :
	function get_installment($product) {
		$value_product = $product->get_regular_price();

		$installment_price = intval($value_product) / 10;

		$fmt = new NumberFormatter( 'pt_BR', NumberFormatter::CURRENCY );

		echo $fmt->formatCurrency($installment_price, "BRL");
	}
endif;

if (!function_exists('auaha_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function auaha_setup()
	{
		/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on auaha, use a find and replace
	 * to change 'auaha' to the name of your theme in all the template files.
	 */
		load_theme_textdomain('auaha', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
		add_theme_support('title-tag');

		/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'menu-1' => esc_html__('Primary', 'wepink'),
		));

		/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('auaha_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 *	Custom images size
		 *	Add Images sizes customizables in system
		 */

		add_image_size('solutions_thumbnail', 376, 185, true);
		add_image_size('case', 831, 398, false);
		add_image_size('perfil', 190, 190, false);
		add_image_size('marketplace', 630, 113, true);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 40,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array('site-title', 'site-description')
		));

		add_theme_support('post-thumbnails', array('marketplace', 'post', 'gallery-items', 'audio-items', 'video-items', 'page', 'event-items', 'staff'));

		/**
		 * Add custom header
		 */
		$args = array(
			'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
			'default-text-color' => '000',
			'width'              => 1920,
			'height'             => 1888,
			'flex-width'         => true,
			'flex-height'        => true,
		);
		add_theme_support('custom-header', $args);

		add_filter('show_admin_bar', '__return_false');

		
	}
endif;
add_action('after_setup_theme', 'auaha_setup');



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function auaha_content_width()
{
	$GLOBALS['content_width'] = apply_filters('auaha_content_width', 640);
}
add_action('after_setup_theme', 'auaha_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function auaha_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'wepink'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'auaha'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'auaha_widgets_init');

add_filter('wp_nav_menu_items', 'add_custom_in_menu', 10, 2);

function add_custom_in_menu($items, $args)
{
	if ($args->theme_location == 'menu-1') // only for primary menu
	{
		$items_array = array();
		while (false !== ($item_pos = strpos($items, '<li', 3))) {
			$items_array[] = substr($items, 0, $item_pos);
			$items = substr($items, $item_pos);
		}
		$items_array[] = $items;
		//array_splice($items_array, 2, 0, '<li>custom HTML here</li>'); // insert custom item after 2nd one

		$items = implode('', $items_array);
	}
	return $items;
}

// add_action('init', 'handle_preflight');
// function handle_preflight() {
//     $origin = get_http_origin();
//     header("Access-Control-Allow-Origin: *");
// 	header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
// 	header("Access-Control-Allow-Credentials: true");
// 	header('Access-Control-Allow-Headers: Origin, X-Requested-With, X-WP-Nonce, Content-Type, Accept, Authorization, _wpnonce');
// 	if ('OPTIONS' == $_SERVER['REQUEST_METHOD']) {
// 		status_header(200);
// 		exit();
// 	}
// }

// add_filter('rest_authentication_errors', 'rest_filter_incoming_connections');
// function rest_filter_incoming_connections($errors) {
//     $request_server = $_SERVER['REMOTE_ADDR'];
//     return $errors;
// }


add_action( 'rest_api_init', function () {

	register_rest_route( 'wc/v3', '/store/nonce', array(
        'methods' => 'GET',
        'callback' => 'get_custom_get_nonce',
		'permission_callback' => '__return_true'
    ));

	register_rest_route( 'wc/v3', '/cart/add-item', array(
        'methods' => 'POST',
        'callback' => 'addProductToCart',
		'permission_callback' => '__return_true'
    ));
});


function addProductToCart( WP_REST_Request $request ) {
	session_start();
	if(null == $request['id']) {
		$response = rest_ensure_response( 'Informe o id do produto' );
        $response->set_status( 500 );
		return $response;
	}
	if ( defined( 'WC_ABSPATH' ) ) {
		// WC 3.6+ - Cart and other frontend functions are not included for REST requests.
		include_once WC_ABSPATH . 'includes/wc-cart-functions.php';
		include_once WC_ABSPATH . 'includes/wc-notice-functions.php';
		include_once WC_ABSPATH . 'includes/wc-template-hooks.php';
	}

	if ( null === WC()->session ) {
		$session_class = apply_filters( 'woocommerce_session_handler', 'WC_Session_Handler' );
	
		WC()->session = new $session_class();
		WC()->session->init();
	}

	if ( null === WC()->customer ) {
		WC()->customer = new WC_Customer( get_current_user_id(), true );
	}

	if ( null === WC()->cart ) {
		WC()->cart = new WC_Cart();

		$cart  = WC()->cart->get_cart();

		$product_cart_id = WC()->cart->generate_cart_id($request['product_id']);

		$cart_item_key = WC()->cart->find_product_in_cart($product_cart_id);

		if (!$cart_item_key) {
			$add = WC()->cart->add_to_cart( $product_id = $request['id'], $quantity = 1, $variation_id = 0, $variation = array(), $cart_item_data = array() );
		} else {
			$add = false;
		}
		
		if (isset(WC()->session)) {
			if (!WC()->session->has_session()) {
				session_start();
			}
		}

		$session_id = WC()->session->get_session_cookie();
		$session_cookie = 'wp_woocommerce_session=' . $session_id . '; Path=/; HttpOnly';
		header('Set-Cookie: ' . $session_cookie);


		$cart = WC()->cart;

		$items = [
			'totals' => $cart->display_prices_including_tax(),
			"items_count" => $cart->get_cart_contents_count(),
			"session" => WC()->session->get_session_cookie(),
			"car_hash" => WC()->cart->get_cart_hash(),
			"car" => WC()->cart->get_cart_hash(),
			"items_weight" => 0,
			'items' => [],
			'totals' => [
				'tax_totals' => $cart->tax_total,
				'total_items' => number_format(str_replace('.', '',$cart->get_total( 'discounts_total' )), 2, '', ''),
				'total_price' => number_format(str_replace('.', '',$cart->get_total( 'discounts_total' )), 2, '', '')
			]
		];

		foreach($cart->get_cart() as $cart_item_key => $cart_item ) { 
			$product =  wc_get_product( $cart_item['data']->get_id()); 
			$srcset = wp_get_attachment_image_srcset( $product->get_image_id() );
			$image = $product->get_image_id();
			$gallery = $product->get_gallery_image_ids();

			$images = [
				[
					'id' => $image,
					'src' => wp_get_attachment_image_url( $image, 'full', null ),
					'srcset' => $srcset,
					'thumbnail' => wp_get_attachment_thumb_url( $image ),
					'sizes' => wp_get_attachment_image_sizes( $image, [300] ),
					'alt' => get_post_meta( $image, '_wp_attachment_image_alt', TRUE )
				]
			];

			foreach ($gallery as $k => $img) {
				$images[] = [
					'id' => $img,
					'src' => wp_get_attachment_image_url( $img, 'full', null ),
					'srcset' => $srcset,
					'thumbnail' => wp_get_attachment_thumb_url( $img ),
					'sizes' => wp_get_attachment_image_sizes( $img, [300] ),
					'alt' => get_post_meta( $image, '_wp_attachment_image_alt', TRUE )
				];
			}

			$items['items'][] = [
				'key' => $cart_item_key,
				'id' => $cart_item['product_id'],
				'name' => $product->get_name(),
				'slug' => $product->get_slug(),
				'quantity' => $cart_item['quantity'],
				'meta' => wc_get_formatted_cart_item_data( $cart_item ),
				'prices' => [
					'price' => number_format(intval($product->get_price()), 2, '', ''),
					'sale_price' => number_format(intval($product->get_sale_price()), 2, '', ''),
					'regular_price' => number_format(intval($product->get_regular_price()), 2, '', ''),
				],
				'totals'=> [
					'line_subtotal' => number_format($product->get_price() * $cart_item['quantity'], 2, '', ''),
					'line_total' => number_format($product->get_price() * $cart_item['quantity'], 2, '', '')
				],
				'images' => $images
				
			];
		}
	}

	$response = rest_ensure_response( $items );
	$response->set_status( 201 );
	return $response;

	// $parameters = $request->get_params();
	// $id = $parameters['id'];
	// global $woocommerce;
	// wc_load_cart();

	// $product = wc_get_product($id);

	// //var_dump(WC()->cart->get_cart_contents_count());
	// $cart = wc()->cart;

	// if(!$product) {
	// 	$errormessage = json_decode(json_encode(['message' => 'product não encontrado verifique o id']));

	// 	$response = rest_ensure_response( 'Wrong nonce' );
    //     $response->set_status( 500 );
	// }

	// $items = [];

	// $added = $cart->add_to_cart( $id );

	// wc_load_cart();

	// foreach($cart->get_cart() as $cart_item_key => $cart_item ) { 
	// 	$product =  wc_get_product( $cart_item['data']->get_id()); 
	// 	$items[] = [
	// 		'key' => $cart_item_key,
	// 		'id' => $cart_item['product_id'],
	// 		'name' => $product->get_name(),
	// 		'slug' => $product->get_slug(),
	// 		'quantity' => $cart_item['quantity']
	// 	];
	// }

	
}


function get_custom_get_nonce() {
	return wp_send_json([ "nonce" => wp_create_nonce( 'wc_store_api' )]);
}

function filter_rest_allow_anonymous_comments() {
    return true;
}
add_filter('rest_allow_anonymous_comments','filter_rest_allow_anonymous_comments');

/**
 * Enqueue scripts and styles.
 */

function auaha_scripts()
{
	//wp_enqueue_script('jquery');

	/**
	 * FURN
	 */

	wp_enqueue_style('Furn Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', false, '4.2.1');
	wp_enqueue_style('Furn Style', get_template_directory_uri() . '/assets/css/style.min.css', false, '4.2.1');
	wp_enqueue_style('Furn Carousel', get_template_directory_uri() . '/assets/furn/css/owl.carousel.min.css', false, '4.2.1');
	wp_enqueue_style('Furn SlickNav', get_template_directory_uri() . '/assets/furn/css/slicknav.css', false, '4.2.1');
	wp_enqueue_style('Furn Flaticon', get_template_directory_uri() . '/assets/furn/css/flaticon.css', false, '4.2.1');
	wp_enqueue_style('Furn ProgrssBar', get_template_directory_uri() . '/assets/furn/css/progressbar_barfiller.css', false, '4.2.1');
	wp_enqueue_style('Furn LigthSlider', get_template_directory_uri() . '/assets/furn/css/lightslider.min.css', false, '4.2.1');
	wp_enqueue_style('Furn PriceRangs', get_template_directory_uri() . '/assets/furn/css/price_rangs.css', false, '4.2.1');
	wp_enqueue_style('Furn Gijgo', get_template_directory_uri() . '/assets/furn/css/gijgo.css', false, '4.2.1');
	wp_enqueue_style('Furn Animate', get_template_directory_uri() . '/assets/furn/css/animate.min.css', false, '4.2.1');
	wp_enqueue_style('Furn Animate Headline', get_template_directory_uri() . '/assets/furn/css/animated-headline.css', false, '4.2.1');
	wp_enqueue_style('Furn Magnific', get_template_directory_uri() . '/assets/furn/css/magnific-popup.css', false, '4.2.1');
	wp_enqueue_style('Furn Font-awesome', get_template_directory_uri() . '/assets/furn/css/fontawesome-all.min.css', false, '4.2.1');
	wp_enqueue_style('Furn Themify', get_template_directory_uri() . '/assets/furn/css/themify-icons.css', false, '4.2.1');
	wp_enqueue_style('Furn Slick', get_template_directory_uri() . '/assets/furn/css/slick.css', false, '4.2.1');
	wp_enqueue_style('Furn Nice Select', get_template_directory_uri() . '/assets/furn/css/nice-select.css', false, '4.2.1');
	wp_enqueue_style('Main Style', get_template_directory_uri() . '/assets/furn/css/style.css', false, '4.2.1');
	wp_enqueue_style('RCT Style', get_template_directory_uri() . '/assets/css/style.css', false, '4.2.8');
	//wp_enqueue_style('Cart React Style', get_template_directory_uri() . '/components/mini-cart/public/index.css', false, '1.0.0');

	//Get Bootstrap JS
	wp_enqueue_script('Modernzr JS', get_template_directory_uri() . '/assets/furn/js/vendor/modernizr-3.5.0.min.js', array(), '4.2.1', true);
	//wp_enqueue_script('Jquery JS', get_template_directory_uri() . '/assets/furn/js/vendor/jquery-1.12.4.min.js', array(), '4.2.1', true);
	wp_enqueue_script('Slick JS', get_template_directory_uri() . '/assets/furn/js/slick.min.js', array(), '1.8.1', true);
	wp_enqueue_script('Owl JS', get_template_directory_uri() . '/assets/furn/js/owl.carousel.min.js', array(), '4.2.1', true);
	wp_enqueue_script('Bootstrap JS', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array(), '4.2.1', true);
	wp_enqueue_script('Popper JS', get_template_directory_uri() . '/assets/furn/js/popper.min.js', array(), '4.2.1', true);
	wp_enqueue_script('SlickBan JS', get_template_directory_uri() . '/assets/furn/js/jquery.slicknav.min.js', array(), '4.2.1', true);
	wp_enqueue_script('WOW JS', get_template_directory_uri() . '/assets/furn/js/wow.min.js', array(), '4.2.1', true);
	wp_enqueue_script('Animated JS', get_template_directory_uri() . '/assets/furn/js/animated.headline.js', array(), '4.2.1', true);
	wp_enqueue_script('Magnific JS', get_template_directory_uri() . '/assets/furn/js/jquery.magnific-popup.js', array(), '4.2.1', true);
	wp_enqueue_script('Gijgo JS', get_template_directory_uri() . '/assets/furn/js/gijgo.min.js', array(), '4.2.1', true);
	wp_enqueue_script('Lightslider JS', get_template_directory_uri() . '/assets/furn/js/lightslider.min.js', array(), '4.2.1', true);
	//wp_enqueue_script('Price Ranger JS', get_template_directory_uri() . '/assets/furn/js/price_rangs.js', array(), '4.2.1', true);
	wp_enqueue_script('Nice Select JS', get_template_directory_uri() . '/assets/furn/js/jquery.nice-select.min.js', array(), '4.2.1', true);
	wp_enqueue_script('Stick JS', get_template_directory_uri() . '/assets/furn/js/jquery.sticky.js', array(), '4.2.1', true);
	wp_enqueue_script('Barfiller JS', get_template_directory_uri() . '/assets/furn/js/jquery.barfiller.js', array(), '4.2.1', true);
	wp_enqueue_script('Counterup JS', get_template_directory_uri() . '/assets/furn/js/jquery.counterup.min.js', array(), '4.2.1', true);
	wp_enqueue_script('Waypoins JS', get_template_directory_uri() . '/assets/furn/js/waypoints.min.js', array(), '4.2.1', true);
	wp_enqueue_script('Countdown JS', get_template_directory_uri() . '/assets/furn/js/jquery.countdown.min.js', array(), '4.2.1', true);
	wp_enqueue_script('Snake JS', get_template_directory_uri() . '/assets/furn/js/hover-direction-snake.min.js', array(), '4.2.1', true);
	//wp_enqueue_script('Contact JS', get_template_directory_uri() . '/assets/furn/js/contact.js', array(), '4.2.1', true);
	wp_enqueue_script('Plugins JS', get_template_directory_uri() . '/assets/furn/js/plugins.js', array(), '4.2.1', true);
	wp_enqueue_script('Ajax JS', get_template_directory_uri() . '/assets/furn/js/jquery.ajaxchimp.min.js', array(), '4.2.1', true);
	//wp_enqueue_script('Mail JS', get_template_directory_uri() . '/assets/furn/js/mail-script.js', array(), '4.2.1', true);
	wp_enqueue_script('Validate JS', get_template_directory_uri() . '/assets/furn/js/jquery.validate.min.js', array(), '4.2.1', true);
	wp_enqueue_script('Form JS', get_template_directory_uri() . '/assets/furn/js/jquery.form.js', array(), '4.2.1', true);
	wp_enqueue_script('Cleave JS', get_template_directory_uri() . '/assets/js/cleave.min.js', array(), '4.2.4', true);
	wp_enqueue_script('Main JS', get_template_directory_uri() . '/assets/furn/js/main.js', array(), '4.2.4', true);

	// Obtém o caminho do arquivo de manifesto
	$manifest_path = get_template_directory_uri() . '/components/mini-cart/dist/manifest.json';

	// Obtém o nome do arquivo desejado
	$nome_do_arquivo = 'mini-cart.js';

	// Lê o arquivo de manifesto
	$manifesto = file_get_contents($manifest_path);
	$manifesto_json = json_decode($manifesto, true);

	//var_dump($manifesto_json["index.css"]["file"]);
	// Verifica se o nome do arquivo existe no manifesto
	if (isset($manifesto_json["index.html"])) {
		$url_do_arquivo = $manifesto_json["index.html"]["file"];
		$url_css = $manifesto_json["index.css"]["file"];

		

		if(isset($manifesto_json["index.css"]["file"])) {

			wp_enqueue_style('Vite Style', get_template_directory_uri() . '/components/mini-cart/dist/' . $url_css, false, '1.0.0');
		}
		wp_enqueue_script('meu-script', get_template_directory_uri() . '/components/mini-cart/dist/' . $url_do_arquivo, array(), '1.0', true);
	}

	add_filter("script_loader_tag", "add_module_to_my_script", 10, 3);
	function add_module_to_my_script($tag, $handle, $src)
	{
		if ("vite" === $handle || "viteMain" === $handle) {
			$tag = '<script type="module" src="' . esc_url($src) . '"></script>';
		}

		return $tag;
	}

	//  main
	//wp_enqueue_script( 'main' );

	wp_register_script('main', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '4.2.1', true);
	wp_enqueue_script('main');

	wp_enqueue_script( 'wp-api' );

	wp_localize_script( 'wp-api', 'wpApiSettings', array(
		'root' => esc_url_raw( rest_url() ),
		'nonce' => wp_create_nonce( 'wc_store_api' )
	) );

	if(is_product()) {
		
		//global $product;
		
		$product = wc_get_product();

		$current_user = wp_get_current_user();

		$formatted_attributes = [];

		$attributes = $product->get_attributes();

		foreach($attributes as $attr=>$attr_deets){

			$attribute_label = wc_attribute_label($attr);

			var_dump($attr);

			if ( isset( $attributes[ $attr ] ) || isset( $attributes[ 'pa_' . $attr ] ) ) {

				$attribute = isset( $attributes[ $attr ] ) ? $attributes[ $attr ] : $attributes[ 'pa_' . $attr ];

				if ( $attribute['is_taxonomy'] ) {
					$attr_name = str_replace('pa_', '', $attr);
					$formatted_attributes[$attr_name] = wc_get_product_terms( $product->get_id(), $attribute['name']);

				} else {

					$formatted_attributes[$attribute_label] = $attribute['value'];
				}

			}
		}

		$someProduct = [
			'id' => $product->get_id(),
			'attributes' => $formatted_attributes,
			'name' => $product->get_name(),
			'price' => $product->get_price(), //get_price
			'rating_count' => $product->get_rating_counts(),
			'average_rating' => $product->get_average_rating(),
			'average_rating' => $product->get_average_rating(),
			'review_count' => $product->get_review_count(),
			'slug' => $product->get_slug(),
			'date_created' => $product->get_date_created(),
			'featured' => $product->get_featured(),
			'description' => preg_replace( '/[\n\r]/', '', wp_filter_nohtml_kses($product->get_description()) ),
			'short_description' => preg_replace( '/[\n\r]/', '', wp_filter_nohtml_kses($product->get_short_description()) ),
			'sku' => $product->get_sku(),
			'link' => get_permalink( $product->get_id() ),
			'regular_price' => $product->get_regular_price(),
			'sale_price' => $product->get_sale_price(),
			'date_on_sale_from' => $product->get_date_on_sale_from(),
			'date_on_sale_to' => $product->get_date_on_sale_to(),
			'total_sales' => $product->get_total_sales(),
			'categories' => wc_get_product_category_list($product->get_id()),
			'user_email' => $current_user->user_email,
			'user_name' => $current_user->first_name,
			'comments' => [
				'comment_ID' => get_comment_id_fields(),
				'post_id' => get_the_ID()
			]
		];

		wp_localize_script( 'wp-api', 'wpSingleProduct', $someProduct );

		wp_enqueue_script( 'wp-api' );
	}


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	
}
add_action('wp_enqueue_scripts', 'auaha_scripts');






/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Woocommerce hooks
 */
require get_template_directory() . '/woocommerce-hooks.php';

/**
 * Multi images control
 */
require get_template_directory() . '/inc/custom_controls.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';

/**
 * Função para css
 * Funçao que gera o css
 */

function css($selector, $property, $theme_mod)
{
	$return = '';
	$theme_mod = get_theme_mod($theme_mod);
	if (!empty($theme_mod)) {
		$return = sprintf(
			'%s { %s:%s; }',
			$selector,
			$property,
			$property == 'background-image' ? 'url("' . $theme_mod . '")' : $theme_mod
		);
		return $return;
	}
}

function book_setup_post_type()
{
	$args = array(
		'public'    => true,
		'labels'     => array(
			'name' => __('Marketplace', 'textdomain'),
			'add_new' => _x('Adicionar Marketplace', 'book'),
			'add_new_item' => __('Adicionar Marketplace'),
			'edit_item' => __('Edit Marketplaces'),
			'all_items' => __('Marketplaces'),
			'search_items' => __('Search Marketplace'),
			'not_found' =>  __('Não há nenhum Marketplace'),
			'parent_item_colon' => ''
		),
		'menu_icon' => 'dashicons-store',
		'supports'  => array('title', 'editor', 'thumbnail', 'revisions', 'gallery-items')
	);

	$argscase = array(
		'public'    => true,
		'label'     => __('Cases', 'textdomain'),
		'menu_icon' => 'dashicons-hammer',
		'supports'  => array('title', 'editor', 'thumbnail')
	);

	$argsrep = array(
		'public'    => true,
		'label'     => __('Representantes', 'textdomain'),
		'menu_icon' => 'dashicons-admin-users',
		'supports'  => array('title', 'thumbnail', 'excerpt')
	);
	register_post_type('Representantes', $argsrep);
	register_post_type('marketplace', $args);
	register_post_type('cases', $argscase);
}
add_action('init', 'book_setup_post_type');
