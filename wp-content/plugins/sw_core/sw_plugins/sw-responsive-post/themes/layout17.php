<?php 
/**
** Theme: Responsive Slider
** Author: Smartaddons
** Version: 1.0
**/
$default = array(
	'category' => $category, 
	'orderby' => $orderby,
	'order' => $order, 
	'numberposts' => $numberposts,
	'meta_query' => array(
				array(
					'key' => 'recommend_checkbox',
					'value' => 'yes'
					)
				)
	);
$list = get_posts($default);
do_action( 'before' ); 
$id = 'sw_reponsive_post_slider_'.rand().time();
if ( count($list) > 0 ){
	$i = 0;
	?>
	<div id="<?php echo esc_attr( $id ) ?>" class="responsive-post-slider17 clearfix" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-dots="false">
		<div class="resp-slider-container">
			<?php if( $title2 != '' ){?>
			<div class="box-title">
				<h3><span><?php echo ( $title2 != '' ) ? $title2 : $term_name; ?></span></h3>
			</div>
			<?php } ?> 
			<div class="slider">
				<?php foreach ($list as $post){ ?>
				<?php if($post->post_content != Null) { ?>
				<div class="item widget-pformat-detail">
					<div class="item-inner">								
						<div class="item-detail">
						
							<?php if( $i == 0 ) : ?>
								<?php 
								$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
								if ( $feat_image_url ){ 
								?>
								<div class="img_over">
									<a href="<?php echo get_permalink($post->ID)?>" >
										<?php 								
											$width  = isset( $img_w ) ? $img_w : 350;
											$height = isset( $img_w ) ? $img_h : 223;
											$crop = isset( $crop ) ? $crop : true;
											$image = sw_image_resize( $feat_image_url, $width, $height, $crop );
											echo '<img src="'. esc_url( $image['url'] ) .'" alt="'. esc_attr( $post->post_title ) .'">';
										?>
									</a>
								</div>
							<?php } ?>
								
							<?php else: ?>
							
							<?php if ( has_post_thumbnail( $post->ID ) ){ ?>
								<div class="img_over">
									<a href="<?php echo get_permalink($post->ID)?>" >
										<?php 
									if ( has_post_thumbnail( $post->ID ) ){
										
											echo get_the_post_thumbnail( $post->ID, array(100,100) ) ? get_the_post_thumbnail( $post->ID, array(100,100) ): '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'large'.'.png" alt="No thumb">';		
									}else{
										echo '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'large'.'.png" alt="No thumb">';
									}
								?></a>
								<?php 
									$review_score = get_post_meta( $post->ID, 'review_input', true );
									if( $review_score ){
									?>
									
									<span class="reivew-score"><?php echo esc_attr( $review_score ); ?></span>
								<?php } ?>
									</div>
							<?php } ?>
							
							<?php endif; ?>
							
							<div class="entry-content">
								<div class="item-title">
									<h4><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title;?></a></h4>
								</div>
								<div class="entry-meta">
									<span class="entry-author"><?php the_author_posts_link(); ?></span>
									<span class="entry-date"><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_date( '', $post->ID );?></a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php $i++; } ?>
			</div>
		</div>
	</div>
	<?php } ?>