<?php
/**
 *
 * Blog posts
 *
 * @package vahizstore
 */
?>

<h3><center>News</center></h3>

<style>
.carousel-item {
  color: white;
}

.card{
  height: 40vw;
  background: linear-gradient(-45deg, rgb(41, 50, 60), rgb(72, 85, 99));
}

.card-header{
  color: w;
}

</style>



<div class="col-1">
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
</div>
<div class="col-9">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

<!-- PHP --->
<?php

$args = array( 'category_name' => 'blog' );
// The Query
$the_query = new WP_Query( $args );
$_active = 'active';
// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();

    //POST
    echo '<div class="carousel-item '.$_active.'">';
    echo '<div class="card"';
    if ( has_post_thumbnail() ) {
      echo 'style="background: url(\'';
      the_post_thumbnail_url("medium_large");
      echo '\'); background-size: cover; background-position: center;">';
    }else{
      echo '>';
    }

    echo  '<a class="text-light" href="';
    echo  the_permalink();
    echo  '">';

    echo  '<div class="card-header">';
    echo  get_the_title();

    echo  '</div>';
    echo  '</a>';
    echo  '<div class="card-body">';
    echo  '<div class="card-text">';
    #echo  the_content();
    $link = '<a class="text-light" href="' . get_the_permalink() . '"> ... </a>';
    echo  wp_trim_words( get_the_content(), 150, $link);
    echo  '</div>';
    echo  '</div>';
    echo  '</div>';
    echo '</div>';



    $_active = '';
  }
}
?>

    </div>
  </div>
</div>
<div class="col-1">
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
