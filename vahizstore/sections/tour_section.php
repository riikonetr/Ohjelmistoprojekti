  <?php
  /**
  *
  * Tour section posts
  *
  * @package vahizstore
  */

  ?>

  <?php


  $otsikko = "Gladenfold On The Road";
  $otsikko2 = "Earlier gigs";

  $today = current_time('Y/m/d');


  $args = array (
    'post_type'              => 'keikka',
    'meta_query'             => array(
      array(
        'key'       => 'date_',
        'value'     => $today,
        'compare'   => '>=',
      ),
    ),
    'meta_key'               => 'date_',
    'orderby'                => 'meta_value',
    'order'                  => 'ASC'
  );



  $args2 = array (
    'post_type'              => 'keikka',
    'meta_query'             => array(
      array(
        'key'       => 'date_',
        'value'     => $today,
        'compare'   => '<',
      ),
    ),
    'meta_key'               => 'date_',
    'orderby'                => 'meta_value',
    'order'                  => 'DESC'
  );



  ?>


  <!--
  ---------------------------------------------------------------------------- Upcoming gigs----->

  <h3><?php echo $otsikko ?></h3>
  </br>
  <?php $custom_query = new WP_Query($args);

  while($custom_query->have_posts()) : $custom_query->the_post(); ?>

  <?php
  $date = get_post_meta(get_the_ID(), 'date_', true);
  $title = get_the_title(get_the_ID());
  if(!empty($title)){
    echo $title.', ';
  }
  ?>

  <?php
  //echo get_post_meta(get_the_ID(), 'otsikko', true).', ';
  echo get_post_meta(get_the_ID(), 'paikkakunta', true).', ';
  echo get_post_meta(get_the_ID(), 'maa', true).', ';
  $val1 = strval($date[0]);
  $val2 = strval($date[1]);
  $val3 = strval($date[2]);
  $val4 = strval($date[3]);

  $year = $val1.$val2.$val3.$val4;

  $val5 = strval($date[5]);
  $val6 = strval($date[6]);

  $month = $val5.$val6;

  $val7 = strval($date[8]);
  $val8 = strval($date[9]);

  $day = $val7.$val8;

  $date = $day.'.'.$month.'.'.$year;

  echo $date;
  ?>
  </br>

  <?php echo get_post_meta(get_the_ID(), 'url', true); ?>
  </br>
  </br>

  <?php endwhile; ?>
  <?php wp_reset_postdata(); // reset the query ?>



  <!--
  ---------------------------------------------------------------------------- Earlier gigs----->

  <?php $custom_query = new WP_Query($args2);
  if($custom_query->have_posts()){
    ?>
  </br>
  <h3><?php echo $otsikko2 ?></h3>
  </br>
  <?php }
  while($custom_query->have_posts()) : $custom_query->the_post(); ?>

  <?php
  $date = get_post_meta(get_the_ID(), 'date_', true);
  $title = get_the_title(get_the_ID());
  if(!empty($title)){
    echo $title.', ';
  }
  ?>

  <?php
  //echo get_post_meta(get_the_ID(), 'otsikko', true).', ';
  echo get_post_meta(get_the_ID(), 'paikkakunta', true).', ';
  echo get_post_meta(get_the_ID(), 'maa', true).', ';
  $val1 = strval($date[0]);
  $val2 = strval($date[1]);
  $val3 = strval($date[2]);
  $val4 = strval($date[3]);

  $year = $val1.$val2.$val3.$val4;

  $val5 = strval($date[5]);
  $val6 = strval($date[6]);

  $month = $val5.$val6;

  $val7 = strval($date[8]);
  $val8 = strval($date[9]);

  $day = $val7.$val8;

  $date = $day.'.'.$month.'.'.$year;

  echo $date;
  ?>
  </br>

  <?php echo get_post_meta(get_the_ID(), 'url', true); ?>
  </br>
  </br>

  <?php endwhile; ?>
  <?php wp_reset_postdata(); // reset the query ?>



  <!---------------------------------------------------------------------------end of 'Earlier gigs'
  -->
