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
 * Create curator feed.
 *
 * @since  1.0.0
 */
function curator_feed($id) {
    $feed = '';
    if ( $id ) {
        $feed = "https://cdn.curator.io/published/" . $id . ".js";
    }

    return esc_attr( $feed );
}

/**
 * Create Songkick feed.
 *
 * @since  1.0.0
 */

function songkick_tourbox_href() {

    $id = songkick_id();
    $href ='';


    if ( $id ) {

        $href = href("https://www.songkick.com/artists/" . $id );
    }

    echo esc_attr( $href );
}

function songkick_tourbox_src() {

    $id = songkick_id();
    $widget_src = '';

    if ( $id ) {

        $widget_src = source("//widget.songkick.com/" . $id . "/widget.js");
    }

    echo esc_attr( $widget_src );
}


function songkick_id() {

    $id = get_theme_mod( 'artist_id' );

    return esc_attr( $id );
}

function element_title($title_id) {

  $title = get_theme_mod($title_id);
  debug_to_console($title);
  echo esc_attr( $title );
}

/**
 * Create src.
 *
 * @since  1.0.0
 */
function source($url) {
    $src = '';
    if ( $url ) {
        $src = 'src=' . esc_url( $url );
    }

    return esc_attr( $src );
}

/**
 * Create href.
 *
 * @since  1.0.0
 */
function href($url) {
    $href = '';
    if ( $url ) {
        $href = 'href=' . esc_url( $url );
    }

    return esc_attr( $href );
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

/**
 * Get curator id.
 *
 * @since  1.0.0
 */
function curator() {
        $id = get_theme_mod( 'curator_id' );
        echo curator_feed($id);
}

/**
 * Get shop_posts_per_page.
 *
 * @since  1.0.0
 */
 function shop_posts_per_page() {
   return get_theme_mod( 'shop_items_per_page' );
 }


/**
 * Get spotify url.
 *
 * @since  1.0.0
 */
function spotify_url() {
        $id = get_theme_mod( 'spotify_link_id' );
        if($id) {
            $embed_spotify = 'https://open.spotify.com/embed/artist/' . $id;
            echo source($embed_spotify);
        }
}

/**
 * Get sanitized contact email.
 *
 * @since  1.0.0
 */
function contact_email() {
        $email = sanitize_email(get_theme_mod('contact_email'));
        echo '<i class="fas fa-envelope mr-3"></i>';
        echo $email;
}
