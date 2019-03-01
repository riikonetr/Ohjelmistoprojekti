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
                    $wp_customize->add_section('landing_section', array(
                        'title'    => __('Landing settings', 'vahizstore'),
                        'priority' => 120,
                    ));
                    
                    // Use default settings
                    $wp_customize->add_setting('landing_image');
                    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'landing_image', array(
                        'label'    => __('Landing image', 'vahizstore'),
                        'section'  => 'landing_section',
                        'settings' => 'landing_image',
                    )));
                    
                    $wp_customize->add_setting('background_image_1');
                    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'background_image_1', array(
                        'label'    => __('Background image 1', 'vahizstore'),
                        'section'  => 'landing_section',
                        'settings' => 'background_image_1',
                    )));
                    
                    $wp_customize->add_setting('background_image_2');
                    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'background_image_2', array(
                        'label'    => __('Background image 2', 'vahizstore'),
                        'section'  => 'landing_section',
                        'settings' => 'background_image_2',
                    )));
                    
                    $wp_customize->add_setting('background_image_3');
                    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'background_image_3', array(
                        'label'    => __('Background image 3', 'vahizstore'),
                        'section'  => 'landing_section',
                        'settings' => 'background_image_3',
                    )));
                }

    	}

endif;

return new VahizStore_Customizer();