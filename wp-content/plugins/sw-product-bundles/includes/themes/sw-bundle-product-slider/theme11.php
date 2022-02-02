<?php 
/**
	* Layout Bunled product Default
	* @version     1.0.0
**/
$term_name = esc_html__( 'All Categories', 'sw_product_bundles' );
$default = array(
	'post_type' => 'product',	
	'orderby' => $orderby,
	'order' => $order,
	'post_status' => 'publish',
	'showposts' => $numberposts	
);
$default['tax_query'][] = array(						
		'taxonomy' => 'product_type',
		'field'    => 'name',
		'terms'    => 'bundle',
		'operator' => 'IN',	
	);

if( $category != '' ){
	$term = get_term_by( 'slug', $category, 'product_cat' );
	if( $term ) :
		$term_name = $term->name;
	endif; 
	
	$default['tax_query'][] = array(
		array(
			'taxonomy'  => 'product_cat',
			'field'     => 'slug',
			'terms'     => $category ));
}
$id = 'sw_countdown_'.$this->generateID();
$list = new WP_Query( $default );
if ( $list -> have_posts() ){ ?>
	<div id="<?php echo $category.'_'.$id; ?>" class="sw-woo-container-slider responsive-slider bundle-slider-style11 loading clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-circle="false" data-dots="true">
		<div class="resp-slider-container">
			<?php if( $title1 != '' ){?>
				<div class="box-title">
					<h3><span><?php echo ( $title1 != '' ) ? $title1 : $term_name; ?></span></h3>
				</div>
			<?php } ?>
			<div class="slider responsive">	
			<?php 
				$count_items = 0;
				$count_items = ( $numberposts >= $list->found_posts ) ? $list->found_posts : $numberposts;
				$i = 0;
				while($list->have_posts()): $list->the_post();					
				global $product, $post;
				//var_dump($list);
				$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
				if( $i % $item_row == 0 ){
			?>
				<div class="item product product-images <?php echo esc_attr( $class )?>" id="<?php echo 'product_'.$id.$post->ID; ?>" data-vertical="false">
				<?php } ?>
					<div class="item-wrap17">
						<div class="item-detail">							
							<div class="item-image-bundle products-thumb-big item-img products-thumb">
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
								<span class="label"><?php echo esc_html__( 'promo', 'sw_woocommerce' ); ?></span>
							</div>
							<div class="item-content">
								<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>
								<div class="description-price">
									<div class="des"><?php echo wp_trim_words( $post->post_excerpt, 3, '...' ); ?></div>						
									<!-- price -->
									<?php if ( $price_html = $product->get_price_html() ){?>
									<div class="item-price">
										<span>
											<?php echo $price_html; ?>
										</span>
									</div>
									<?php } ?>
								</div>
								<div class="item-combo-product">											 
									<?php	
									    $bundles = apply_filters( 'swpb/load/bundle', $product->get_id() );
										foreach ( $bundles as $key => $value )  { 
                                        $bundle = wc_get_product( $key ); 
										if( !is_wp_error( $bundle ) && $bundle ){
										$product_url = "";
										if ( get_post_type( $key ) == 'product_variation' ) {
											$product_url = get_the_permalink( wp_get_post_parent_id( $key ) );
										} else {
											$product_url = get_the_permalink( $key );
										}
									?>
										<a href="<?php echo esc_url( $product_url ); ?>"><?php echo esc_html( $value['title'] );?></a>
									<?php } }?> 
								</div>	
							</div>
							<!--- pack thumail -->
							<!-- end pack thumnail -->	
						</div>
					</div>
				<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php }?>
			<?php $i ++; endwhile; wp_reset_postdata();?>
			</div>
		</div>            
	</div>
<?php
	} 
?>