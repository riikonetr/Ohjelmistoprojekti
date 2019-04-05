<?php
/**
 * VahizStore template functions.
 *
 * @package vahizstore
 */

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
	 * Displayed a link to the cart including the number of items present
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