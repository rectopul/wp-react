<?php



function get_price_multiplier() {
    return 2; // x2 for testing
}
function custom_price( $price, $product ) {
    $value_product = $price;

    $installment_price = intval($value_product) / 10;

    $fmt = new NumberFormatter( 'pt_BR', NumberFormatter::CURRENCY );

    $value = $price ."ou 10x". $fmt->formatCurrency($installment_price, "BRL");

    return $value;
}

/**
 * Enable reviews for all WC Products.
 */
add_action('admin_init', function() {
	$updated = 0;
	$query = new \WP_Query([
		'post_type' => 'product',
		'posts_per_page' => -1,
		'comment_status' => 'closed',
	]);
	if($query->have_posts()) {
		while($query->have_posts()) {
			$query->the_post();
			if(wp_update_post([
				'ID' => get_the_ID(),
				'comment_status' => 'open',
			])) {
				$updated++;
			}
		}
		wp_reset_postdata();
	}
	add_action('admin_notices', function() use ($updated) {
		printf(
			'<div class="notice notice-info is-dismissible"><p>Enabled reviews for %d products.</p></div>',
			(int)$updated
		);
	});
});
// Add some product data to "add to cart" button for 'added_to_cart' js event
add_action('woocommerce_product_meta_start', 'product_meta_start', 10, 3);

function product_meta_start() {
        // Check rows existexists.
        global $woocommerce, $product;  

        $average      = $product->get_average_rating();
        $review_count = $product->get_review_count();

        echo '<div id="star-rating"></div>';

        echo '<div id="buy_field"></div>';

        $rows = get_field('beneficios');
        if( $rows ){
            echo '<div class="product_instructions">
            <h2>Benefícios</h2>
            <ul>';

            foreach( $rows as $row ) {
                $beneficio = $row['beneficio'];
                echo '<li>';
                 echo $beneficio;
                echo '</li>';
            }

            echo '
                </ul>
            </div>';
        }else{
            //nothing
        }
            
}

add_action('woocommerce_after_shop_loop_item_title', 'excerpt_item', 10, 3);
function excerpt_item() {
    the_excerpt();
}

add_action('woocommerce_loop_add_to_cart_link', 'filter_wc_loop_add_to_cart_link', 10, 3);
function filter_wc_loop_add_to_cart_link($button_html, $product, $args)
{
    if ($product->supports('ajax_add_to_cart')) {
        $search_string  = 'data-product_sku';

        // Insert custom product data as data tags
        $replace_string = sprintf(
            'data-product_name="%s" data-product_price="%s" data-currency="%s" %s',
            $product->get_name(), // product name
            wc_get_price_to_display($product), // Displayed price
            get_woocommerce_currency(), // currency
            $search_string
        );

        $button_html = str_replace($search_string, $replace_string, $button_html);
    }
    return $button_html;
}

add_action('woocommerce_product_meta_end', 'single_title_in_single', 5);
function single_title_in_single()
{
    echo '<div class="s_product_text">
    <p>' . wp_trim_words(get_the_content(), 60) . '</p></div>';
}

add_action('woocommerce_single_product_summary', 'new_summary_single_product', 5);

function disable_wp_auto_p( $content ) {
    if ( is_singular( 'page' ) ) {
      remove_filter( 'the_content', 'wpautop' );
      remove_filter( 'the_excerpt', 'wpautop' );
      add_filter( 'woocommerce_short_description', 'wpautop' );
    }
    return $content;
  }
  add_filter( 'the_content', 'disable_wp_auto_p', 0 );

function new_summary_single_product()
{
    
    printf(
        '<div class="s_product_text"><h3>%s</h3></div> <div id="single_product_prices"></div>', 
        get_the_title()
    );
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );



add_action('woocommerce_before_cart', 'rct_woocommercr_header_checkout', 10);

function rct_woocommercr_header_checkout()
{
    echo '<style> 
            .entry-header{ display: none; }
            .woocommerce-notices-wrapper { display: none; }
        </style>';
    echo '<div class="slider-area">
        <div class="slider-active">
        <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-8">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="fadeInUp" data-delay=".4s" class="" style="animation-delay: 0.4s;">' . get_the_title(wc_get_page_id('cart')) . '</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/" tabindex="0">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#" tabindex="0">' . get_the_title(wc_get_page_id('cart')) . '</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>';
}


add_action('woocommerce_after_checkout_form',  'after_form_checkout', 10);
function after_form_checkout()
{
    echo '</div>';
}
add_action('woocommerce_before_checkout_form',  'before_form_checkout', 10);
function before_form_checkout()
{
    echo '<div class="container single-form-checkout">';
}
add_action('woocommerce_before_cart',  'cart_container', 10);
function cart_container()
{
    echo '<div class="container single-cart">';
}


add_action('woocommerce_review_before',  'single_review', 10);
function single_review()
{
    echo '<div class="container single-review">';
}
add_action('woocommerce_before_single_product_summary',  'single_product_start_summary');
function single_product_start_summary()
{
    echo '<div class="row s_product_inner">';
}

add_action('woocommerce_before_single_product',  'single_product_start_container');

function single_product_start_container()
{
    echo '<div class="container">';
}

add_action('woocommerce_before_main_content', 'custom_start_container', 10);
function custom_start_container()
{
    echo '<section class="properties new-arrival fix">';
}

remove_action('woocommerce_after_main_content', 10);
add_action('woocommerce_after_main_content', 'custom_end_container', 10);
function custom_end_container()
{
    echo '</section>';
}

add_action('woocommerce_before_shop_loop', 'custom_start_shop_container', 10);

function custom_start_shop_container()
{
    echo '<div class="properties new-arrival fix"><div class="container">';
}





add_action('woocommerce_after_shop_loop', 'after_loop_shop', 10);

function after_loop_shop()
{
    echo '</div>';
}

apply_filters('woocommerce_single_product_image_gallery_classes', function ($classes, $class, $product_id) {
    $classes = array_merge(['col-lg-5'], $classes);
    return $classes;
}, 10, 3);
