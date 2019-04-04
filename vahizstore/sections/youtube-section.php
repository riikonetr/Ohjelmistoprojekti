<?php
/**
 *
 * Embedded Youtube videos
 *
 * @package vahizstore
 */

?>
<style>
.carousel-control-prev,
.carousel-control-next {
  visibility: hidden;
  text-shadow: 3px 3px 16px #272634
}

.carousel:hover
.carousel-control-next { visibility: visible; }
.carousel:hover
.carousel-control-prev { visibility: visible; }

.carousel-control-next:active { filter: invert(100%); }
.carousel-control-prev:active { filter: invert(100%); }

.carousel-indicators{
  position: static
}

.carousel
.carousel-indicators li{
  width: auto !important;
  height: auto !important;
}

.carousel img{
border-radius: 0px !important;
}
</style>

<!--Carousel Wrapper-->
<div id="video-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">

<!--Slides-->
<div class="carousel-inner" role="listbox">

<?php

$_active = 'active';

    //TODO: Will be changed to media section
    $youtube_video_links = get_theme_mod('youtube_videos', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
    /*This returns a json so we have to decode it*/
    $youtube_video_links_decoded = json_decode($youtube_video_links);
    foreach($youtube_video_links_decoded as $youtube_link){
        $link = $youtube_link->link;
        if(strpos($link, 'watch') !== false ) {
            $link = str_replace('/watch?v=','/embed/',$link);
        }

        echo '<!-- Slide -->';
        echo '<div class="carousel-item '.$_active.'">';

        echo '<div class="embed-responsive embed-responsive-16by9">';
        echo '<iframe class="embed-responsive-item" src="' . $link . '" allowfullscreen></iframe>';
        echo '</div>';

        echo '</div>';
        echo '<!-- slide -->';



        #echo '<div class="embed-responsive embed-responsive-16by9">';
        #echo '<iframe class="embed-responsive-item" src="' . $link . '" allowfullscreen></iframe>';
        #echo '</div>';

        $_active = '';
    }

?>
<!--Controls-->
<a class="carousel-control-prev" href="#video-carousel" role="button" data-slide="prev">
<i class="fas fa-3x fa-arrow-alt-circle-left"></i>
</a>
<a class="carousel-control-next" href="#video-carousel" role="button" data-slide="next">
<i class="fas fa-3x fa-arrow-alt-circle-right"></i>
</a>
<!--/.Controls-->

</div>
<!--/.Slides-->

<?php
$_active = 'active';
$_n_thumb = 0;
#Carousel indicator thumbnails
echo '<ol class="carousel-indicators">';
$youtube_video_links = get_theme_mod('youtube_videos', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
$youtube_video_links_decoded = json_decode($youtube_video_links);
foreach($youtube_video_links_decoded as $youtube_link){
    $link = $youtube_link->link;
    if(strpos($link, 'watch') !== false ) {
        $link = str_replace('/watch?v=','/embed/',$link);
    }
  echo '<li data-target="#video-carousel" data-slide-to="'.$_n_thumb.'" class="'.$_active.'">';
  echo '<img class="d-block w-100"';
  echo 'src="https://img.youtube.com/vi/'.substr($link,-11).'/1.jpg"';
  echo 'class="img-fluid"></li>';

  $_active = '';
  $_n_thumb = $_n_thumb+1;

}
echo '</ol>';
?>
</div>
<!--Carousel Wrapper-->
