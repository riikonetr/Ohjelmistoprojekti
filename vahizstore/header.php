<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package VahizShop
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="vahiz-header" role="banner">
            
            <div class="parallax" style="<?php vahizstore_header_img() ?>">
                <div class="header-logo">
                    <?php site_header_logo() ?>
                </div>
            </div>
            
            <?php
            /**
             * Functions hooked into vahizstore_header action based on storefront hooks
             *
             * @hooked vahizstore_header_container                 - 0
             * @hooked vahizstore_primary_navigation_wrapper_close - 10
             */
            do_action( 'vahizstore_header' );
            ?>

	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">
		<?php
		do_action( 'storefront_content_top' );
