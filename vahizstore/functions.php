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
require_once( 'inc/customizer/class-vahizstore-customizer.php' );

require 'inc/vahizstore-functions.php';
require 'inc/vahizstore-template-hooks.php';
require 'inc/vahizstore-template-functions.php';

function debug_to_console( $data ) {
    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
    echo $output;
}
