<?php
/**
 * Plugin Name: SW Core
 * Plugin URI: http://www.smartaddons.com
 * Description: A plugin developed for many shortcode in theme
 * Version: 1.3.2
 * Author: Smartaddons
 * Author URI: http://www.smartaddons.com
 * This Widget help you to show images of product as a beauty reponsive slider
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

if( !function_exists( 'is_plugin_active' ) ){
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
/* define plugin path */
if ( ! defined( 'SWPATH' ) ) {
	define( 'SWPATH', plugin_dir_path( __FILE__ ) );
}
/* define plugin URL */
if ( ! defined( 'SWURL' ) ) {
	define( 'SWURL', plugins_url(). '/sw_core' );
}

function sw_core_construct(){
	/*
	** Require file
	*/
	if( class_exists( 'Vc_Manager' ) ){
		require_once ( SWPATH . '/visual-map.php' );
	}
	require_once( SWPATH . 'sw_plugins/sw-plugins.php' );
	
	/*
	** Load text domain
	*/
	load_plugin_textdomain( 'sw_core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	
	/*
	** Call action and filter
	*/
	add_filter('widget_text', 'do_shortcode');
	add_action( 'wp_enqueue_scripts', 'Sw_AddScript', 20 );
}

add_action( 'plugins_loaded', 'sw_core_construct', 20 );

function Sw_AddScript(){
	wp_register_style('ya_photobox_css', SWURL . '/css/photobox.css', array(), null);	
	wp_register_style('fancybox_css', SWURL . '/css/jquery.fancybox.css', array(), null);
	wp_register_style('shortcode_css', SWURL . '/css/shortcodes.css', array(), null);
	wp_register_script('photobox_js', SWURL . '/js/photobox.js', array(), null, true);
	wp_register_script('fancybox', SWURL . '/js/jquery.fancybox.pack.js', array(), null, true);
	wp_enqueue_style( 'fancybox_css' );
	wp_enqueue_style( 'shortcode_css' );
	wp_enqueue_script( 'fancybox' );
}

class YA_Shortcodes{
	protected $supports = array();

	protected $tags = array( 'bloginfo', 'get_url' );

	public function __construct(){
		$this->add_shortcodes();
	}
	
	public function add_shortcodes(){
		if ( is_array($this->tags) && count($this->tags) ){
			foreach ( $this->tags as $tag ){
				add_shortcode($tag, array($this, $tag));
			}
		}
	}
	

	/**
	 * Bloginfo
	 * */
	function bloginfo( $atts){
		extract( shortcode_atts(array(
			'show' => 'wpurl',
			'filter' => 'raw'
			), $atts)
		);
		$html = '';
		$html .= get_bloginfo($show, $filter);

		return $html;
	}
	
	
	/*
	* Get URL shortcode
	*/
	function get_url($atts) {
		if(is_front_page()){
			$frontpage_ID = get_option('page_on_front');
			$link =  get_site_url().'/?page_id='.$frontpage_ID ;
			return $link;
		}
		elseif(is_page()){
			$pageid = get_the_ID();
			$link = get_site_url().'/?page_id='.$pageid ;
			return $link;
		}
		else{
			$link = $_SERVER['REQUEST_URI'];
			return $link;
		}
	}
}
new YA_Shortcodes();

/*
 * Vertical mega menu
 *
 */
function yt_vertical_megamenu_shortcode($atts){
	extract( shortcode_atts( array(
		'menu_locate' =>'',
		'title'  =>'',
		'el_class' => '',
		'menu_item' => 10,
		'more_text' => esc_html__( 'See More', 'sw_core' ),
		'less_text' => esc_html__( 'See Less', 'sw_core' ),
		), $atts ) );
	$output = '<div class="vc_wp_custommenu wp_verticle_emarket wpb_content_element ' . $el_class . '">';
	if($title != ''){
		$output.='<div class="mega-left-title">
		<strong>'.$title.'</strong>
	</div>';
}
$output.='<div class="wrapper_vertical_menu vertical_megamenu"  data-number="' .esc_attr( $menu_item ).'" data-moretext="'.esc_attr( $more_text ).'" data-lesstext="'.esc_attr( $less_text ).'">';
ob_start();
$output .= wp_nav_menu( array( 'theme_location' => $menu_locate , 'menu_class' => 'nav vertical-megamenu' ) );
$output .= ob_get_clean();
$output .= '</div></div>';
return $output;
}
add_shortcode('ya_mega_menu','yt_vertical_megamenu_shortcode');



/**
 * Clean up gallery_shortcode()
 *
 * Re-create the [gallery] shortcode and use thumbnails styling from Bootstrap
 *
 * @link http://twitter.github.com/bootstrap/components.html#thumbnails
 */
function ya_gallery($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if (!empty($attr['ids'])) {
		if (empty($attr['orderby'])) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	$output = apply_filters('post_gallery', '', $attr);

	if ($output != '') {
		return $output;
	}

	if (isset($attr['orderby'])) {
		$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
		if (!$attr['orderby']) {
			unset($attr['orderby']);
		}
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => '',
		'icontag'    => '',
		'captiontag' => '',
		'columns'    => 3,
		'size'       => 'medium',
		'include'    => '',
		'exclude'    => ''
		), $attr)
	);

	$id = intval($id);

	if ($order === 'RAND') {
		$orderby = 'none';
	}

	if (!empty($include)) {
		$_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

		$attachments = array();
		foreach ($_attachments as $key => $val) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif (!empty($exclude)) {
		$attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
	} else {
		$attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
	}

	if (empty($attachments)) {
		return '';
	}

	if (is_feed()) {
		$output = "\n";
		foreach ($attachments as $att_id => $attachment) {
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		}
		return $output;
	}
	
	if (!wp_style_is('ya_photobox_css')){
		wp_enqueue_style('ya_photobox_css');
	}
	
	if (!wp_enqueue_script('photobox_js')){
		wp_enqueue_script('photobox_js');
	}
	
	$output = '<ul id="photobox-gallery-' . esc_attr( $instance ). '" class="thumbnails photobox-gallery gallery gallery-columns-'.esc_attr( $columns ).'">';

	$i = 0;
	$width = 100/$columns - 1;
	foreach ($attachments as $id => $attachment) {
		//$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		$link = '<a class="thumbnail" href="' .esc_url( wp_get_attachment_url($id) ) . '">';
		$link .= wp_get_attachment_image($id,'large');
		$link .= '</a>';
		
		$output .= '<li style="width: '.esc_attr( $width ).'%;">' . $link;
		$output .= '</li>';
	}

	$output .= '</ul>';
	
	add_action('wp_footer', 'ya_add_script_gallery', 50);
	
	return $output;
}
add_action( 'after_setup_theme', 'ya_setup_gallery', 20 );
function ya_setup_gallery(){
	if ( current_theme_supports('bootstrap-gallery') ) {
		remove_shortcode('gallery');
		add_shortcode('gallery', 'ya_gallery');
	}
}

function ya_add_script_gallery() {
	$script = '';
	$script .= '<script type="text/javascript">
	jQuery(document).ready(function($) {
		try{
						// photobox
			$(".photobox-gallery").each(function(){
				$("#" + this.id).photobox("li a");
							// or with a fancier selector and some settings, and a callback:
				$("#" + this.id).photobox("li:first a", { thumbs:false, time:0 }, imageLoaded);
				function imageLoaded(){
					console.log("image has been loaded...");
				}
			})
} catch(e){
	console.log( e );
}
});
</script>';

echo $script;
}


/***********************
 * Emarket IMG SLIDER
 *
 ***************************/
 function emarket_img_slide($atts){
	extract( shortcode_atts( array(
		'title' => '',
		'ids' => '',
		'fade' =>'true',
		'dots' => 'true',
		'autoplaySpeed' =>1000,
		'autoplay' =>'true', 
		'interval' => 5000
	), $atts ) );

//$ids = array();
$ids = explode( ',', $ids );
$emarket_direction = emarket_options()->getCpanelValue( 'direction' );
if ( is_rtl() || $emarket_direction == 'rtl' ){
	$rtl = 'true';
}else {$rtl = 'false';}
$html ='<div class="fade-slide loading" data-fade="'.esc_attr( $fade).'" data-dots="'.esc_attr( $dots).'" data-autoplaySpeed="'.esc_attr( $autoplaySpeed).'" data-autoplay="'.esc_attr( $autoplay).'" data-rtl="'.$rtl.'" >';
foreach ( $ids as $attach_id ) :  
	$linkimg = wp_get_attachment_image_url($attach_id,'full');
    $html .='<div class="image"><img src="'.esc_url( $linkimg ).'" alt="'.esc_html__('slide show','emarket').'"></div>';
endforeach ;
$html .='</div>';
return $html;
}
 add_shortcode('img_slide','emarket_img_slide');
 function load_img_slider_script(){
        if (!is_admin()){
			wp_register_script( 'slick_img_js', plugins_url( '/js/img.min.js', __FILE__ ),array(), null, true );		
			if (!wp_script_is('slick_img_js')) {
				wp_enqueue_script('slick_img_js');
			} 				
        }
    }
add_action('wp_enqueue_scripts', 'load_img_slider_script', 11);

function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count.' Views';
}
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
add_action( 'wp_head', 'populaPost', 0 );
function populaPost(){
	if(is_single()){
		setPostViews(get_the_ID());
	}
}