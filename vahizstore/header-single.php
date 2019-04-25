<?php
/**
 * TODO: When its known what it should look like.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package vahizstore
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
<div id="page" class="hfeed site">


	<header id="masthead" class="site-header header-sticky" role="banner" style="<?php storefront_header_styles(); ?>">
    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <a class="navbar-toggler-icon"></a>
        </button>
        <?php do_action('vahizstore_header_cart'); ?>
        <div class="navbar-collapse collapse justify-content-center" id="navbar">
            <ul class="navbar-nav">

              <?php if(get_theme_mod('social_visible')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_home_url() ?>/#social"><?php element_nav_title('social_nav_title'); ?></a>
                </li>
              <?php endif; ?>

              <?php if(get_theme_mod('media_visible')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_home_url() ?>/#media"><?php element_nav_title('media_nav_title'); ?></a>
                </li>
              <?php endif; ?>

              <?php if(get_theme_mod('bio_visible')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_home_url() ?>/#bio"><?php element_nav_title('bio_nav_title'); ?></a>
                </li>
              <?php endif; ?>

              <?php if(get_theme_mod('tour_visible')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_home_url() ?>/#tour"><?php element_nav_title('tour_nav_title'); ?></a>
                </li>
              <?php endif; ?>

              <?php if(get_theme_mod('shop_visible')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_home_url() ?>/#shop"><?php element_nav_title('shop_nav_title'); ?></a>
                </li>
              <?php endif; ?>

              <?php if(get_theme_mod('blog_visible')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_home_url() ?>/#blog"><?php element_nav_title('blog_nav_title'); ?></a>
                </li>
              <?php endif; ?>

            </ul>
        </div>
    </nav>

	</header><!-- #masthead -->



	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">
