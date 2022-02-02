<?php
    $title = apply_filters( 'widget_title', $instance['title1'] );
	$result = self::get_slide($slide);
    $checkbox_lookbooks = array();
    $checkbox_lookbook = json_decode (json_decode ($result[0]['checkbox_lookbook']), FALSE)	;
	$position_lookbook = json_decode (json_decode ($result[0]['position_lookbook']), FALSE)	;
	
	if($result[0]['autoplay'] == 'on') {
		$result[0]['autoplay'] = 'true';
	}
	else {
		$result[0]['autoplay'] = 'false';
	}
	if($result[0]['infinity_loop'] == 'on') {
		$result[0]['infinity_loop'] = 'true';
	}
	else {
		$result[0]['infinity_loop'] = 'false';
	}	
	
	if($result[0]['pause'] == 'on') {
		$result[0]['pause'] = 'true';
	}
	else {
		$result[0]['pause'] = 'false';
	}
	
	if($result[0]['show_pagination'] == 'on') {
		$result[0]['show_pagination'] = 'false';
	}
	else {
		$result[0]['show_pagination'] = 'false';
	}	

	if($result[0]['show_navigation'] == 'on') {
		$result[0]['show_navigation'] = 'true';
	}
	else {
		$result[0]['show_navigation'] = 'false';
	}		
	
	foreach($checkbox_lookbook as $ckl) {
		$ckl = array_values(get_object_vars($ckl));	
		$resultckl = self::get_lookbook($ckl[0]); 
        if(!empty($resultckl[0]['product_id_lookbook'])) {
     	
        	$productCk = self::getProduct_id( $resultckl[0]['product_id_lookbook'] );
        	$resultckl[0]['price'] = $productCk->get_price_html();
        }
		
        
		$resultckl[0]['pinHtml'] = self::getPinHtml($resultckl[0]);
		$resultckl[0]['pinHtmlMobile'] = self::pinHtmlMobile($resultckl[0]);
		foreach($position_lookbook as $pl) {
			$pl = get_object_vars($pl);		
			$resultckl[0]['position'] = 0;
            if($pl[$resultckl[0]['id']]) {				
				$resultckl[0]['position'] = $pl[$resultckl[0]['id']];			
			}
		}
		if ($resultckl[0]['status'] == 1) {
			if(!isset($checkbox_lookbooks[$resultckl[0]['position']])) {
			    $checkbox_lookbooks[$resultckl[0]['position']] = $resultckl[0];	
            }	
			else {
				$checkbox_lookbooks[] = $resultckl[0];	
			}
		}
        
	}
    ksort($checkbox_lookbooks);
?>
	<div class="sw-lookbook-slider pm-slick" id="so_lookbook_slider_<?php echo $result[0]['id'] ?>" data-show-pin="<?php echo get_option( 'swlookbook_show_click_or_hover' ); ?>">
		<?php foreach($checkbox_lookbooks as $item): ?>
			<div class="sw-lookbook-container">
				<div class="sw-lookbook-container__item">
					<div class="pin__image">
						<img src="<?php echo $item['image'] ?>" alt="<?php echo $item['name'] ?>" class="sw-lookbook-image img-responsive" />
					</div>
					<?php echo $item['pinHtml'] ?>
					<?php echo $item['pinHtmlMobile'] ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>	
	
<script type="text/javascript">

    jQuery(document).ready(function ($) {
		$('#so_lookbook_slider_<?php echo $result[0]['id'] ?>').slick({
			items: 1,
			arrows: <?php echo $result[0]['show_navigation'] ?>,	
			loop: <?php echo $result[0]['infinity_loop'] ?>,	
			dots: <?php echo $result[0]['show_pagination'] ?>,
			autoplay: <?php echo $result[0]['autoplay'] ?>,	
			autoplaySpeed: <?php echo $result[0]['timeout'] ?>,	
			pauseOnHover:<?php echo $result[0]['pause'] ?>,	
			prevArrow:"<button type='button' class='slick-prev pull-left'></button>",
			nextArrow:"<button type='button' class='slick-next pull-right'></button>",
		});
	});	
</script>	