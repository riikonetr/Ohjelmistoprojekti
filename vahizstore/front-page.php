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

<section id="social">
  <div class="row">
    <div class="col-sm-12">
        <?php get_template_part('sections/social', 'section'); ?>
    </div>
  </div>
</section>

<section id="spotify">
  <div class="row">
        <div class="col-sm-12">
            <span>Spotify</span>
        </div>
    </div>
</section>

<section id="youtube">
  <div class="row">
    <div class="col-sm-12">
        <?php get_template_part('sections/youtube', 'section'); ?>
    </div>
  </div>
</section>

<section id="bio">
  <div class="row">
    <div class="col-sm-12">
        <?php get_template_part('sections/biosection', 'section'); ?>
    </div>
  </div>
</section>

<section id="tour">
    <div class="row">
        <div class="col-sm-12">
            <span>Gigs from Facebook</span>
        </div>
    </div>
</section>

<section id="shop">
    <div class="row">
        <div class="col-sm-12">
            <?php get_template_part('sections/shopwindow', 'section'); ?>
        </div>
    </div>
</section>

<section id="blog">
    <div class="row">
        <div class="col-sm-12">
            <span>Articles</span>
        </div>
    </div>
</section>

<?php get_footer("frontpage"); ?>
