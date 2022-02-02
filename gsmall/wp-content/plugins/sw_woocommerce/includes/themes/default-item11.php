<?php 

/**
	* Layout Theme Default
	* @version     1.0.0
**/
?>
<div class="item-wrap16">
	<div class="item-detail">										
		<div class="item-img products-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php 
				$id = get_the_ID();
				if ( has_post_thumbnail() ){
					echo get_the_post_thumbnail( $post->ID, 'shop_catalog', array( 'alt' => $post->post_title ) ) ? get_the_post_thumbnail( $post->ID, 'shop_catalog', array( 'alt' => $post->post_title ) ): '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'large'.'.png" alt="No thumb">';		
				}else{
					echo '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'large'.'.png" alt="No thumb">';
				}
				?>
			</a>
			
			<?php sw_label_sales();?>
		</div>										
		<div class="item-content">
			<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>								
			<!-- rating  -->
			<?php 
			$rating_count = $product->get_rating_count();
			$review_count = $product->get_review_count();
			$average      = $product->get_average_rating();
			$weight = $product->get_weight();
			
			?>
			<div class="box-istock">
			<?php echo emarket_product_stock_hompage(); ?>
			<?php if ( $product->has_weight() ) {
					echo '<div class="item-weight">' . $weight . get_option('woocommerce_weight_unit') . '</div>';
				} ?>
			</div>
			
			<!-- price -->
			<?php if ( $price_html = $product->get_price_html() ){?>
			<div class="item-price">
				<span>
					<?php echo $price_html; ?>
				</span>
			</div>
			<?php } ?>	
			<?php if (  wc_review_ratings_enabled() ) { ?>
			<div class="reviews-content">
				<div class="star"><?php echo ( $average > 0 ) ?'<span style="width:'. ( $average*15 ).'px"></span>' : ''; ?></div>
			</div>	
			<?php } ?>
			<!-- end rating  -->
			<div class="item-bottom item-bottom-top has-des clearfix">
									<?php echo emarket_quickview(); ?>
									<?php if ( class_exists( 'YITH_WOOCOMPARE' ) ){ 
									?>
									<a href="javascript:void(0)" class="compare button"  title="<?php esc_html_e( 'Add to Compare', 'sw_woocommerce' ) ?>" data-product_id="<?php echo esc_attr($post->ID); ?>" rel="nofollow"> <?php esc_html('compare','sw-woocomerce'); ?></a>
									<?php } ?>
									<?php
									if ( class_exists( 'YITH_WCWL' ) ){
									echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
									} ?>
								</div>
								<div class="item-bottom cart has-des clearfix">
								<?php woocommerce_template_loop_add_to_cart(); ?>
								</div>
		</div>
	</div>
</div>