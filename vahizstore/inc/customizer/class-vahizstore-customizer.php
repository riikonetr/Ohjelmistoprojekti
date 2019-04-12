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
                        'description' => 'Give the id of your Curator. XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX (32 characters long).',
                        'type' => 'text',
                    )));

										// Media section
                    $wp_customize->add_section('media_section', array(
                        'title'    => __('Media links', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));

                    $wp_customize->add_setting('youtube_media_visible');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'youtube_media_visible', array(
                        'label'    => __('Show Youtube', 'vahizstore'),
                        'section'  => 'media_section',
                        'settings' => 'youtube_media_visible',
                        'type' => 'checkbox',
                    )));

                    $wp_customize->add_setting('spotify_media_visible');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'spotify_media_visible', array(
                        'label'    => __('Show Spotify', 'vahizstore'),
                        'section'  => 'media_section',
                        'settings' => 'spotify_media_visible',
                        'type' => 'checkbox',
                    )));

                    $wp_customize->add_setting('youtube_link_ids');
                    $wp_customize->add_control( new Customizer_Repeater($wp_customize, 'youtube_link_ids', array(
                        'label'   => esc_html__('Youtube Link Ids','vahizshop'),
                        'item_name' => 'Link id',
                        'section' => 'media_section',
                        'description' => 'Give the id of youtube page you wish to display. It is the part after v= https://www.youtube.com/watch?v=XXXXXXXXXXX (11 characters long).',
                        'customizer_repeater_text_control' => true,
                    )));

                    $wp_customize->add_setting('spotify_link_id');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'spotify_link_id', array(
                        'label'    => __('Spotify link', 'vahizstore'),
                        'section'  => 'media_section',
                        'settings' => 'spotify_link_id',
                        'description' => 'Give the id of spotify page you wish to display. It is the last part of address https://open.spotify.com/artist/XXXXXXXXXXXXXXXXXXXXXX (22 characters long).',
                        'type' => 'text',
                    )));

                    // Member section (Bio)
                    $wp_customize->add_section('member_section', array(
                        'title'    => __('Band members', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));

                    $wp_customize->add_setting('band_members');
                    $wp_customize->add_control( new Customizer_Repeater($wp_customize, 'band_members', array(
                        'label'   => esc_html__('Members','vahizshop'),
                        'item_name' => 'Member',
                        'section' => 'member_section',
                        'customizer_repeater_image_control' => true,
                        'customizer_repeater_title_control' => true,
                    )));

  		    // Tour section
                    $wp_customize->add_section('tour_section', array(
                        'title'    => __('Songkick', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));

 		    $wp_customize->add_setting('band_name');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'band_name', array(
                        'label'   => esc_html__('Band\'s name','vahizshop'),
                        'section' => 'tour_section',
			'settings' => 'band_name',
                        'type' => 'text',
                    )));

                    $wp_customize->add_setting('artist_id');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'artist_id', array(
                        'label'   => esc_html__('Artist id','vahizshop'),
                        'item_name' => 'ArtistId',
                        'section' => 'tour_section',
			'settings' => 'artist_id',
                    )));

                    //Blog section
                    $wp_customize->add_section('blog_section', array(
                        'title'    => __('Blog settings', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));

                    $wp_customize->add_setting('blog_default_image');
                    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'blog_default_image', array(
                        'label'    => __('Blog default image', 'vahizstore'),
                        'section'  => 'blog_section',
                        'settings' => 'blog_default_image',
                    )));

                    // Footer section
                    $wp_customize->add_section('social_section', array(
                        'title'    => __('Social links', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));

                    $wp_customize->add_setting('social_links');
                    $wp_customize->add_control( new Customizer_Repeater($wp_customize, 'social_links', array(
                        'label'   => esc_html__('Links with icons','vahizshop'),
                        'item_name' => 'Link',
                        'section' => 'social_section',
                        'customizer_repeater_icon_control' => true,
                        'customizer_repeater_link_control' => true,
                    )));

                    // Contact details
                    $wp_customize->add_section('contact_section', array(
                        'title'    => __('Contact details', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));

                    $wp_customize->add_setting('contact_email');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'contact_email', array(
                        'label'    => __('Contact email', 'vahizstore'),
                        'section'  => 'social_section',
                        'settings' => 'contact_email',
                        'type' => 'email',
                    )));

                    // Hide/display sections
                    $wp_customize->add_section('visibility_section', array(
                        'title'    => __('Section visibility', 'vahizstore'),
                        'panel' => 'frontpage_panel',
                    ));

                    $wp_customize->add_setting('social_visible');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'social_visible', array(
                        'label'    => __('Social feed', 'vahizstore'),
                        'section'  => 'visibility_section',
                        'settings' => 'social_visible',
                        'type' => 'checkbox',
                    )));

                    $wp_customize->add_setting('media_visible');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'media_visible', array(
                        'label'    => __('Media', 'vahizstore'),
                        'section'  => 'visibility_section',
                        'settings' => 'media_visible',
                        'type' => 'checkbox',
                    )));

                    $wp_customize->add_setting('bio_visible');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'bio_visible', array(
                        'label'    => __('Bio', 'vahizstore'),
                        'section'  => 'visibility_section',
                        'settings' => 'bio_visible',
                        'type' => 'checkbox',
                    )));

                    $wp_customize->add_setting('tour_visible');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'tour_visible', array(
                        'label'    => __('Tour', 'vahizstore'),
                        'section'  => 'visibility_section',
                        'settings' => 'tour_visible',
                        'type' => 'checkbox',
                    )));

                    $wp_customize->add_setting('shop_visible');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'shop_visible', array(
                        'label'    => __('Shop', 'vahizstore'),
                        'section'  => 'visibility_section',
                        'settings' => 'shop_visible',
                        'type' => 'checkbox',
                    )));

                    $wp_customize->add_setting('blog_visible');
                    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'blog_visible', array(
                        'label'    => __('Blog', 'vahizstore'),
                        'section'  => 'visibility_section',
                        'settings' => 'blog_visible',
                        'type' => 'checkbox',
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
