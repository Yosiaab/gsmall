<?php


function sw_lookbook_admin_js() {
    wp_enqueue_script('sw_lookbook_bootstrap_js', plugins_url('js/bootstrap.min.js', __FILE__), array('jquery'));

	wp_enqueue_script('sw_lookbook_fileuploader_js', plugins_url('js/fileuploader.js', __FILE__), array('jquery'));
	wp_enqueue_script('sw_lookbook_jquery_ui_js', plugins_url('js/jquery-ui.js', __FILE__), array('jquery'));
	wp_enqueue_script('sw_lookbook_annotate_js', plugins_url('js/jquery.annotate.js', __FILE__), array('jquery'));
	wp_enqueue_script('sw_lookbook_json2_js', plugins_url('js/json2.min.js', __FILE__), array('jquery'));
	
	wp_enqueue_script('sw_lookbook_style_js', plugins_url('js/style.js', __FILE__), array('jquery'));
	wp_enqueue_style( 'sw_lookbook_bootstrap_css', plugins_url('css/bootstrap.min.css', __FILE__) );
	wp_enqueue_style( 'sw_lookbook_css', plugins_url('css/lookbook.css', __FILE__) );
	wp_enqueue_style( 'sw_style_css', plugins_url('css/style.css', __FILE__) );
}
add_action('admin_enqueue_scripts', 'sw_lookbook_admin_js');


include( 'admin_lookbook_config.php' );
include( 'admin_list_lookbook.php' );
include( 'class_lookbook_config.php' );