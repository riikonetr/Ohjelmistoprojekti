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
										require_once( 'control-repeater.php' );

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

                    $wp_customize->add_setting('youtube_videos');
                    $wp_customize->add_control( new Customizer_Repeater($wp_customize, 'youtube_videos', array(
                        'label'   => esc_html__('Youtube Links','vahizshop'),
                        'item_name' => 'Link',
                        'section' => 'media_section',
                        'customizer_repeater_link_control' => true,
                    )));

										$wp_customize->add_setting('spotify_link');
										$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'spotify_link', array(
												'label'    => __('Spotify link', 'vahizstore'),
												'section'  => 'media_section',
												'settings' => 'spotify_link',
												'type' => 'url',
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
										/*
										$wp_customize->add_setting('spotify_visible');
										$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'spotify_visible', array(
																		'label'    => __('Spotify', 'vahizstore'),
																		'section'  => 'visibility_section',
																		'settings' => 'spotify_visible',
																		'type' => 'checkbox',
										)));
										*/
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

										//ONKO OK? -lkoh
										$wp_customize->add_setting('shop_visible');
										$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'shop_visible', array(
																		'label'    => __('Bio', 'vahizstore'),
																		'section'  => 'visibility_section',
																		'settings' => 'shop_visible',
																		'type' => 'checkbox',
										)));

										//ONKO OK? -lkoh
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


										$wp_customize->add_section( 'onepress_team_content' ,
											array(
												'priority'    => 6,
												'title'       => esc_html__( 'Band Members', 'vahizstore' ),
												'description' => '',
												'panel'       => 'frontpage_panel',
											)
										);

										// Team member settings
										$wp_customize->add_setting(
											'onepress_team_members',
											array(
												'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
												'transport' => 'refresh', // refresh or postMessage
											) );


										$wp_customize->add_control(new Onepress_Customize_Repeatable_Control( $wp_customize, 'onepress_team_members', array(
																		'label'     => esc_html__('Team members', 'vahizstore'),
																		'description'   => '',
																		'section'       => 'onepress_team_content',
																		//'live_title_id' => 'user_id', // apply for unput text and textarea only
																		'title_format'  => esc_html__( '[live_title]', 'vahizstore'), // [live_title]
																		'max_item'      => 6, // Maximum item can add
																		'limited_msg' 	=> wp_kses_post( __( 'Pois tällaset', 'vahizstore' ) ),
																		'fields'    => array(
																			'user_id' => array(
																				'title' => esc_html__('User media', 'vahizstore'),
																				'type'  =>'media',
																				'desc'  => '',
																			),
																			'link' => array(
																				'title' => esc_html__('Custom Link', 'vahizstore'),
																				'type'  =>'text',
																				'desc'  => '',
																			),
																		),
																	)
																)
															);



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
