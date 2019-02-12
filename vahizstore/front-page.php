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
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php get_template_part('sections/social', 'section'); ?>
            </div>
        </div>
    </div>
</section>

<section id="spotify" class="parallax" style="<?php vahizstore_img_1() ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php get_template_part('sections/spotify', 'section'); ?>
            </div>
        </div>
    </div>
</section>

<section id="youtube">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php get_template_part('sections/youtube', 'section'); ?>
            </div>
        </div>
    </div>
</section>

<section id="bio" class="parallax" style="<?php vahizstore_img_2() ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php get_template_part('sections/biosection', 'section'); ?>
            </div>
        </div>
    </div>
</section>

<section id="tour">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php get_template_part('sections/tour_section', 'section'); ?>
            </div>
        </div>
    </div>
</section>

<section id="shop" class="parallax" style="<?php vahizstore_img_3() ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php get_template_part('sections/shopwindow', 'section'); ?>
            </div>
        </div>
    </div>
</section>

<section id="blog">
  <div class="container">
    <div class="row">
        <?php get_template_part('sections/blog', 'section'); ?>
    </div>
  </div>
</section>

<?php get_footer("frontpage"); ?>
