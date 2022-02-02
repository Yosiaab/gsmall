<?php/** * Register Widgets */if( !function_exists( 'sw_image_resize' ) ) {	require_once( plugin_dir_path( __FILE__ ) . 'resize.php' ); }require_once( plugin_dir_path( __FILE__ ) . 'custom-metabox.php' ); $advanced_options = get_option( 'emarket_theme' );$testimonial_enable = isset( $advanced_options['testimonial_enable'] ) ? $advanced_options['testimonial_enable'] : 0;$portfolio_enable = isset( $advanced_options['portfolio_enable'] ) ? $advanced_options['portfolio_enable'] : 0;add_action( 'widgets_init', 'sw_plugin_register' );function sw_plugin_register(){	$advanced_options = get_option( 'emarket_theme' );	$testimonial_enable = isset( $advanced_options['testimonial_enable'] ) ? $advanced_options['testimonial_enable'] : 0;	if( !$testimonial_enable ) :		register_widget( 'sw_testimonial_slider_widget' );	endif;		register_widget( 'sw_primary_menu' );	register_widget( 'sw_vertical_menu' );	register_widget( 'sw_listing_tab_post' );}if( !$testimonial_enable ) :	include_once( plugin_dir_path( __FILE__ ) . 'sw-testimonial/sw-testimonial.php' );endif;if( !$portfolio_enable ) :	include_once( plugin_dir_path( __FILE__ ) . 'sw-portfolio/portfolio.php' );endif;if( !class_exists('sw_resp_slider') ) :	include_once( plugin_dir_path( __FILE__ ) . 'sw-responsive-post/sw-resp-slider.php' );endif;include_once( plugin_dir_path( __FILE__ ) . 'sw-widgets.php' );include_once( plugin_dir_path( __FILE__ ) . 'sw-page/sw-resp-page-listing.php' );include_once( plugin_dir_path( __FILE__ ) . 'sw-resp-category-listing/sw-resp-category.php' );/*** Shortcode Blog*/$sw_blogcol = 0;function sw_blog( $atts, $content = '' ){	extract( shortcode_atts(		array(			'title' => '',			'description' =>'',			'category' => '',			'orderby' => '',			'order'	=> '',			'numberposts' => 5,			'columns' => 1,			'layout' => 'list'		), $atts )	);	global $sw_blogcol;	$sw_blogcol = $columns;	ob_start();?>	<div class="category-contents">		<?php if( $title != '' || $description != '' ) : ?>		<div class="swblog-title">			<?php echo ( $title != '' ) ? '<h2>' . $title . '</h2>' : ''; ?>			<?php echo ( $description != '' ) ? '<div class="swblog-description">' . $description . '</div>' : ''; ?>		</div>		<?php endif; ?>		<?php 			$blogclass = 'blog-content blog-content-'. $layout;			if( $layout == 'grid' ){				$blogclass .= ' row';			}		?>		<div class="<?php echo esc_attr( $blogclass ) ?>">		<?php 			$paged 	 = ( get_query_var('paged') ) ? get_query_var('paged') : 1;				$default = array( 				'post_type'	=> 'post',				'orderby'	=> $orderby,				'order'	=> $order,				'paged' => $paged,				'showposts'	=> $numberposts			);			if( $category != '' ) :				$default['tax_query'] = array(					array(						'taxonomy'	=> 'category',						'field'	=> 'slug',						'terms'	=> $category					)				);			endif;			$list = new WP_Query( $default );			while( $list->have_posts() ) : $list->the_post();				if( locate_template( 'templates/content-' . $layout . '.php' ) ) :					get_template_part( 'templates/content', $layout ); 				else:						echo '';			endif;			endwhile;			wp_reset_postdata();		?>		</div>		<?php if ($list->max_num_pages > 1) : ?>			<div class="pagination nav-pag pull-right">			<?php				echo paginate_links( array(					'base' => esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ) ),					'format' => '',					'current' => max( 1, get_query_var('paged') ),					'total' => $list->max_num_pages,					'end_size' => 2,					'mid_size' => 2,					'prev_text' => '<i class="fa fa-angle-left"></i>',					'next_text' => '<i class="fa fa-angle-right"></i>',					'type' => 'list',									) );			?>			</div>			<?php endif; ?>	</div><?php 	$content = ob_get_clean();	return $content;}add_shortcode( 'sw_blog', 'sw_blog' );