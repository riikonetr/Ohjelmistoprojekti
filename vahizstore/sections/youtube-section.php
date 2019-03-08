<?php
/**
 * 
 * Embedded Youtube videos
 *
 * @package vahizstore
 */

?>


<?php
    //TODO: Will be changed to media section
    $youtube_video_links = get_theme_mod('youtube_videos', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
    /*This returns a json so we have to decode it*/
    $youtube_video_links_decoded = json_decode($youtube_video_links);
    foreach($youtube_video_links_decoded as $youtube_link){
        $link = $youtube_link->link;
        if(strpos($link, 'watch') !== false ) {
            $link = str_replace('/watch?v=','/embed/',$link);
        }
        echo '<div class="embed-responsive embed-responsive-16by9">';
            echo '<iframe class="embed-responsive-item" src="' . $link . '" allowfullscreen></iframe>';
        echo '</div>';
    }
?>

