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
  //add_action( 'init', 'remove_keikka_editor' );

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



  add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

  function add_my_post_types_to_query( $query ) {
      if ( is_home() && $query->is_main_query() )
          $query->set( 'post_type', array( 'post', 'keikka' ) );
      return $query;
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
