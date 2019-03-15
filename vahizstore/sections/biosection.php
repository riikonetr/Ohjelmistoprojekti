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
