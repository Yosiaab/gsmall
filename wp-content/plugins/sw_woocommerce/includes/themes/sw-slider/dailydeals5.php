<?php ; 
wp_reset_postdata();
$viewall = get_permalink( wc_get_page_id( 'shop' ) );	
$default = array(
	'post_type'		=> 'product',		
	'post_status' 	=> 'publish',
	'no_found_rows' => 1,					
	'showposts' 	=> $numberposts	,
	'orderby' 				=> $orderby,
	'order' 				=> $order,
    'meta_query'     => array(
		array(
			'key'           => '_sale_price',
			'value'         => 0,
			'compare'       => '>',
			'type'          => 'numeric'
		)
	)		
);
if( $category != '' ){	
	$default['tax_query'] = array(
		array(
			'taxonomy'	=> 'product_cat',
			'field'		=> 'slug',
			'terms'		=> $category,
		)
	);
}
$default = sw_check_product_visiblity( $default );

$term_name = '';
$term = get_term_by( 'slug', $category, 'product_cat' );
if( $term ) :
	$term_name = $term->name;
	$viewall = get_term_link( $term->term_id, 'product_cat' );
endif;
$id = 'sw_toprated_'.rand().time();
$list = new WP_Query( $default );
$countdown_time = strtotime( $date );
$today = time();

if ( $list -> have_posts() ){
?>
	<div id="<?php echo $id; ?>" class="sw-woo-container-slider  responsive-slider dailydeals-product5 clearfix loading" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-dots="false" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
		<div class="resp-slider-container">
			<div class="box-slider-top clearfix">
				<div class="wrap-link clearfix">
					<?php if( $countdown_time > $today  ): ?> <div class="item-countdown" data-cdtime="<?php echo esc_attr( $countdown_time ); ?>"></div><?php else: ?><span class="message-cd"><?php echo esc_html__('Please select a time for layout.','sw_woocommerce'); ?></span><?php endif; ?>
				</div>
				<?php if( $title1 != '' ){
					$titles = strpos($title1, ' ');
				?>
				<div class="block-title clearfix">
					<h3><?php echo ( $title1 != '' ) ? $title1 : $term_name; ?></h3>
				</div>
				<?php } ?>	
			</div>
			<div class="slider responsive">			
			<?php
					$i = 1;
					$count_items 	= 0;
					$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
					$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
					$i 				= 0;
					while($list->have_posts()): $list->the_post();global $product, $post;
					if( $i % $item_row == 0 ){
				?>
				<div class="item product">
				<?php } ?>
					<div class="item-wrap">
						<div class="item-detail">										
							<div class="item-img products-thumb">	
							    <?php 
										$forginal_price = get_post_meta( get_the_ID(), '_regular_price', true );	
										$fsale_price 		= get_post_meta( get_the_ID(), '_sale_price', true );
							    ?>
							    <?php if( $fsale_price > 0){ 
									$sale_off = 100 - (($fsale_price/$forginal_price)*100); ?>
									<div class="sale-off">
										<?php echo '-'.round($sale_off).'%';?>
									</div>
							    <?php } ?>			
								<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
								<!-- add to cart, wishlist, compare -->
								<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
							</div>										
							<div class="item-content">	
								<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>														
								<!-- rating  -->
								<?php 
								$rating_count = $product->get_rating_count();
								$review_count = $product->get_review_count();
								$average      = $product->get_average_rating();
								?>
								<?php if (  wc_review_ratings_enabled() ) { ?>
								<div class="reviews-content">
									<div class="star"><?php echo ( $average > 0 ) ?'<span style="width:'. ( $average*15 ).'px"></span>' : ''; ?></div>
								</div>	
								<?php } ?>
								<!-- end rating  -->
								<!-- price -->
								<?php if ( $price_html = $product->get_price_html() ){?>
								<div class="item-price">
									<span>
										<?php echo $price_html; ?>
									</span>
								</div>
								<?php } ?>
								<?php 
									if( $product->get_stock_quantity() != 0 ){
									$available 	 = $product->get_stock_quantity();
									$total_sales = get_post_meta( $post->ID, 'total_sales', true );
									$bar_width 	 = intval( $available ) / intval( $available + $total_sales ) * 100;
									?>
									<div class="sales-bar clearfix">
										<div class="sales-bar-total">
											<span style="width: <?php echo esc_attr( $bar_width . '%' ); ?>"></span>
										</div>
									</div>
									<div class="stock-sold"><span><?php echo $total_sales; ?></span><?php esc_html_e( 'Sold', 'sw_woocommerce' ) ?></div>
								<?php } ?>
							</div>								
						</div>
					</div>
				<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
			    <?php $i++; endwhile; wp_reset_postdata();?>
			</div>
		</div>					
	</div>
<?php
}	
?>