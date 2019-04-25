<?php
/**
 *
 * Embedded youtube posts
 *
 * @package vahizstore
 */

?>

<h3 class="section-title"><?php element_title('bio_title'); ?></h3>

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

<div class="row no-gutters">
<?php
    $band_members= get_theme_mod('band_members', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
    /*This returns a json so we have to decode it*/
    $customizer_repeater_decoded = json_decode($band_members);
    foreach($customizer_repeater_decoded as $repeater_item){
?>
        <div class="col">
            <figure class="member-container">
                <img class="member-image" src="<?php echo $repeater_item->image_url ?>" alt="Member image">
                <div class="member-text"><?php echo $repeater_item->title ?></div>
            </figure>
        </div>
<?php
    }
?>
</div>