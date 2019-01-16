<?php
/**
 * VahizStore functions.
 *
 * @package vahizstore
 */

/**
 * Create paralax img.
 *
 * @uses  get_header_image()
 * @since  2.0.0
 */
function vahizstore_header_img() {
	$is_header_image = get_header_image();
	$url = '';

	if ( $is_header_image ) {
		$url = 'url(' . esc_url( $is_header_image ) . ')';
	}
        
        $style = '';

	if ( $url !== '' ) {
		$style = 'background-image: ' . $url;
	}

        echo esc_attr( $style );
}

function site_header_logo() {
        echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );
}