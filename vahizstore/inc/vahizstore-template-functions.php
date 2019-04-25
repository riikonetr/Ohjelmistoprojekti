<?php
/**
 * VahizStore template functions.
 *
 * @package vahizstore
 */

/**
* Include bootsrap
 */
if ( ! function_exists( 'bootsrap_enqueue_styles' ) ) {
    function bootsrap_enqueue_styles() {
        if( is_front_page() || is_singular('post') ) {
            wp_register_style( 'bootstrapStyle', get_stylesheet_directory_uri() . '/assets/bootsrap/bootstrap.min.css' );
            wp_enqueue_style( 'bootstrapStyle' );
        }
    }
}

if ( ! function_exists( 'bootsrap_enqueue_scripts' ) ) {
    function bootsrap_enqueue_scripts() {
        if( is_front_page() || is_singular('post') ) {
            wp_register_script('bootstrapScript', get_stylesheet_directory_uri() . '/assets/bootsrap/bootstrap.min.js');
            wp_enqueue_script( 'bootstrapScript' );
        }
    }
}

/**
* Include awesome-fonts
 */
if ( ! function_exists( 'awesomefonts_enqueue_styles' ) ) {
    function awesomefonts_enqueue_styles() {
        wp_register_style( 'awesomeStyle', get_stylesheet_directory_uri() . '/assets/font-awesome/font-awesome.min.css' );
        wp_enqueue_style( 'awesomeStyle' );
    }
}

/*
 * Customize new product editor
 */
if ( ! function_exists( 'remove_product_editor' ) ) {
    function remove_product_editor() {
        remove_post_type_support( 'product', 'editor' );
    }
}

/*
* Customize product view
*/
if ( ! function_exists( 'remove_storefront_sidebar' ) ) {
    function remove_storefront_sidebar() {
        if ( is_woocommerce() ) {
            remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
        }
    }
}

if ( ! function_exists( 'vahizstore_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments
	 * Ensure cart contents update on front page 
         * when products are added to the cart via AJAX
	 *
	 * @param  array $fragments Fragments to refresh via AJAX.
	 * @return array            Fragments to refresh via AJAX
	 */
	function vahizstore_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();
		vahizstore_cart_link();
		$fragments['a.frontpage-cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

if ( ! function_exists( 'vahizstore_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displays a link to the cart including the number of items present
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function vahizstore_cart_link() {
                if(WC()->cart->get_cart_contents_count() > 0) {
                    ?>
                        <a class="navbar-brand frontpage-cart-contents" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                            <span class="badge badge-light header-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                            <span class="fas fa-shopping-basket header-basket"></span>
                        </a>
                    <?php
                }
	}
}