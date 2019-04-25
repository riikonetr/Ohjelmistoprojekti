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
    <div id="page" class="front-page">
        <header role="banner" class="header-sticky">

            <div class="parallax" style="<?php vahizstore_landing_img() ?>">
                <div class="container-fluid header-logo">
                  <div class="row justify-content-md-center align-items-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                      <?php storefront_site_title_or_logo() ?>
                    </div>
                  </div>
                </div>
            </div>
            <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                    <a class="navbar-toggler-icon"></a>
                </button>
                <?php do_action('vahizstore_header_cart'); ?>
                <div class="navbar-collapse collapse justify-content-center" id="navbar">
                    <ul class="navbar-nav">

                      <?php if(get_theme_mod('social_visible')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#social"><?php element_nav_title('social_nav_title'); ?></a>
                        </li>
                      <?php endif; ?>

                      <?php if(get_theme_mod('media_visible')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#media"><?php element_nav_title('media_nav_title'); ?></a>
                        </li>
                      <?php endif; ?>

                      <?php if(get_theme_mod('bio_visible')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#bio"><?php element_nav_title('bio_nav_title'); ?></a>
                        </li>
                      <?php endif; ?>

                      <?php if(get_theme_mod('tour_visible')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#tour"><?php element_nav_title('tour_nav_title'); ?></a>
                        </li>
                      <?php endif; ?>

                      <?php if(get_theme_mod('shop_visible')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#shop"><?php element_nav_title('shop_nav_title'); ?></a>
                        </li>
                      <?php endif; ?>

                      <?php if(get_theme_mod('blog_visible')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#blog"><?php element_nav_title('blog_nav_title'); ?></a>
                        </li>
                      <?php endif; ?>

                    </ul>
                </div>
            </nav>

        </header><!-- #masthead -->
