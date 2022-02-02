<?php 

/**
	* Layout Theme Default
	* @version     1.0.0
**/
?>
<div class="item-wrap17">
	<div class="item-detail">										
		<div class="item-img products-thumb">		
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php 
				$id = get_the_ID();
				if ( has_post_thumbnail() ){
					echo get_the_post_thumbnail( $post->ID, 'shop_catalog', array( 'alt' => $post->post_title ) ) ? get_the_post_thumbnail( $post->ID, 'shop_catalog', array( 'alt' => $post->post_title ) ): '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'thumbnail'.'.png" alt="No thumb">';		
				}else{
					echo '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'medium'.'.png" alt="No thumb">';
				}
				?>
			</a>
			<?php
				if ( class_exists( 'YITH_WCWL' ) ){
				echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
			} ?>
			<?php
				$product_type = ( sw_woocommerce_version_check( '3.0' ) ) ? $product->get_type() : $product->product_type;
				if( $product_type != 'variable' ) {
					$forginal_price 	= get_post_meta( $post->ID, '_regular_price', true );	
					$fsale_price 		= get_post_meta( $post->ID, '_sale_price', true );
						if( $fsale_price > 0 && $product->is_on_sale() ){ 
			?>
							<span class="label"><?php echo esc_html__( 'promo', 'sw_woocommerce' ); ?></span>
				<?php } }?>
		</div>										
		<div class="item-content">
			<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>
			<div class="description"><?php echo wp_trim_words( $post->post_excerpt, 5, '...' ); ?></div>
			<div class="rating-price">
				<!-- rating  -->
				<?php 
				$rating_count = $product->get_rating_count();
				$review_count = $product->get_review_count();
				$average      = $product->get_average_rating();
				?>
				<?php if (  wc_review_ratings_enabled() ) { 
				if( $average > 0 ) {
				?>
				<div class="reviews-content">
					<?php echo '<span class="average">'.$average.'</span><span class="count-rated">('.$rating_count.'+)</span>';?>
				</div>	
				<?php } } ?>
				<!-- end rating  -->
				
				<!-- price -->
				<?php if ( $price_html = $product->get_price_html() ){?>
				<div class="item-price">
					<span>
						<?php echo $price_html; ?>
					</span>
				</div>
				<?php } ?>
			</div>
			
			<?php woocommerce_template_loop_add_to_cart(); ?>
		</div>								
	</div>
</div>