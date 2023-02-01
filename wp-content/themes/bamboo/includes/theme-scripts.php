<?php
/**
* Load the custom scripts and styles.
*/

if ( !defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

/**
 * [action__front_script Function to add script at front side]
 *
 */
function action__front_script() {
    // Register and enqueue style
    wp_register_style( THEME_PREFIX . '-wp-style', get_template_directory_uri() . '/style.css', array(), '1.0' );
    wp_enqueue_style( THEME_PREFIX . '-wp-style' );
    wp_register_style( THEME_PREFIX . '-style', get_template_directory_uri() . '/public/css/style.css', array(), '1.0' );
    wp_enqueue_style( THEME_PREFIX . '-style' );
    // Register and enqueue scripts js
    // wp_enqueue_script( THEME_PREFIX . '-jquery-js', 'https://code.jquery.com/jquery-3.6.3.min.js', array('jquery'), '3.6.3', true );
    // wp_enqueue_script( THEME_PREFIX . '-masonry-js', '/public/js/masonry.pkgd.min.js', array('jquery'), '4.0.31', true );

    wp_register_script( THEME_PREFIX . '-main-jquery', get_template_directory_uri() . '/public/js/main.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( THEME_PREFIX . '-main-jquery' );
    
    wp_register_script( THEME_PREFIX . '-isotope-jquery', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array( 'jquery' ), '3.0.1', true );
    wp_enqueue_script( THEME_PREFIX . '-isotope-jquery' );
}
add_action( 'wp_enqueue_scripts', 'action__front_script' );