<?php
/**
 * VahizStore
 *
 * @package vahizstore
 */

/**
 * Set the theme version number as a global variable
 */
$theme			= wp_get_theme( 'vahizstore' );
$vahizstore_version	= $theme['Version'];

$theme			= wp_get_theme( 'storefront' );
$storefront_version	= $theme['Version'];

/**
 * Load the individual classes required by this theme
 */
require_once( 'inc/class-vahizstore.php' );

require 'inc/vahizstore-functions.php';
require 'inc/vahizstore-template-hooks.php';
require 'inc/vahizstore-template-functions.php';

/**
* Include bootsrap 
 */
function bootsrap_enqueue_styles() {
    wp_register_style( 'bootstrapStyle', get_stylesheet_directory_uri() . '/assets/bootsrap/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrapStyle' );
}
add_action( 'wp_enqueue_scripts', 'bootsrap_enqueue_styles');

function bootsrap_enqueue_scripts() {
    wp_register_script('bootstrapScript', get_stylesheet_directory_uri() . '/assets/bootsrap/bootstrap.min.js');
    wp_enqueue_script( 'bootstrapScript' );
}
add_action( 'wp_enqueue_scripts', 'bootsrap_enqueue_scripts');