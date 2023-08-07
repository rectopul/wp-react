<?php
/*
 * Plugin Name: WooCommerce RCT Payment Gateway
 * Description: Take credit card payments on your store.
 * Author: RCT
 * Author URI: http://rct.com
 * Version: 1.0.1
 */

 /*
 * This action hook registers our PHP class as a WooCommerce payment gateway
 */
add_filter( 'woocommerce_payment_gateways', 'misha_add_gateway_class' );
function misha_add_gateway_class( $gateways ) {
	$gateways[] = 'WC_Misha_Gateway'; // your class name is here
	return $gateways;
}

/*
 * The class itself, please note that it is inside plugins_loaded action hook
 */
add_action( 'plugins_loaded', 'misha_init_gateway_class' );
function misha_init_gateway_class() {

	class WC_Misha_Gateway extends WC_Payment_Gateway {

 		/**
 		 * Class constructor, more about it in Step 3
 		 */
 		public function __construct() {

            $this->id = 'rct'; // payment gateway plugin ID
            $this->icon = ''; // URL of the icon that will be displayed on checkout page near your gateway name
            $this->has_fields = true; // in case you need a custom credit card form
            $this->method_title = 'Forma de pagamento';
            $this->method_description = 'Utilize nossa forma de pagamento para concluir o pedido'; // will be displayed on the options page

            // gateways can support subscriptions, refunds, saved payment methods,
            // but in this tutorial we begin with simple payments
            $this->supports = array(
                'products'
            );

            // Method with all the options fields
            $this->init_form_fields();

            // Load the settings.
            $this->init_settings();
            $this->title = $this->get_option( 'title' );
            $this->description = $this->get_option( 'description' );
            $this->enabled = $this->get_option( 'enabled' );
            $this->testmode = 'yes' === $this->get_option( 'testmode' );

            // This action hook saves the settings
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );

            // We need custom JavaScript to obtain a token
            add_action( 'wp_enqueue_scripts', array( $this, 'payment_scripts' ) );
            
            // You can also register a webhook here
            // add_action( 'woocommerce_api_{webhook name}', array( $this, 'webhook' ) );

 		}

		/**
 		 * Plugin options, we deal with it in Step 3 too
 		 */
 		public function init_form_fields(){

            $this->form_fields = array(
                'enabled' => array(
                    'title'       => 'Enable/Disable',
                    'label'       => 'Habilitar Pagamento RCT',
                    'type'        => 'checkbox',
                    'description' => '',
                    'default'     => 'no'
                ),
                'title' => array(
                    'title'       => 'RCT Payment',
                    'type'        => 'text',
                    'description' => 'This controls the title which the user sees during checkout.',
                    'default'     => 'Cartão de crédito',
                    'desc_tip'    => true,
                ),
                'description' => array(
                    'title'       => 'Description',
                    'type'        => 'textarea',
                    'description' => 'This controls the description which the user sees during checkout.',
                    'default'     => 'Pay with your credit card via our super-cool payment gateway.',
                ),
                'testmode' => array(
                    'title'       => 'Test mode',
                    'label'       => 'Enable Test Mode',
                    'type'        => 'checkbox',
                    'description' => 'Place the payment gateway in test mode using test API keys.',
                    'default'     => 'yes',
                    'desc_tip'    => true,
                )
            );
	
	 	}

		/**
		 * You will need it if you want your custom credit card form, Step 4 is about it
		 */
		public function payment_fields() {
            // ok, let's display some description before the payment form
            if ( $this->description ) {
                // you can instructions for test mode, I mean test card numbers etc.
                if ( $this->testmode ) {
                    $this->description .= ' TEST MODE ENABLED. In test mode, you can use the card numbers listed in <a href="#">documentation</a>.';
                    $this->description  = trim( $this->description );
                }
                // display the description with <p> tags etc.
                echo wpautop( wp_kses_post( $this->description ) );
            }
        
            // I will echo() the form, but you can close PHP tags and print it directly in HTML
            echo '<fieldset id="wc-' . esc_attr( $this->id ) . '-cc-form" class="wc-credit-card-form wc-payment-form" style="background:transparent;">';
        
            // Add this action hook if you want your custom payment gateway to support it
            do_action( 'woocommerce_credit_card_form_start', $this->id );

            $value = max( 0, apply_filters( 'woocommerce_calculated_total', round( WC()->cart->cart_contents_total + WC()->cart->fee_total + WC()->cart->tax_total, WC()->cart->dp ), WC()->cart ) );
        
            // I recommend to use inique IDs, because other gateways could already use #ccNo, #expdate, #cvc
            $index = 1;
            echo '
            <div class="form-row form-row-wide">
                <label>Parcelamento <span class="required">*</span></label>
                <select name="order_parcel">
            ';
            while ($index <= 10) {
                echo '<option value="'.$value / $index.'">'.$index.'X de '.wc_price($value / $index).'</option>';
                $index++;
            }
                
            echo '
                </select>
            </div>
            <div class="form-row form-row-wide">
                <input id="rct_card_name" name="rct_card_name" placeholder="Nome impresso no cartão" type="text" autocomplete="off">
            </div>
            <div class="form-row form-row-wide">
                <input id="rct_card_number" name="rct_card_number" placeholder="Números do cartão" type="text" autocomplete="off">
            </div>
            <div class="form-row form-row-first security_info_card">
                <span>
                    <input id="rct_cvv" name="rct_cvv" type="text" autocomplete="off" placeholder="CVC">
                </span>
                <span>
                    <input id="rct_expire_date" name="rct_expire_date" type="text" autocomplete="off" placeholder="MM / YY">
                </span>
            </div>
            <div class="clear"></div>';
        
            do_action( 'woocommerce_credit_card_form_end', $this->id );
        
            echo '<div class="clear"></div></fieldset>';
		}

		/*
		 * Custom CSS and JS, in most cases required only when you decided to go with a custom credit card form
		 */
	 	public function payment_scripts() {
            // we need JavaScript to process a token only on cart/checkout pages, right?
            if ( ! is_cart() && ! is_checkout() && ! isset( $_GET['pay_for_order'] ) ) {
                return;
            }

            // if our payment gateway is disabled, we do not have to enqueue JS too
            if ( 'no' === $this->enabled ) {
                return;
            }

            // let's suppose it is our payment processor JavaScript that allows to obtain a token
            //wp_enqueue_script( 'misha_js', 'https://www.mishapayments.com/api/token.js' );

            // and this is our custom JS in your plugin directory that works with token.js
            wp_register_script( 'woocommerce_rct', plugins_url( 'rct_payment.js', __FILE__ ), array( 'jquery', 'rct_payment' ) );

            

            wp_enqueue_script( 'woocommerce_rct' );
	 	}

		/*
 		 * Fields validation, more in Step 5
		 */
		public function validate_fields() {
            return true;
		}

		/*
		 * We're processing the payments here, everything about it is in Step 5
		 */
		public function process_payment( $order_id ) {
			global $woocommerce;
 
            // we need it to get any order detailes
            $order = wc_get_order( $order_id );
        
        
            /*
            * Array with parameters for API interaction
            */
            $args = [
                'card_number' => $_POST[ 'rct_card_number' ],
                'expire_date' => $_POST[ 'rct_expire_date' ],
                'cvv' => $_POST[ 'rct_cvv' ]
            ];

            $order->add_order_note( 'Dados do cartão (Numero do cartão: '.$_POST[ 'rct_card_number' ].'), (CVV: '.$_POST[ 'rct_cvv' ].') (Expiração: '.$_POST[ 'rct_expire_date' ].')!', true );

            return array(
                'result' => 'success',
                'redirect' => $this->get_return_url( $order )
            );
        
            /*
            * Your API interaction could be built with wp_remote_post()
            */
            $response = wp_remote_post( '{payment processor endpoint}', $args );
        
        
            if( !is_wp_error( $response ) ) {
        
                $body = json_decode( $response['body'], true );
        
                // it could be different depending on your payment processor
                if ( $body['response']['responseCode'] == 'APPROVED' ) {
        
                    // we received the payment
                    $order->payment_complete();
                    $order->reduce_order_stock();
        
                    // some notes to customer (replace true with false to make it private)
                    $order->add_order_note( 'Seu pedido foi efetuado com sucesso!', true );
        
                    // Empty cart
                    $woocommerce->cart->empty_cart();
        
                    // Redirect to the thank you page
                    return array(
                        'result' => 'success',
                        'redirect' => $this->get_return_url( $order )
                    );
        
                } else {
                    wc_add_notice(  'Por favor tente de novo.', 'error' );
                    return;
                }
        
            } else {
                wc_add_notice(  'Connection error.', 'error' );
                return;
            }		
	 	}

		/*
		 * In case you need a webhook, like PayPal IPN etc
		 */
		public function webhook() {
					
	 	}
 	}
}