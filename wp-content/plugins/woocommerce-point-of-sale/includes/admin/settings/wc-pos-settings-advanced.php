<?php
/**
 * Point of Sale Advanced Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_Advanced', false ) ) {
	return new WC_POS_Admin_Settings_Advanced();
}

/**
 * WC_POS_Admin_Settings_Advanced.
 */
class WC_POS_Admin_Settings_Advanced extends WC_POS_Settings_Page {

	private $last_update = array(
		'date' => '',
		'log'  => array(),
	);

	private $force_updates = array(
		'3.2.1'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-3.2.1.php',
		'3.2.2.0'  => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-3.2.2.0.php',
		'4.0.0'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-4.0.0.php',
		'4.1.9'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-4.1.9.php',
		'4.1.9.10' => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-4.1.9.10.php',
		'4.3.6'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-4.3.6.php',
		'5.0.0'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.0.0.php',
		'5.1.3'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.1.3.php',
		'5.2.0'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.0.php',
		'5.2.2'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.2.php',
		'5.2.4'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.4.php',
		'5.2.5'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.5.php',
		'5.2.7'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.7.php',
		'5.2.8'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.8.php',
		'5.2.9'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.9.php',
	);

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'advanced';
		$this->label = __( 'Advanced', 'woocommerce-point-of-sale' );

		parent::__construct();
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {
		// $GLOBALS['hide_save_button'] = true;
		global $wpdb;
		$update_status     = __( 'OK', 'woocommerce-point-of-sale' );
		$last_update       = get_option( 'wc_pos_last_force_db_update' );
		$this->last_update = ( $last_update ) ? $last_update : $this->last_update;
		?>

		<table class="widefat striped" style="margin-bottom: 1em;">
			<thead>
			<tr>
				<th colspan="2">
					<b><?php esc_html_e( 'Database', 'woocommerce-point-of-sale' ); ?></b>
				</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td style="width: 30%;">
					<?php esc_html_e( 'Last Forced Update: ', 'woocommerce-point-of-sale' ); ?>
				</td>
				<td>
					<?php echo ! empty( $this->last_update['date'] ) ? esc_html( $this->last_update['date'] ) : esc_html__( 'No forced update made', 'woocommerce-point-of-sale' ); ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php esc_html_e( 'POS Database Version: ', 'woocommerce-point-of-sale' ); ?>
				</td>
				<td>
					<?php echo esc_html( get_option( 'wc_pos_db_version' ) ); ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php esc_html_e( 'Database Update: ', 'woocommerce-point-of-sale' ); ?>
				</td>
				<td>
					<input name="save" class="button" type="submit" value="<?php esc_html_e( 'Force Update', 'woocommerce-point-of-sale' ); ?>"/><br>
					<span class="description" style="margin-top: .5em; display: inline-block;">
						<?php esc_html_e( 'Use with caution: this tool will update the database to the latest version - useful when settings are not being applied as per configured in settings, registers, receipts and outlets.', 'woocommerce-point-of-sale' ); ?>
					</span>
				</td>
			</tr>
			<tr>
				<td style="width: 30%;">
					<?php esc_html_e( 'Settings:', 'woocommerce-point-of-sale' ); ?>
				</td>
				<td>
					<input name="wc_pos_reset_settings" id="wc_pos_reset_settings" type="button" style="" value="Reset Settings" class="button"><br>
					<span class="description" style="margin-top: .5em; display: inline-block;"></<?php esc_html_e( 'This tool will update the database to the latest version - useful when settings are not being applied as per configured in settings, registers, receipts and outlets.', 'woocommerce-point-of-sale' ); ?></span>
				</td>
			</tr>
		</table>
		<?php
		return apply_filters( 'woocommerce_point_of_sale_general_settings_fields', array() );
	}

	/**
	 * Save settings
	 */
	public function save() {
		$last_update['date'] = gmdate( 'Y-m-d H:i' );
		foreach ( $this->force_updates as $version => $update ) {
			include $update;
			if ( isset( $result ) ) {
				$last_update['log'][ $version ] = $result;
				unset( $result );
			}
			$last_update['version'] = $version;
		}

		WC_POS_Install::update_pos_version( $last_update['version'] );
		update_option( 'wc_pos_last_force_db_update', $last_update );
	}
}

return new WC_POS_Admin_Settings_Advanced();
