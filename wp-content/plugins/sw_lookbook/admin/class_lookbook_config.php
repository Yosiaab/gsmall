<?php 
/**
*** Name: Admin Rent Car Table
*** Author: WpThemeGo
**/

class SW_LOOBOOK_DB{
	function __construct(){
		register_activation_hook( SWLOOKBOOKFILE, array( $this, 'swlookbook_create_table_lookbook' ) );
		register_activation_hook( SWLOOKBOOKFILE, array( $this, 'swlookbook_create_table_slide' ) );
		register_activation_hook( SWLOOKBOOKFILE, array( $this, 'swlookbook_create_option' ) );
	}
	
	public function swlookbook_create_table_slide(){
		global $wpdb;

		$collate = '';

		if ( $wpdb->has_cap( 'collation' ) ) {

			$collate = $wpdb->get_charset_collate();

		}
		$slide_db = "

			CREATE TABLE {$wpdb->prefix}swlookbook_slide (

				id bigint(20) NOT NULL AUTO_INCREMENT,
                name VARCHAR(255) NOT NULL,		
				custom_class VARCHAR(255) NOT NULL,		
                status VARCHAR(255) NOT NULL,
                show_navigation VARCHAR(255) NOT NULL,				
                show_pagination VARCHAR(255) NOT NULL,
                autoplay VARCHAR(255) NOT NULL,	
                timeout VARCHAR(255) NOT NULL,				
                pause VARCHAR(255) NOT NULL,
                infinity_loop VARCHAR(255) NOT NULL,
                checkbox_lookbook VARCHAR(255) NOT NULL,				
                position_lookbook VARCHAR(255) NOT NULL,				
				UNIQUE KEY id (id)

			) $collate;

		";		

		

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		dbDelta( $slide_db );		
    }	
	
	public function swlookbook_create_table_lookbook(){
		global $wpdb;

		$collate = '';

		if ( $wpdb->has_cap( 'collation' ) ) {

			$collate = $wpdb->get_charset_collate();

		}
		$contact_db = "

			CREATE TABLE {$wpdb->prefix}swlookbook (

				id bigint(20) NOT NULL AUTO_INCREMENT,

				name VARCHAR(255) NOT NULL,	
				product_id_lookbook VARCHAR(255) NOT NULL,	
                image VARCHAR(255) NOT NULL,
                pins TEXT NOT NULL,	
                status VARCHAR(255) NOT NULL,	

				UNIQUE KEY id (id)

			) $collate;

		";		

		

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		dbDelta( $contact_db );		
    }	
	
	public function swlookbook_create_option(){
		$show_status = '1';
		$show_click_or_hover = '1';
		$show_minimal_image_width = '300';
		$show_minimal_image_height = '400';
		$show_maximal_image_width = '1920';
		$show_maximal_image_height = '1360';
		$show_height_of_pin = '40';
		$show_width_of_pin = '40';
		$show_default_text_for_pin = '+';
		$show_use_product_price_for_pin_text = 'on';
		$show_background_color_for_pin = '65affa';
		$show_text_color_for_pin = 'ffffff';
		$show_width_of_product_image_on_popup = '240';
		$show_height_of_product_image_on_popup = '320';
		$show_navigation = 'on';
		$show_pagination = 'on';
		$show_autoplay = 'on';
		$show_autoplay_interval_timeout = '5000';		
		$show_pause_on_mouse_hover = 'on';
		$show_infinity_loop = 'on';	
		
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

	}
}
new SW_LOOBOOK_DB(); 