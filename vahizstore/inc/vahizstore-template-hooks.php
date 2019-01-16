<?php
/**
 * VahizStore hooks
 *
 * @package vahizstore
 */

/**
 * Header
 *
 * @see  storefront_primary_navigation()
 */
add_action( 'vahizstore_header', 'vahizstore_header_container', 0 );
add_action( 'vahizstore_header', 'storefront_primary_navigation_wrapper', 5 );
add_action( 'vahizstore_header', 'vahizstore_primary_navigation', 10 );
add_action( 'vahizstore_header', 'storefront_primary_navigation_wrapper_close', 15 );
add_action( 'vahizstore_header', 'vahizstore_header_container_close', 20 );