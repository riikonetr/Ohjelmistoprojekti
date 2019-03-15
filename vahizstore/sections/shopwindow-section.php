<?php
/**
 *
 * Contains peek to the shop
 *
 * @package vahizstore
 */

?>

<h3><center>Shop</center></h3>


<?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 12
    );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {
        $counter = 0;
        while ( $loop->have_posts() ) : $loop->the_post();
            if($counter % 3 == 0) {
?>
                <div class="row">
<?php
            }
?>
            <div class="col-md-4 col-sm-12">
                <a class="d-block mb-4" href="<?php echo get_the_permalink() ?>">
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
                    <img class="img-thumbnail" src="<?php  echo $image[0]; ?>">
                </a>
            </div>
<?php
            $counter++;
            if($counter % 3 == 0) {
?>
                </div>
<?php
            }
        endwhile;
        if($counter % 3 != 0) {
?>
            </div>
<?php
        }
    } else {
        echo __( 'No products found' );
    }
    wp_reset_postdata();
?>
