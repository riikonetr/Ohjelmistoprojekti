<?php
/**
 *
 * Embedded youtube posts
 *
 * @package vahizstore
 */

?>

<h3><center><?php element_title('bio_title'); ?></center></h3>

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
    <div id="band-members" class="bandmembers row no-gutters">
<?php
    $band_members= get_theme_mod('band_members', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
    /*This returns a json so we have to decode it*/
    $customizer_repeater_decoded = json_decode($band_members);
    foreach($customizer_repeater_decoded as $repeater_item){
?>
        <div class="col-6 col-sm-6 col-md">
            <figure class="member-container">
                <img class="member-image" src="<?php echo $repeater_item->image_url ?>">
                <div class="member-text"><?php echo $repeater_item->title ?></div>
            </figure>
        </div>
<?php
    }
?>
    </div>
</div>
