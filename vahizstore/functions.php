  <?php
  /**
   * VahizStore
   *
   * @package vahizstore
   */

  /**
   * Set the theme version number as a global variable
   */
  $theme			= wp_get_theme( 'vahizstore' );
  $vahizstore_version	= $theme['Version'];

  $theme			= wp_get_theme( 'storefront' );
  $storefront_version	= $theme['Version'];

  /**
   * Load the individual classes required by this theme
   */
  require_once( 'inc/class-vahizstore.php' );
  require_once( 'inc/customizer/class-vahizstore-customizer.php' );

  require 'inc/vahizstore-functions.php';
  require 'inc/vahizstore-template-hooks.php';
  require 'inc/vahizstore-template-functions.php';

  /**
  * Include bootsrap
   */
  function bootsrap_enqueue_styles() {
      wp_register_style( 'bootstrapStyle', get_stylesheet_directory_uri() . '/assets/bootsrap/bootstrap.min.css' );
      wp_enqueue_style( 'bootstrapStyle' );
  }
  add_action( 'wp_enqueue_scripts', 'bootsrap_enqueue_styles');

  function bootsrap_enqueue_scripts() {
      wp_register_script('bootstrapScript', get_stylesheet_directory_uri() . '/assets/bootsrap/bootstrap.min.js');
      wp_enqueue_script( 'bootstrapScript' );
  }
  add_action( 'wp_enqueue_scripts', 'bootsrap_enqueue_scripts');

  /**
  * Include awesome-fonts
   */
  function awesomefonts_enqueue_styles() {
      wp_register_style( 'awesomeStyle', get_stylesheet_directory_uri() . '/assets/font-awesome/font-awesome.min.css' );
      wp_enqueue_style( 'awesomeStyle' );
  }
  add_action( 'wp_enqueue_scripts', 'awesomefonts_enqueue_styles');

  add_action('init', 'keikka_register');

  /**
  * Customize new product editor
  * TODO: Move to separate php file?
  */


  function remove_product_editor() {
    remove_post_type_support( 'product', 'editor' );
  }
  add_action( 'init', 'remove_product_editor' );


  /**
  * Customize new keikka editor
  * TODO: Move to separate php file?
  */
  function remove_keikka_editor() {
    remove_post_type_support( 'keikka', 'editor' );
  }
  add_action( 'init', 'remove_keikka_editor' );

  /**
  * Customize product view
  * TODO: Move to separate php file?
  */
  function remove_storefront_sidebar() {
  	if ( is_woocommerce() ) {
  		remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
  	}
  }
  add_action( 'get_header', 'remove_storefront_sidebar' );

  /**
  * Keikka custom post type
  * TODO: Move to separate php file?
   */
  function keikka_register() {

  	$labels = array(
  		'name' => _x('Keikat', 'post type general name'),
  		'singular_name' => _x('Keikka Item', 'post type singular name'),
  		'add_new' => _x('Add New', 'keikka item'),
  		'add_new_item' => __('Add New Keikka Item'),
  		'edit_item' => __('Edit Keikka Item'),
  		'new_item' => __('New Keikka Item'),
  		'view_item' => __('View Keikka Item'),
  		'search_items' => __('Search Keikka'),
  		'not_found' =>  __('Nothing found'),
  		'not_found_in_trash' => __('Nothing found in Trash'),
  		'parent_item_colon' => ''
  	);

  	$args = array(
  		'labels' => $labels,
  		'public' => true,
  		'publicly_queryable' => true,
  		'show_ui' => true,
  		'query_var' => true,
  		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
  		'rewrite' => true,
  		'capability_type' => 'post',
  		'hierarchical' => false,
  		'menu_position' => null,
  		'supports' => array('title','editor','thumbnail')
  	  );

  	register_post_type( 'keikka' , $args );
          flush_rewrite_rules();
  }
  //Ao. kutsu on alustava -ajatuksena oli asettaa keikka-postaustyyppi Events-tyypin alle
  register_taxonomy("Events", array("keikka"), array("hierarchical" => true,  "rewrite" => true));

  add_action("admin_init", "admin_init");

  function admin_init(){

    add_meta_box("paikkakunta_meta", "Paikkakunta", "paikkakunta_meta", "keikka", "normal", "low");
    add_meta_box("maa_meta", "Maa", "maa_meta", "keikka", "normal", "low");
    add_meta_box("date__meta", "Aika", "date_", "keikka", "normal", "low");
    add_meta_box("url_meta", "URL", "url_meta", "keikka", "normal", "low");

  }

  function date_(){  //jokaiselle attribuutille on lisätty oma funktionsa
    global $post;
  $custom = get_post_custom($post->ID);
    //$date_ = date('Y-m-d',strtotime($custom["date_"][0]));
    $date_ =  $custom["date_"][0];
  ?>

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



  <input id="date_" name="date_" type="text" value="<?php echo $date_; ?>">

  <script type='text/javascript'>
  $(function () {
          $("#date_").datepicker({
              dateFormat: "yy/mm/dd",
              showOtherMonths: true,
              selectOtherMonths: true,
              autoclose: true,
              changeMonth: true,
              changeYear: true,
              //gotoCurrent: true,
          });
  });
  </script>

    <?php
  }

  function paikkakunta_meta() {
    global $post;
    $custom = get_post_custom($post->ID);
    $paikkakunta = $custom["paikkakunta"][0];

    ?>
   <label>Paikkakunta:</label>
  <input name="paikkakunta" value="<?php echo $paikkakunta; ?>" />

    <?php
  }

  function maa_meta() {
    global $post;
    $custom = get_post_custom($post->ID);
    $maa = $custom["maa"][0];

    ?>
   <label>Maa:</label>
   <input name="maa" value="<?php echo $maa; ?>" />

    <?php
  }

  function url_meta() {
    global $post;
    $custom = get_post_custom($post->ID);
    $url = $custom["url"][0];

    ?>
   <label>URL:</label>
   <input name="url" value="<?php echo $url; ?>" />

    <?php
  }




  add_action('save_post', 'save_details');

  function save_details(){
    global $post;

    if( !is_object($post) ) {
        return;
    }

    update_post_meta($post->ID, "paikkakunta", $_POST["paikkakunta"]);
    update_post_meta($post->ID, "maa", $_POST["maa"]);
    update_post_meta($post->ID, "date_", $_POST["date_"]);
    update_post_meta($post->ID, "url", $_POST["url"]);

  }


  add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

  function add_my_post_types_to_query( $query ) {
      if ( is_home() && $query->is_main_query() )
          $query->set( 'post_type', array( 'post', 'keikka' ) );
      return $query;
  }




  add_action("manage_posts_custom_column",  "keikka_custom_columns");
  add_filter("manage_edit-keikka_columns", "keikka_edit_columns");

  function keikka_edit_columns($columns){
    $columns = array(
      "title" => "Otsikko",
      "paikkakunta" => "Paikkakunta",
      "maa" => "Maa",

      "date_" => "Keikan päivämäärä",
      "url" => "URL",
    );

    return $columns;
  }
  function keikka_custom_columns($column){
    global $post;

    switch ($column) {



      case "paikkakunta":
         $custom = get_post_custom();
        echo $custom["paikkakunta"][0];
        break;

      case "maa":
         $custom = get_post_custom();
        echo $custom["maa"][0];
        break;

      case "date_":
        $custom = get_post_custom();
        echo $custom["date_"][0];
        break;
      case "url":
        $custom = get_post_custom();
        echo $custom["url"][0];
        break;
    }
  }

  add_filter('enter_title_here', 'my_title_place_holder' , 20 , 2 );
      function my_title_place_holder($title , $post){	//asettaa otsikko-osion placeholderin

          if( $post->post_type == 'keikka' ){
              $my_title = "Lisää paikkakunnan klubi/areena tähän";
              return $my_title;
          }

          return $title;

      }

  function debug_to_console( $data ) {
  if ( is_array( $data ) )
   $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
   else
   $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
  echo $output;
  }



  /*
  'supports' => array('title', 'editor', 'thumbnail');  // tämä oli osa ohjetta, mutta aiheutti koko sivun add_theme_support('post-thumbnails');  		      //toimimattomuuden
  */
