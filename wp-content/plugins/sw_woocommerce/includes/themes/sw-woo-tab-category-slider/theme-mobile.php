<?php 

/**
	* Layout Tab Category Default
	* @version     1.0.0
**/
	
	$widget_id =  'sw_tab_categories'. $this->generateID();
	if( isset( $category ) == '' ){
		echo '<div class="alert alert-warning alert-dismissible" role="alert">
		<a class="close" data-dismiss="alert">&times;</a>
		<p>'. esc_html__( 'Please select a category for SW Woocommerce Tab Category Slider. Layout ', 'sw_woocommerce' ) . esc_attr( isset( $widget_template ) ? $widget_template : $layout ) .'</p>
	</div>';
	return;
	}
	if( !is_array( $category ) ){
		$category = explode( ',', $category );
	}
	$viewall = get_permalink( wc_get_page_id( 'shop' ) );
?>
<div class="sw-woo-tab-cat sw-ajax  style-moblie sw-tab-cat-mobile" id="<?php echo esc_attr( 'category_' . $widget_id ); ?>" >
	<div class="resp-tab" style="position:relative;">
		<div class="top-tab-slider clearfix">
			<div class="block-title clearfix">
				<h2><span class="fa <?php echo esc_attr( $icon_m ); ?>"></span>
				<?php echo ( $title1 != '' ) ? $title1 : ''; ?></h2>
				<a class="view-all" href="<?php echo esc_url( $viewall ); ?>"><i class="fa fa-caret-right"></i><?php echo esc_html__('view all','sw_woocommerce'); ?></a>
			</div>
			<div id="<?php echo 'list_tab_' . $widget_id; ?>" class="tab_list">
				<ul class="nav nav-tabs">
				<?php 
					$i = 1;
					foreach($category as $cat){
						$terms = get_term_by('slug', $cat, 'product_cat');
						$viewall = get_term_link( $terms->term_id, 'product_cat' );
						if( $terms != NULL ){			
				?>
					<li class="<?php if( $i == $tab_active ){echo 'active loaded'; }?>">
						<a href="#<?php echo esc_attr( $cat. '_' .$widget_id ) ?>" data-type="tab_ajax" data-layout="<?php echo esc_attr( isset( $widget_template ) ? $widget_template : $layout );?>" data-row="<?php echo esc_attr( $item_row ) ?>" data-length="<?php echo esc_attr( $title_length ) ?>" data-ajaxurl="<?php echo esc_url( sw_ajax_url() ) ?>" data-category="<?php echo esc_attr( $cat ) ?>" data-toggle="tab" data-sorder="<?php echo esc_attr( $select_order ); ?>" data-catload="ajax" data-number="<?php echo esc_attr( $numberposts ); ?>" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
							<?php echo $terms->name; ?>
						</a>
					</li>	
					<?php $i ++; ?>
				<?php } } ?>
				</ul>
			</div>
			</div>
		<div class="tab-content">
		<?php 
			$active = ( $tab_active - 1 >= 0 ) ? $tab_active - 1 : 0;
			$default = array();
			if( $select_order == 'latest' ){
				$default = array(
					'post_type'	=> 'product',
					'tax_query'	=> array(
					array(
						'taxonomy'	=> 'product_cat',
						'field'		=> 'slug',
						'terms'		=> $category[$active])),
					'orderby' => 'date',
					'order' => $order,
					'post_status' => 'publish',
					'showposts' => $numberposts
				);
			}
			if( $select_order == 'rating' ){
				$default = array(
					'post_type' 			=> 'product',
					'post_status' 			=> 'publish',
					'ignore_sticky_posts'   => 1,
					'tax_query'	=> array(
					array(
						'taxonomy'	=> 'product_cat',
						'field'		=> 'slug',
						'terms'		=> $category[$active])),
					'orderby' 				=> $orderby,
					'order'					=> $order,
					'showposts' 		=> $numberposts,
				);
				if( sw_woocommerce_version_check( '3.0' ) ){	
					$default['meta_key'] = '_wc_average_rating';	
					$default['orderby'] = 'meta_value_num';
				}else{	
					add_filter( 'posts_clauses',  array( WC()->query, 'order_by_rating_post_clauses' ) );
				}
			}
			if( $select_order == 'bestsales' ){
				$default = array(
					'post_type' 			=> 'product',
					'post_status' 			=> 'publish',
					'ignore_sticky_posts'   => 1,
					'tax_query'	=> array(
						array(
							'taxonomy'	=> 'product_cat',
							'field'		=> 'slug',
							'terms'		=> $category[$active])),
					'paged'	=> 1,
					'showposts'				=> $numberposts,
					'meta_key' 		 		=> 'total_sales',
					'orderby' 		 		=> 'meta_value_num',					
				);
			}
			if( $select_order == 'featured' ){
				$default = array(
					'post_type'				=> 'product',
					'post_status' 			=> 'publish',
					'tax_query'	=> array(
						array(
							'taxonomy'	=> 'product_cat',
							'field'		=> 'slug',
							'terms'		=> $category[$active])),
					'ignore_sticky_posts'	=> 1,
					'posts_per_page' 		=> $numberposts,
					'orderby' 				=> $orderby,
					'order' 				=> $order,					
				);
				if( sw_woocommerce_version_check( '3.0' ) ){	
					$default['tax_query'][] = array(						
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => 'featured',
						'operator' => 'IN',	
					);
				}else{
					$default['meta_query'] = array(
						array(
							'key' 		=> '_featured',
							'value' 	=> 'yes'
						)					
					);				
				}
			}
			$default = sw_check_product_visiblity( $default );
			
			$list = new WP_Query( $default );
			if( $select_order == 'rating' && ! sw_woocommerce_version_check( '3.0' ) ){			
				remove_filter( 'posts_clauses',  array( WC()->query, 'order_by_rating_post_clauses' ) );
			}
			$term = get_term_by('slug', $category[$active], 'product_cat');			
		?>
			<div class="tab-pane active" id="<?php echo esc_attr( $category[$active]. '_' .$widget_id ) ?>">
			<?php if( $list->have_posts() ) : ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. $category[$active]. '_' .$widget_id ); ?>" class="sw-mobile-cat clearfix">
					<div class="resp-slider-container">
						<div class="items-wrapper clearfix">	
							<?php 
								$count_items = 0;
								$count_items = ( $numberposts >= $list->found_posts ) ? $list->found_posts : $numberposts;
								$i = 0;
								while($list->have_posts()): $list->the_post();					
								global $product, $post;
								$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
								$symboy = get_woocommerce_currency_symbol( get_woocommerce_currency() );
								if( $i % $item_row == 0 ){
							?>
								<div class="item product <?php echo esc_attr( $class )?>">
								<?php } ?>
									<div class="item-wrapper">
										<div class="item-detail">
											<div class="item-image">									
												<?php sw_label_sales(); ?>
													<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php 
															$id = get_the_ID();
															if ( has_post_thumbnail() ){
																	echo get_the_post_thumbnail( $post->ID, 'large', array( 'alt' => $post->post_title ) ) ? get_the_post_thumbnail( $post->ID, 'large', array( 'alt' => $post->post_title ) ): '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'large'.'.png" alt="No thumb">';		
															}else{
																echo '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'large'.'.png" alt="No thumb">';
															}
														?>
													</a>
											</div>
											<div class="item-content">
												<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>
												<!-- Price -->
												<?php if ( $price_html = $product->get_price_html() ){?>
												<div class="item-price">
													<span>
														<?php echo $price_html; ?>
													</span>
												</div>
												<?php } ?>								
											</div>															
										</div>
									</div>
								<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
							<?php $i ++; endwhile; wp_reset_postdata();?>
						</div> 
					</div>
				</div>
				<?php 
					else :
						echo '<div class="alert alert-warning alert-dismissible" role="alert">
						<a class="close" data-dismiss="alert">&times;</a>
						<p>'. esc_html__( 'There is not product on this tab', 'sw_woocommerce' ) .'</p>
						</div>';
					endif;
				?>
			</div>
		</div>
	</div>
</div>