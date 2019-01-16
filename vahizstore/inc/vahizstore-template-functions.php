<?php
/**
 * VahizStore template functions.
 *
 * @package vahizstore
 */

if ( ! function_exists( 'vahizstore_header_container' ) ) {
	/**
	 * The header container
	 */
	function vahizstore_header_container() {
		echo '<div class="col-full">';
	}
}

// Hakee ensisijaisen valikon kentät. Toiminta selvitettävä ja css säädettävä.
if ( ! function_exists( 'vahizstore_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function vahizstore_primary_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
		<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span><?php echo esc_attr( apply_filters( 'storefront_menu_toggle_text', __( 'Menu', 'storefront' ) ) ); ?></span></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'primary-navigation',
				)
			);

			wp_nav_menu(
				array(
					'theme_location'  => 'handheld',
					'container_class' => 'handheld-navigation',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'vahizstore_header_container_close' ) ) {
	/**
	 * The header container close
	 */
	function vahizstore_header_container_close() {
		echo '</div>';
	}
}
