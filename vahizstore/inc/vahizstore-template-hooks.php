<?php
/**
 * VahizStore hooks
 *
 * @package vahizstore
 */

/**
 * Header
 *
 * @see vahizstore_cart_link()
 */
add_action( 'vahizstore_header_cart', 'vahizstore_cart_link', 0 );

/**
 * Add to Storefront Cart fragment
 *
 */
add_filter( 'add_to_cart_fragments', 'vahizstore_cart_link_fragment' );