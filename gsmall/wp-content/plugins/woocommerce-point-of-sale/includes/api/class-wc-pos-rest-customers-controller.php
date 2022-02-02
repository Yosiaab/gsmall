<?php
/**
 * REST API Customers Controller
 *
 * Handles requests to wc-pos/customers.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/API
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_REST_Customers_Controller.
 */
class WC_POS_REST_Customers_Controller extends WC_REST_Customers_Controller {
	protected $namespace = 'wc-pos';
	protected $rest_base = 'customers';

	/**
	 * Get the query params for collections.
	 *
	 * @return array
	 */
	public function get_collection_params() {
		$params = parent::get_collection_params();

		if ( isset( $params['per_page'] ) ) {
			$params['per_page']['minimum'] = -1;

			// Use intval() instead of absint() for sanitization.
			$params['per_page']['sanitize_callback'] = array( $this, 'sanitize_per_page' );
		}

		return $params;
	}

	/**
	 * Sanitize the per_page param.
	 *
	 * @since 5.2.9
	 */
	public function sanitize_per_page( $value, $request, $param ) {
		return intval( $value, 10 );
	}
}
