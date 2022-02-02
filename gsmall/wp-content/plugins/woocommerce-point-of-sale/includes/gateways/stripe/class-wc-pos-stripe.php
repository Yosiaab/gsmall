<?php
/**
 * Stripe for POS.
 *
 * @package WooCommerce_Point_Of_Sale/Gateways
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_Stripe.
 */
class WC_POS_Stripe {

	/**
	 * Init.
	 */
	public static function init() {
		self::includes();
		self::add_ajax_events();

		add_filter( 'wc_pos_params', array( __CLASS__, 'params' ) );
		add_action( 'admin_notices', array( __CLASS__, 'show_stripe_notice' ) );
	}

	/**
	 * Includes.
	 */
	public static function includes() {
		if ( ! class_exists( '\Stripe\Stripe' ) ) {
			include WC_POS()->plugin_path() . '/vendor/stripe/stripe-php/init.php';
		}

		include dirname( __FILE__ ) . '/class-wc-pos-stripe-api.php';
		include dirname( __FILE__ ) . '/payment-methods/class-wc-pos-gateway-stripe-terminal.php';
		include dirname( __FILE__ ) . '/payment-methods/class-wc-pos-gateway-stripe-credit-card.php';
	}

	/**
	 * Returns the general Stripe gateway settings.
	 *
	 * @param $option null|string Whether to return the value of a specific option.
	 *
	 * @return array|string
	 */
	public static function get_stripe_settings( $option = null ) {
		$stripe_settings = maybe_unserialize( get_option( 'woocommerce_stripe_settings', array() ) );
		$stripe_settings = empty( $stripe_settings ) ? array() : $stripe_settings;

		// If no option specified, return all settings.
		if ( is_null( $option ) ) {
			return $stripe_settings;
		}

		// Return specific option value.
		return isset( $stripe_settings[ $option ] ) ? $stripe_settings[ $option ] : '';
	}

	/**
	 * Returns the publishable key based on Stripe mode.
	 *
	 * @return string
	 */
	public static function get_publishable_key() {
		if ( 'yes' === self::get_stripe_settings( 'testmode' ) ) {
			return self::get_stripe_settings( 'test_publishable_key' );
		}

		return self::get_stripe_settings( 'publishable_key' );
	}

	/**
	 * Returns the secret key based on Stripe mode.
	 *
	 * @return string
	 */
	public static function get_secret_key() {
		if ( 'yes' === self::get_stripe_settings( 'testmode' ) ) {
			return self::get_stripe_settings( 'test_secret_key' );
		}

		return self::get_stripe_settings( 'secret_key' );
	}

	/**
	 * Add gateway params.
	 *
	 * @param array $params
	 * @return array
	 */
	public static function params( $params ) {
		$stripe_data = get_option( 'woocommerce_pos_stripe_terminal_settings' );

		$params['stripe_publishable_key']       = self::get_publishable_key();
		$params['stripe_secret_key']            = self::get_secret_key(); // Should not be sent to the front-end.
		$params['stripe_terminal_debug_mode']   = ! empty( $stripe_data['debug_mode'] ) && 'yes' === $stripe_data['debug_mode'];
		$params['stripe_payment_intent_nonce']  = wp_create_nonce( 'stripe-payment-intent' );
		$params['stripe_capture_payment_nonce'] = wp_create_nonce( 'stripe-capture-payment' );

		return $params;
	}

	/**
	 * Show a notice if any of the POS Stripe payment methods is enabled and the main
	 * Stripe gateway is not installed or inactive.
	 */
	public static function show_stripe_notice() {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';

		global $wpdb;
		$pos_stripe_methods = $wpdb->get_results(
			"SELECT option_value
			FROM {$wpdb->options}
			WHERE option_name = 'woocommerce_pos_stripe_terminal_settings'
			OR option_name = 'woocommerce_pos_stripe_credit_card_settings'"
		);

		// Check if any of the Stripe methods is enabled.
		$enabled = false;
		if ( $pos_stripe_methods ) {
			foreach ( $pos_stripe_methods as $method ) {
				$settings = maybe_unserialize( $method->option_value );
				if ( 'yes' === $settings['enabled'] ) {
					$enabled = true;
					break;
				}
			}
		}

		// If any of the POS Stripe payment methods is enabled, we require the main Stripe plugin to be installed and active.
		if ( $enabled && ! is_plugin_active( 'woocommerce-gateway-stripe/woocommerce-gateway-stripe.php' ) ) {
			?>
			<div id="message" class="error">
				<p><?php esc_html_e( 'Point of Sale Stripe payment methods require the WooCommerce Stripe Payment Gateway to be installed and active.', 'woocommerce-point-of-sale' ); ?></p>
			</div>
			<?php
		}
	}

	/**
	 * Hook in methods.
	 */
	public static function add_ajax_events() {
		$ajax_events_nopriv = array(
			'stripe_connection_token',
			'stripe_payment_intent',
			'stripe_capture_payment',
		);

		foreach ( $ajax_events_nopriv as $ajax_event ) {
			add_action( 'wp_ajax_wc_pos_' . $ajax_event, array( __CLASS__, 'ajax_' . $ajax_event ) );
			add_action( 'wp_ajax_nopriv_wc_pos_' . $ajax_event, array( __CLASS__, 'ajax_' . $ajax_event ) );
		}
	}

	/**
	 * Ajax: create token.
	 */
	public static function ajax_stripe_connection_token() {
		$api = new WC_POS_Stripe_API();
		wp_send_json_success( $api->create_token() );
	}

	/**
	 * Ajax: payment intent.
	 */
	public static function ajax_stripe_payment_intent() {
		check_ajax_referer( 'stripe-payment-intent', 'security' );

		$amount         = isset( $_POST['amount'] ) ? floatval( $_POST['amount'] ) : 0.0;
		$currency       = strtolower( get_woocommerce_currency() );
		$payment_method = isset( $_POST['payment_method'] ) ? wc_clean( $_POST['payment_method'] ) : '';

		switch ( $payment_method ) {
			case 'pos_stripe_terminal':
				$payment_method_types = array( 'card_present' );
				$capture_method       = 'manual';
				break;
			case 'pos_stripe_credit_card':
				$payment_method_types = array( 'card' );
				$capture_method       = 'automatic';
				break;
			default:
				$payment_method_types = array();
				$capture_method       = 'automatic';
		}

		$api = new WC_POS_Stripe_API();

		try {
			$intent = $api->create_payment_intent( $amount, $currency, $payment_method_types, $capture_method );
			wp_send_json_success( $intent );
		} catch ( Exception $e ) {
			wp_send_json_error(
				array(
					'message' => $e->getMessage(),
					'code'    => $e->getCode(),
				)
			);
		}
	}

	/**
	 * Ajax: capture payment.
	 */
	public static function ajax_stripe_capture_payment() {
		check_ajax_referer( 'stripe-capture-payment', 'security' );

		$id  = isset( $_POST['intentId'] ) ? wc_clean( wp_unslash( $_POST['intentId'] ) ) : '';
		$api = new WC_POS_Stripe_API();

		try {
			$intent = $api->capture_payment( $id );
			wp_send_json_success( $intent );
		} catch ( Exception $e ) {
			wp_send_json_error(
				array(
					'message' => $e->getMessage(),
					'code'    => $e->getCode(),
				)
			);
		}
	}
}

WC_POS_Stripe::init();
