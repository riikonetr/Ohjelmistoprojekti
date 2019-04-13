<?php
/**
 *
 * Blog posts
 *
 * @package vahizstore
 */
?>
<style>
    #myCarousel .carousel-caption {
        left:0;
        right:0;
        bottom:0;
        text-align:left;
        padding:10px;
        background:rgba(0,0,0,0.6);
        text-shadow:none;
    }

    #myCarousel .list-group {
        color: black;
        position:absolute;
        top:0;
        right:0;
        display: flex;
        flex-direction: column;
        height: 100% !important;
        overflow: hidden;
    }
    #myCarousel .list-group-item {
        color: black;
        border-radius:0px;
        cursor:pointer;
        flex: 1;
    }
    #myCarousel .list-group .active {
        color: black;
        background-color:#eee;
    }

    @media (min-width: 992px) {
        #myCarousel {padding-right:33.3333%;}
        #myCarousel .carousel-controls {display:none;}
    }
    @media (max-width: 991px) {
        .carousel-caption p,
        #myCarousel .list-group {display:none;}
    }

    .list-group-item:hover { filter: brightness(85%) }
    .list-group-item:active { filter: brightness(70%) }

    .blog-image{
        width: 760px;
        height: 400px;
        object-fit: cover;
        background-image: linear-gradient(to left top, #acacac, #c0c0c0, #d5d5d5, #eaeaea, #ffffff);
    }
</style>

<h3><center><?php element_title('blog_title'); ?></center></h3>


<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

<?php

    $args = array(
        'category_name' => 'blog',
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
            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
              <span class="fas fa-3x fa-arrow-alt-circle-left"></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
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
            <li data-target="#myCarousel" data-slide-to="<?php echo $slide_index++ ?>" class="list-group-item"><?php echo get_the_title() ?></li>
<?php
        }
      }
      wp_reset_query();
?>
    </ul>

</div><!-- End Carousel -->
