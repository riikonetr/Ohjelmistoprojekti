<?php
/**
 *
 * Embedded youtube posts
 *
 * @package vahizstore
 */

?>

<?php
    $args = array(
        'post_type' => 'page',
     
    );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {
        $counter = 0;
        while ( $loop->have_posts() ) : $loop->the_post();
          the_content();
        endwhile;
    }
?>
