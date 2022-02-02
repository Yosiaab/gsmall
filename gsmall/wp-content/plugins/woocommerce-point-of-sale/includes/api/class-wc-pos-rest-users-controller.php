<?php
/**
 * REST API Users Controller
 *
 * Handles requests to wc-pos/users.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/API
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_REST_Users_Controller.
 */
class WC_POS_REST_Users_Controller extends WP_REST_Users_Controller {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct();

		$this->namespace = 'wc-pos';
		$this->rest_base = 'users';

	}
}
