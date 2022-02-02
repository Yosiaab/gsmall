<?php

function sw_import_files() { 
  return array(
    array(
		'import_file_name'             => '#1 Marketplace',
		'page_title'                   => 'Home Elementor',
		'header_title'				   => 'Header Style 1',
		'footer_title'				   => 'Footer_1',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/demo-content-all-templates.xml',	
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/widgets.json',
		'local_import_revslider'       => array( 
			'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/slideshow1.zip' 
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-1/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'http://demo.wpthemego.com/themes/sw_emarket/',
	),

	array(
		'import_file_name'             => '#2 Marketplace',
		'page_title'                   => 'Home Page 2 Elementor',
		'header_title'				   => 'Header Style 2',
		'footer_title'				   => 'Footer_2',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout2',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-2/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-2/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-2/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-2/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-2/demo-content-all-templates.xml',	
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-2/widgets.json',
		'local_import_revslider'       => array( 
			'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-2/slideshow2.zip',
			'slide2' => trailingslashit( get_template_directory() ) . 'lib/import/demo-2/slideshow3.zip' 
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-2/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-2/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'http://demo.wpthemego.com/themes/sw_emarket/layout2/',
	),

	array(
		'import_file_name'             => '#3 Marketplace',
		'page_title'                   => 'Home Page 3 Elementor',
		'header_title'				   => 'Header Style 3',
		'footer_title'				   => 'Footer_3',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout3',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-3/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-3/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-3/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-3/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-3/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-3/widgets.json',
		'local_import_revslider'       => array( 
			'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-3/slideshow4.zip' 
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-3/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-3/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'http://demo.wpthemego.com/themes/sw_emarket/layout3/',
	),

	array(
		'import_file_name'             => '#4 Marketplace',
		'page_title'                   => 'Home Page 4 Elementor',
		'header_title'				   => 'Header Style 4',
		'footer_title'				   => 'Footer_2',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout4',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-4/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-4/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-4/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-4/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-4/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-4/widgets.json',
		'local_import_revslider'       => array( 
			'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-4/slideshow5.zip' 
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-4/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-4/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'http://demo.wpthemego.com/themes/sw_emarket/layout4/',
	),

	array(
		'import_file_name'             => '#5 Marketplace',
		'page_title'                   => 'Home Page 5 Elementor',
		'header_title'				   => 'Header Style 8',
		'footer_title'				   => 'Footer_5',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout567',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/widgets.json',
		'local_import_revslider'       => array( 
			'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/slideshow6.zip',
			'slide2' => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/slideshow6_1.zip' 
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-5/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'http://demo.wpthemego.com/themes/sw_emarket/layout567/',
	),

	array(
		'import_file_name'             => '#6 Marketplace',
		'page_title'                   => 'Home Page 6 Elementor',
		'header_title'				   => 'Header Style 9',
		'footer_title'				   => 'Footer_4',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout567',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-6/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-6/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-6/widgets.json',
		'local_import_revslider'       => array( 
			'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-6/slideshow7.zip',
			'slide2' => trailingslashit( get_template_directory() ) . 'lib/import/demo-6/slide7_1.zip',
		),
		'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-6/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-6/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout567/home-page-6-elementor/',
	),

	array(
		'import_file_name'             => '#7 Marketplace',
		'page_title'                   => 'Home Page 7 Elementor',
		'header_title'				   => 'Header Style 10',
		'footer_title'				   => 'Footer_8',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout567',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-7/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-7/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-7/widgets.json',
		'local_import_revslider'       => array( 
			'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-7/slide73.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-7/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-7/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout567/home-page-7-elementor/',
	),
  
	array(
		'import_file_name'             => '#8 Christmas Layout',
		'page_title'                   => 'Home Page 8',
		'header_title'				   => 'Header Christmas',
		'footer_title'				   => 'Footer_8',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-8/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-8/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-8/widgets.json',
		'local_import_revslider'       => array( 
			'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-8/slide8.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-8/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-8/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'http://demo.wpthemego.com/themes/sw_emarket/layout8/',
	),

	array(
		'import_file_name'             => '#9 Marketplace',
		'page_title'                   => 'Home Page 9',
		'header_title'				   => 'Header Style 10',
		'footer_title'				   => 'Footer_5',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout567',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-9/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-9/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-9/widgets.json',
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-9/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-9/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout567/home-page-9/',
	),
  
	array(
		'import_file_name'             => '#10 Organic Market',
		'page_title'                   => 'Home Page 10',
		'header_title'				   => 'Header Style 12',
		'footer_title'				   => 'Footer_6',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout567',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-pagemenu.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-10/widgets.json',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-10/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-10/demo-content-all-templates.xml',
		'local_import_revslider'       => array( 
			'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-10/slide10.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-10/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-10/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout567/home-page-10/',
	),
  
	array(
		'import_file_name'             => '#11 Electronics Store',
		'page_title'                   => 'Home Page 11',
		'header_title'				   => 'Header Style 13',
		'footer_title'				   => 'Footer_7',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout567',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-5/demo-content-pagemenu.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-11/widgets.json',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-11/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-11/demo-content-all-templates.xml',
		'local_import_revslider'       => array( 
			'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-11/slide11.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-11/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-11/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout567/home-page-11/',
	),
  
	array(
		'import_file_name'             => '#12 Sport Shop',
		'page_title'                   => 'Home Page 12',
		'header_title'				   => 'Header Style 14',
		'footer_title'				   => 'Footer_12',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout14',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/widgets.json',
		'local_import_revslider'       => array( 
			'slideshow12' => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/slideshow12.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-12/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout14/home-page-12/',
	),
  
	array(
		'import_file_name'             => '#13 Marketplace',
		'page_title'                   => 'Home Page 13',
		'header_title'				   => 'Header Style 15',
		'footer_title'				   => 'Footer_13',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout14',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-13/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-13/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-13/widgets.json',
		'local_import_revslider'       => array( 
			'slide13' => trailingslashit( get_template_directory() ) . 'lib/import/demo-13/slide13.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-13/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-13/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout14/home-page-13/',
	),
  
	array(
		'import_file_name'             => '#14 Marketplace',
		'page_title'                   => 'Home Page 14',
		'header_title'				   => 'Header Style 16',
		'footer_title'				   => 'Footer_13',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout14',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-14/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-14/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-14/widgets.json',
		'local_import_revslider'       => array( 
			'slide14' => trailingslashit( get_template_directory() ) . 'lib/import/demo-14/slide14.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-14/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-14/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout14/home-page-14/',
	),
  
	array(
		'import_file_name'             => '#15 Kid Shop',
		'page_title'                   => 'Home Page 15',
		'header_title'				   => 'Header Style 17',
		'footer_title'				   => 'Footer_14',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout14',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-15/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-15/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-15/widgets.json',
		'local_import_revslider'       => array( 
			'slide15' => trailingslashit( get_template_directory() ) . 'lib/import/demo-15/slide15.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-15/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-15/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout14/home-page-15/',
	),
  
	array(
		'import_file_name'             => '#16 Marketplace',
		'page_title'                   => 'Home Page 16',
		'header_title'				   => 'Header Style 18',
		'footer_title'				   => 'Footer_15',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout14',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-12/demo-content-pagemenu.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-16/widgets.json',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-16/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-16/demo-content-all-templates.xml',
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-16/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-16/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout14/',
	),
  
	array(
		'import_file_name'             => '#17 Gaming News',
		'page_title'                   => 'Home Page 17',
		'header_title'				   => 'Header Style 19',
		'footer_title'				   => 'Footer_News',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout15',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-17/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-17/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-17/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-17/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-17/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-17/widgets.json',
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-17/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-17/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout15/',
	),
  
	array(
		'import_file_name'             => '#18 Medical Shop',
		'page_title'                   => 'Home Page 18',
		'header_title'				   => 'Header Style 20',
		'footer_title'				   => 'Footer_18',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout32',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/widgets.json',
		'local_import_revslider'       => array( 
			'slideshow17' => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/slideshow17.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-18/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout19/home-page-18/',
	),
  
	array(
		'import_file_name'             => '#19 Furniture Store',
		'page_title'                   => 'Home Page 19',
		'header_title'				   => 'Header Style 21',
		'footer_title'				   => 'Footer_19',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout32',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-19/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-19/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-19/widgets.json',
		'local_import_revslider'       => array( 
			'slide-18' => trailingslashit( get_template_directory() ) . 'lib/import/demo-19/slide-18.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-19/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-19/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout19/home-page-19/',
	),
  
	array(
		'import_file_name'             => '#20 Book Store',
		'page_title'                   => 'Home Page 20',
		'header_title'				   => 'Header Style 20',
		'footer_title'				   => 'Footer_19',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout30',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/widgets.json',
		'local_import_revslider'       => array( 
			'slide20' => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/slide20.zip',
			'bg-video' => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/bg-video.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-20/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout18/',
	),
  
	array(
		'import_file_name'             => '#21 Flower Shop',
		'page_title'                   => 'Home Page 21',
		'header_title'				   => 'Header Style 23',
		'footer_title'				   => 'Footer_21',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout32',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-21/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-21/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-21/widgets.json',
		'local_import_revslider'       => array( 
			'slide21' => trailingslashit( get_template_directory() ) . 'lib/import/demo-21/slide21.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-21/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-21/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout19/',
	),
  
	array(
	'import_file_name'             => '#22 Fashion Shop',
	'page_title'                   => 'Home Page 22',
	'header_title'				   => 'Header Style 24',
	'footer_title'				   => 'Footer_22',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout20',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-22/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-22/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-22/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-22/widgets.json',
	'local_import_revslider'       => array( 
		'slide22' => trailingslashit( get_template_directory() ) . 'lib/import/demo-22/slide22.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-22/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-22/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout20/',
	),
  
	array(
	'import_file_name'             => '#23 Marketplace',
	'page_title'                   => 'Home Page 23',
	'header_title'				   => 'Header Style 25',
	'footer_title'				   => 'Footer_23',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout30',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-23/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-23/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-23/widgets.json',
	'local_import_revslider'       => array( 
		'slide23' => trailingslashit( get_template_directory() ) . 'lib/import/demo-23/slide23.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-23/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-23/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout21/',
	),
	
	array(
	'import_file_name'             => '#24 Printing Store',
	'page_title'                   => 'Home Page 24',
	'header_title'				   => 'Header Style 26',
	'footer_title'				   => 'Footer_24',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout30',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-24/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-24/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-24/widgets.json',
	'local_import_revslider'       => array( 
		'slide24' => trailingslashit( get_template_directory() ) . 'lib/import/demo-24/slide24.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-24/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-24/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout22/',
	),
	
	array(
	'import_file_name'             => '#25 Hot Deals',
	'page_title'                   => 'Home Page 25',
	'header_title'				   => 'Header Style 27',
	'footer_title'				   => 'Footer_25',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout30',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-25/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-25/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-25/widgets.json',
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-25/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-25/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout23/',
	),
	
	array(
	'import_file_name'             => '#26 Dental Care',
	'page_title'                   => 'Home Page 26',
	'header_title'				   => 'Header Style 28',
	'footer_title'				   => 'Footer_26',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout30',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-26/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-26/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-26/widgets.json',
	'local_import_revslider'       => array( 
		'slide26' => trailingslashit( get_template_directory() ) . 'lib/import/demo-26/slide26.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-26/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-26/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout24/',
	),
	
	array(
	'import_file_name'             => '#27 Gardening Shop',
	'page_title'                   => 'Home Page 27',
	'header_title'				   => 'Header Style 10',
	'footer_title'				   => 'Footer_27',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout30',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-27/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-27/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-27/widgets.json',
	'local_import_revslider'       => array( 
		'slide27' => trailingslashit( get_template_directory() ) . 'lib/import/demo-27/slide27.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-27/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-27/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout25/',
	),
	
	array(
	'import_file_name'             => '#28 Marketplace',
	'page_title'                   => 'Home Page 28',
	'header_title'				   => 'Header Style 29',
	'footer_title'				   => 'Footer_28',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout30',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-28/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-28/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-28/widgets.json',
	'local_import_revslider'       => array( 
		'slide28' => trailingslashit( get_template_directory() ) . 'lib/import/demo-28/slide28.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-28/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-28/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout26/',
	),
	
	array(
	'import_file_name'             => '#29 Craft Store',
	'page_title'                   => 'Home Page 29',
	'header_title'				   => 'Header Style 30',
	'footer_title'				   => 'Footer_29',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout27',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-29/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-29/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-29/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-29/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-29/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-29/widgets.json',
	'local_import_revslider'       => array( 
		'slider-29' => trailingslashit( get_template_directory() ) . 'lib/import/demo-29/slider-29.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-29/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-29/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout27/',
	),
	
	array(
	'import_file_name'             => '#30 Bike Shop',
	'page_title'                   => 'Home Page 30',
	'header_title'				   => 'Header Style 31',
	'footer_title'				   => 'Footer_30',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout30',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-30/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-30/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-30/widgets.json',
	'local_import_revslider'       => array( 
		'slide30' => trailingslashit( get_template_directory() ) . 'lib/import/demo-30/slide30.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-30/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-30/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout28/',
	),
	
	array(
	'import_file_name'             => '#31 Fishing Shop',
	'page_title'                   => 'Home Page 31',
	'header_title'				   => 'Header Style 32',
	'footer_title'				   => 'Footer_31',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout30',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-31/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-31/widgets.json',
	'local_import_revslider'       => array( 
		'slide31' => trailingslashit( get_template_directory() ) . 'lib/import/demo-31/slide31.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-31/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-31/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout29/',
	),
	
	array(
	'import_file_name'             => '#32 Watch Shop',
	'page_title'                   => 'Home Page 32',
	'header_title'				   => 'Header Style 33',
	'footer_title'				   => 'Footer_32',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout30',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-20/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-32/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-32/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-32/widgets.json',
	'local_import_revslider'       => array( 
		'slide32' => trailingslashit( get_template_directory() ) . 'lib/import/demo-32/slide32.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-32/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-32/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout30/',
	),
	
	array(
	'import_file_name'             => '#33 Car News',
	'page_title'                   => 'Home Page 33',
	'header_title'				   => 'Header Style 34',
	'footer_title'				   => 'Footer_33',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout32',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-33/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-33/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-33/widgets.json',
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-33/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu2',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-33/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout31/',
	),
	
	array(
	'import_file_name'             => '#34 Cosmetics Store',
	'page_title'                   => 'Home Page 34',
	'header_title'				   => 'Header Style 35',
	'footer_title'				   => 'Footer_34',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout32',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-18/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-34/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-34/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-34/widgets.json',
	'local_import_revslider'       => array( 
		'slider-33' => trailingslashit( get_template_directory() ) . 'lib/import/demo-34/slider-33.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-34/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-34/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout32/',
	),
	
	array(
	'import_file_name'             => '#35 Marketplace',
	'page_title'                   => 'Home Page 35',
	'header_title'				   => 'Header Style 36',
	'footer_title'				   => 'Footer_35',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout33',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-35/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-35/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-35/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-35/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-35/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-35/widgets.json',
	'local_import_revslider'       => array( 
		'slider-34' => trailingslashit( get_template_directory() ) . 'lib/import/demo-35/slider-34.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-35/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-35/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout33/',
	),
	array(
	'import_file_name'             => '#36 Sport Shop',
	'page_title'                   => 'Home Page 36-2',
	'header_title'				   => 'Header Style 37',
	'footer_title'				   => 'Footer_36',
	'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout34',
	'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-36/demo-content.xml',
	'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-36/demo-content-page.xml',
	'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-36/demo-content-pagemenu.xml',
	'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-36/demo-content-homepage-templates.xml',
	'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-36/demo-content-all-templates.xml',
	'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-36/widgets.json',
	'local_import_revslider'       => array( 
		'slide35' => trailingslashit( get_template_directory() ) . 'lib/import/demo-35/slide35.zip',
	),
	'local_import_options'         => array(
		array(
			'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-36/theme_options.txt',
			'option_name' => 'emarket_theme',
		),
	),
	'menu_locate'                  => array(
		'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
		'vertical_menu' => 'Verticle Menu',
		'mobile_menu' => 'Menu Mobile 1'
	),
	'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-36/screenshot.png',
	'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
	'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout34/',
	),
	array(
		'import_file_name'             => '#37 Grocery Store',
		'page_title'                   => 'Home Elementor',
		'header_title'				   => 'Header Style 36',
		'footer_title'				   => 'Footer_36',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout35',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-37/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-37/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-37/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-37/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-37/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-37/widgets.json',
		'local_import_revslider'       => array( 
			'slide36' => trailingslashit( get_template_directory() ) . 'lib/import/demo-37/slide36.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-37/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-37/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout35/',
		),
	array(
		'import_file_name'             => '#38 Cosmetics Store 2',
		'page_title'                   => 'Home Page 37',
		'header_title'				   => 'Header Style 37',
		'footer_title'				   => 'Footer_37',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout36',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-38/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-38/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-38/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-38/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-38/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-38/widgets.json',
		'local_import_revslider'       => array( 
			'slide37' => trailingslashit( get_template_directory() ) . 'lib/import/demo-38/slide37.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-38/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-38/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout36/',
		),
		
		array(
		'import_file_name'             => '#39 Shoes Store',
		'page_title'                   => 'Home Page 39',
		'header_title'				   => 'Header Style 39',
		'footer_title'				   => 'Footer_39',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout39/',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-39/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-39/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-39/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-39/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-39/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-39/widgets.json',
		'local_import_revslider'       => array( 
			'slide39' => trailingslashit( get_template_directory() ) . 'lib/import/demo-39/slide39.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-39/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-39/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout39/',
		),
		
		array(
		'import_file_name'             => '#40 Shoes Store',
		'page_title'                   => 'Home Page 40',
		'header_title'				   => 'Header Style 40',
		'footer_title'				   => 'Footer_40',
		'site_url'					   => 'https://demo.wpthemego.com/themes/sw_emarket/layout40/',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-40/demo-content.xml',
		'local_import_page_file'       => trailingslashit( get_template_directory() ) . 'lib/import/demo-40/demo-content-page.xml',
		'local_import_pagemenu_file'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-40/demo-content-pagemenu.xml',
		'local_import_template_homepage' => trailingslashit( get_template_directory() ) . 'lib/import/demo-40/demo-content-homepage-templates.xml',
		'local_import_template_all_homepages' => trailingslashit( get_template_directory() ) . 'lib/import/demo-40/demo-content-all-templates.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-40/widgets.json',
		'local_import_revslider'       => array( 
			'slide40' => trailingslashit( get_template_directory() ) . 'lib/import/demo-40/slide40.zip',
		),
		'local_import_options'         => array(
			array(
				'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-40/theme_options.txt',
				'option_name' => 'emarket_theme',
			),
		),
		'menu_locate'                  => array(
			'primary_menu' => 'Primary Menu',   /* menu location => menu name for that location */
			'vertical_menu' => 'Verticle Menu',
			'mobile_menu' => 'Menu Mobile 1'
		),
		'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-40/screenshot.png',
		'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 5-10 minutes', 'emarket' ),
		'preview_url'                  => 'https://demo.wpthemego.com/themes/sw_emarket/layout40/',
		),
);
}
add_filter( 'pt-ocdi/import_files', 'sw_import_files' );