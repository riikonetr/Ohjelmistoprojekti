<?php
/**
 *
 * Embedded Youtube videos & Spotify playlist
 *
 * @package vahizstore
 */

?>
<h3 class="section-title"><?php element_title('media_title'); ?></h3>

<?php
if(get_theme_mod('youtube_media_visible')) {
    get_template_part('sections/youtube', 'section');
}
?>

<?php
if(get_theme_mod('spotify_media_visible')) {
    get_template_part('sections/spotify', 'section');
}
?>
