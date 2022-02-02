<?php
/**
 * Point of Sale Tiles Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_Tiles', false ) ) {
	return new WC_POS_Admin_Settings_Tiles();
}

/**
 * WC_POS_Admin_Settings_Tiles.
 */
class WC_POS_Admin_Settings_Tiles extends WC_POS_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'tiles';
		$this->label = __( 'Tiles', 'woocommerce-point-of-sale' );

		parent::__construct();
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {
		global $woocommerce;

		return apply_filters(
			'woocommerce_point_of_sale_general_settings_fields',
			array(

				array(
					'title' => __( 'Tile Options', 'woocommerce-point-of-sale' ),
					'desc'  => __( 'The following options affect how the tiles appear on the product grid.', 'woocommerce-point-of-sale' ),
					'type'  => 'title',
					'id'    => 'tile_options',
				),
				array(
					'title'    => __( 'Default Tile Sorting', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'This controls the default sort order of the tile.', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_default_tile_orderby',
					'class'    => 'wc-enhanced-select',
					'css'      => 'min-width:300px;',
					'default'  => 'menu_order',
					'type'     => 'select',
					'options'  => apply_filters(
						'woocommerce_default_catalog_orderby_options',
						array(
							'menu_order' => __( 'Default sorting (custom ordering + name)', 'woocommerce-point-of-sale' ),
							'popularity' => __( 'Popularity (sales)', 'woocommerce-point-of-sale' ),
							'rating'     => __( 'Average Rating', 'woocommerce-point-of-sale' ),
							'date'       => __( 'Sort by most recent', 'woocommerce-point-of-sale' ),
							'price'      => __( 'Sort by price (asc)', 'woocommerce-point-of-sale' ),
							'price-desc' => __( 'Sort by price (desc)', 'woocommerce-point-of-sale' ),
							'title-asc'  => __( 'Name (asc)', 'woocommerce-point-of-sale' ),
						)
					),
				),
				array(
					'name'     => __( 'Product Previews', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_show_product_preview',
					'type'     => 'checkbox',
					'desc'     => __( 'Enable product preview panels', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Shows a button on each tile for cashiers to view full product details.', 'woocommerce-point-of-sale' ),
					'default'  => 'no',
					'autoload' => true,
				),
				array(
					'name'     => __( 'Out of Stock', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_show_out_of_stock_products',
					'type'     => 'checkbox',
					'desc'     => __( 'Enable out of stock products', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Shows out of stock products in the product grid.', 'woocommerce-point-of-sale' ),
					'default'  => 'no',
					'autoload' => true,
				),
				array(
					'title'         => __( 'Product Visiblity', 'woocommerce-point-of-sale' ),
					'desc'          => __( 'Enable product visibility control', 'woocommerce-point-of-sale' ),
					'desc_tip'      => __( 'Allows you to show and hide products from either the POS, web or both shops.', 'woocommerce-point-of-sale' ),
					'id'            => 'wc_pos_visibility',
					'default'       => 'no',
					'type'          => 'checkbox',
					'checkboxgroup' => 'start',
				),
				array(
					'title'         => __( 'Unit of Measurement', 'woocommerce-point-of-sale' ),
					'desc'          => __( 'Enable decimal stock counts and change of unit of measurement.', 'woocommerce-point-of-sale' ),
					'desc_tip'      => __( 'Allows you to sell your stock in decimal quantities and set the default unit of measurement of stock values. Useful for those who want to sell weight or linear based products.', 'woocommerce-point-of-sale' ),
					'id'            => 'wc_pos_decimal_quantities',
					'default'       => 'no',
					'type'          => 'checkbox',
					'checkboxgroup' => 'start',
				),
				array(
					'title'    => __( 'Add to Cart Behaviour', 'woocommerce-point-of-sale' ),
					'desc'     => __( 'Control what happens to the grid after a product is added to the basket.', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Allows shop managers to choose the behaviour of grids when adding products to the cart.', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_grid_return',
					'default'  => 'leave',
					'class'    => 'wc-enhanced-select',
					'type'     => 'select',
					'options'  => array(
						'stay'  => __( 'Stay on the selected category', 'woocommerce-point-of-sale' ),
						'leave' => __( 'Return to the category selection', 'woocommerce-point-of-sale' ),
					),
				),
				array(
					'type' => 'sectionend',
					'id'   => 'tile_options',
				),
			)
		); // End general settings

	}

	/**
	 * Save settings
	 */
	public function save() {
		$settings = $this->get_settings();
		WC_POS_Admin_Settings::save_fields( $settings );
	}

}

return new WC_POS_Admin_Settings_Tiles();
