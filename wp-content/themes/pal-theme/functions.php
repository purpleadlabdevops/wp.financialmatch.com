<?php

// Includes
include('include/settings.php');
include('include/clear.php');
include('include/quizSubmit.php');

// include wp scripts
function front_scripts() {
	wp_enqueue_script( 'everflow', 'https://www.f98mmtrk.com/scripts/sdk/everflow.js', null, null, true);
// Index page
	if( is_page_template( 'index.php' ) ){
		wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-index.css');
		wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-index.js', false, false, 'in_footer');
	}
// Thank you page
	if( is_page_template( 'templates/thankyou.php' ) ){
		wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-thankyou.css');
		wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-thankyou.js', false, false, 'in_footer');
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

function front_variables(){
	$affid = isset($_GET["affid"]) ? $_GET["affid"] : false;
	wp_localize_script( 'scripts', 'data',
		array(
			'ajax' => admin_url('admin-ajax.php'),
			'theme' => get_template_directory_uri(),
			'affid' => $affid
		)
	);
}
add_action( 'wp_enqueue_scripts', 'front_variables' );