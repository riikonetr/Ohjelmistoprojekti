<?php
/**
 *
 * Embedded Youtube videos
 *
 * @package vahizstore
 */

?>

<!--Carousel Wrapper-->
<div id="video-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

<?php
    $_active = 'active';
    $youtube_video_link_ids = get_theme_mod('youtube_link_ids', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
    /*This returns a json so we have to decode it*/
    $youtube_video_link_ids_decoded = json_decode($youtube_video_link_ids);
    foreach($youtube_video_link_ids_decoded as $youtube_link_id){
        $link_id = $youtube_link_id->text;
        $embedded_youtube = 'https://www.youtube.com/embed/' . $link_id;
?>
        <!-- Slide -->
        <div class="carousel-item <?php  echo $_active ?>">

            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php  echo $embedded_youtube ?>" allowfullscreen></iframe>
            </div>

        </div>
        <!-- /.Slide -->
<?php
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
?>
    <ol class="carousel-indicators">
<?php
    foreach($youtube_video_link_ids_decoded as $youtube_link_id){
        $link_id = $youtube_link_id->text;
        $youtube_img_src = 'https://img.youtube.com/vi/' . $link_id . '/1.jpg';
?>
        <li data-target="#video-carousel" data-slide-to="<?php echo $_n_thumb ?>" class="<?php echo $_active ?>">
            <img class="d-block w-100" src="<?php echo $youtube_img_src ?>" class="img-fluid">
        </li>
<?php
        $_active = '';
        $_n_thumb = $_n_thumb+1;
    }
?>
    </ol>
</div>
<!--Carousel Wrapper-->
