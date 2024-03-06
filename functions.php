<?php
/**
 * _themename theme functions and definitions
 *
 * @package _themename
 */


$theme_includes = array(
	'/theme-support.php',                   // Initialize theme default settings.
	'/custom-taxonomies.php',               // Initialize custom taxonomies.
	'/custom-post-types.php',             	// Initialize custom post types.
	'/widget-areas.php',                    // Register widget area(s).
    '/enqueue-scripts.php',                 // Enqueue scripts and styles.
    '/ajax-functions.php',                  // Define theme AJAX functions
);

//Register ACF Blocks if ACF is active
if (class_exists('ACF')) {
   $theme_includes[] = '/acf-blocks.php';
}

if( class_exists( 'GFAPI' ) ){
    $theme_includes[] = '/gravity-form-hooks.php';
}

foreach ( $theme_includes as $file ) {
	$filepath = locate_template( 'library' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

if( class_exists( 'ACF' ) ){

    // ACF Options Pages
    if (function_exists('acf_add_options_page')) {
        $parent = acf_add_options_page(
            array(
                'page_title'  => __( 'Theme Settings' ),
                'menu_title'  => __( 'Theme Settings' ),
                'menu_slug'   => 'theme-options',
                'capability'  => 'edit_posts',
            )
        );
        acf_add_options_sub_page(
            array(
                'page_title'  => __( 'Global Settings' ),
                'menu_title'  => __( 'Global Settings' ),
                'menu_slug'   => 'theme-global-settings',
                'parent_slug' => $parent['menu_slug'] 
            )
        );
        acf_add_options_sub_page(
            array(
                'page_title'  => __( 'Header Settings' ),
                'menu_title'  => __( 'Header Settings' ),
                'menu_slug'   => 'theme-header-settings',
                'parent_slug' => $parent['menu_slug'] 
            )
        );
        acf_add_options_sub_page(
            array(
                'page_title'  => __( 'Footer Settings' ),
                'menu_title'  => __( 'Footer Settings' ),
                'menu_slug'   => 'theme-footer-settings',
                'parent_slug' => $parent['menu_slug'] 
            )
        );
    }

}

/**
 * Return html for a button from an ACF link array
 *
 * @param array $link - ACF link array
 * @param array $classes - classes to be added to the button before return
 * @return string $button - html for button
 * @since 1.0.0
 */

function _themename_acf_button( $link, $classes = array( 'theme-button' ) ){

    //Immediately return if this is not a link array
    if( empty( $link ) || ( is_array( $link ) && !$link['url'] ) ){
        return;
    }

    else{
        if( is_array($classes ) ){
            $class = implode( ' ', $classes ); 
        }
        $target = $link['target'] ? ' target="' . $link['target'] . '"' : '';
        $button = '<a href="' . esc_url( $link['url'] ) . '" class="' . $class . '"' . $target . '>' . esc_attr( $link['title'] ) . '</a>';
        return $button; 
    }

}