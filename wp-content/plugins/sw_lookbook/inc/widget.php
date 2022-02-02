<?php 

add_action( 'widgets_init', 'create_lookbook_widget' );
function create_lookbook_widget() {
	register_widget('Lookbook_Widget');
}

class Lookbook_Widget extends WP_Widget {
	
	
	function __construct(){

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'sw_lookbook', 'description' => __('Sw Lookbook', 'sw-lookbook') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sw_lookbook' );

		/* Create the widget. */
		parent::__construct( 'sw_lookbook', __('Sw lookbook widget', 'sw-lookbook'), $widget_ops, $control_ops );

		/* Create Shortcode */
		add_shortcode( 'sw_lookbook', array( $this, 'WS_Shortcode_Lookbook' ) );
		
		/* Create Vc_map */
		if (class_exists('Vc_Manager')) {
			add_action( 'vc_before_init', array( $this, 'WS_LookBook_integrateWithVC' ), 10 );
		}		

	}	
	
	function WS_Shortcode_Lookbook( $atts, $content = null ){
		extract( shortcode_atts(
			array(
				'title1' => '',
				'slide' => '',
				'style' => 'default',
				'layout'  => 'default',
			), $atts )
		);
			ob_start();		
			if( $layout == 'default' ){
				include( plugin_dir_path(dirname(__FILE__)).'inc/themes/default.php' );	
			}
			$content = ob_get_clean();
			
			return $content;
	}	
	
    function get_product_list_as_key_name(){
        global $wpdb;
        $query = "SELECT ID,post_title FROM {$wpdb->prefix}posts where post_type='product' AND post_status='publish'";
        $products_array = $wpdb->get_results( $wpdb->prepare( $query ) );
        return $products_array;
    }	

	function WS_LookBook_integrateWithVC(){
		
		$terms = self::get_slides();
		
		$term = array( __( 'All slide', 'sw-lookbook' ) => 0 );
		if( count( $terms ) > 0 ){			
			foreach( $terms as $item ){
				$term[$item['name']] = $item['id'];
			}
		}		
		
		
		
		vc_map( array(
		  "name" => __( "Sw Lookbook", 'sw-lookbook' ),
		  "base" => "sw_lookbook",
		  "icon" => "icon-wpb-ytc",
		  "class" => "",
		  "category" => __( "SW Shortcodes", 'sw-lookbook' ),
		  "params" => array(
			 array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'sw-lookbook' ),
				"param_name" => "title1",
				"admin_label" => true,
				"value" => '',
				"description" => __( "Title", 'sw-lookbook' )
			 ),
			 array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Slide", 'sw-lookbook' ),
				"param_name" => "slide",
				"admin_label" => true,
				"value" => $term,
				"description" => __( "Select Slide", 'sw-lookbook' )
			 ),					 
			 array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Style", 'sw-lookbook' ),
				"param_name" => "style",
				"admin_label" => true,
				"value" => array( 'Default' => '' ),
				"description" => __( "Select Style", 'sw-lookbook' )
			 ),	
			  array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Layout", 'sw-lookbook' ),
				"param_name" => "layout",
				"admin_label" => true,
				"value" => array( 'Layout Default' => 'default'),
				"description" => __( "Layout", 'sw-lookbook' )
			 ),			 
		  )
	   ) );
	}

	public function get_slides() {
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}swlookbook_slide";
		$result = $wpdb->get_results( $sql, 'ARRAY_A' );
		return $result;
	}		

	function form( $instance ) {
		$defaults 		= array();
		$instance 		= wp_parse_args( (array) $instance, $defaults ); 
		$title1    		= isset( $instance['title1'] )     	? strip_tags($instance['title1']) : ''; 
		$widget_template   = isset( $instance['widget_template'] ) ? strip_tags($instance['widget_template']) : 'default';
		$slide   = isset( $instance['slide'] ) ? strip_tags($instance['slide']) : '';
		$slides_info = self::get_slides();
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'sw-lookbook')?></label>
			<br />
			<input class="widefat" id="<?php echo $this->get_field_id('title1'); ?>" name="<?php echo $this->get_field_name('title1'); ?>"
				type="text"	value="<?php echo esc_attr($title1); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('widget_template'); ?>"><?php _e("Template", 'sw-lookbook')?></label>
			<br/>
			
			<select class="widefat"
				id="<?php echo $this->get_field_id('widget_template'); ?>"	name="<?php echo $this->get_field_name('widget_template'); ?>">
				<option value="default" <?php if ($widget_template=='default'){?> selected="selected"
				<?php } ?>>
					<?php _e('Default', 'sw-lookbook')?>
				</option>			
			</select>
		</p> 
		<p>
			<label for="<?php echo $this->get_field_id('widget_template'); ?>"><?php _e("Slide", 'sw-lookbook')?></label>
			<br/>
			
			<select class="widefat" id="<?php echo $this->get_field_id('slide'); ?>"	name="<?php echo $this->get_field_name('slide'); ?>">
			    <?php foreach($slides_info as $item): ?>
				<option value="<?php echo $item['id']; ?>" <?php if ($slide==$item['id']){?> selected="selected" <?php } ?>>
					<?php echo $item['name']; ?>
				</option>	
				<?php endforeach; ?>	
			</select>
		</p>		
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title1'] = strip_tags( $new_instance['title1'] );
		$instance['widget_style'] = strip_tags( $new_instance['widget_style'] );
		$instance['widget_template'] = strip_tags( $new_instance['widget_template'] );
		$instance['slide'] = strip_tags( $new_instance['slide'] );
		return $instance;
	}
	
	public function get_lookbook($id) {
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}swlookbook";
		$sql .= ' WHERE id = '.$id;
		$result = $wpdb->get_results( $sql, 'ARRAY_A' );
		return $result;
	}

	public function get_slide($id) {
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}swlookbook_slide";
		$sql .= ' WHERE id = '.$id;
		$result = $wpdb->get_results( $sql, 'ARRAY_A' );
		return $result;
	}		
	
	public function getProductInfo($product_id, $sku) {
	    $int = wc_get_product_id_by_sku( $sku );
		if($int) {
			$product = wc_get_product( $int );
		}
        return $product;	
	}

	public function getProduct_id($product_id) {
		$product = wc_get_product( $product_id );
  		
        return $product;	
	}	
	
	public function pinHtmlMobile($resultckl) {
		$pins = $resultckl['pins'];
		$pins = str_replace('\"', '"', $pins);
		$arrPin = json_decode($pins, true);
		$html = '';
		$height = get_option( 'swlookbook_show_height_of_pin' );
		$width = get_option( 'swlookbook_show_width_of_pin' );	

		$background = get_option( 'swlookbook_show_background_color_for_pin' );
		$color = get_option( 'swlookbook_show_text_color_for_pin' );
		$productImageWidth = get_option( 'swlookbook_show_width_of_product_image_on_popup' );
		$productImageHeight = get_option( 'swlookbook_show_height_of_product_image_on_popup' );
		$radius = round($width/2);
		
		if(count($arrPin)>0) {
			foreach($arrPin as $pin) {
				$imgWidth = $pin['imgW'];
				$imgHeight = $pin['imgH'];
				$top = $pin['top'];
				$left = $pin['left'];
				$leftPercent = ($left * 100)/$imgWidth;
				$topPercent = ($top * 100)/$imgHeight;
				$html .= '<div class="pin__type_mobile" >';

				$html .= '<div class="col-4 text-center"><div class="pin-label_mobile">'. $pin['label'] .'</div></div>';

				if(trim($pin['custom_text'])!='') {
					if(trim($pin['custom_label'])!=''){
						$pinTitle = $pin['custom_label']; 
					}elseif($product = self::getProductInfo(false, $pin['text'])){
						$pinTitle = $product->get_name();
					}
					$html .= '<div class="pin__title_mobile col-7">'.$pinTitle.'</div>';
				}
				else {
					if ($product = self::getProductInfo(false, $pin['text'])){
						$href = $product->get_permalink();
						// Product Name - Tooltip
						$html .= '<div class="col-7 popup__content_mobile" >';
						$html .= '<div class="popup__content popup__content--product ">';
						// Product Image
						$productImageUrl = '';
						if ($product->get_image()) {
							$productImageUrl = $product->get_image();
						}						
						$html .= '<a href="'.$href.'">'.$productImageUrl.'</a>';
						// Product Name
						$html .= '<h4><a href="'.$href.'">'.$product->get_name().'</a></h4>';
						$price = $product->get_price_html();
						
						if ($price) {
							$html .= '<p class="price">';
							$html .= $price;
							$html .= '</p>';
						}	
						// Links
						$html .= '<div><a href="'.$href.'">'.esc_html__( 'Detail','sw-lookbook').'</a>';	
						// Add Cart
						$html .= '<a href="'. $product->add_to_cart_url() .'" class="action tocart primary"><i class="fa fa-shopping-cart"></i> <span>'.esc_html__( 'Add to cart','sw-lookbook').'</span></a>';

						$html .= '</div></div></div>';					
					}
				}
				$html .= '</div>';
            }				
		}
		return $html;
	}
	
	
    public function getPinHtml($resultckl) {
		$pins = $resultckl['pins'];
		$pins = str_replace('\"', '"', $pins);
		$arrPin = json_decode($pins, true);
		$html = '';
		$height = get_option( 'swlookbook_show_height_of_pin' );
		$width = get_option( 'swlookbook_show_width_of_pin' );	

		$background = get_option( 'swlookbook_show_background_color_for_pin' );
		$color = get_option( 'swlookbook_show_text_color_for_pin' );
		$productImageWidth = get_option( 'swlookbook_show_width_of_product_image_on_popup' );
		$productImageHeight = get_option( 'swlookbook_show_height_of_product_image_on_popup' );
		$radius = round($width/2);
		
		if(count($arrPin)>0) {
			foreach($arrPin as $pin) {
				$imgWidth = $pin['imgW'];
				$imgHeight = $pin['imgH'];
				$top = $pin['top'];
				$left = $pin['left'];
				$leftPercent = ($left * 100)/$imgWidth;
				$topPercent = ($top * 100)/$imgHeight;
				$html .= '<div class="pin__type pin__type--area" style="width:'. $pin['width'] .'px; height:'. $pin['height'] .'px; background:#'. $background .'; color:#'. $color .'; -webkit-border-radius:'. $radius .'px; -moz-border-radius:'. $radius .'px; border-radius:'. $radius .'px; line-height:'. $height .'px; left:'. $leftPercent .'%; top:'. $topPercent .'%">';

				$html .= '<span class="pin-label">'. $pin['label'] .'</span>';
				if(trim($pin['custom_text'])!='') {
					if(trim($pin['custom_label'])!=''){
						$pinTitle = $pin['custom_label']; 
					}elseif($product = self::getProductInfo(false, $pin['text'])){
						$pinTitle = $product->get_name();
					}
					//$html .= '<div class="pin__title">'.$pinTitle.'</div>';
					$html .= '<div class="pin__popup pin__popup--'.$pin['position'].' pin__popup--fade pin__popup_text_content" style="width:'.($productImageWidth + 30).'px"><div class="popup__title">'.$pinTitle.'</div><div class="popup__content">'.$pin['custom_text'].'</div></div>';
				}
				else {
					if ($product = self::getProductInfo(false, $pin['text'])) {
						$href = $product->get_permalink();
						// Product Name - Tooltip
						$html .= '<div class="pin__title">'.$product->get_name().'</div>';
						$html .= '<div class="pin__popup pin__popup--'.$pin['position'].' pin__popup--fade" style="width:'. (int)($productImageWidth + 30) .'px">';
						$html .= '<div class="popup__content popup__content--product">';	
						// Product Image
						$productImageUrl = '';
						if ($product->get_image()) {
							$productImageUrl = $product->get_image();
						}			
						$html .= '<a href="'.$href.'">'.$productImageUrl.'</a>';
						// Product Name
						$html .= '<h4><a href="'.$href.'">'.$product->get_name().'</a></h4>';
						$price = $product->get_price_html();
						if ($price) {
							$html .= '<p class="price">';	
							$html .= $price;
							$html .= '</p>';
						}		
						// Links
						$html .= '<div><a href="'.$href.'">'.esc_html__( 'Detail','sw-lookbook').'</a>';	
						// Add Cart
						$html .= '<a href="'. $product->add_to_cart_url() .'" class="action tocart primary"><i class="fa fa-shopping-cart"></i> <span>'.esc_html__( 'Add to cart','sw-lookbook').'</span></a>';

						$html .= '</div>';
						$html .= '<div class="close-popup">'.esc_html__( 'Close','sw-lookbook').'</div>';
						$html .= '</div></div>';						
					}
				}

                $html .= '</div>';				
			}
		}
		return $html;

    }	

	public function widget( $args, $instance ) {
		extract($args);
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		echo $before_widget;
		
		extract($instance);
			if ( !array_key_exists('widget_template', $instance) ){
				$instance['widget_template'] = 'default';
			}
			
			if ( $tpl = $this->getTemplatePath( $instance['widget_template'] ) ){ 
				$link_img = plugins_url('images/', __FILE__);
				$widget_id = $args['widget_id'];		
				include $tpl;
			}

				
		/* After widget (defined by themes). */
		echo $after_widget;
	}  

		protected function getTemplatePath($tpl='default', $type=''){
			$file = '/'.$tpl.$type.'.php';
			$dir =realpath(dirname(__FILE__)).'/themes';
			if ( file_exists( $dir.$file ) ){
				
				return $dir.$file;
			}
			
			return $tpl=='default' ? false : $this->getTemplatePath('default', $type);
		}

}