<?php
//Enqueue scripts and styles here
 
 function _themename_scripts() {

	wp_enqueue_style( '_themename-style', get_stylesheet_uri() );

	wp_enqueue_style('_themename-style-min', get_stylesheet_directory_uri() . '/dist/css/bundle.css', array(), filemtime( get_stylesheet_directory() . '/dist/css/bundle.css' ), false );

	wp_enqueue_script('_themename-js', get_stylesheet_directory_uri() . '/dist/js/bundle.js', array('jquery'), filemtime( get_stylesheet_directory() . '/dist/js/bundle.js' ), true);

	$translation_array = array('templateURL' => get_stylesheet_directory_uri(), 'ajaxURL' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce( 'theme-script-nonce' ));
	wp_localize_script( '_themename-js', 'theme', $translation_array );
}

add_action( 'wp_enqueue_scripts', '_themename_scripts' );

//Add Font Awesome kit to front end and admin area
function _themename_fa_custom_setup_kit( $kit_url = '' ){
	foreach( ['wp_enqueue_scripts', 'admin_enqueue_scripts' ] as $action ){
		add_action(
			$action,
			function() use ( $kit_url ){
				wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
			}
		);
	}
}

_themename_fa_custom_setup_kit('https://kit.fontawesome.com/aad0b62125.js' );