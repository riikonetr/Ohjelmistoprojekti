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
                <?php $post_id = $post->ID; ?>
                <?php $product = wc_get_product( $post_id ); ?>
                <a class="product-link d-block mb-4" href="<?php echo $product->get_permalink(); ?>">
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );?>
                    <?php $title = $product->get_title(); ?>
                    <?php $price = $product->get_price(); ?>
                    <?php $salePrice = $product->get_sale_price(); ?>
                    <?php $onsaleStartDate = $product->get_date_on_sale_from(); ?>
                    <?php $onsaleEndDate = $product->get_date_on_sale_to(); ?>
                    <img class="product-img img-thumbnail" src="<?php  echo $image[0]; ?>">
                    <div class="product-text">
                        <?php if($salePrice) { ?>
                            <h6 class="product-onsale">On sale</h6>
                            <?php if($onsaleStartDate && $onsaleEndDate) { ?>
                                <h6 class="product-onsale"><?php  echo $onsaleStartDate->date( 'd.m.Y' ); ?> - <?php  echo $onsaleEndDate->date( 'd.m.Y' ); ?></h6>
                            <?php } ?>
                        <?php } ?>
                        <h2><?php  echo $title; ?></h2>
                        <hr>
                        <h3><?php  echo $price; ?> &euro;</h3>
                    </div>
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
