<?php
/**
 *
 * Blog posts
 *
 * @package vahizstore
 */
?>
<h3 class="section-title"><?php element_title('blog_title'); ?></h3>


<div id="blogCarousel" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

<?php

    $args = array(
        'posts_per_page' => 5,
        'post_status' => 'publish',
        'orderby' => 'publish_date',
        'order' => 'DESC'
    );
      // The Query
    $the_query = new WP_Query( $args );

    $_active = 'active';
    // The Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
?>
            <div class="carousel-item <?php echo $_active ?>">
<?php
            if ( has_post_thumbnail() ) {
?>
                <img class="blog-image" src="<?php echo the_post_thumbnail_url("large") ?>">
<?php
            }
            else if (get_theme_mod('blog_default_image')) {
?>
                <img class="blog-image" alt="" src="<?php echo get_theme_mod('blog_default_image') ?>">
<?php
            }
            else {
?>
                <img class="blog-image" alt="" src="">
<?php
            }
?>


                <div class="carousel-caption">
                    <h4><u><a class="text-light" href="<?php echo get_the_permalink() ?>">
                        <?php echo get_the_title() ?>
                    </a></u></h4>
                    <p>
<?php
                        $link = '&nbsp<a class="text-light" href="' . get_the_permalink() . '"><b><u>Read more</u></b></a>';
                        echo wp_trim_words( get_the_content(), 50, $link);
?>
                    </p>

                </div>
            </div><!-- End Item -->
<?php
            $_active = '';
        }
    }
    wp_reset_query();
?>

        <!-- Controls -->
        <div class="carousel-controls">
            <a class="carousel-control-prev" href="#blogCarousel" data-slide="prev">
              <span class="fas fa-3x fa-arrow-alt-circle-left"></span>
            </a>
            <a class="carousel-control-next" href="#blogCarousel" data-slide="next">
              <span class="fas fa-3x fa-arrow-alt-circle-right"></span>
            </a>
        </div>

    </div><!-- End Carousel Inner -->


    <ul class="list-group col-sm-4">
<?php
    $slide_index = 0;
    // The Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
?>
            <li data-target="#blogCarousel" data-slide-to="<?php echo $slide_index++ ?>" class="list-group-item"><?php echo get_the_title() ?></li>
<?php
        }
      }
      wp_reset_query();
?>
    </ul>

</div><!-- End Carousel -->
