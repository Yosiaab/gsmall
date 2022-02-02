<?php 

function swlookbook_plugin_tool_override_check( $path, $file ){
	$paths = '';

	if( locate_template( 'sw-lookbook/'.$path . '/' . $file . '.php' ) ){
		$paths = locate_template( 'sw-lookbook/'.$path . '/' . $file . '.php' );		
	}else{
		$paths = SWLOOKBOOKTHEME . '/' . $path . '/' . $file . '.php';
	}
	
	return $paths;
}

function swlookbook_prefix_admin_load_product_url(){ 
		
		$sku= $_GET['term'];
		
		$int = wc_get_product_id_by_sku( $sku );
		if($int) {
			$product = wc_get_product( $int );
			
			$responseData = array();
				$responseData[] = array(
					'id'	=> $int,
					'label'	=> $product->get_sku(),
					'value'	=> $product->get_sku()
				);
			print_r(json_encode($responseData));			
		}
}
add_action( 'admin_post_load_product_url', 'swlookbook_prefix_admin_load_product_url' );
add_action( 'admin_post_nopriv_load_product_url', 'swlookbook_prefix_admin_load_product_url' );

function swlookbook_prefix_admin_check_product_url(){ 
    	$product_id = 0;
    	$sku = $_POST['text'];
    	$defaultPinText = '+';
    	$labelPost = $_POST['label'];
        if($sku!=''){
			$int = wc_get_product_id_by_sku( $sku );
				if($int) {
				$product = wc_get_product( $int );	
				$result['label'] = 0;
				$status = $product->get_status();
				$show_use_product_price_for_pin_text = get_option( 'swlookbook_show_use_product_price_for_pin_text' );
				if ($show_use_product_price_for_pin_text == 'on'){
					$price = $product->get_price();
					
					$result['label'] = get_woocommerce_currency_symbol().$price;
					if($labelPost != ''){
						if ($show_use_product_price_for_pin_text == 'on' && ($labelPost != $price)){
							$result['label'] = $labelPost;
						}
					}					
				}
				else {
					if($labelPost!=''){
						$result['label'] = $labelPost;
					}else{
						$result['label'] = $defaultPinText;
					}				
				}				
			}
		}
    	if ($int) {
			if ($status=='publish') {
			  $result['status'] = 1;
			} else {
			  $result['status'] = "is disabled";  
			}
		} else {
			$result['status'] = "doesn't exists"; 
			if ($labelPost!=''){
				$result['label'] = $labelPost;
			}else{
				$result['label'] = $defaultPinText;
			}
		}
		print_r(json_encode($result));
}
add_action( 'admin_post_check_product_url', 'swlookbook_prefix_admin_check_product_url' );
add_action( 'admin_post_nopriv_check_product_url', 'swlookbook_prefix_admin_check_product_url' );


function swlookbook_prefix_admin_add_lookbook(){ 
		$show_status = '1';
		if(isset($_POST['show_status'])) {
			$show_status = sanitize_text_field($_POST['show_status']);
		}

		if(isset($_POST['show_product'])) {
			$show_product = sanitize_text_field($_POST['show_product']);
		}
		if(isset($_POST['show_lookbook_name'])) {
			$show_lookbook_name = sanitize_text_field($_POST['show_lookbook_name']);
		}		
		if(isset($_POST['swlookbook_image'])) {
			$swlookbook_image = sanitize_text_field($_POST['swlookbook_image']);
		}	
		if(isset($_POST['pins'])) {
			$pins = sanitize_text_field($_POST['pins']);
		}	
		
		if(!empty($_POST['show_lookbook_name']) && !empty($_POST['pins'])) {
			global $wpdb;
			if(empty($_POST['lookbook_id'])) {
				$wpdb->insert( 
					$wpdb->prefix. 'swlookbook', 
					array( 
						'status' => $show_status,
						'name' => $show_lookbook_name, 
						'product_id_lookbook' => $show_product, 
						'image' => $swlookbook_image,
						'pins' => $pins,
					),
					array('%s', '%s', '%s', '%s' )
				);	
			} else {			
				$wpdb->update($wpdb->prefix. 'swlookbook',
   				    array(
						'status' => $show_status,
						'name' => $show_lookbook_name, 
						'product_id_lookbook' => $show_product, 
						'image' => $swlookbook_image,
						'pins' => $pins
					),
					array('id'=>$_POST['lookbook_id']),
					array('%s', '%s', '%s', '%s', '%s' )
				);
			}
			header("Location:../wp-admin/admin.php?page=wp_manager_lookbook_class");		
		}else {
			header("Location:../wp-admin/admin.php?page=wp_add_lookbook_class");
		}	

}
add_action( 'admin_post_add_lookbook', 'swlookbook_prefix_admin_add_lookbook' );
add_action( 'admin_post_nopriv_add_lookbook', 'swlookbook_prefix_admin_add_lookbook' );

	
add_action( 'admin_post_delete_slider', 'swlookbook_prefix_admin_delete_slider' );
add_action( 'admin_post_nopriv_delete_slider', 'swlookbook_prefix_admin_delete_slider' );	
function swlookbook_prefix_admin_delete_slider() {
	
	$id = $_REQUEST['id'];
	global $wpdb;

	$wpdb->delete(

		"{$wpdb->prefix}swlookbook_slide",

		[ 'id' => $id ],

		[ '%d' ]

	);
    header("Location:../wp-admin/admin.php?page=wp_manager_slider_class");	
}	

function swlookbook_prefix_admin_add_slider(){ 

		$show_status = '1';
		if(isset($_POST['show_status'])) {
			$show_status = sanitize_text_field($_POST['show_status']);
		}
		
		$show_custom_class = '';
		if(isset($_POST['show_custom_class'])) {
			$show_custom_class = sanitize_text_field($_POST['show_custom_class']);
		}		

		if(isset($_POST['show_slide_name'])) {
			$show_slide_name = sanitize_text_field($_POST['show_slide_name']);
		}
		if(isset($_POST['show_navigation'])) {
			$show_navigation = sanitize_text_field($_POST['show_navigation']);
		}	
		if(isset($_POST['show_pagination'])) {
			$show_pagination = sanitize_text_field($_POST['show_pagination']);
		}
		if(isset($_POST['show_autoplay'])) {
			$show_autoplay = sanitize_text_field($_POST['show_autoplay']);
		}
		if(isset($_POST['show_autoplay_interval_timeout'])) {
			$show_autoplay_interval_timeout = sanitize_text_field($_POST['show_autoplay_interval_timeout']);
		}
		if(isset($_POST['show_pause_on_mouse_hover'])) {
			$show_pause_on_mouse_hover = sanitize_text_field($_POST['show_pause_on_mouse_hover']);
		}	
		if(isset($_POST['show_infinity_loop'])) {
			$show_infinity_loop = sanitize_text_field($_POST['show_infinity_loop']);
		}

		if(isset($_POST['checkbox_lookbook'])) {
			$checkbox_lookbook = sanitize_text_field(json_encode (json_encode ($_POST['checkbox_lookbook']), FALSE));
		}		
		if(isset($_POST['position_lookbook'])) {
			$position_lookbook = sanitize_text_field(json_encode (json_encode ($_POST['position_lookbook']), FALSE));
		}	
	
	if(!empty($_POST['show_slide_name'])) {	
			global $wpdb;
			if(empty($_POST['slide_id'])) {
				$wpdb->insert( 
					$wpdb->prefix. 'swlookbook_slide', 
					array( 
						'status' => $show_status,
						'name' => $show_slide_name, 
						'custom_class' => $show_custom_class,
						'show_navigation' => $show_navigation,
						'show_pagination' => $show_pagination,
						'autoplay' => $show_autoplay, 
						'timeout' => $show_autoplay_interval_timeout,
						'pause' => $show_pause_on_mouse_hover,	
						'infinity_loop' => $show_infinity_loop,
						'checkbox_lookbook' => $checkbox_lookbook,
						'position_lookbook' => $position_lookbook,								
					),
					array('%s', '%s', '%s', '%s' , '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')
				);	
			} else {			
				$wpdb->update($wpdb->prefix. 'swlookbook_slide',
   				    array(
						'status' => $show_status,
						'name' => $show_slide_name, 
						'custom_class' => $show_custom_class,
						'show_navigation' => $show_navigation,
						'show_pagination' => $show_pagination,
						'autoplay' => $show_autoplay, 
						'timeout' => $show_autoplay_interval_timeout,
						'pause' => $show_pause_on_mouse_hover,	
						'infinity_loop' => $show_infinity_loop,
						'checkbox_lookbook' => $checkbox_lookbook,
						'position_lookbook' => $position_lookbook,
					),
					array('id'=>$_POST['slide_id']),
					array('%s', '%s', '%s', '%s' , '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')
				);
			}	
		header("Location:../wp-admin/admin.php?page=wp_manager_slider_class");		
	} else {
		header("Location:../wp-admin/admin.php?page=wp_add_slider_class");
	}
	
}
add_action( 'admin_post_add_slider', 'swlookbook_prefix_admin_add_slider' );
add_action( 'admin_post_nopriv_add_slider', 'swlookbook_prefix_admin_add_slider' );

function swlookbook_prefix_admin_setting_lookbook(){ 
	
		
		$show_status = '1';
		if(isset($_POST['show_status'])) {
			$show_status = sanitize_text_field($_POST['show_status']);
		}
		$show_click_or_hover = '1';
		if(isset($_POST['show_click_or_hover'])) {
			$show_click_or_hover = sanitize_text_field($_POST['show_click_or_hover']);
		}		
		$show_minimal_image_width = '300';
		if(isset($_POST['show_minimal_image_width'])) {
			$show_minimal_image_width = sanitize_text_field($_POST['show_minimal_image_width']);
		}
		$show_minimal_image_height = '400';
		if(isset($_POST['show_minimal_image_height'])) {
			$show_minimal_image_height = sanitize_text_field($_POST['show_minimal_image_height']);
		}		
		$show_maximal_image_width = '1920';
		if(isset($_POST['show_maximal_image_width'])) {
			$show_maximal_image_width = sanitize_text_field($_POST['show_maximal_image_width']);
		}
		$show_maximal_image_height = '1360';
		if(isset($_POST['show_maximal_image_height'])) {
			$show_maximal_image_height = sanitize_text_field($_POST['show_maximal_image_height']);
		}			
		$show_height_of_pin = '40';
		if(isset($_POST['show_height_of_pin'])) {
			$show_height_of_pin = sanitize_text_field( $_POST['show_height_of_pin']);
		}
		$show_width_of_pin = '40';
		if(isset($_POST['show_width_of_pin'])) {
			$show_width_of_pin = sanitize_text_field( $_POST['show_width_of_pin']);
		}		
		$show_default_text_for_pin = '+';
		if(isset($_POST['show_default_text_for_pin'])) {
			$show_default_text_for_pin = sanitize_text_field( $_POST['show_default_text_for_pin']);
		}
		$show_use_product_price_for_pin_text = 'on';
		if(isset($_POST['show_use_product_price_for_pin_text'])) {
			$show_use_product_price_for_pin_text = sanitize_text_field( $_POST['show_use_product_price_for_pin_text']);
		}
		$show_background_color_for_pin = '65affa';
		if(isset($_POST['show_background_color_for_pin'])) {
			$show_background_color_for_pin = sanitize_text_field( $_POST['show_background_color_for_pin']);
		}
		$show_text_color_for_pin = 'ffffff';
		if(isset($_POST['show_text_color_for_pin'])) {
			$show_text_color_for_pin = sanitize_text_field( $_POST['show_text_color_for_pin']);
		}
		$show_width_of_product_image_on_popup = '240';
		if(isset($_POST['show_width_of_product_image_on_popup'])) {
			$show_width_of_product_image_on_popup = sanitize_text_field( $_POST['show_width_of_product_image_on_popup']);
		}
		$show_height_of_product_image_on_popup = '320';
		if(isset($_POST['show_height_of_product_image_on_popup'])) {
			$show_height_of_product_image_on_popup = sanitize_text_field( $_POST['show_height_of_product_image_on_popup']);
		}		
		$show_navigation = 'on';
		if(isset($_POST['show_navigation'])) {
			$show_navigation = sanitize_text_field( $_POST['show_navigation']);
		}				
		$show_pagination = 'on';
		if(isset($_POST['show_pagination'])) {
			$show_pagination = sanitize_text_field( $_POST['show_pagination']);
		}
		$show_autoplay = 'on';
		if(isset($_POST['show_autoplay'])) {
			$show_autoplay = sanitize_text_field( $_POST['show_autoplay']);
		}	
		$show_autoplay_interval_timeout = '5000';
		if(isset($_POST['show_autoplay_interval_timeout'])) {
			$show_autoplay_interval_timeout = sanitize_text_field( $_POST['show_autoplay_interval_timeout']);
		}	
		$show_pause_on_mouse_hover = 'on';
		if(isset($_POST['show_pause_on_mouse_hover'])) {
			$show_pause_on_mouse_hover = sanitize_text_field( $_POST['show_pause_on_mouse_hover']);
		}	
		$show_infinity_loop = 'on';
		if(isset($_POST['show_infinity_loop'])) {
			$show_infinity_loop = sanitize_text_field( $_POST['show_infinity_loop']);
		}	
	   
	    update_option( 'swlookbook_show_status', $show_status );
		update_option( 'swlookbook_show_click_or_hover', $show_click_or_hover );
		update_option( 'swlookbook_show_minimal_image_width', $show_minimal_image_width );
		update_option( 'swlookbook_show_minimal_image_height', $show_minimal_image_height );
		update_option( 'swlookbook_show_maximal_image_width', $show_maximal_image_width );
		update_option( 'swlookbook_show_maximal_image_height', $show_maximal_image_height );
		update_option( 'swlookbook_show_height_of_pin', $show_height_of_pin );
		update_option( 'swlookbook_show_width_of_pin', $show_width_of_pin );
		update_option( 'swlookbook_show_default_text_for_pin', $show_default_text_for_pin );		
		update_option( 'swlookbook_show_use_product_price_for_pin_text', $show_use_product_price_for_pin_text );
		update_option( 'swlookbook_show_background_color_for_pin', $show_background_color_for_pin );
		update_option( 'swlookbook_show_text_color_for_pin', $show_text_color_for_pin );
		update_option( 'swlookbook_show_width_of_product_image_on_popup', $show_width_of_product_image_on_popup );	
		update_option( 'swlookbook_show_height_of_product_image_on_popup', $show_height_of_product_image_on_popup );
		update_option( 'swlookbook_show_navigation', $show_navigation );
		update_option( 'swlookbook_show_pagination', $show_pagination );
		update_option( 'swlookbook_show_autoplay', $show_autoplay );	
		update_option( 'swlookbook_show_autoplay_interval_timeout', $show_autoplay_interval_timeout );
		update_option( 'swlookbook_show_pause_on_mouse_hover', $show_pause_on_mouse_hover );
		update_option( 'swlookbook_show_infinity_loop', $show_infinity_loop );	

   
    header("Location:../wp-admin/admin.php?page=wp_setting_lookbook_class");
}
add_action( 'admin_post_setting_lookbook', 'swlookbook_prefix_admin_setting_lookbook' );
add_action( 'admin_post_nopriv_setting_lookbook', 'swlookbook_prefix_admin_setting_lookbook' ); // this is for non logged users