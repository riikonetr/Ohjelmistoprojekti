<?php
/**
 * The front page template file.
 *
 * The front-page.php template file is used to render your site's front page,
 * whether the front page displays the blog posts index (mentioned above) or a static page.
 * The front page template takes precedence over the blog posts index (home.php) template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package VahizStore
 */

get_header("frontpage");

?>

<div class="row">
    <span>Social media</span>
</div>

<div class="row">
    <span>Spotify</span>
</div>

<div class="row">
    <span>Youtube</span>
</div>

<div class="row">
    <span>Bio</span>
</div>

<div class="row">
    <span>Gigs from Facebook</span>
</div>

<section id="shopwindow">
    <div class="row">
        <div class="col-sm-12">
            <?php get_template_part('sections/shopwindow', 'section'); ?>
        </div>
    </div>
</section>

<div class="row">
    <span>Articles</span>
</div>

<?php get_footer("frontpage"); ?>
