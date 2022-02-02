<?php 
	if( !is_array( $select_order ) ){
		$select_order = explode( ',', $select_order );
	}
	$viewall = get_permalink( wc_get_page_id( 'shop' ) );
	$widget_id =  'sw_woo_tab_'. $this->generateID();
?>
<div class="sw-wootab-slider sw-ajax sw-woo-tab-<?php echo esc_attr( isset( $widget_template ) ? $widget_template : $layout );?>" id="<?php echo esc_attr( 'woo_tab_' . $widget_id ); ?>" >
	<div class="resp-tab <?php echo isset( $style ) ? esc_attr( $style ) : '';;?>" style="position:relative;">				
		
			<div class="top-tab-slider clearfix">
				<?php if( $title1 != '' ): ?>
					<div class="box-title"><h3><?php echo ( $title1 != '' ) ? $title1 : ''; ?></h3></div>
				<?php endif; ?>
				<!-- Get child category -->
				<button class="navbar-toggle collapsed pull-right" type="button" data-toggle="collapse" data-target="#<?php echo 'nav_'.$widget_id; ?>"  aria-expanded="false">				
				</button>
				<ul class="nav nav-tabs" id="<?php echo 'nav_'.$widget_id; ?>">
					<?php 
						$active = $tab_active -1;
						$tab_title = '';
						foreach( $select_order as $i  => $so ){						
							switch ($so) {
							case 'latest':
								$tab_title = __( 'Latest Products', 'sw_woocommerce' );
							break;
							case 'rating':
								$tab_title = __( 'Top Rating Products', 'sw_woocommerce' );
							break;
							case 'bestsales':
								$tab_title = __( 'Best Selling', 'sw_woocommerce' );
							break;						
							default:
								$tab_title = __( 'Featured Products', 'sw_woocommerce' );
							}
						?>
						<li <?php echo ( $i == $active ) ? 'class="active loaded"' : ''; ?>>
							<a href="#<?php echo esc_attr( $so. '_' .$widget_id ) ?>" data-type="so_ajax" data-layout="<?php echo esc_attr( isset( $widget_template ) ? $widget_template : $layout );?>" data-row="<?php echo esc_attr( $item_row ) ?>" data-length="<?php echo esc_attr( $title_length ) ?>" data-ajaxurl="<?php echo esc_url( sw_ajax_url() ) ?>" data-category="<?php echo esc_attr( $category ) ?>" data-toggle="tab" data-sorder="<?php echo esc_attr( $so ); ?>" data-catload="ajax" data-number="<?php echo esc_attr( $numberposts ); ?>" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
								<?php echo esc_html( $tab_title ); ?>
							</a>
						</li>			
					<?php } ?>
				</ul>
			</div>
		<!-- End get child category -->		
			<div class="tab-content clearfix">					
			<!-- Product tab slider -->						
				<div class="tab-pane active" id="<?php echo esc_attr( $select_order[$active]. '_' .$widget_id ) ?>">
				<?php 
					$default = array();			
					if( $select_order[$active] == 'latest' ){
						$default = array(
							'post_type'	=> 'product',
							'paged'		=> 1,
							'showposts'	=> $numberposts,
							'orderby'	=> 'date'
						);						
					}
					if( $select_order[$active] == 'rating' ){
						$default = array(
							'post_type'		=> 'product',							
							'post_status' 	=> 'publish',
							'no_found_rows' => 1,					
							'showposts' 	=> $numberposts						
						);
						if( sw_woocommerce_version_check( '3.0' ) ){	
							$default['meta_key'] = '_wc_average_rating';	
							$default['orderby'] = 'meta_value_num';
						}else{	
							add_filter( 'posts_clauses',  array( WC()->query, 'order_by_rating_post_clauses' ) );
						}
					}
					if( $select_order[$active] == 'bestsales' ){
						$default = array(
							'post_type' 			=> 'product',							
							'post_status' 			=> 'publish',
							'ignore_sticky_posts'   => 1,
							'showposts'				=> $numberposts,
							'meta_key' 		 		=> 'total_sales',
							'orderby' 		 		=> 'meta_value_num',							
						);
					}
					if( $select_order[$active] == 'featured' ){
						$default = array(
							'post_type'	=> 'product',
							'post_status' 			=> 'publish',
							'ignore_sticky_posts'	=> 1,
							'showposts' 		=> $numberposts,							
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
					if( $category != '' ){
						$term = get_term_by( 'slug', $category, 'product_cat' );
						$viewall = get_term_link( $term->term_id, 'product_cat' );
						
						if( $term ) :
							$thumbnail_id 	= get_term_meta( $term->term_id, 'thumbnail_id', true );
							$thumb = wp_get_attachment_image( $thumbnail_id,'full', array( 'alt' => $term->name ) );
						endif;
						
						$default['tax_query'][] = array(
							'taxonomy'	=> 'product_cat',
							'field'		=> 'slug',
							'terms'		=> $category,
							'operator' 	=> 'IN'
						);
					}
					$default = sw_check_product_visiblity( $default );
					
					$list = new WP_Query( $default );
					if( $select_order[$active] == 'rating' && ! sw_woocommerce_version_check( '3.0' ) ){			
						remove_filter( 'posts_clauses',  array( WC()->query, 'order_by_rating_post_clauses' ) );
					}
					if( $list->have_posts() ) :
				?>
					<div id="<?php echo esc_attr( 'tab_'. $select_order[$active]. '_' .$widget_id ); ?>" class="woo-tab-container-slider clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
						<div class="resp-slider-container">
							<div class="slider">
								<!-- Product tab listing -->
								<?php 
									if( $term ) :	
								?>
								<div class="item item-banner clearfix">
									<div class="item-image">
										<a href="<?php echo esc_url( $viewall ); ?>"><?php echo $thumb; ?></a>
									</div>							
								</div>
							<?php endif; ?>
							<?php 
								$count_items 	= 0;
								$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
								$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
								$i 				= 0;
								$j				= 0;
								while($list->have_posts()): $list->the_post();
								global $product, $post;	
								$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
							?>
								<div class="item <?php echo esc_attr( $class )?> product clearfix">
									<?php include( WCTHEME . '/default-item8.php' ); ?>
								</div>
							<?php $i++; $j++; endwhile; wp_reset_postdata();?>
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
			<!-- End product tab slider -->
			</div>
	</div>
</div>