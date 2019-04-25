<?php
/**
 * VahizStore hooks
 *
 * @package vahizstore
 */

/*
 * Styles
 */
add_action( 'wp_enqueue_scripts', 'bootsrap_enqueue_styles');
add_action( 'wp_enqueue_scripts', 'bootsrap_enqueue_scripts');

add_action( 'wp_enqueue_scripts', 'awesomefonts_enqueue_styles');

/*
 * Removals
 */
add_action( 'init', 'remove_product_editor' );

add_action( 'get_header', 'remove_storefront_sidebar' );

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