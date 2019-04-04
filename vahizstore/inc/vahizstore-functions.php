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


function title() {

    $name = get_theme_mod( 'band_name' );
    $heading = $name.' '.'tour dates';

    echo esc_attr( $heading );
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
 * Get spotify url.
 *
 * @since  1.0.0
 */
function spotify_url() {
        $url = get_theme_mod( 'spotify_link' );
        echo source($url);
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

/**
 * Get social links.
 *
 * @since  1.0.0
 */
function social_links_footer() {
        $footer_links = get_theme_mod('social_links', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
        /*This returns a json so we have to decode it*/
        $customizer_repeater_example_decoded = json_decode($footer_links);
        foreach($customizer_repeater_example_decoded as $repeater_item){
            echo '<li class="list-inline-item">';
            echo '<a class="nav-link" href="' . $repeater_item->link . '">';
            echo '<span class="fab ' . $repeater_item->icon_value . '"></span>';
            echo '</a>';
            echo '</li>';
        }
}

function social_links_sidebar() {
        $footer_links = get_theme_mod('social_links', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
        /*This returns a json so we have to decode it*/
        $customizer_repeater_example_decoded = json_decode($footer_links);
        foreach($customizer_repeater_example_decoded as $repeater_item){
            echo '<li class="list-group-item">';
            echo '<a class="nav-link" href="' . $repeater_item->link . '">';
            echo '<span class="fab ' . $repeater_item->icon_value . '"></span>';
            echo '</a>';
            echo '</li>';
        }
}

