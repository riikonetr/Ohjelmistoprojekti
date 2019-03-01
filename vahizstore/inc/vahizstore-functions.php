<?php
/**
 * VahizStore functions.
 *
 * @package vahizstore
 */

/**
 * Create style background-image.
 *
 * @since  1.0.0
 */
function style($is_image) {
    $url = '';
    if ( $is_image ) {
        $url = 'url(' . esc_url( $is_image ) . ')';
    }

    $style = '';

    if ( $url !== '' ) {
        $style = 'background-image: ' . $url;
    }

    return esc_attr( $style );
}

/**
 * Get the landing image.
 *
 * @uses  style($is_image)
 * @since  1.0.0
 */
function vahizstore_landing_img() {
	$is_image = get_theme_mod( 'landing_image' );
	echo style($is_image);
}

function site_header_logo() {
        echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );
}

/**
 * Get other images.
 *
 * @uses  style($is_image)
 * @since  1.0.0
 */
function vahizstore_img_1() {
	$is_image = get_theme_mod( 'background_image_1' );
        echo style($is_image);
}

function vahizstore_img_2() {
	$is_image = get_theme_mod( 'background_image_2' );
        echo style($is_image);
}

function vahizstore_img_3() {
	$is_image = get_theme_mod( 'background_image_3' );
        echo style($is_image);
}