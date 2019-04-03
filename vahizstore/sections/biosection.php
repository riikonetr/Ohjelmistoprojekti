<?php
/**
 *
 * Embedded youtube posts
 *
 * @package vahizstore
 */

?>

<h3><center>Biography</center></h3>

<?php
    $args = array(
        'post_type' => 'page',
        'meta_key' => '_wp_page_template',
        'meta_value' => 'bio_template.php'

    );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {
        $counter = 0;
        while ( $loop->have_posts() ) : $loop->the_post();
          the_content();
        endwhile;
    }
?>

<div class="container">
  <div id="band-members" class="bandmembers row">
    <!-- dude 1 -->
    <?php foreach(array(1, 2, 3, 4, 5) as $value): ?>
    <div class="col-lg col-md col-sm col">
        <figure class="member-container">
          <img class="member-image" width="200" height="300"  src="http://placekitten.com/200/300">
          <div class="member-middle">
            <div class="member-text">John Doe</div>
          </div>
        </figure>
    </div><!-- end col -->
  <?php endforeach; ?>
  </div>
</div><!-- container -->
