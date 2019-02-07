
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
    <div id="page">
        <header role="banner" class="header-sticky">

            <div class="parallax" style="<?php vahizstore_header_img() ?>">
                <div class="header-logo">
                    <?php site_header_logo() ?>
                </div>
            </div>

            <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="#social">Feed</a>
                        <a class="nav-item nav-link" href="#spotify">Music</a>
                        <a class="nav-item nav-link" href="#youtube">Videos</a>
                        <a class="nav-item nav-link" href="#bio">Bio</a>
                        <a class="nav-item nav-link" href="#tour">Tour</a>
                        <a class="nav-item nav-link" href="#shop">Shop</a>
                        <a class="nav-item nav-link" href="#blog">Blog</a>
                    </div>
                </div>
            </nav>

        </header><!-- #masthead -->

        <div class="container">
