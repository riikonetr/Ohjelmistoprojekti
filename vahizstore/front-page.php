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

<div class="sidebar">
    <ul class="nav flex-column">
<?php
    $social_links = get_theme_mod('social_links', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
    /*This returns a json so we have to decode it*/
    $social_links_decoded = json_decode($social_links);
    foreach($social_links_decoded as $social_link){
?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $social_link->link ?>">
                <span class="fab <?php echo $social_link->icon_value ?>"></span>
            </a>
        </li>
<?php
    }
?>
    </ul>
</div>

<?php if(get_theme_mod('social_visible')) : ?>
  <section id="social" class="parallax" style="<?php vahizstore_img_1() ?>">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <?php get_template_part('sections/social', 'section'); ?>
              </div>
          </div>
      </div>
  </section>
<?php endif; ?>

<?php if(get_theme_mod('media_visible')) : ?>
  <section id="media">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <?php get_template_part('sections/media', 'section'); ?>
              </div>
          </div>
      </div>
  </section>
<?php endif; ?>

<?php if(get_theme_mod('bio_visible')) : ?>
  <section id="bio" class="parallax" style="<?php vahizstore_img_2() ?>">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <?php get_template_part('sections/bio', 'section'); ?>
              </div>
          </div>
      </div>
  </section>
<?php endif; ?>

<?php if(get_theme_mod('tour_visible')) : ?>
    <section id="tour">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                     <?php get_template_part('sections/tour', 'section'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(get_theme_mod('shop_visible')) : ?>
  <section id="shop" class="parallax" style="<?php vahizstore_img_3() ?>">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <?php get_template_part('sections/shopwindow', 'section'); ?>
              </div>
          </div>
      </div>
  </section>
<?php endif; ?>


<?php if(get_theme_mod('blog_visible')) : ?>
  <section id="blog">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php get_template_part('sections/blog', 'section'); ?>
        <div>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php get_footer("frontpage"); ?>
