<?php 	
	$widget_id = isset( $widget_id ) ? $widget_id : 'category_slide_'.$this->generateID();
	if( $category == '' ){
		return '<div class="alert alert-warning alert-dismissible" role="alert">
			<a class="close" data-dismiss="alert">&times;</a>
			<p>'. esc_html__( 'Please select a category for SW Woocommerce Category Slider. Layout ', 'sw_woocommerce' ) . $layout .'</p>
		</div>';
	}
	$viewall = get_permalink( wc_get_page_id( 'shop' ) );
?>
<div id="<?php echo 'slider_' . $widget_id; ?>" class="sw-category-slider-17 clearfix"  data-append=".resp-slider-container">
	<div class="box-left">
		<?php if( $title1 != '' ){ ?>
		<div class="box-title">
			<h3><span><?php echo $title1; ?></span></h3>
		</div>
		<?php } ?>
		<?php	if( $description != '' ){ ?>
		<div class="description1"><?php echo $description; ?>
		</div>
		<?php } ?>
		<a class="view-all" href="<?php echo esc_url( $viewall ); ?>"><?php echo esc_html__('View all','sw_woocommerce'); ?></a>
	</div>
	<div class="resp-slider-container">
		<div class="slider">
		<?php
			if( !is_array( $category ) ){
				$category = explode( ',', $category );
			}
			$i = 0;
			foreach( $category as $cat ){
				$term = get_term_by('slug', $cat, 'product_cat');	
				if( $term ) :
				$thumbnail_id 	= get_term_meta( $term->term_id, 'thumbnail_id', true );
				$thumb = wp_get_attachment_image( $thumbnail_id,'full', "", array( 'alt' => $term->name ) );
		?>
			<div class="item item-product-cat <?php echo ( $i == 0 ? 'active':''); ?>">
				<div class="item-wrap">
					<div class="item-image">
						<a href="<?php echo get_term_link( $term->term_id, 'product_cat' ); ?>" title="<?php echo esc_attr( $term->name ); ?>"><?php echo $thumb; ?></a>
					</div>
					<div class="item-content">
						<h3><a class="categories <?php echo ( $i == 0 ? 'active':''); ?>" href="<?php echo get_term_link( $term->term_id, 'product_cat' ); ?>"><?php sw_trim_words( $term->name, $title_length ); ?></a></h3>
						<a class="shop-now <?php echo ( $i == 0 ? 'active':''); ?>" href="<?php echo get_term_link( $term->term_id, 'product_cat' ); ?>"><?php echo esc_html__('Shop now','sw_woocommerce'); ?></a>
					</div>
				</div>
			</div>
			<?php endif; ?>
		<?php $i++; } ?>
		</div>
	</div>
</div>		
<script type="text/javascript">
	(function($){
		$(window).on( 'load',function(){
			$('.sw-category-slider-17 .slider .item').on('click', function(e){
				$('.sw-category-slider-17 .slider .item').removeClass("active");
                $('.sw-category-slider-17 .slider .item .categories').removeClass("active");				
                $('.sw-category-slider-17 .slider .item .shop-now').removeClass("active");				
				$(this).addClass("active");	
				$('.categories',this).addClass("active");	
				$('.shop-now',this).addClass("active");	
				e.preventDefault();
			});
			$('.sw-category-slider-17 .slider .item .shop-now').on('click', function(e){
					if($(this).hasClass('active')) {
						var href = $(this).attr('href');
						window.location.href = href;
					}
			});	
			$('.sw-category-slider-17 .slider .item .categories').on('click', function(e){
				if($(this).hasClass('active')) {
					var href = $(this).attr('href');
					window.location.href = href;
				}
			});	
		});
	})(jQuery);
</script>