<?php
/**
 * SW Woo Tab Category Slider Widget 
 * Description: A widget that serves as an slideshow for developing more advanced widgets.
 * Version: 1.0
 *
 * This Widget help you to show images of product as a beauty tab reponsive slideshow
 */
 if ( !class_exists('sw_woo_tab_cat_slider_widget') ) {
	class sw_woo_tab_cat_slider_widget extends WP_Widget {
		
		private $snumber = 1;
		/**
		 * Widget setup.
		 */
		function __construct() {
			/* Widget settings. */
			$widget_ops = array( 'classname' => 'sw_woo_tab_cat_slider', 'description' => __('Sw Woo Tab Category Slider', 'sw_woocommerce') );

			/* Widget control settings. */
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sw_woo_tab_cat_slider' );

			/* Create the widget. */
			parent::__construct( 'sw_woo_tab_cat_slider', __('Sw Woo Tab Category Slider widget', 'sw_woocommerce'), $widget_ops, $control_ops );
					
			add_shortcode( 'woo_tab_cat_slider', array( $this, 'SC_WooTab' ) );
			
			/* Create Vc_map */
			if (class_exists('Vc_Manager')) {
				add_action( 'vc_before_init', array( $this, 'SC_integrateWithVC' ) );
			}
			
			if( version_compare( WC()->version, '2.4', '>=' ) ){
				add_action( 'wc_ajax_sw_ajax_tab', array( $this, 'sw_ajax_tab_callback' ) );
			}else{
				add_action( 'wp_ajax_sw_ajax_tab', array( $this, 'sw_ajax_tab_callback') );
				add_action( 'wp_ajax_nopriv_sw_ajax_tab', array( $this, 'sw_ajax_tab_callback') );
			}
		}
		
		public function generateID() {
			return $this->id_base . '_' . (int) $this->snumber++;
		}
		
		/**
			* Add Vc Params
		**/
		function SC_integrateWithVC(){
			$terms = get_terms( 'product_cat', array( 'parent' => '', 'hide_empty' => false ) );
			$term = array();
			if( count( $terms )  > 0 ){
				foreach( $terms as $cat ){
					$term[$cat->name] = $cat -> slug;
				}
			}
			vc_map( array(
			  "name" => __( "SW Woocommerce Tab Category Slider", 'sw_woocommerce' ),
			  "base" => "woo_tab_cat_slider",
			  "icon" => "icon-wpb-ytc",
			  "class" => "",
			  "category" => __( "SW Shortcodes", 'sw_woocommerce'),
			  "params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", 'sw_woocommerce' ),
					"param_name" => "title1",
					"admin_label" => true,
					"value" => '',
					"description" => __( "Title", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Product Title Length", 'sw_woocommerce' ),
					"param_name" => "title_length",
					"admin_label" => true,
					"value" => 0,
					"description" => __( "Choose Product Title Length if you want to trim word, leave 0 to not trim word", 'sw_woocommerce' )
				),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Description", 'sw_woocommerce' ),
					"param_name" => "description",
					"admin_label" => true,
					"value" => '',
					"description" => __( "Description", 'sw_woocommerce' )
				 ),	
				 array(
					'type' => 'textfield',
					'heading' => __( 'Select Icon Mobile', 'sw_woocommerce' ),
					'param_name' => 'icon_m',
					'description' => __( 'Select Icon FontAwesome', 'sw_woocommerce' ),
					'dependency' => array(
						'element' => 'layout',
						'value' => array( 'layout_mb' ),
						)
					),
				  array(
					"type" => "multiselect",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Category", 'sw_woocommerce' ),
					"param_name" => "category",
					"admin_label" => true,
					"value" => $term,
					"description" => __( "Select Categories", 'sw_woocommerce' )
				 ),
				  array(
					'type' => 'attach_images',
					'heading' => __( 'Banner Images', 'sw_woocommerce' ),
					'param_name' => 'images',
					'description' => __( 'Select images', 'sw_woocommerce' ),
					"dependency" => array(
						'element' => 'layout',
						'value' => 'layout1' 
					),
				),
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Select Order Product", 'sw_woocommerce' ),
					"param_name" => "select_order",
					"admin_label" => true,
					"value" => array('Latest Products' => 'latest', 'Top Rating Products' => 'rating', 'Best Selling Products' => 'bestsales', 'Featured Products' => 'featured'),
					"description" => __( "Select Order Product", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Order By", 'sw_woocommerce' ),
					"param_name" => "orderby",
					"admin_label" => true,
					"value" => array('Name' => 'name', 'Author' => 'author', 'Date' => 'date', 'Modified' => 'modified', 'Parent' => 'parent', 'ID' => 'ID', 'Random' =>'rand', 'Comment Count' => 'comment_count'),
					"description" => __( "Order By", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Order", 'sw_woocommerce' ),
					"param_name" => "order",
					"admin_label" => true,
					"value" => array('Descending' => 'DESC', 'Ascending' => 'ASC'),
					"description" => __( "Order", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number Of Post", 'sw_woocommerce' ),
					"param_name" => "numberposts",
					"admin_label" => true,
					"value" => 5,
					"description" => __( "Number Of Post", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number row per column", 'sw_woocommerce' ),
					"param_name" => "item_row",
					"admin_label" => true,
					"value" =>array(1,2,3),
					"description" => __( "Number row per column", 'sw_woocommerce' ),
					"dependency" => array(
						'element' => 'layout',
						'value' => array( 'default', 'layout2', 'layout3', 'layout4','layout5' )
					),
				 ),			
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number row per column", "flytheme" ),
					"param_name" => "item_row2",
					"value" =>array(3,5,7,9),
					"description" => __( "Number row per column", "flytheme" ),
					"dependency" => array(
						'element' => 'layout',
						'value' => 'layout1' 
					),
				 ),		 
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Tab Active", 'sw_woocommerce' ),
					"param_name" => "tab_active",
					"admin_label" => true,
					"value" => 1,
					"description" => __( "Select tab active", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of Columns >1200px: ", 'sw_woocommerce' ),
					"param_name" => "columns",
					"admin_label" => true,
					"value" => array(1,2,3,4,5,6),
					"description" => __( "Number of Columns >1200px:", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of Columns on 992px to 1199px:", 'sw_woocommerce' ),
					"param_name" => "columns1",
					"admin_label" => true,
					"value" => array(1,2,3,4,5,6),
					"description" => __( "Number of Columns on 992px to 1199px:", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of Columns on 768px to 991px:", 'sw_woocommerce' ),
					"param_name" => "columns2",
					"admin_label" => true,
					"value" => array(1,2,3,4,5,6),
					"description" => __( "Number of Columns on 768px to 991px:", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of Columns on 480px to 767px:", 'sw_woocommerce' ),
					"param_name" => "columns3",
					"admin_label" => true,
					"value" => array(1,2,3,4,5,6),
					"description" => __( "Number of Columns on 480px to 767px:", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of Columns in 480px or less than:", 'sw_woocommerce' ),
					"param_name" => "columns4",
					"admin_label" => true,
					"value" => array(1,2,3,4,5,6),
					"description" => __( "Number of Columns in 480px or less than:", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Speed", 'sw_woocommerce' ),
					"param_name" => "speed",
					"admin_label" => true,
					"value" => 1000,
					"description" => __( "Speed Of Slide", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Auto Play", 'sw_woocommerce' ),
					"param_name" => "autoplay",
					"admin_label" => true,
					"value" => array( 'False' => 'false', 'True' => 'true' ),
					"description" => __( "Auto Play", 'sw_woocommerce' )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Interval", 'sw_woocommerce' ),
					"param_name" => "interval",
					"admin_label" => true,
					"value" => 5000,
					"description" => __( "Interval", 'sw_woocommerce' )
				 ),
				  array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Layout", 'sw_woocommerce' ),
					"param_name" => "layout",
					"admin_label" => true,
					"value" => array( 'Layout Default' => 'default', 'Layout 1' => 'layout1', 'Layout 2'=>'layout2', 'Layout 3'=>'layout3', 'Layout 4'=>'layout4', 'Layout 5'=>'layout5', 'Layout Mobile'=>'layout_mb' ),
					"description" => __( "Layout", 'sw_woocommerce' )
				 ),
				  array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Select Style", 'sw_woocommerce' ),
					"param_name" => "style",
					"admin_label" => true,
					"value" => array( 'Default' => '', 'Style 1' => 'style1', 'Style 2' => 'style2'),
					"description" => __( "Select Style", 'sw_woocommerce' )
				 ),

				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Total Items Slided", 'sw_woocommerce' ),
					"param_name" => "scroll",
					"admin_label" => true,
					"value" => 1,
					"description" => __( "Total Items Slided", 'sw_woocommerce' )
				 ),
			  )
		   ) );
		}
		/**
			** Add Shortcode
		**/
		function SC_WooTab( $atts, $content = null ){
			extract( shortcode_atts(
				array(
					'title1' => '',
					'title_length' => 0,
					'description' => '',
					'icon_m'=> '',
					'category' => '',
					'images' => '',
					'select_order' => 'latest',
					'orderby' => 'name',
					'order'	=> 'DESC',
					'numberposts' => 5,
					'item_row'=> 1,
					'item_row2'=> 3,
					'tab_active' => 1,
					'columns' => 4,
					'columns1' => 4,
					'columns2' => 3,
					'columns3' => 2,
					'columns4' => 1,
					'speed' => 1000,
					'autoplay' => 'false',
					'interval' => 5000,
					'layout'  => 'default',
					'style'  => '',
					'scroll' => 1
				), $atts )
			);
			ob_start();		
			if( $layout == 'default' ){
				include( sw_override_check( 'sw-woo-tab-category-slider', 'default' ) );
			}elseif( $layout == 'layout1' ){
				include( sw_override_check( 'sw-woo-tab-category-slider', 'theme1' ) );
			}elseif( $layout == 'layout2' ){
				include( sw_override_check( 'sw-woo-tab-category-slider', 'theme2' ) );
			}elseif( $layout == 'layout3' ){
				include( sw_override_check( 'sw-woo-tab-category-slider', 'theme3' ) );
			}elseif( $layout == 'layout4' ){
				include( sw_override_check( 'sw-woo-tab-category-slider', 'theme4' ) );
			}elseif( $layout == 'layout5' ){
				include( sw_override_check( 'sw-woo-tab-category-slider', 'theme5' ) );
			}
			elseif( $layout == 'layout_mb' ){
				include( sw_override_check( 'sw-woo-tab-category-slider', 'theme-mobile' ) );
			}
			
			$content = ob_get_clean();
			
			return $content;
		}
		
		/**
		* Ajax Callback
		**/
		function sw_ajax_tab_callback(){
			$cat 			 	 = ( isset( $_POST["catid"] )   	&& $_POST["catid"] != '' ) ? $_POST["catid"] : '';		
			$so          	= ( isset( $_POST["sorder"] )  	&& $_POST["sorder"] != '' ) ? $_POST["sorder"] : 'latest';
			$layout      	= ( isset( $_POST["layout"] )  	&& $_POST["layout"] != '' ) ? $_POST["layout"] : 'default';
			$style      	= ( isset( $_POST["style"] )  	&& $_POST["style"] != '' ) ? $_POST["style"] : '';
			$target      	= ( isset( $_POST["target"] )  	&& $_POST["target"] != '' ) ? str_replace( '#', '', $_POST["target"] ) : '';
			$numberposts 	= ( isset( $_POST["number"] )  	&& $_POST["number"] > 0 ) ? $_POST["number"] : 0;
			$item_row    	= ( isset( $_POST["item_row"] )  && $_POST["item_row"] > 0 ) ? $_POST["item_row"] : 1;
			$item_row2    	= ( isset( $_POST["item_row2"] )  && $_POST["item_row2"] > 0 ) ? $_POST["item_row2"] : 7;
			$columns		= ( isset( $_POST["columns"] )   && $_POST["columns"] > 0 ) ? $_POST["columns"] : 1;
			$columns1		= ( isset( $_POST["columns1"] )  && $_POST["columns1"] > 0 ) ? $_POST["columns1"] : 1;
			$columns2		= ( isset( $_POST["columns2"] )  && $_POST["columns2"] > 0 ) ? $_POST["columns2"] : 1;
			$columns3		= ( isset( $_POST["columns3"] )  && $_POST["columns3"] > 0 ) ? $_POST["columns3"] : 1;
			$columns4		= ( isset( $_POST["columns4"] )  && $_POST["columns4"] > 0 ) ? $_POST["columns4"] : 1;
			$interval		= ( isset( $_POST["interval"] )  && $_POST["interval"] > 0 ) ? $_POST["interval"] : 1000;
			$speed			= ( isset( $_POST["speed"] )  	  && $_POST["speed"] > 0 ) ? $_POST["speed"] : 1000;
			$scroll			= ( isset( $_POST["scroll"] )  	&& $_POST["scroll"] > 0 ) ? $_POST["scroll"] : 1;
			$orderby 		= ( isset( $_POST["orderby"] ) 	&& $_POST["orderby"] != '' ) ? $_POST["orderby"] : 'ID';
			$order 		   	= ( isset( $_POST["order"] ) 	&& $_POST["order"] != '' ) ? $_POST["order"] : 'DESC';
			$autoplay		= ( isset( $_POST["autoplay"] )  && $_POST["autoplay"] != '' ) ? $_POST["autoplay"] : 'false';
			$title_length 	= ( isset( $_POST["title_length"] )  	&& $_POST["title_length"] > 0 ) ? $_POST["title_length"] : 0;
			$default = array();
			if( $so == 'latest' ){
				$default = array(
					'post_type'	=> 'product',
					'tax_query'	=> array(
					array(
						'taxonomy'	=> 'product_cat',
						'field'		=> 'slug',
						'terms'		=> $cat)),
					'orderby' => 'date',
					'order' => $order,
					'post_status' => 'publish',
					'showposts' => $numberposts
				);
			}
			if( $so == 'rating' ){
				$default = array(
					'post_type' 			=> 'product',
					'post_status' 			=> 'publish',
					'ignore_sticky_posts'   => 1,
					'tax_query'	=> array(
					array(
						'taxonomy'	=> 'product_cat',
						'field'		=> 'slug',
						'terms'		=> $cat)),
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
			if( $so == 'bestsales' ){
				$default = array(
					'post_type' 			=> 'product',
					'post_status' 			=> 'publish',
					'ignore_sticky_posts'   => 1,
					'tax_query'	=> array(
						array(
							'taxonomy'	=> 'product_cat',
							'field'		=> 'slug',
							'terms'		=> $cat)),
					'paged'	=> 1,
					'showposts'				=> $numberposts,
					'meta_key' 		 		=> 'total_sales',
					'orderby' 		 		=> 'meta_value_num',					
				);
			}
			if( $so == 'featured' ){
				$default = array(
					'post_type'				=> 'product',
					'post_status' 			=> 'publish',
					'tax_query'	=> array(
						array(
							'taxonomy'	=> 'product_cat',
							'field'		=> 'slug',
							'terms'		=> $cat)),
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
			if( $so == 'rating' && ! sw_woocommerce_version_check( '3.0' ) ){			
				remove_filter( 'posts_clauses',  array( WC()->query, 'order_by_rating_post_clauses' ) );
			}
			$term = get_term_by('slug', $cat, 'product_cat');
			$term_str = '';
			if( $term ) :
				$term_str .= '<a href="'. get_term_link( $term->term_id, 'product_cat' ) .'">'. esc_html( $term->name ) .'</a>';
			endif;
			$viewall = get_term_link( $term->term_id, 'product_cat' );	
		?>
		<div class="tab-pane active" id="<?php echo esc_attr( str_replace( '%', '', $target ) ) ?>">
			<?php if( $list->have_posts() ) : ?>
			<?php if( $layout == 'default' || $layout == 'default'): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. esc_attr( str_replace( '%', '', $target ) ) ); ?>" class="woo-tab-container-slider responsive-slider clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
							<div class="slider responsive">
						<?php 
							$count_items 	= 0;
							$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
							$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
							$i 				= 0;
							$j				= 0;
							while($list->have_posts()): $list->the_post();
							global $product, $post;
							$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
							if( $i % $item_row == 0 ){
						?>
							<div class="item <?php echo esc_attr( $class )?> product clearfix">
						<?php } ?>
								<div class="item-wrap">
									<div class="item-detail">										
										<div class="item-img products-thumb">		
											<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
											<?php sw_label_sales() ?>
											<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
										</div>										
										<div class="item-content">																			
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>								
											<!-- price -->
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
						<?php $i++; $j++; endwhile; wp_reset_postdata();?>
						</div>
					</div>
				</div>
				
			<?php elseif( $layout == 'layout1' || $layout == 'theme1' ): ?>			
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
						<?php 
							$count_items 	= 0;
							$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
							$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
							$i 				= 0;
							$j				= 0;
							while($list->have_posts()): $list->the_post();
							global $product, $post;
							$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
							if( $i % $item_row2 == 0 ){
						?>
							<div class="item product <?php echo 'item-'.esc_attr( $item_row2 ).'columns' ?> <?php echo esc_attr( $class )?>">
						<?php } ?>
								<?php echo ( $i % $item_row2 == 1 )? '<div class="wrap-small-item">' : ''; ?>
								<div class="item-wrap item-wrap2 <?php echo ( $i % $item_row2 == 0 ) ? 'first-item' : ''; ?>">
									<div class="item-detail">										
										<div class="item-img products-thumb">		
											<?php if( $i % $item_row2 == 0 ){ ?>												
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail( 'shop_single', array( 'alt' => get_the_title()  ) ); ?></a>
											<?php }else{ ?>
											<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
											<?php } ?>
											<?php sw_label_sales() ?>
											<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
										</div>										
										<div class="item-content">
										<!-- price -->
										<?php if ( $price_html = $product->get_price_html() ){?>
										<div class="item-price">
											<span>
												<?php echo $price_html; ?>
											</span>
										</div>
										<?php } ?>
										<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>								
										</div>								
									</div>
								</div>
								<?php echo ( ( $i % $item_row2 == $item_row2 - 1 ) || ( $i+1 ) == $count_items )? '</div>' : ''; ?>
							<?php if( ( $i+1 ) % $item_row2 == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
						<?php $i++; $j++; endwhile; wp_reset_postdata();?>
						</div>
					</div>
				</div>

			<?php elseif( $layout == 'layout3'|| $layout == 'theme3' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
							<div class="slider responsive">
						<?php 
							$count_items 	= 0;
							$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
							$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
							$i 				= 0;
							$j				= 0;
							while($list->have_posts()): $list->the_post();
							global $product, $post;
							$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
							if( $i % $item_row == 0 ){
						?>
							<div class="item <?php echo esc_attr( $class )?> product clearfix">
						<?php } ?>
							<div class="item-wrap item-wrap3">
								<div class="item-detail">										
									<div class="item-img products-thumb">		
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'shop_single', array( 'alt' => get_the_title()  ) ); ?></a>
										<?php sw_label_sales() ?>
										<?php echo emarket_quickview() ;?>
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
								         	<div class="star"><?php echo ( $average > 0 ) ?'<span style="width:'. ( $average*12 ).'px"></span>' : ''; ?></div>
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
										<!-- add to cart, wishlist, compare -->
										<div class="item-button">
											<?php woocommerce_template_loop_add_to_cart(); ?>
											<?php
											if ( class_exists( 'YITH_WCWL' ) ){
													echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
											} ?>
											<?php if ( class_exists( 'YITH_WOOCOMPARE' ) ){ 
											?>
												<a href="javascript:void(0)" class="compare button"  title="<?php esc_html_e( 'Add to Compare', 'sw_woocommerce' ) ?>" data-product_id="<?php echo esc_attr($post->ID); ?>" rel="nofollow"> <?php esc_html('compare','sw-woocomerce'); ?></a>
											<?php } ?>
										</div>									
									</div>								
								</div>
							</div>
							<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
						<?php $i++; $j++; endwhile; wp_reset_postdata();?>
						</div>
					</div>
				</div>

			<?php elseif( $layout == 'layout4' || $layout == 'theme4' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider  clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
						<?php 
						$count_items 	= 0;
						$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
						$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
						$i 				= 0;
						$j				= 0;
						while($list->have_posts()): $list->the_post();
						global $product, $post;
						$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
						if( $i % $item_row == 0 ){
							?>
							<div class="item <?php echo esc_attr( $class )?> product clearfix">
								<?php } ?>
								<div class="item-wrap3">
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
											<?php echo emarket_quickview(); ?>
										</div>				
										<div class="item-content">
											<!-- rating  -->
											<?php 
											$rating_count = $product->get_rating_count();
											$review_count = $product->get_review_count();
											$average      = $product->get_average_rating();
											?>
											<?php if (  wc_review_ratings_enabled() ) { ?>
											<div class="reviews-content">
												<div class="star"><?php echo ( $average > 0 ) ?'<span style="width:'. ( $average*13 ).'px"></span>' : ''; ?></div>
											</div>
											<?php } ?>
											<!-- end rating  -->
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>								
											<!-- price -->
											<?php if ( $price_html = $product->get_price_html() ){?>
											<div class="item-price">
												<span>
													<?php echo $price_html; ?>
												</span>
											</div>
											<?php } ?>	
											<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
										</div>
									</div>
								</div>
								<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
								<?php $i++; $j++; endwhile; wp_reset_postdata();?>
							</div>
						</div>
					</div>

				<?php elseif( $layout == 'layout5' || $layout == 'theme5' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider  clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
						<?php 
						$count_items 	= 0;
						$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
						$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
						$i 				= 0;
						$j				= 0;
						while($list->have_posts()): $list->the_post();
						global $product, $post;
						$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
						if( $i % $item_row == 0 ){
							?>
							<div class="item <?php echo esc_attr( $class )?> product clearfix">
								<?php } ?>
								<div class="item-wrap4">
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
											<?php echo emarket_quickview(); ?>
										</div>
										<div class="item-content">
											<!-- rating  -->
											<?php 
											$rating_count = $product->get_rating_count();
											$review_count = $product->get_review_count();
											$average      = $product->get_average_rating();
											?>
											<?php if (  wc_review_ratings_enabled() ) { ?>
											<div class="reviews-content">
												<div class="star"><?php echo ( $average > 0 ) ?'<span style="width:'. ( $average*13 ).'px"></span>' : ''; ?></div>
											</div>
											<?php } ?>
											<!-- end rating  -->
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>
											<!-- price -->
											<?php if ( $price_html = $product->get_price_html() ){?>
											<div class="item-price">
												<span>
													<?php echo $price_html; ?>
												</span>
											</div>
											<?php } ?>
											<div class="item-button">
											<?php woocommerce_template_loop_add_to_cart(); ?>
												<?php
												if ( class_exists( 'YITH_WCWL' ) ){
												echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
												} ?>
												<?php if ( class_exists( 'YITH_WOOCOMPARE' ) ){ 
												?>
												<a href="javascript:void(0)" class="compare button"  title="<?php esc_html_e( 'Add to Compare', 'sw_woocommerce' ) ?>" data-product_id="<?php echo esc_attr($post->ID); ?>" rel="nofollow"> <?php esc_html('compare','sw-woocomerce'); ?></a>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
								<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
								<?php $i++; $j++; endwhile; wp_reset_postdata();?>
							</div>
						</div>
					</div>
					
				<?php elseif( $layout == 'layout6' || $layout == 'theme6' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider  clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
						<?php 
						$count_items 	= 0;
						$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
						$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
						$i 				= 0;
						$j				= 0;
						while($list->have_posts()): $list->the_post();
						global $product, $post;
						$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
						if( $i % $item_row == 0 ){
							?>
							<div class="item <?php echo esc_attr( $class )?> product clearfix">
								<?php } ?>
								<div class="item-wrap">
									<div class="item-detail">										
										<div class="item-img products-thumb">		
											<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
											<?php sw_label_sales() ?>
											<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
										</div>										
										<div class="item-content">
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>								
											<!-- price -->
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
								<?php $i++; $j++; endwhile; wp_reset_postdata();?>
							</div>
							<a class="view-all" href="<?php echo esc_url( $viewall ); ?>"><?php echo esc_html__('+ View All Products','sw_woocommerce'); ?></a>
						</div>
					</div>
					
			<?php elseif( $layout == 'layout7' || $layout == 'theme7' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider  clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
						<?php 
						$count_items 	= 0;
						$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
						$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
						$i 				= 0;
						$j				= 0;
						while($list->have_posts()): $list->the_post();
						global $product, $post;
						$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
						if( $i % $item_row == 0 ){
							?>
							<div class="item <?php echo esc_attr( $class )?> product clearfix">
								<?php } ?>
								<div class="item-wrap9">
									<div class="item-detail">
										<div class="item-img products-thumb">
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
											<!-- add to cart, wishlist, compare -->
											<div class="item-button">
												<div class="wrap">
												<?php
													if ( class_exists( 'YITH_WCWL' ) ){
													echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
													} ?>
													<?php if ( class_exists( 'YITH_WOOCOMPARE' ) ){ 
													?>
													<a href="javascript:void(0)" class="compare button"  title="<?php esc_html_e( 'Add to Compare', 'sw_woocommerce' ) ?>" data-product_id="<?php echo esc_attr($post->ID); ?>" rel="nofollow"> <?php esc_html('compare','sw-woocomerce'); ?></a>
													<?php } ?>
													<?php echo emarket_quickview(); ?>
												</div>
											</div>
										</div>
										<div class="item-content">
											<?php do_action('sw_author_listing_product'); ?>
											<h4 class="custom-font"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
													<?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>
											<!-- price -->
											<?php if ( $price_html = $product->get_price_html() ){?>
											<div class="item-price custom-font">
												<span>
													<?php echo $price_html; ?>
												</span>
											</div>
											<?php } ?>
											<?php woocommerce_template_loop_add_to_cart(); ?>
										</div>
									</div>
								</div>
								<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
								<?php $i++; $j++; endwhile; wp_reset_postdata();?>
							</div>
							<a class="view-all" href="<?php echo esc_url( $viewall ); ?>"><?php echo esc_html__('+ View All Products','sw_woocommerce'); ?></a>
						</div>
					</div>
					
			<?php elseif( $layout == 'layout8' || $layout == 'theme8' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider  clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
						<?php 
						$count_items 	= 0;
						$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
						$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
						$i 				= 0;
						$j				= 0;
						while($list->have_posts()): $list->the_post();
						global $product, $post;
						$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
						if( $i % $item_row == 0 ){
							?>
							<div class="item <?php echo esc_attr( $class )?> product clearfix">
								<?php } ?>
								<div class="item-wrap">
									<div class="item-detail">										
										<div class="item-img products-thumb">		
											<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
											<?php sw_label_sales() ?>
											<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
										</div>										
										<div class="item-content">
											<h4 class="custom-font"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>
											<div class="categories-name">
												<?php echo  $term_str; ?>
											</div>
											<!-- price -->
											<?php if ( $price_html = $product->get_price_html() ){?>
											<div class="item-price custom-font">
												<span>
													<?php echo $price_html; ?>
												</span>
											</div>
											<?php } ?>
										</div>								
									</div>
								</div>
								<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
								<?php $i++; $j++; endwhile; wp_reset_postdata();?>
							</div>
							<a class="view-all" href="<?php echo esc_url( $viewall ); ?>"><?php echo esc_html__('View All','sw_woocommerce'); ?></a>
						</div>
					</div>
			<?php elseif( $layout == 'layout9' || $layout == 'theme9' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider  clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
							<?php 
							$count_items 	= 0;
							$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
							$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
							$i 				= 0;
							$j				= 0;
							while($list->have_posts()): $list->the_post();
							global $product, $post;
							$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
							if( $i % $item_row == 0 ){
								?>
								<div class="item <?php echo esc_attr( $class )?> product clearfix">
									<?php } ?>
									<div class="item-wrap10">
										<div class="item-detail">										
											<div class="item-img products-thumb">		
												<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
												<?php
												if ( class_exists( 'YITH_WCWL' ) ){
												echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
												} ?>
											</div>										
											<div class="item-content">
												<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>								
												<!-- price -->
												<?php if ( $price_html = $product->get_price_html() ){?>
												<div class="item-price">
													<span>
														<?php echo $price_html; ?>
													</span>
												</div>
												<?php } ?>
												<div class="item-bottom">
													<?php woocommerce_template_loop_add_to_cart(); ?>
													<?php echo emarket_quickview(); ?>
												</div>
											</div>								
										</div>
									</div>
									<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
									<?php $i++; $j++; endwhile; wp_reset_postdata();?>
							</div>
						<a class="view-all" href="<?php echo esc_url( $viewall ); ?>"><?php echo esc_html__('View All Products','sw_woocommerce'); ?></a>
					</div>
				</div>
				
			<?php elseif( $layout == 'layout10' || $layout == 'theme10' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider  clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
							<?php 
							$count_items 	= 0;
							$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
							$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
							$i 				= 0;
							$j				= 0;
							while($list->have_posts()): $list->the_post();
							global $product, $post;
							$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
							if( $i % $item_row == 0 ){
								?>
							<div class="item <?php echo esc_attr( $class )?> product clearfix">
								<?php } ?>
								<div class="item-wrap">
									<div class="item-detail">										
										<div class="item-img products-thumb">		
											<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
											<?php sw_label_sales() ?>
											<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
										</div>										
										<div class="item-content">
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>								
											<?php if ( $price_html = $product->get_price_html() ){ ?>
												<div class="item-price">
													<span>
														<?php echo $price_html; ?>
													</span>
												</div>
											<?php } ?>	
											<?php
												$product_type = ( sw_woocommerce_version_check( '3.0' ) ) ? $product->get_type() : $product->product_type;
												echo sw_label_new();
												if( $product_type != 'variable' ) {
													$forginal_price 	= get_post_meta( $post->ID, '_regular_price', true );	
													$fsale_price 		= get_post_meta( $post->ID, '_sale_price', true );
													if( $fsale_price > 0 && $product->is_on_sale() ){ 
														$sale_off = 100 - ( ( $fsale_price/$forginal_price ) * 100 ); 
														$html = '<div class="sale-off2 ' . esc_attr( ( sw_label_new() != '' ) ? 'has-newicon' : '' ) .'">';
														$html .= ''.round( $sale_off ).'% '. esc_html__('off','sw_woocommerce');
														$html .= '</div>';
														echo apply_filters( 'sw_label_sales', $html );
													} 
												}else{
													echo '<div class="' . esc_attr( ( sw_label_new() != '' ) ? 'has-newicon' : '' ) .'">';
													wc_get_template( 'single-product/sale-flash.php' );
													echo '</div>';
												}
											?>
											<?php $total_sales = get_post_meta( $post->ID, 'total_sales', true ); ?>
											<div class="stock-sold"><span><?php echo $total_sales; ?><?php echo esc_html__(' Sold','sw_woocommerce');?></span></div>
										</div>								
									</div>
								</div>
								<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
								<?php $i++; $j++; endwhile; wp_reset_postdata();?>
							</div>
							<a class="view-all" href="<?php echo esc_url( $viewall ); ?>"><?php echo esc_html__('View More','sw_woocommerce'); ?></a>
						</div>
				</div>
			<?php elseif( $layout == 'layout11' || $layout == 'theme11' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider  clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
							<?php 
							$count_items 	= 0;
							$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
							$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
							$i 				= 0;
							$j				= 0;
							while($list->have_posts()): $list->the_post();
							global $product, $post;
							$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
							if( $i % $item_row == 0 ){
								?>
								<div class="item <?php echo esc_attr( $class )?> product clearfix">
									<?php } ?>
									<div class="item-wrap">
										<div class="item-detail">										
											<div class="item-img products-thumb">		
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'shop_single', array( 'alt' => get_the_title() ) ); ?></a>
												<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
											</div>										
											<div class="item-content">
												<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>								
												<?php if ( $price_html = $product->get_price_html() ){ ?>
													<div class="item-price">
														<span>
															<?php echo $price_html; ?>
														</span>
													</div>
												<?php } ?>	
												<?php
													$product_type = ( sw_woocommerce_version_check( '3.0' ) ) ? $product->get_type() : $product->product_type;
													echo sw_label_new();
													if( $product_type != 'variable' ) {
														$forginal_price 	= get_post_meta( $post->ID, '_regular_price', true );	
														$fsale_price 		= get_post_meta( $post->ID, '_sale_price', true );
														if( $fsale_price > 0 && $product->is_on_sale() ){ 
															$sale_off = 100 - ( ( $fsale_price/$forginal_price ) * 100 ); 
															$html = '<div class="sale-off2 ' . esc_attr( ( sw_label_new() != '' ) ? 'has-newicon' : '' ) .'">';
															$html .= ''.round( $sale_off ).'% '. esc_html__('off','sw_woocommerce');
															$html .= '</div>';
															echo apply_filters( 'sw_label_sales', $html );
														} 
													}else{
														echo '<div class="' . esc_attr( ( sw_label_new() != '' ) ? 'has-newicon' : '' ) .'">';
														wc_get_template( 'single-product/sale-flash.php' );
														echo '</div>';
													}
												?>
											</div>									
										</div>
									</div>
									<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
									<?php $i++; $j++; endwhile; wp_reset_postdata();?>
								</div>
							</div>
				</div>
			
			<?php elseif( $layout == 'layout12' || $layout == 'theme12' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider  clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
							<?php 
							$count_items 	= 0;
							$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
							$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
							$i 				= 0;
							$j				= 0;
							while($list->have_posts()): $list->the_post();
							global $product, $post;
							$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
							if( $i % $item_row == 0 ){
								?>
								<div class="item <?php echo esc_attr( $class )?> product clearfix">
									<?php } ?>
									<div class="item-wrap">
										<div class="item-detail">										
											<div class="item-img products-thumb">			
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
													<?php 
													$id = get_the_ID();
													if ( has_post_thumbnail() ){
														echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'alt' => $post->post_title ) ) ? get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'alt' => $post->post_title ) ): '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'thumbnail'.'.png" alt="No thumb">';		
													}else{
														echo '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'thumbnail'.'.png" alt="No thumb">';
													}
													?>
												</a>
											</div>										
											<div class="item-content">
												<!-- end rating  -->
												<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>																
												<!-- price -->
												<?php if ( $price_html = $product->get_price_html() ){?>
												<div class="item-price">
													<span>
														<?php echo $price_html; ?>
													</span>
												</div>
												<?php } ?>
												<?php woocommerce_template_loop_add_to_cart(); ?>
											</div>								
										</div>
									</div>
									<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
									<?php $i++; $j++; endwhile; wp_reset_postdata();?>
								</div>
							</div>
				</div>
				<?php elseif( $layout == 'layout13' || $layout == 'theme13' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider sw-woo-tab-cat14 clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
							<?php 
							$count_items 	= 0;
							$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
							$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
							$i 				= 0;
							$j				= 0;
							while($list->have_posts()): $list->the_post();
							global $product, $post;
							$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
							if( $i % $item_row == 0 ){
								?>
								<div class="item <?php echo esc_attr( $class )?> product clearfix">
									<?php } ?>
									<?php include( WCTHEME . '/default-item11.php' ); ?>
									<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
									<?php $i++; $j++; endwhile; wp_reset_postdata();?>
								</div>
							</div>
				</div>
			<?php elseif( $layout == 'layout14' || $layout == 'theme14' ): ?>
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider sw-woo-tab-cat15 clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
						<div class="slider responsive">
						<?php 
						$count_items 	= 0;
						$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
						$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
						$i 				= 0;
						$j				= 0;
						while($list->have_posts()): $list->the_post();
						global $product, $post;
						$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
						if( $i % $item_row == 0 ){
							?>
							<div class="item <?php echo esc_attr( $class )?> product clearfix">
								<?php } ?>
								<?php include( WCTHEME . '/default-item13.php' ); ?>
								<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
								<?php $i++; $j++; endwhile; wp_reset_postdata();?>
							</div>
					</div>
				</div>
			<?php elseif( $layout == 'layout_mb' || $layout == 'theme-mobile'): ?>			
				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="sw-mobile-cat clearfix">
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

			<?php else : ?>

				<div id="<?php echo esc_attr( 'tab_cat_'. str_replace( '%', '', $target ) ); ?>" class="woo-tab-container-slider responsive-slider  clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
					<div class="resp-slider-container">
							<div class="slider responsive">
						<?php 
							$count_items 	= 0;
							$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
							$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
							$i 				= 0;
							$j				= 0;
							while($list->have_posts()): $list->the_post();
							global $product, $post;
							$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
							if( $i % $item_row == 0 ){
						?>
							<div class="item <?php echo esc_attr( $class )?> product clearfix">
						<?php } ?>
								<div class="item-wrap">
									<div class="item-detail">										
										<div class="item-img products-thumb">
											<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
											<?php sw_label_sales() ?>
											<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
										</div>										
										<div class="item-content">																											
											<!-- price -->
											<?php if ( $price_html = $product->get_price_html() ){?>
												<div class="item-price">
													<span>
														<?php echo $price_html; ?>
													</span>
												</div>
											<?php } ?>
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>
										</div>								
									</div>
							</div>
							<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
						<?php $i++; $j++; endwhile; wp_reset_postdata();?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php 
				else :
					echo '<div class="alert alert-warning alert-dismissible" role="alert">
					<a class="close" data-dismiss="alert">&times;</a>
					<p>'. esc_html__( 'There is not product on this tab', 'sw_woocommerce' ) .'</p>
					</div>';
				endif;
			?>
			</div>
		<?php 
			exit;
		}
		
		public function ya_trim_words( $text, $num_words = 30, $more = null ) {
			$text = strip_shortcodes( $text);
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
			return wp_trim_words($text, $num_words, $more);
		}
		/**
		 * Display the widget on the screen.
		 */
		public function widget( $args, $instance ) {
			extract($args);
			
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			echo $before_widget;
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }

			if ( !array_key_exists('widget_template', $instance) ){
				$instance['widget_template'] = 'default';
			}
			extract($instance);
			if ( !class_exists( 'WooCommerce' ) ) { 
				_e('Please active woocommerce plugin or install woomcommerce plugin first', 'sw_woocommerce');
				return false;
			}
			if ( $tpl = sw_override_check( 'sw-woo-tab-category-slider', $instance['widget_template'] ) ){ 
				$link_img = plugins_url('images/', __FILE__);
				$widget_id = $args['widget_id'];		
				include $tpl;
			}
					
			/* After widget (defined by themes). */
			echo $after_widget;
		}    

		
		/**
		 * Update the widget settings.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			// strip tag on text field
			$instance['title1'] = strip_tags( $new_instance['title1'] );
			$instance['title_length'] = intval( $new_instance['title_length'] );
			$instance['description'] = strip_tags( $new_instance['description'] );
			if ( array_key_exists('icon_m', $new_instance) ){
				$instance['icon_m'] = strip_tags( $new_instance['icon_m'] );
			}
			// string or array
			if ( array_key_exists('style', $new_instance) ){
				$instance['style'] = strip_tags( $new_instance['style'] );
			}
			if ( array_key_exists('category', $new_instance) ){
				if ( is_array($new_instance['category']) ){
					$instance['category'] = $new_instance['category'] ;
				} else {
					$instance['category'] = strip_tags( $new_instance['category'] );
				}
			}		
			if ( array_key_exists('select_order', $new_instance) ){
				$instance['select_order'] = strip_tags( $new_instance['select_order'] );
			}		
			if ( array_key_exists('orderby', $new_instance) ){
				$instance['orderby'] = strip_tags( $new_instance['orderby'] );
			}
			if ( array_key_exists('order', $new_instance) ){
				$instance['order'] = strip_tags( $new_instance['order'] );
			}
			if ( array_key_exists('numberposts', $new_instance) ){
				$instance['numberposts'] = intval( $new_instance['numberposts'] );
			}
			if ( array_key_exists('item_row', $new_instance) ){
				$instance['item_row'] = intval( $new_instance['item_row'] );
			}
			if ( array_key_exists('item_row2', $new_instance) ){
				$instance['item_row2'] = intval( $new_instance['item_row2'] );
			}
			if ( array_key_exists('banner_links', $new_instance) ){
				$instance['banner_links'] = esc_url( $new_instance['banner_links'] );
			}
			
			if ( array_key_exists('image', $new_instance) ){
				$instance['image'] = strip_tags( $new_instance['image'] );
			}
			if ( array_key_exists('tab_active', $new_instance) ){
				$instance['tab_active'] = intval( $new_instance['tab_active'] );
			}		
			if ( array_key_exists('columns', $new_instance) ){
				$instance['columns'] = intval( $new_instance['columns'] );
			}
			if ( array_key_exists('columns1', $new_instance) ){
				$instance['columns1'] = intval( $new_instance['columns1'] );
			}
			if ( array_key_exists('columns2', $new_instance) ){
				$instance['columns2'] = intval( $new_instance['columns2'] );
			}
			if ( array_key_exists('columns3', $new_instance) ){
				$instance['columns3'] = intval( $new_instance['columns3'] );
			}
			if ( array_key_exists('columns4', $new_instance) ){
				$instance['columns4'] = intval( $new_instance['columns4'] );
			}
			if ( array_key_exists('interval', $new_instance) ){
				$instance['interval'] = intval( $new_instance['interval'] );
			}
			if ( array_key_exists('speed', $new_instance) ){
				$instance['speed'] = intval( $new_instance['speed'] );
			}
			if ( array_key_exists('start', $new_instance) ){
				$instance['start'] = intval( $new_instance['start'] );
			}
			if ( array_key_exists('scroll', $new_instance) ){
				$instance['scroll'] = intval( $new_instance['scroll'] );
			}	
			if ( array_key_exists('autoplay', $new_instance) ){
				$instance['autoplay'] = strip_tags( $new_instance['autoplay'] );
			}
			$instance['widget_template'] = strip_tags( $new_instance['widget_template'] );
			
						
			
			return $instance;
		}

		function category_select( $field_name, $opts = array(), $field_value = null ){
			$default_options = array(
			'multiple' => true,
			'disabled' => false,
			'size' => 5,
			'class' => 'widefat',
			'required' => false,
			'autofocus' => false,
			'form' => false,
		);
		$opts = wp_parse_args($opts, $default_options);
	
		if ( (is_string($opts['multiple']) && strtolower($opts['multiple'])=='multiple') || (is_bool($opts['multiple']) && $opts['multiple']) ){
			$opts['multiple'] = 'multiple';
			if ( !is_numeric($opts['size']) ){
				if ( intval($opts['size']) ){
					$opts['size'] = intval($opts['size']);
				} else {
					$opts['size'] = 5;
				}
			}
			if (array_key_exists('allow_select_all', $opts) && $opts['allow_select_all']){
				unset($opts['allow_select_all']);
			}
		} else {
			// is not multiple
			unset($opts['multiple']);
			unset($opts['size']);
			if (is_array($field_value)){
				$field_value = array_shift($field_value);
			}
			if (array_key_exists('allow_select_all', $opts) && $opts['allow_select_all']){
				unset($opts['allow_select_all']);
				$allow_select_all = '<option value="">'. esc_html__( 'Select User', 'sw_vendor_slider' ) .'</option>';
			}
		}
	
		if ( (is_string($opts['disabled']) && strtolower($opts['disabled'])=='disabled') || is_bool($opts['disabled']) && $opts['disabled'] ){
			$opts['disabled'] = 'disabled';
		} else {
			unset($opts['disabled']);
		}
	
		if ( (is_string($opts['required']) && strtolower($opts['required'])=='required') || (is_bool($opts['required']) && $opts['required']) ){
			$opts['required'] = 'required';
		} else {
			unset($opts['required']);
		}
	
		if ( !is_string($opts['form']) ) unset($opts['form']);
	
		if ( !isset($opts['autofocus']) || !$opts['autofocus'] ) unset($opts['autofocus']);
	
		$opts['id'] = $this->get_field_id($field_name);
	
		$opts['name'] = $this->get_field_name($field_name);
		if ( isset($opts['multiple']) ){
			$opts['name'] .= '[]';
		}
		$select_attributes = '';
		foreach ( $opts as $an => $av){
			$select_attributes .= "{$an}=\"{$av}\" ";
		}
			
			$categories = get_terms('product_cat');
			$all_category_ids = array();
			foreach ($categories as $cat) $all_category_ids[] = $cat->slug;
			$is_valid_field_value = in_array($field_value, $all_category_ids);
			if (!$is_valid_field_value && is_array($field_value)){
				$intersect_values = array_intersect($field_value, $all_category_ids);
				$is_valid_field_value = count($intersect_values) > 0;
			}
			if (!$is_valid_field_value){
				$field_value = '';
			}
		
			$select_html = '<select ' . $select_attributes . '>';
			if (isset($allow_select_all)) $select_html .= $allow_select_all;
			foreach ($categories as $cat){			
				$select_html .= '<option value="' . $cat->slug . '"';
				if ($cat->slug == $field_value || (is_array($field_value)&&in_array($cat->slug, $field_value))){ $select_html .= ' selected="selected"';}
				$select_html .=  '>'.$cat->name.'</option>';
			}
			$select_html .= '</select>';
			return $select_html;
		}
		

		/**
		 * Displays the widget settings controls on the widget panel.
		 * Make use of the get_field_id() and get_field_name() function
		 * when creating your form elements. This handles the confusing stuff.
		 */
		public function form( $instance ) {

			/* Set up some default widget settings. */
			$defaults 			= array();
			$instance 			= wp_parse_args( (array) $instance, $defaults ); 		
			$title1					= isset( $instance['title1'] )       ? strip_tags($instance['title1']) : '';  
			$title_length		= isset( $instance['title_length'] ) ? intval($instance['title_length']) : 0;  
			$description 		= isset( $instance['description'] )  ? strip_tags($instance['description']) : '';
			$icon_m 		= isset( $instance['icon_m'] )  ? strip_tags($instance['icon_m']) : '';
			$style    		= isset( $instance['style'] )      ? strip_tags($instance['style']) : '';
			$categoryid 		= isset( $instance['category'] )     ? $instance['category'] : null;
			$select_order   = isset( $instance['select_order'] ) ? strip_tags($instance['select_order']) : 'latest';
			$banner_links	= isset( $instance['banner_links'] )    ? strip_tags($instance['banner_links']) : '';
			$image    		= isset( $instance['image'] )     		? strip_tags($instance['image']) : '';
			$orderby    		= isset( $instance['orderby'] )      ? strip_tags($instance['orderby']) : 'ID';
			$order      		= isset( $instance['order'] )        ? strip_tags($instance['order']) : 'ASC';
			$number     		= isset( $instance['numberposts'] )  ? intval($instance['numberposts']) : 5;
			$item_row     	= isset( $instance['item_row'] )     ? intval($instance['item_row']) : 1;
			$item_row2     	= isset( $instance['item_row2'] )     ? intval($instance['item_row2']) : 7;
			$tab_active    	= isset( $instance['tab_active'] )   ? intval($instance['tab_active']) : 1;
			$columns     		= isset( $instance['columns'] )      ? intval($instance['columns']) : 1;
			$columns1     	= isset( $instance['columns1'] )     ? intval($instance['columns1']) : 1;
			$columns2     	= isset( $instance['columns2'] )     ? intval($instance['columns2']) : 1;
			$columns3     	= isset( $instance['columns3'] )     ? intval($instance['columns3']) : 1;
			$columns4    		= isset( $instance['columns'] )      ? intval($instance['columns4']) : 1;
			$autoplay     	= isset( $instance['autoplay'] )     ? strip_tags($instance['autoplay']) : 'false';
			$interval     	= isset( $instance['interval'] )     ? intval($instance['interval']) : 5000;
			$speed     			= isset( $instance['speed'] )        ? intval($instance['speed']) : 1000;
			$scroll     		= isset( $instance['scroll'] )       ? intval($instance['scroll']) : 1;
			$widget_template  = isset( $instance['widget_template'] ) ? strip_tags($instance['widget_template']) : 'default';
					   
					 
			?>

			</p> 
			  <div style="background: Blue; color: white; font-weight: bold; text-align:center; padding: 3px"> * Data Config * </div>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat" id="<?php echo $this->get_field_id('title1'); ?>" name="<?php echo $this->get_field_name('title1'); ?>"
					type="text"	value="<?php echo esc_attr($title1); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('title_length'); ?>"><?php _e('Product Title Length', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat" id="<?php echo $this->get_field_id('title_length'); ?>" name="<?php echo $this->get_field_name('title_length'); ?>"
					type="text"	value="<?php echo esc_attr($title_length); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"
					type="text"	value="<?php echo esc_attr($description); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Style', 'sw_woocommerce')?></label>
				<br />
				<?php $allowed_keys = array('Default' => '', 'style1' => 'style1', 'style2' => 'style2'); ?>
				<select class="widefat"
					id="<?php echo $this->get_field_id('style'); ?>"
					name="<?php echo $this->get_field_name('style'); ?>">
					<?php
					$option ='';
					foreach ($allowed_keys as $value => $key) :
						$option .= '<option value="' . $value . '" ';
						if ($value == $style){
							$option .= 'selected="selected"';
						}
						$option .=  '>'.$key.'</option>';
					endforeach;
					echo $option;
					?>
				</select>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Select Categories', 'sw_woocommerce')?></label>
				<br />
				<?php echo $this->category_select('category', array( 'allow_select_all' => true ), $categoryid); ?>
			</p>
			
			<?php if ( $widget_template=='theme-mobile' ){ ?>
			<p>
				<label for="<?php echo $this->get_field_id('icon_m'); ?>"><?php _e('Select Icon Mobile', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat" id="<?php echo $this->get_field_id('icon_m'); ?>" name="<?php echo $this->get_field_name('icon_m'); ?>"
				type="text"	value="<?php echo esc_attr($icon_m); ?>" />
			</p>
			<?php } ?>
			
			<?php if ( $widget_template=='theme10' ){ ?>
			<p>
				<label for="<?php echo $this->get_field_id('banner_links'); ?>"><?php _e('Banner Links', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat" id="<?php echo $this->get_field_id('banner_links'); ?>" name="<?php echo $this->get_field_name('banner_links'); ?>"
					type="text"	value="<?php echo esc_attr($banner_links); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image attachment ID', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>"
					type="text"	value="<?php echo esc_attr($image); ?>" />
			</p>
			
			<?php } ?>
			
			<p>
				<label for="<?php echo $this->get_field_id('select_order'); ?>"><?php _e('Select Order', 'sw_woocommerce')?></label>
				<br />
				<?php $allowed_key = array('latest' => 'Latest Products', 'rating' => 'Top Rating Products', 'bestsales' => 'Best Selling Products', 'featured' => 'Featured Products'); ?>
				<select class="widefat"
					id="<?php echo $this->get_field_id('select_order'); ?>"
					name="<?php echo $this->get_field_name('select_order'); ?>">
					<?php
					$option ='';
					foreach ($allowed_key as $value => $key) :
						$option .= '<option value="' . $value . '" ';
						if ($value == $select_order){
							$option .= 'selected="selected"';
						}
						$option .=  '>'.$key.'</option>';
					endforeach;
					echo $option;
					?>
				</select>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Orderby', 'sw_woocommerce')?></label>
				<br />
				<?php $allowed_keys = array('name' => 'Name', 'author' => 'Author', 'date' => 'Date', 'title' => 'Title', 'modified' => 'Modified', 'parent' => 'Parent', 'ID' => 'ID', 'rand' =>'Rand', 'comment_count' => 'Comment Count'); ?>
				<select class="widefat"
					id="<?php echo $this->get_field_id('orderby'); ?>"
					name="<?php echo $this->get_field_name('orderby'); ?>">
					<?php
					$option ='';
					foreach ($allowed_keys as $value => $key) :
						$option .= '<option value="' . $value . '" ';
						if ($value == $orderby){
							$option .= 'selected="selected"';
						}
						$option .=  '>'.$key.'</option>';
					endforeach;
					echo $option;
					?>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order', 'sw_woocommerce')?></label>
				<br />
				<select class="widefat"
					id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>">
					<option value="DESC" <?php if ($order=='DESC'){?> selected="selected"
					<?php } ?>>
						<?php _e('Descending', 'sw_woocommerce')?>
					</option>
					<option value="ASC" <?php if ($order=='ASC'){?> selected="selected"	<?php } ?>>
						<?php _e('Ascending', 'sw_woocommerce')?>
					</option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('numberposts'); ?>"><?php _e('Number of Posts', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat" id="<?php echo $this->get_field_id('numberposts'); ?>" name="<?php echo $this->get_field_name('numberposts'); ?>"
					type="text"	value="<?php echo esc_attr($number); ?>" />
			</p>
			
			<?php $row_number = array( '1' => 1, '2' => 2, '3' => 3 ); ?>
			<p>
				<label for="<?php echo $this->get_field_id('item_row'); ?>"><?php _e('Number row per column:  ', 'sw_woocommerce')?></label>
				<br />
				<select class="widefat"
					id="<?php echo $this->get_field_id('item_row'); ?>"
					name="<?php echo $this->get_field_name('item_row'); ?>">
					<?php
					$option ='';
					foreach ($row_number as $key => $value) :
						$option .= '<option value="' . $value . '" ';
						if ($value == $item_row){
							$option .= 'selected="selected"';
						}
						$option .=  '>'.$key.'</option>';
					endforeach;
					echo $option;
					?>
				</select>
			</p> 
			<?php if ( $widget_template == 'theme1' ){ ?>
			
			<?php $row_number2 = array( '3' => 3, '5' => 5, '7' => 7, '9' => 9  ); ?>
			<p>
				<label for="<?php echo $this->get_field_id('item_row2'); ?>"><?php _e('Number row2 per column:  ', 'sw_woocommerce')?></label>
				<br />
				<select class="widefat"
					id="<?php echo $this->get_field_id('item_row2'); ?>"
					name="<?php echo $this->get_field_name('item_row2'); ?>">
					<?php
					$option ='';
					foreach ($row_number2 as $key => $value) :
						$option .= '<option value="' . $value . '" ';
						if ($value == $item_row2){
							$option .= 'selected="selected"';
						}
						$option .=  '>'.$key.'</option>';
					endforeach;
					echo $option;
					?>
				</select>
			</p> 
			
			<?php } ?>
			<p>
				<label for="<?php echo $this->get_field_id('tab_active'); ?>"><?php _e('Tab active: ', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat"
					id="<?php echo $this->get_field_id('tab_active'); ?>" name="<?php echo $this->get_field_name('tab_active'); ?>" type="text" 
					value="<?php echo esc_attr($tab_active); ?>" />
			</p> 
			
			<?php $number = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6); ?>
			<p>
				<label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e('Number of Columns >1200px: ', 'sw_woocommerce')?></label>
				<br />
				<select class="widefat"
					id="<?php echo $this->get_field_id('columns'); ?>"
					name="<?php echo $this->get_field_name('columns'); ?>">
					<?php
					$option ='';
					foreach ($number as $key => $value) :
						$option .= '<option value="' . $value . '" ';
						if ($value == $columns){
							$option .= 'selected="selected"';
						}
						$option .=  '>'.$key.'</option>';
					endforeach;
					echo $option;
					?>
				</select>
			</p> 
			
			<p>
				<label for="<?php echo $this->get_field_id('columns1'); ?>"><?php _e('Number of Columns on 992px to 1199px: ', 'sw_woocommerce')?></label>
				<br />
				<select class="widefat"
					id="<?php echo $this->get_field_id('columns1'); ?>"
					name="<?php echo $this->get_field_name('columns1'); ?>">
					<?php
					$option ='';
					foreach ($number as $key => $value) :
						$option .= '<option value="' . $value . '" ';
						if ($value == $columns1){
							$option .= 'selected="selected"';
						}
						$option .=  '>'.$key.'</option>';
					endforeach;
					echo $option;
					?>
				</select>
			</p> 
			
			<p>
				<label for="<?php echo $this->get_field_id('columns2'); ?>"><?php _e('Number of Columns on 768px to 991px: ', 'sw_woocommerce')?></label>
				<br />
				<select class="widefat"
					id="<?php echo $this->get_field_id('columns2'); ?>"
					name="<?php echo $this->get_field_name('columns2'); ?>">
					<?php
					$option ='';
					foreach ($number as $key => $value) :
						$option .= '<option value="' . $value . '" ';
						if ($value == $columns2){
							$option .= 'selected="selected"';
						}
						$option .=  '>'.$key.'</option>';
					endforeach;
					echo $option;
					?>
				</select>
			</p> 
			
			<p>
				<label for="<?php echo $this->get_field_id('columns3'); ?>"><?php _e('Number of Columns on 480px to 767px: ', 'sw_woocommerce')?></label>
				<br />
				<select class="widefat"
					id="<?php echo $this->get_field_id('columns3'); ?>"
					name="<?php echo $this->get_field_name('columns3'); ?>">
					<?php
					$option ='';
					foreach ($number as $key => $value) :
						$option .= '<option value="' . $value . '" ';
						if ($value == $columns3){
							$option .= 'selected="selected"';
						}
						$option .=  '>'.$key.'</option>';
					endforeach;
					echo $option;
					?>
				</select>
			</p> 
			
			<p>
				<label for="<?php echo $this->get_field_id('columns4'); ?>"><?php _e('Number of Columns in 480px or less than: ', 'sw_woocommerce')?></label>
				<br />
				<select class="widefat"
					id="<?php echo $this->get_field_id('columns4'); ?>"
					name="<?php echo $this->get_field_name('columns4'); ?>">
					<?php
					$option ='';
					foreach ($number as $key => $value) :
						$option .= '<option value="' . $value . '" ';
						if ($value == $columns4){
							$option .= 'selected="selected"';
						}
						$option .=  '>'.$key.'</option>';
					endforeach;
					echo $option;
					?>
				</select>
			</p> 
			
			<p>
				<label for="<?php echo $this->get_field_id('autoplay'); ?>"><?php _e('Auto Play', 'sw_woocommerce')?></label>
				<br />
				<select class="widefat"
					id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>">
					<option value="false" <?php if ($autoplay=='false'){?> selected="selected"
					<?php } ?>>
						<?php _e('False', 'sw_woocommerce')?>
					</option>
					<option value="true" <?php if ($autoplay=='true'){?> selected="selected"	<?php } ?>>
						<?php _e('True', 'sw_woocommerce')?>
					</option>
				</select>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('interval'); ?>"><?php _e('Interval', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat" id="<?php echo $this->get_field_id('interval'); ?>" name="<?php echo $this->get_field_name('interval'); ?>"
					type="text"	value="<?php echo esc_attr($interval); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('speed'); ?>"><?php _e('Speed', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat" id="<?php echo $this->get_field_id('speed'); ?>" name="<?php echo $this->get_field_name('speed'); ?>"
					type="text"	value="<?php echo esc_attr($speed); ?>" />
			</p>
			
			
			<p>
				<label for="<?php echo $this->get_field_id('scroll'); ?>"><?php _e('Total Items Slided', 'sw_woocommerce')?></label>
				<br />
				<input class="widefat" id="<?php echo $this->get_field_id('scroll'); ?>" name="<?php echo $this->get_field_name('scroll'); ?>"
					type="text"	value="<?php echo esc_attr($scroll); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('widget_template'); ?>"><?php _e("Template", 'sw_woocommerce')?></label>
				<br/>
				
				<select class="widefat"
					id="<?php echo $this->get_field_id('widget_template'); ?>"	name="<?php echo $this->get_field_name('widget_template'); ?>">
					<option value="default" <?php if ($widget_template=='default'){?> selected="selected"
					<?php } ?>>
						<?php _e('Default', 'sw_woocommerce')?>
					</option>
					<option value="theme1" <?php if ($widget_template=='theme1'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 1', 'sw_woocommerce')?>
					</option>
					<option value="theme2" <?php if ($widget_template=='theme2'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 2', 'sw_woocommerce')?>
					</option>
					<option value="theme3" <?php if ($widget_template=='theme3'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 3', 'sw_woocommerce')?>
					</option>
					<option value="theme4" <?php if ($widget_template=='theme4'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 4', 'sw_woocommerce')?>
					</option>
					<option value="theme5" <?php if ($widget_template=='theme5'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 5', 'sw_woocommerce')?>
					</option>
					<option value="theme6" <?php if ($widget_template=='theme6'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 6', 'sw_woocommerce')?>
					</option>
					<option value="theme7" <?php if ($widget_template=='theme7'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 7', 'sw_woocommerce')?>
					</option>
					<option value="theme8" <?php if ($widget_template=='theme8'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 8', 'sw_woocommerce')?>
					</option>
					<option value="theme9" <?php if ($widget_template=='theme9'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 9', 'sw_woocommerce')?>
					</option>
					<option value="theme10" <?php if ($widget_template=='theme10'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 10', 'sw_woocommerce')?>
					</option>
					<option value="theme11" <?php if ($widget_template=='theme11'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 11', 'sw_woocommerce')?>
					</option>
					<option value="theme12" <?php if ($widget_template=='theme12'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 12', 'sw_woocommerce')?>
					</option>
					<option value="theme13" <?php if ($widget_template=='theme13'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 13', 'sw_woocommerce')?>
					</option>
					<option value="theme14" <?php if ($widget_template=='theme14'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout 14', 'sw_woocommerce')?>
					</option>
					<option value="theme-mobile" <?php if ($widget_template=='theme-mobile'){?> selected="selected"
					<?php } ?>>
						<?php _e('Layout Mobile', 'sw_woocommerce')?>
					</option>
				</select>
			</p>               
		<?php
		}		
	}
 }
?>