<?php
/**
 * WooCommerce Template Functions.
 *
 * @package storefront
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
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function vahizstore_cart_link() {
                    if(WC()->cart->get_cart_contents_count() > 0) {
		?>
                    <div class="d-flex flex-fill">
                        <a class="navbar-brand frontpage-cart-contents" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                            <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
                            <span class="fas fa-shopping-basket header-basket"></span>
                        </a>
                    </div>
		<?php
                    } else {
                ?>
                    <div class="d-flex flex-fill"><!--spacer--> </div>
                <?php
                    }
	}
}