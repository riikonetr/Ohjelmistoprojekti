<?php
/**
 * VahizStore Customizer Class
 *
 * @package  vahizstore
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'VahizStore_Customizer' ) ) :

	/**
	 * The VahizStore Customizer class
	 */
	class VahizStore_Customizer {
                /**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
                    add_action( 'customize_register', array( $this, 'customize_register' ) );
		}
                
                /**
		 * Add frontpage logo and image settings.
                 * __(String, String) translator
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @since  1.0.0
		 */
		public function customize_register( $wp_customize ) {
                    define( 'CUSTOMIZER_REPEATER_VERSION', '1.1.0' );
                    require_once( 'customizer-repeater-control.php' );
                    
                    $wp_customize->add_panel( 'frontpage_panel', array(
                        'title' => __( 'Frontpage settings', 'vahizstore' ),
                        'priority' => 160,
                    ) );
                    
                    // Images section
                    $wp_customize->add_section('image_section', array(
                        'title'    => __('Background images', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));
                    
                    $wp_customize->add_setting('landing_image');
                    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'landing_image', array(
                        'label'    => __('Landing image', 'vahizstore'),
                        'section'  => 'image_section',
                        'settings' => 'landing_image',
                    )));
                    
                    $wp_customize->add_setting('background_image_1');
                    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'background_image_1', array(
                        'label'    => __('Background image 1', 'vahizstore'),
                        'section'  => 'image_section',
                        'settings' => 'background_image_1',
                    )));
                    
                    $wp_customize->add_setting('background_image_2');
                    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'background_image_2', array(
                        'label'    => __('Background image 2', 'vahizstore'),
                        'section'  => 'image_section',
                        'settings' => 'background_image_2',
                    )));
                    
                    $wp_customize->add_setting('background_image_3');
                    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'background_image_3', array(
                        'label'    => __('Background image 3', 'vahizstore'),
                        'section'  => 'image_section',
                        'settings' => 'background_image_3',
                    )));
                    
                    // Social section
                    $wp_customize->add_section('curator_section', array(
                        'title'    => __('Curator', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));
                    
                    $wp_customize->add_setting('curator_id');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'curator_id', array(
                        'label'    => __('Curator id', 'vahizstore'),
                        'section'  => 'curator_section',
                        'settings' => 'curator_id',
                        'type' => 'text',
                    )));
                    
                    // Spotify section
                    $wp_customize->add_section('spotify_section', array(
                        'title'    => __('Spotify link', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));
                    
                    $wp_customize->add_setting('spotify_link');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'spotify_link', array(
                        'label'    => __('Spotify link', 'vahizstore'),
                        'section'  => 'spotify_section',
                        'settings' => 'spotify_link',
                        'type' => 'url',
                    )));
                    
                    // Youtube section
                    $wp_customize->add_section('youtube_section', array(
                        'title'    => __('Youtube videos', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));
                    
                    $wp_customize->add_setting('youtube_videos');
                    $wp_customize->add_control( new Customizer_Repeater($wp_customize, 'youtube_videos', array(
                        'label'   => esc_html__('Links','vahizshop'),
                        'item_name' => 'Link',
                        'section' => 'youtube_section',
                        'customizer_repeater_link_control' => true,
                    )));
                    
                    // Footer section
                    $wp_customize->add_section('footer_section', array(
                        'title'    => __('Footer links', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));
                    
                    $wp_customize->add_setting('social_links');
                    $wp_customize->add_control( new Customizer_Repeater($wp_customize, 'social_links', array(
                        'label'   => esc_html__('Links with icons','vahizshop'),
                        'item_name' => 'Link',
                        'section' => 'footer_section',
                        'customizer_repeater_icon_control' => true,
                        'customizer_repeater_link_control' => true,
                    )));
                          
                }
                
                /**
                * Sanitization function.
                *
                * @param string $input Control input.
                *
                * @return string
                */
               function customizer_repeater_sanitize( $input ) {
                       $input_decoded = json_decode( $input, true );
                       if ( ! empty( $input_decoded ) ) {
                               foreach ( $input_decoded as $boxk => $box ) {
                                       foreach ( $box as $key => $value ) {
                                                       $input_decoded[ $boxk ][ $key ] = wp_kses_post( force_balance_tags( $value ) );
                                       }
                               }
                               return json_encode( $input_decoded );
                       }
                       return $input;
               }

    	}

endif;

return new VahizStore_Customizer();