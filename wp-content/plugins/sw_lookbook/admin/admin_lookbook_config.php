<?php 

class SW_LOOKBOOK {

	// class instance
	static $instance;
	// customer WP_List_Table object
	public $customers_obj;

	// class constructor
	public function __construct() {
		add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
		add_action( 'admin_menu', [ $this, 'plugin_menu' ] );	
	}

	public static function set_screen( $status, $option, $value ) {
		return $value;
	}

	public function plugin_menu() {


		$hook = add_menu_page(
			esc_html__( 'SW LookBook','sw-lookbook'),
			esc_html__( 'SW LookBook','sw-lookbook'),
			0,
			'wp_setting_lookbook_class',
			[ $this, 'plugin_settings_page' ]
		);
		
		$subSliderLookBook = add_submenu_page(
		    'wp_setting_lookbook_class',
			esc_html__( 'Manager Slider','sw-lookbook'),
			esc_html__( 'Manager Slider','sw-lookbook'),
			0,
			'wp_manager_slider_class',
			[ $this, 'plugin_manager_slider' ]
		);			
		
		$subAddSliderLookBook = add_submenu_page(
		    'wp_setting_lookbook_class',
			esc_html__( 'Add Slider','sw-lookbook'),
			esc_html__( 'Add Slider','sw-lookbook'),
			0,
			'wp_add_slider_class',
			[ $this, 'plugin_add_slider' ]
		);			
		
		$subManagerLookBook = add_submenu_page(
		    'wp_setting_lookbook_class',
			esc_html__( 'Manager LookBook','sw-lookbook'),
			esc_html__( 'Manager LookBook','sw-lookbook'),
			0,
			'wp_manager_lookbook_class',
			[ $this, 'plugin_manager_lookbook' ]
		);	
		
		$subAddLookBook = add_submenu_page(
		    'wp_setting_lookbook_class',
			esc_html__( 'Add LookBook', 'textdomain' ),
			esc_html__( 'Add LookBook', 'textdomain' ),
			0,
			'wp_add_lookbook_class',
			[ $this, 'plugin_add_lookbook' ]
		);		
		
		add_action( "load-$subManagerLookBook", [ $this, 'screen_option' ] );
	}

	/** Singleton instance */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
	
	public function screen_option() {



		$option = 'per_page';

		$args   = [

			'label'   => esc_html__( 'Lookbook', 'sw-lookbook' ),

			'default' => 5,

			'option'  => 'contact_per_page'

		];



		add_screen_option( $option, $args );



		$this->customers_obj = new sw_lookbook_table();

	}
	
	public function get_slides() {
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}swlookbook_slide";
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

	public function plugin_manager_slider() {
			$slides_info = self::get_slides();
        ?>
		<div class="wrap">
		    <a href="?page=wp_add_slider_class"class="button button-primary "><?php echo esc_html__( 'Add Slider','sw-lookbook'); ?></a>
			<table class="wp-list-table widefat fixed striped table-view-list manager_slider_table">
				<thead>
					<tr>
						<th><?php echo esc_html__( 'Id','sw-lookbook'); ?></th>
						<th><?php echo esc_html__( 'Name','sw-lookbook'); ?></th>
						<th><?php echo esc_html__( 'Status','sw-lookbook'); ?></th>
						<th><?php echo esc_html__( 'Edit','sw-lookbook'); ?></th>
						<th><?php echo esc_html__( 'Delete','sw-lookbook'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($slides_info as $count => $item) : ?>
						<tr>
							<td><?php echo $item['id']; ?></td>
							<td><?php echo $item['name']; ?></td>
							<td><?php 
								if($item['status'] == 1) {
									$status = esc_html__( 'on', 'sw-lookbook' );
								}
								else {
									$status = esc_html__( 'off', 'sw-lookbook' );
								}
								echo stripslashes( $status )
							?></td>
							<td><a href="?page=wp_add_slider_class&id=<?php echo $item['id']; ?>"><?php echo esc_html__( 'Edit','sw-lookbook'); ?></a></td>
							<td><a href="admin-post.php?action=delete_slider&id=<?php echo $item['id']; ?>"><?php echo esc_html__( 'Delete','sw-lookbook'); ?></a></td>
						</tr>	
					<?php endforeach; ?>	
				</tbody>
			</table>	
		</div>	
        <?php
	}	
	
	public function plugin_add_slider() {
		
		if (isset($_GET['id'])) {
			
			$slide_info = self::get_slide($_GET['id']);
			
		    if (!empty($slide_info[0])) {
				$show_custom_class = $slide_info[0]['custom_class'];
				$show_slide_name = $slide_info[0]['name'];
				$status = $slide_info[0]['status'];
				$slide_id = $slide_info[0]['id'];
				$show_navigation = $slide_info[0]['show_navigation'];
				$show_pagination = $slide_info[0]['show_pagination'];
				$show_autoplay = $slide_info[0]['autoplay'];
				$show_autoplay_interval_timeout = $slide_info[0]['timeout'];
				$show_pause_on_mouse_hover = $slide_info[0]['pause'];
				$show_infinity_loop = $slide_info[0]['infinity_loop'];
				
                $checkbox_lookbook = json_decode (json_decode ($slide_info[0]['checkbox_lookbook']), FALSE)	;
				$position_lookbook = json_decode (json_decode ($slide_info[0]['position_lookbook']), FALSE)	;
				
			}
		} else {
			$show_custom_class = '';
			$show_slide_name = '';
			$status = 1;
		    $slide_id = '';
			$show_navigation = get_option( 'swlookbook_show_navigation' );
			$show_pagination = get_option( 'swlookbook_show_pagination' );
			$show_autoplay = get_option( 'swlookbook_show_autoplay' );
			$show_autoplay_interval_timeout = get_option( 'swlookbook_show_autoplay_interval_timeout' );
			$show_pause_on_mouse_hover = get_option( 'swlookbook_show_pause_on_mouse_hover' );
			$show_infinity_loop = get_option( 'swlookbook_show_infinity_loop' );
            $checkbox_lookbook = array();	
			$position_lookbook = array();	
		}		
	
		
		?>
		<div class="wrap">
			<h2><?php echo esc_html__( 'SW LookBook Configuration','sw-lookbook'); ?></h2>
			<div id="poststuff">
				<div id="post-body" class="metabox-holder">
					<div id="post-body-content">
						<div class="meta-box-sortables ui-sortable">
							<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>?action=add_slider" method="post" enctype="multipart/form-data">   			
                            <input id="slide_id" name="slide_id"  value='<?php echo $slide_id ?>' type="hidden" />
							<ul class="nav nav-tabs">
								<li class="nav-item">
								  <a class="nav-link active" href="#home"><?php echo esc_html__( 'General Information','sw-lookbook'); ?></a>
								</li>
								<li class="nav-item">
								  <a class="nav-link" href="#menu1"><?php echo esc_html__( 'Slides','sw-lookbook'); ?></a>
								</li>
							</ul>

						  <!-- Tab panes -->
							<div class="tab-content">
								<div id="home" class="container tab-pane active"><br>
									<table class="form-table">
										<tbody>
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Slide Name','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_slide_name" name="show_slide_name" value="<?php echo esc_attr($show_slide_name); ?>" required>
													</label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Custom Class','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_custom_class" name="show_custom_class" value="<?php echo esc_attr($show_custom_class); ?>">
													</label>
												</td>
											</tr>											
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Show navigation','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_navigation" name="show_navigation" <?php checked( $show_navigation, 'on' ); ?>>
													</label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Show pagination','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_pagination" name="show_pagination" <?php checked( $show_pagination, 'on' ); ?>>
													</label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Autoplay','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_autoplay" name="show_autoplay" <?php checked( $show_autoplay, 'on' ); ?>>
													</label>
												</td>
											</tr>
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Autoplay interval timeout','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_autoplay_interval_timeout" placeholder="<?php echo esc_html__( 'Blank to use general config','sw-lookbook'); ?>" name="show_autoplay_interval_timeout" value="<?php echo esc_attr($show_autoplay_interval_timeout); ?>">
														<?php echo esc_html__( 'ms','sw-lookbook'); ?>
													</label>
												</td>
											</tr>
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Pause on mouse hover','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_pause_on_mouse_hover" name="show_pause_on_mouse_hover" <?php checked( $show_pause_on_mouse_hover, 'on' ); ?>>
													</label>
												</td>
											</tr>
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Infinity loop','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_infinity_loop" name="show_infinity_loop" <?php checked( $show_infinity_loop, 'on' ); ?>>
													</label>
												</td>
											</tr>		
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Status','sw-lookbook'); ?></th>
												<td>
													<select id="show_status" name="show_status" style="padding-right: 30px;">
														<option value="1" <?php if ($status == 1): ?> selected="selected" <?php endif; ?> ><?php echo esc_html__( 'Enabled','sw-lookbook'); ?></option>
														<option value="0" <?php if ($status == 0): ?> selected="selected" <?php endif; ?>><?php echo esc_html__( 'Disabled','sw-lookbook'); ?></option>
													</select>
												</td>
											</tr>												
										</tbody>
									</table>
								</div>
								<div id="menu1" class="container tab-pane fade"><br>
									<?php
											    $lookbook_info = self::get_lookbooks();
									?>								
									<table class="wp-list-table widefat fixed striped table-view-list ">
									    <thead>
											<tr>
											    <th></th>
											    <th><?php echo esc_html__( 'Id','sw-lookbook'); ?></th>
												<th><?php echo esc_html__( 'Image','sw-lookbook'); ?></th>
												<th><?php echo esc_html__( 'Name','sw-lookbook'); ?></th>
												<th><?php echo esc_html__( 'Position','sw-lookbook'); ?></th>
											</tr>
										</thead>
										<tbody>
										
										<?php foreach($lookbook_info as $count => $item) : if($item['status'] == 1): ?>		
										
											<tr>						
                                                <td><input type="checkbox" name="checkbox_lookbook[<?php echo $count ?>][<?php echo $item['id']; ?>]" value="<?php echo $item['id']; ?>" <?php foreach($checkbox_lookbook as $ckl): $ckl = get_object_vars($ckl); if($ckl[$item['id']]): ?>checked<?php endif; endforeach; ?>></td>
												<td><?php echo $item['id']; ?></td>
												<td><img class="swlookbook_image" src="<?php echo $item['image']; ?>" width="100%" height="110px"/></td>
												<td><?php echo $item['name']; ?></td>							
												<td><input type="number" min="0" name="position_lookbook[<?php echo $count ?>][<?php echo $item['id']; ?>]" value="<?php foreach($position_lookbook as $pl): $pl = get_object_vars($pl); if($pl[$item['id']]): echo $pl[$item['id']]; endif; endforeach; ?>"></td>
											</tr>	
										<?php endif; endforeach; ?>	
										</tbody>
									</table>								  
								</div>
							</div>							

								<?php
									wp_nonce_field( 'acme-settings-save', 'acme-custom-message' );
									submit_button();
								?>							   
							</form>
						</div>
					</div>
				</div>
				<br class="clear">
			</div>
		</div>	
		<?php
	}		
	
	public function plugin_manager_lookbook() {
		?>
		<div class="wrap">
		    <a href="?page=wp_add_lookbook_class"class="button button-primary"><?php echo esc_html__( 'Add LookBook','sw-lookbook'); ?></a>
        </div>
		<form method="post">
			<?php
                $this->customers_obj->prepare_items();
				$this->customers_obj->display(); ?>
		</form> <?php
	}
	
	public function get_lookbooks() {
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}swlookbook";
		$result = $wpdb->get_results( $sql, 'ARRAY_A' );
		return $result;
	}	
	
	
	public function get_lookbook($id) {
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}swlookbook";
		$sql .= ' WHERE id = '.$id;
		$result = $wpdb->get_results( $sql, 'ARRAY_A' );
		return $result;
	}
    function get_product_list_as_key_name(){
        global $wpdb;
		$post_status = 'publish';
        $query = "SELECT ID,post_title FROM {$wpdb->prefix}posts where post_type='product' AND post_status=%d";
        $products_array = $wpdb->get_results( $wpdb->prepare( $query, $post_status ) );
        return $products_array;
    }		

	public function plugin_add_lookbook() {
		if(function_exists( 'wp_enqueue_media' )){
			wp_enqueue_media();
		}else{
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
		}
		
		$products = self::get_product_list_as_key_name();
		if(  count($products)  > 0 ){			
			foreach( $products as $val ){
				$product[$val->post_title] = $val->ID;
			}
		}	
		
		if (isset($_GET['id'])) {
			
			$lookbook_info = self::get_lookbook($_GET['id']);
		    if (!empty($lookbook_info[0]) && $lookbook_info[0]['pins'] != 'null') {
			    $pins = htmlspecialchars_decode($lookbook_info[0]['pins'], ENT_COMPAT);
				$pins = str_replace('\"', '"', $pins);
				$image = $lookbook_info[0]['image'];
				$name = $lookbook_info[0]['name'];
				$productInput = $lookbook_info[0]['product_id_lookbook'];
				$status = $lookbook_info[0]['status'];
				$lookbook_id = $lookbook_info[0]['id'];
			}
		} else {
			$pins = '';
			$image = '';
			$name = '';
			$productInput = 0;
			$status = 1;
			$lookbook_id  = '';
		}		

		$show_default_text_for_pin = get_option( 'swlookbook_show_default_text_for_pin' );
		$show_height_of_pin = get_option( 'swlookbook_show_height_of_pin' );
		$show_width_of_pin = get_option( 'swlookbook_show_width_of_pin' );	
		$show_background_color_for_pin = get_option( 'swlookbook_show_background_color_for_pin' );
		$show_text_color_for_pin = get_option( 'swlookbook_show_text_color_for_pin' );
		$radius = round($show_width_of_pin/2);
		
		?>
		<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>?action=add_lookbook" method="post">   	
		<input id="lookbook_id" name="lookbook_id"  value='<?php echo $lookbook_id ?>' type="hidden" />
            <table class="form-table">
				<tr class="elementor_disable_color_schemes">
					<th scope="row"><?php echo esc_html__( 'LookBook Name','sw-lookbook'); ?></th>
					<td>
						<label>
							<input type="text" id="show_lookbook_name" name="show_lookbook_name" value="<?php echo $name ?>" required>
						</label>
					</td>
				</tr>
				<tr class="elementor_disable_color_schemes">
					<th scope="row"><?php echo esc_html__( 'Status','sw-lookbook'); ?></th>
					<td>
						<select id="show_status" name="show_status" style="padding-right: 30px;">
							<option value="1" <?php if ($status == 1): ?> selected="selected" <?php endif; ?> ><?php echo esc_html__( 'Enabled','sw-lookbook'); ?></option>
							<option value="0" <?php if ($status == 0): ?> selected="selected" <?php endif; ?>><?php echo esc_html__( 'Disabled','sw-lookbook'); ?></option>
						</select>
					</td>
				</tr>
				<tr class="elementor_disable_color_schemes">
					<th scope="row"><?php echo esc_html__( 'Product','sw-lookbook'); ?></th>
					<td>
						<select id="show_product" name="show_product" style="padding-right: 30px;">
						<?php foreach($product as $key => $item): ?>
						
							<option value="<?php echo $item ?>" <?php if ($productInput == $item): ?> selected="selected" <?php endif; ?> ><?php echo $key ?></option>
						<?php endforeach; ?>
						</select>
					</td>
				</tr>				
				<tr class="elementor_disable_color_schemes">
				    <th scope="row"><?php echo esc_html__( 'Upload Image','sw-lookbook'); ?></th>
					<td>
					
						<input type="hidden" id="default_pin_text" value="<?php echo $show_default_text_for_pin; ?>">
						<input type="hidden" id="ok_text" value="<?php echo esc_html__( 'Save','sw-lookbook'); ?>">
						<input type="hidden" id="delete_text" value="<?php echo esc_html__( 'Delete','sw-lookbook'); ?>">
						<input type="hidden" id="cancel_text" value="<?php echo esc_html__( 'Cancel','sw-lookbook'); ?>">
						<input type="hidden" id="add_text" value="<?php echo esc_html__( 'Add Pin','sw-lookbook'); ?>">
						<input type="hidden" id="pin_width" value="<?php echo $show_width_of_pin ?>">
						<input type="hidden" id="pin_height" value="<?php echo $show_height_of_pin ?>">
						<input type="hidden" id="check_product_url" value="<?php echo esc_url( admin_url('admin-post.php') ); ?>?action=check_product_url" />
						<input type="hidden" id="load_product_url" value="<?php echo esc_url( admin_url('admin-post.php') ); ?>?action=load_product_url" />					
					
					    <div id="LookbookImageBlock">
							<img class="swlookbook_image" id="swlookbook_image" src="<?php echo $image ?>" width="" height=""/>
							<input class="swlookbook_image_url" type="hidden" name="swlookbook_image" size="60" value="<?php echo $image ?>" required >
							<br><br>
							<a href="#" class="button swlookbook_image_upload"><?php echo esc_html__( 'Upload File','sw-lookbook'); ?></a>
                        </div>
						
						<div id="maket_image"></div>
						<input id="image" name="image" data-ui-id="" value="<?php echo $image ?>" type="hidden" class="required-entry _required" />
						<input id="pins" name="pins" data-ui-id="" value='<?php echo $pins ?>' type="hidden" required />
					
					</td>
				</tr>			

            </table>
				<?php
					wp_nonce_field( 'acme-settings-save', 'acme-custom-message' );
					submit_button();
				?>	
		</form>

		<style>
			.image-annotate-area, .image-annotate-edit-area {
				background: #<?php echo $show_background_color_for_pin ?>;
				color: #<?php echo $show_text_color_for_pin ?>;
				-webkit-border-radius: <?php echo $radius ?>px;
				-moz-border-radius: <?php echo $radius ?>px;
				border-radius: <?php echo $radius ?>px;
				line-height: <?php echo $show_height_of_pin ?>px;
			}
		</style>
		
		<?php
	}
	
	public function plugin_settings_page() {
		$show_status = get_option( 'swlookbook_show_status' );
		$show_click_or_hover = get_option( 'swlookbook_show_click_or_hover' );
		$show_minimal_image_width = get_option( 'swlookbook_show_minimal_image_width' );
		$show_minimal_image_height = get_option( 'swlookbook_show_minimal_image_height' );
		$show_maximal_image_width = get_option( 'swlookbook_show_maximal_image_width' );
		$show_maximal_image_height = get_option( 'swlookbook_show_maximal_image_height' );
		$show_height_of_pin = get_option( 'swlookbook_show_height_of_pin' );
		$show_width_of_pin = get_option( 'swlookbook_show_width_of_pin' );
		$show_default_text_for_pin = get_option( 'swlookbook_show_default_text_for_pin' );
		$show_use_product_price_for_pin_text = get_option( 'swlookbook_show_use_product_price_for_pin_text' );
		$show_background_color_for_pin = get_option( 'swlookbook_show_background_color_for_pin' );
		$show_text_color_for_pin = get_option( 'swlookbook_show_text_color_for_pin' );
		$show_width_of_product_image_on_popup = get_option( 'swlookbook_show_width_of_product_image_on_popup' );
		$show_height_of_product_image_on_popup = get_option( 'swlookbook_show_height_of_product_image_on_popup' );
		$show_navigation = get_option( 'swlookbook_show_navigation' );
		$show_pagination = get_option( 'swlookbook_show_pagination' );
		$show_autoplay = get_option( 'swlookbook_show_autoplay' );
		$show_autoplay_interval_timeout = get_option( 'swlookbook_show_autoplay_interval_timeout' );
		$show_pause_on_mouse_hover = get_option( 'swlookbook_show_pause_on_mouse_hover' );
		$show_infinity_loop = get_option( 'swlookbook_show_infinity_loop' );

		?>
		<div class="wrap">
			<h2><?php echo esc_html__( 'SW LookBook Configuration','sw-lookbook'); ?></h2>
			<div id="poststuff">
				<div id="post-body" class="metabox-holder">
					<div id="post-body-content">
						<div class="meta-box-sortables ui-sortable">
							<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>?action=setting_lookbook" method="post" enctype="multipart/form-data">   			

							<ul class="nav nav-tabs">
								<li class="nav-item">
								  <a class="nav-link active" href="#home"><?php echo esc_html__( 'General Setting','sw-lookbook'); ?></a>
								</li>
								<li class="nav-item">
								  <a class="nav-link" href="#menu1"><?php echo esc_html__( 'Slider Setting','sw-lookbook'); ?></a>
								</li>
							</ul>

						  <!-- Tab panes -->
							<div class="tab-content">
								<div id="home" class="container tab-pane active"><br>
									<table class="form-table">
										<tbody>
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Status','sw-lookbook'); ?></th>
												<td>
													<select id="show_status" name="show_status" style="padding-right: 30px;">
														<option value="1" <?php if($show_status == 1):?>selected="selected"<?php endif; ?>><?php echo esc_html__( 'Enabled','sw-lookbook'); ?></option>
														<option value="0" <?php if($show_status == 0):?>selected="selected"<?php endif; ?>><?php echo esc_html__( 'Disabled','sw-lookbook'); ?></option>
													</select>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Show pins','sw-lookbook'); ?></th>
												<td>
													<select id="show_click_or_hover" name="show_click_or_hover" style="padding-right: 30px;">
														<option value="1" <?php if($show_click_or_hover == 1):?>selected="selected"<?php endif; ?>><?php echo esc_html__( 'Click','sw-lookbook'); ?></option>
														<option value="0" <?php if($show_click_or_hover == 0):?>selected="selected"<?php endif; ?>><?php echo esc_html__( 'Hover','sw-lookbook'); ?></option>
													</select>
												</td>
											</tr>											
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Minimal Image Width','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_minimal_image_width" name="show_minimal_image_width" value="<?php echo esc_attr($show_minimal_image_width); ?>">
														<?php echo esc_html__( 'pixel','sw-lookbook'); ?>
													</label>
												</td>
											</tr>		
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Minimal Image Height','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_minimal_image_height" name="show_minimal_image_height" value="<?php echo esc_attr($show_minimal_image_height); ?>">
														<?php echo esc_html__( 'pixel','sw-lookbook'); ?>
												   </label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Maximal Image Width','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_maximal_image_width" name="show_maximal_image_width" value="<?php echo esc_attr($show_maximal_image_width); ?>">
														<?php echo esc_html__( 'pixel','sw-lookbook'); ?>
												   </label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Maximal Image Height','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_maximal_image_height" name="show_maximal_image_height" value="<?php echo esc_attr($show_maximal_image_height); ?>">
														<?php echo esc_html__( 'pixel','sw-lookbook'); ?>
												   </label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Width of Pin','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_width_of_pin" name="show_width_of_pin" value="<?php echo esc_attr($show_width_of_pin); ?>">
														<?php echo esc_html__( 'pixel','sw-lookbook'); ?>
												   </label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Height of Pin','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_height_of_pin" name="show_height_of_pin" value="<?php echo esc_attr($show_height_of_pin); ?>">
														<?php echo esc_html__( 'pixel','sw-lookbook'); ?>
												   </label>
												</td>
											</tr>											
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Default text for Pin','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_default_text_for_pin" name="show_default_text_for_pin" value="<?php echo esc_attr($show_default_text_for_pin); ?>">
												   </label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Use Product Price for Pin text','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_use_product_price_for_pin_text" name="show_use_product_price_for_pin_text" <?php checked( $show_use_product_price_for_pin_text, 'on' ); ?>>
													</label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Background color for Pin','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_background_color_for_pin" name="show_background_color_for_pin" value="<?php echo esc_attr($show_background_color_for_pin); ?>">
													</label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Text color for Pin','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_text_color_for_pin" name="show_text_color_for_pin" value="<?php echo esc_attr($show_text_color_for_pin); ?>">
													</label>
												</td>
											</tr>
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Width of Product Image on Popup','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_width_of_product_image_on_popup" name="show_width_of_product_image_on_popup" value="<?php echo esc_attr($show_width_of_product_image_on_popup); ?>">
														<?php echo esc_html__( 'pixel','sw-lookbook'); ?>
												   </label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Height of Product Image on Popup','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_height_of_product_image_on_popup" name="show_height_of_product_image_on_popup" value="<?php echo esc_attr($show_height_of_product_image_on_popup); ?>">
														<?php echo esc_html__( 'pixel','sw-lookbook'); ?>
												   </label>
												</td>
											</tr>										
										</tbody>
									</table>
								</div>
								<div id="menu1" class="container tab-pane fade"><br>
									<table class="form-table">
										<tbody>
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Show navigation','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_navigation" name="show_navigation" <?php checked( $show_navigation, 'on' ); ?>>
													</label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Show pagination','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_pagination" name="show_pagination" <?php checked( $show_pagination, 'on' ); ?>>
													</label>
												</td>
											</tr>	
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Autoplay','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_autoplay" name="show_autoplay" <?php checked( $show_autoplay, 'on' ); ?>>
													</label>
												</td>
											</tr>
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Autoplay interval timeout','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="text" id="show_autoplay_interval_timeout" name="show_autoplay_interval_timeout" value="<?php echo esc_attr($show_autoplay_interval_timeout); ?>">
														<?php echo esc_html__( 'ms','sw-lookbook'); ?>
													</label>
												</td>
											</tr>
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Pause on mouse hover','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_pause_on_mouse_hover" name="show_pause_on_mouse_hover" <?php checked( $show_pause_on_mouse_hover, 'on' ); ?>>
													</label>
												</td>
											</tr>
											<tr class="elementor_disable_color_schemes">
												<th scope="row"><?php echo esc_html__( 'Infinity loop','sw-lookbook'); ?></th>
												<td>
													<label>
														<input type="checkbox" id="show_infinity_loop" name="show_infinity_loop" <?php checked( $show_infinity_loop, 'on' ); ?>>
													</label>
												</td>
											</tr>												
										</tbody>
									</table>								  
								</div>
							</div>							

								<?php
									wp_nonce_field( 'acme-settings-save', 'acme-custom-message' );
									submit_button();
								?>							   
							</form>
						</div>
					</div>
				</div>
				<br class="clear">
			</div>
		</div>	
		
		
	   <?php	

	}
		

	
}
SW_LOOKBOOK::get_instance();