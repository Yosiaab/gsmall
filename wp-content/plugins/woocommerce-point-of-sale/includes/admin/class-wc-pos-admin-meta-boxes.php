<?php
/**
 * WooCommerce Point of Sale Meta Boxes
 *
 * @package WooCommerce_Point_Of_Sale/Admin/Meta_Boxes
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Meta_Boxes', false ) ) {
	return new WC_POS_Admin_Meta_Boxes();
}

/**
 * WC_POS_Admin_Meta_Boxes.
 */
class WC_POS_Admin_Meta_Boxes {

	/**
	 * Is meta boxes saved once?
	 *
	 * @var boolean
	 */
	private static $saved_meta_boxes = false;

	/**
	 * Meta box error messages.
	 *
	 * @var array
	 */
	public static $meta_box_errors = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'remove_meta_boxes' ), 10 );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 30 );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ), 1, 2 );
		add_action( 'woocommerce_process_product_meta', array( $this, 'save_product_grids' ), 10, 2 );

		// Save meta boxes.
		add_action( 'wc_pos_process_pos_register_meta', 'WC_POS_Meta_Box_Register_Options::save', 10, 2 );
		add_action( 'wc_pos_process_pos_outlet_meta', 'WC_POS_Meta_Box_Outlet_Options::save', 10, 2 );
		add_action( 'wc_pos_process_pos_grid_meta', 'WC_POS_Meta_Box_Grid_Options::save', 10, 2 );

		// Add a new Point of Sale tab to the product options meta box.
		if ( 'yes' === get_option( 'wc_pos_decimal_quantities', 'no' ) ) {
			add_filter( 'woocommerce_product_data_tabs', array( $this, 'product_options_tabs' ) );
			add_action( 'woocommerce_product_data_panels', array( $this, 'product_options_panels' ) );
			add_action( 'woocommerce_process_product_meta', array( $this, 'process_product_meta' ), 10, 2 );
		}

		// Display the sort_by option field inside the actions panel.
		add_action( 'wc_pos_actions_panel_after_minor_publishing_actions', 'WC_POS_Meta_Box_Grid_Options::get_sort_by_field', 10, 1 );

		// Error handling (for showing errors from meta boxes on next page load).
		add_action( 'admin_notices', array( $this, 'output_errors' ) );
		add_action( 'shutdown', array( $this, 'save_errors' ) );
	}

	/**
	 * Add an error message.
	 *
	 * @param string $text Error to add.
	 */
	public static function add_error( $text ) {
		self::$meta_box_errors[] = $text;
	}

	/**
	 * Save errors to an option.
	 */
	public function save_errors() {
		update_option( 'wc_pos_meta_box_errors', self::$meta_box_errors );
	}

	/**
	 * Show any stored error messages.
	 */
	public function output_errors() {
		$errors = array_filter( (array) get_option( 'wc_pos_meta_box_errors' ) );

		if ( ! empty( $errors ) ) {

			echo '<div id="woocommerce_errors" class="error notice is-dismissible">';

			foreach ( $errors as $error ) {
				echo '<p>' . wp_kses_post( $error ) . '</p>';
			}

			echo '</div>';

			// Clear.
			delete_option( 'wc_pos_meta_box_errors' );
		}
	}

	/**
	 * Add meta boxes.
	 */
	public function add_meta_boxes() {
		$screen    = get_current_screen();
		$screen_id = $screen ? $screen->id : '';

		// Register.
		add_meta_box( 'wc-pos-register-options', __( 'Register data', 'woocommerce-point-of-sale' ), 'WC_POS_Meta_Box_Register_Options::output', 'pos_register', 'normal', 'high' );
		add_meta_box( 'submitdiv', __( 'Register actions', 'woocommerce-point-of-sale' ), array( $this, 'actions_panel' ), 'pos_register', 'side', 'high' );
		add_filter( 'postbox_classes_pos_register_wc-pos-register-options', array( $this, 'add_meta_box_classes' ), 10, 1 );

		// Outlet.
		add_meta_box( 'wc-pos-outlet-options', __( 'Outlet data', 'woocommerce-point-of-sale' ), 'WC_POS_Meta_Box_Outlet_Options::output', 'pos_outlet', 'normal', 'high' );
		add_meta_box( 'submitdiv', __( 'Outlet actions', 'woocommerce-point-of-sale' ), array( $this, 'actions_panel' ), 'pos_outlet', 'side', 'high' );
		add_filter( 'postbox_classes_pos_outlet_wc-pos-outlet-options', array( $this, 'add_meta_box_classes' ), 10, 1 );

		// Grid.
		add_meta_box( 'wc-pos-grid-options', __( 'Tile options', 'woocommerce-point-of-sale' ), 'WC_POS_Meta_Box_Grid_Options::output', 'pos_grid', 'normal', 'high' );
		add_meta_box( 'wc-pos-grid-tiles', __( 'Tiles', 'woocommerce-point-of-sale' ), 'WC_POS_Meta_Box_Grid_Tiles::output', 'pos_grid', 'normal', 'high' );
		add_meta_box( 'submitdiv', __( 'Grid actions', 'woocommerce-point-of-sale' ), array( $this, 'actions_panel' ), 'pos_grid', 'side', 'high' );
		add_filter( 'postbox_classes_pos_grid_wc-pos-grid-options', array( $this, 'add_meta_box_classes' ), 10, 1 );
		add_filter( 'postbox_classes_pos_grid_wc-pos-grid-tiles', array( $this, 'add_meta_box_classes' ), 10, 1 );

		// Product.
		add_meta_box( 'product-grids', __( 'Product grids', 'woocommerce-point-of-sale' ), 'WC_POS_Meta_Box_Product_Grids::output', 'product', 'side', 'core' );
	}

	/**
	 * Remove meta boxes.
	 */
	public function remove_meta_boxes() {
		// pos_register.
		remove_meta_box( 'slugdiv', 'pos_register', 'normal' );

		// pos_outlet.
		remove_meta_box( 'slugdiv', 'pos_outlet', 'normal' );

		// pos_grid.
		remove_meta_box( 'slugdiv', 'pos_grid', 'normal' );
	}

	/**
	 * Check if we're saving, then trigger an action based on the post type.
	 *
	 * @param  int    $post_id Post ID.
	 * @param  object $post Post object.
	 */
	public function save_meta_boxes( $post_id, $post ) {
		$post_id = absint( $post_id );

		// $post_id and $post are required
		if ( empty( $post_id ) || empty( $post ) || self::$saved_meta_boxes ) {
			return;
		}

		// Dont' save meta boxes for revisions or autosaves.
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the nonce.
		if ( empty( $_POST['wc_pos_meta_nonce'] ) || ! wp_verify_nonce( wc_clean( wp_unslash( $_POST['wc_pos_meta_nonce'] ) ), 'wc_pos_save_options' ) ) {
			return;
		}

		// Check the post being saved = the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || absint( $_POST['post_ID'] ) !== $post_id ) {
			return;
		}

		// Check user has permission to edit.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// We need this save event to run once to avoid potential endless loops.
		self::$saved_meta_boxes = true;

		// Check the post type.
		if ( in_array( $post->post_type, array( 'pos_register', 'pos_outlet', 'pos_grid', 'pos_receipt', 'pos_report' ), true ) ) {
			do_action( 'wc_pos_process_' . $post->post_type . '_meta', $post_id, $post );
		}
	}

	/**
	 * Save product grids on product save.
	 *
	 * @param int    $post_id Post ID.
	 * @param object $post    Post object.
	 */
	public function save_product_grids( $post_id, $post ) {
		$post_id = absint( $post_id );

		if ( 'product' !== $post->post_type ) {
			return;
		}

		if ( empty( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'update-post_' . $post_id ) ) {
			wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'woocommerce-point-of-sale' ) );
		}

		$current_grids = wc_pos_get_tile_grids( $post_id );
		$posted_grids  = isset( $_POST['product_grids'] ) ? array_map( 'absint', $_POST['product_grids'] ) : array();
		$to_add        = array();
		$to_remove     = array();

		foreach ( $posted_grids as $grid_id ) {
			if ( ! in_array( $grid_id, $current_grids ) ) {
				$to_add[] = $grid_id;
			}
		}

		foreach ( $current_grids as $grid_id ) {
			if ( ! in_array( $grid_id, $posted_grids ) ) {
				$to_remove[] = $grid_id;
			}
		}

		foreach ( $to_add as $grid_id ) {
			$grid = wc_pos_get_grid( $grid_id );

			if ( $grid ) {
				$grid->add_tile(
					array(
						'type'    => 'product',
						'item_id' => $post_id,
					)
				);

				$grid->save();
			}
		}

		foreach ( $to_remove as $grid_id ) {
			if ( $grid ) {
				$grid    = wc_pos_get_grid( $grid_id );
				$tile_id = wc_pos_get_grid_tile_by_item_id( $grid_id, $post_id );

				$grid->delete_tile( $tile_id );
				$grid->save();
			}
		}
	}

	/**
	 * Product options tabs filter
	 *
	 * Adds a new Point of Sale tab to the product options meta box.
	 *
	 * @param array $tabs Existing tabs.
	 *
	 * @return array
	 */
	public function product_options_tabs( $tabs ) {
		$tabs['woocommerce-point-of-sale'] = array(
			'label'    => __( 'Point of Sale', 'woocommerce-point-of-sale' ),
			'target'   => 'point_of_sale_product_data',
			'class'    => array(),
			'priority' => 71,
		);

		return $tabs;
	}

	/**
	 * Render additional panels in the proudct options meta box.
	 */
	public function product_options_panels() {
		global $thepostid;

		include WC_POS()->plugin_path() . '/includes/admin/views/html-product-data-point-of-sale.php';
	}

	/**
	 * On saving product options meta box data.
	 *
	 * @param int     $post_id Post id.
	 * @param WP_Post $post    Post object.
	 */
	public function process_product_meta( $post_id, $post ) {
		if ( empty( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'update-post_' . $post_id ) ) {
			wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'woocommerce-point-of-sale' ) );
		}

		$decimal_quantity = isset( $_POST['weight_based_decimal_quantity'] ) ? 'yes' : 'no';

		update_post_meta( $post_id, 'weight_based_decimal_quantity', $decimal_quantity );

		if ( 'yes' === $decimal_quantity ) {
			$decimal_quantity_unit  = isset( $_POST['decimal_quantity_unit'] ) ? wc_clean( wp_unslash( $_POST['decimal_quantity_unit'] ) ) : '';
			$decimal_quantity_value = isset( $_POST['decimal_quantity_value'] ) ? wc_clean( wp_unslash( $_POST['decimal_quantity_value'] ) ) : '';

			update_post_meta( $post_id, 'decimal_quantity_unit', $decimal_quantity_unit );
			update_post_meta( $post_id, 'decimal_quantity_value', $decimal_quantity_value );
		}
	}

	/**
	 * Displays the actions panel.
	 *
	 * @param WP_Post $post Current post object.
	 * @param array   $args {
	 *     Array of arguments for building the post submit meta box.
	 *
	 *     @type string   $id       Meta box 'id' attribute.
	 *     @type string   $title    Meta box title.
	 *     @type callable $callback Meta box display callback.
	 *     @type array    $args     Extra meta box arguments.
	 * }
	 */
	public function actions_panel( $post, $args = array() ) {
		global $action;

		$post_type        = $post->post_type;
		$post_type_object = get_post_type_object( $post_type );
		$delete_text      = EMPTY_TRASH_DAYS ? __( 'Move to Trash', 'woocommerce-point-of-sale' ) : __( 'Delete Permanently', 'woocommerce-point-of-sale' );
		$submit_action    = 'edit' === $action ? 'update' : 'publish';

		include WC_POS_ABSPATH . '/includes/admin/meta-boxes/views/html-actions-panel.php';
	}

	/**
	 * Add CSS classes to the registered meta boxes.
	 *
	 * @param array $classes Current classes array.
	 * @return array The modified classes array.
	 */
	public function add_meta_box_classes( $classes = array() ) {

		// Extract the meta box ID from current_filter().
		$current_filter = explode( '_', current_filter() );
		$meta_box_id    = end( $current_filter );

		if ( in_array( $meta_box_id, array( 'wc-pos-register-options', 'wc-pos-outlet-options', 'wc-pos-grid-options' ), true ) ) {
			$classes[] = 'postbox-options';
		}

		if ( in_array( $meta_box_id, array( 'wc-pos-grid-options', 'wc-pos-grid-tiles' ), true ) ) {
			$classes[] = 'hide-handle';
		}

		return $classes;
	}
}

return new WC_POS_Admin_Meta_Boxes();
