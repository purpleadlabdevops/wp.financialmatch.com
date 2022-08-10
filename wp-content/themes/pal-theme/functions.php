<?php

// default wp variables
define('ROOT', get_template_directory_uri());
define('IMG', ROOT . '/img');
define('VIDEO', ROOT . '/video');

// replace jquery
function replace_core_jquery_version() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

// wp includes
// include('include/clear.php');

// support wp menu
add_theme_support( 'menus' );

// include wp scripts
function front_scripts() {
// Index page
	if( is_page_template( 'index.php' ) ){
		wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-index.css');
		wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-index.js', false, false, 'in_footer');
	}
	// 	wp_enqueue_script( 'paypal-sdk', 'https://www.paypal.com/sdk/js?client-id=ASwa9YxGps_Ib6-23OkFDe5DLDJo7DtTfnwMxkxC2297bVWcHm5da9I7aJstDqcpdcOhPreh_mFgjnnG', null, null, true);
	// 	wp_enqueue_script( 'klaviyo', 'https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=NB8RST', false, false, 'in_footer');
	// 	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-v5.js',  array('klaviyo', 'paypal-sdk'), false, 'in_footer');
}
add_action( 'wp_enqueue_scripts', 'front_scripts' );

// acf optiopns page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
