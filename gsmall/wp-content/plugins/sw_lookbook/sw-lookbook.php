<?php 
/**
 * Plugin Name: Sw LookBook
 * Plugin URI: http://www.wpthemego.com/
 * Description: Sw LookBook
 * Version: 1.0.0
 * Author: wpthemego
 * Author URI: http://www.wpthemego.com/
 * Requires at least: 4.1
 * WC tested up to: 5.1
 * Text Domain: sw-lookbook
 * Domain Path: /languages/
 */
 
// define plugin path
if ( ! defined( 'SWLOOKBOOKPATH' ) ) {
	define( 'SWLOOKBOOKPATH', plugin_dir_path( __FILE__ ) );
}


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! defined( 'SWLOOKBOOKFILE' ) ) {
	define( 'SWLOOKBOOKFILE', __FILE__ );
}

// define plugin theme path
if ( ! defined( 'SWLOOKBOOKTHEME' ) ) {
	define( 'SWLOOKBOOKTHEME', plugin_dir_path( __FILE__ ). 'inc/templates' );
}

require_once( SWLOOKBOOKPATH . '/inc/functions.php' );
require_once( SWLOOKBOOKPATH . '/inc/widget.php' );
require_once( SWLOOKBOOKPATH . '/admin/admin-settings.php' );

//plugin loaded hook
add_action('plugins_loaded', 'swlookbook_construct', 0);
function swlookbook_construct(){
	/*
	** Load text domain
	*/
    load_plugin_textdomain( 'sw-lookbook', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	add_action( 'wp_enqueue_scripts', 'sw_lookbook_script', 99 );	
}

function sw_lookbook_script(){
	wp_enqueue_style( 'sw_lookbook_css', plugins_url('css/style.css', __FILE__) );
	wp_enqueue_script('sw_lookbook_js', plugins_url('js/style.js', __FILE__), array('jquery'));
}