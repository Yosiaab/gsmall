<?php
/**
 * Product Point of Sale Data Panel
 *
 * @var int $thepostid
 *
 * @package WooCommerce_Point_Of_Sale/Admin/Views
 */

defined( 'ABSPATH' ) || exit;
?>
<div id="point_of_sale_product_data" class="panel woocommerce_options_panel">
	<div class="options_group">
		<?php
			// Unit of Measurement.
			woocommerce_wp_checkbox(
				array(
					'id'          => 'weight_based_decimal_quantity',
					'value'       => get_post_meta( $thepostid, 'weight_based_decimal_quantity', true ),
					'label'       => __( 'Unit of Measurement', 'woocommerce-point-of-sale' ),
					'description' => __( 'Change the unit of measurement of stock values.', 'woocommerce-point-of-sale' ),
				)
			);

			// Unit.
			woocommerce_wp_select(
				array(
					'id'          => 'decimal_quantity_unit',
					'value'       => get_post_meta( $thepostid, 'decimal_quantity_unit', true ),
					'label'       => __( 'Unit', 'woocommerce-point-of-sale' ),
					'description' => __( 'Select unit of measurement.', 'woocommerce-point-of-sale' ),
					'desc_tip'    => true,
					'options'     => array(
						'kg'    => 'kg',
						'g'     => 'g',
						'lbs'   => 'lbs',
						'oz'    => 'oz',
						'km'    => 'km',
						'm'     => 'm',
						'cm'    => 'cm',
						'mm'    => 'mm',
						'in'    => 'in',
						'ft'    => 'ft',
						'yd'    => 'yd',
						'mi'    => 'mi (mile)',
						'ha'    => 'ha (hectare)',
						'sq-km' => 'sq km',
						'sq-m'  => 'sq m',
						'sq-cm' => 'sq cm',
						'sq-mm' => 'sq mm',
						'acs'   => 'acs (acre)',
						'sq-mi' => 'sq mi',
						'sq-yd' => 'sq yd',
						'sq-ft' => 'sq ft',
						'sq-in' => 'sq in',
						'cu-m'  => 'cu m',
						'l'     => 'l',
						'ml'    => 'ml',
						'gal'   => 'gal',
						'qt'    => 'qt',
						'pt'    => 'pt',
						'cup'   => 'ft',
						'yd'    => 'yd',
					),
				)
			);

			// Value Increment.
			woocommerce_wp_select(
				array(
					'id'          => 'decimal_quantity_value',
					'value'       => get_post_meta( $thepostid, 'decimal_quantity_value', true ),
					'label'       => __( 'Value Increment', 'woocommerce-point-of-sale' ),
					'description' => __( 'Select incremental value when used when browsing as a tile.', 'woocommerce-point-of-sale' ),
					'desc_tip'    => true,
					'options'     => array(
						'0.1'  => '0.1',
						'0.25' => '0.25',
						'0.5'  => '0.5',
						'1'    => '1',
					),
				)
			);
			?>
	</div>

	<?php do_action( 'woocommerce_product_options_point_of_sale_product_data' ); ?>
</div>
