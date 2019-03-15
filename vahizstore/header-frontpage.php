
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
                <div class="header-logo">
                    <?php site_header_logo() ?>
                </div>
            </div>
            <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                    <a class="navbar-toggler-icon"></a>
                </button>
                <?php do_action('vahizstore_header_cart'); ?>
                <div class="navbar-collapse collapse justify-content-center" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#social">Feed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#spotify">Music</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#youtube">Videos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#bio">Bio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tour">Tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#shop">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#blog">Blog</a>
                        </li>
                    </ul>
                </div>
            </nav>

        </header><!-- #masthead -->
