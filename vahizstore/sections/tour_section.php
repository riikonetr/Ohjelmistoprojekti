   <?php
  /**
  *
  * Tour section posts
  *
  * @package vahizstore
  */

  ?>

  <?php

  $args = array (
    'post_type'              => 'keikka',
    
  );

  ?>


  <!--
  ---------------------------------------------------------------------------- Upcoming gigs----->


  <?php $custom_query = new WP_Query($args);
  if($custom_query->have_posts()){
    ?>
 
  <?php }
  while($custom_query->have_posts()) : $custom_query->the_post(); ?>

  <?php the_content(); ?>

  <?php endwhile; ?>
  <?php wp_reset_postdata(); // reset the query ?>



  <!---------------------------------------------------------------------------end of 'Upcoming gigs'
  -->
