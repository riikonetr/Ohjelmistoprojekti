<?php
/**
 *
 * Tour section posts
 *
 * @package vahizstore
 */

?>





 


<?php



$otsikko = "KEIKAT";
    $args = array(
        'post_type' => 'keikka',
	'post_status'    => 'publish',
  	'posts_per_page' => -1,

	'orderby'        => 'date_',
  	// you don't need 'meta_key' => 'date_de_concert' when using meta_query
  	//'meta_key'     => 'date_de_concert',
  	'order'          => 'ASC',
  	'meta_query'     => array(
                        array(
                          'key'     => 'date_',
/*
                          'value'   => strtotime( 'today' ), //tämä aiheutti sen, että keikoista tulostui vain 								     //enintään viisi päivää nykyhetkestä tulevaisuuteen 								     //sijoittuvat 
*/
                          'compare' => '<'
                        )
                      )
  	

     
    );
 ?>


	
<?php
    $loop = new WP_Query( $args );

my_title_place_holder('',$loop);


    if ( $loop->have_posts() ) {
        $counter = 0;

        while ( $loop->have_posts() ) : $loop->the_post(); 
?>

<?php
if ( $counter == 0 ) {
?>
<p>
</p>
<p>
</p>
<h3><?php echo $otsikko ?></h3>

<?php }else{
?>
<p>
</p>
<?php }?>

<?php
        // the_title();
 
          the_content();

?>






<?php echo get_post_meta(get_the_ID(), 'paikkakunta', true).', '; 
      echo get_post_meta(get_the_ID(), 'maa', true).', '; 
      echo get_post_meta(get_the_ID(), 'date_', true);

?>
</br>

<?php
echo get_post_meta(get_the_ID(), 'url', true);
?>



</br>
</br>

<p>
</p>
         



 	

<?php

$counter = $counter+1; 
           
     endwhile;

    }

wp_reset_query();


// This should now display the page's title
//the_title();
?>

<p>
</p>



   
