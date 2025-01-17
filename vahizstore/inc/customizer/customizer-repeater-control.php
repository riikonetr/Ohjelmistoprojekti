<?php
/**
 * Repeatable control class based on critian ungureanu customize repeater.
 *
 * @since  1.0.0
 * @access public
 */
class Customizer_Repeater extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 */
	public $id;
	private $boxtitle = array();
	private $add_field_label = array();
	private $customizer_icon_container = '';
	private $allowed_html = array();
        public $customizer_repeater_image_control = false;
	public $customizer_repeater_icon_control = false;
	public $customizer_repeater_title_control = false;
	public $customizer_repeater_text_control = false;
	public $customizer_repeater_link_control = false;
        public $description = '';
	/*Class constructor*/
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		/*Get options from customizer.php*/
		$this->add_field_label = esc_html__( 'Add new field', 'vahizshop' );
		if ( ! empty( $args['add_field_label'] ) ) {
			$this->add_field_label = $args['add_field_label'];
		}
		$this->boxtitle = esc_html__( 'Customizer Repeater', 'vahizshop' );
		if ( ! empty ( $args['item_name'] ) ) {
			$this->boxtitle = $args['item_name'];
		} elseif ( ! empty( $this->label ) ) {
			$this->boxtitle = $this->label;
		}
                if ( ! empty( $args['customizer_repeater_image_control'] ) ) {
			$this->customizer_repeater_image_control = $args['customizer_repeater_image_control'];
		}
		if ( ! empty( $args['customizer_repeater_icon_control'] ) ) {
			$this->customizer_repeater_icon_control = $args['customizer_repeater_icon_control'];
		}
		if ( ! empty( $args['customizer_repeater_title_control'] ) ) {
			$this->customizer_repeater_title_control = $args['customizer_repeater_title_control'];
		}
		if ( ! empty( $args['customizer_repeater_text_control'] ) ) {
			$this->customizer_repeater_text_control = $args['customizer_repeater_text_control'];
		}
		if ( ! empty( $args['customizer_repeater_link_control'] ) ) {
			$this->customizer_repeater_link_control = $args['customizer_repeater_link_control'];
		}
                if ( ! empty( $args['description'] ) ) {
			$this->description = $args['description'];
		}
		if ( ! empty( $id ) ) {
			$this->id = $id;
		}
		
		$this->customizer_icon_container =  'inc/customizer/icons';
		
		$allowed_array1 = wp_kses_allowed_html( 'post' );
		$allowed_array2 = array(
			'input' => array(
				'type'        => array(),
				'class'       => array(),
				'placeholder' => array()
			)
		);
		$this->allowed_html = array_merge( $allowed_array1, $allowed_array2 );
	}
	/*Enqueue resources for the control*/
	public function enqueue() {
		wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), CUSTOMIZER_REPEATER_VERSION );
		wp_enqueue_style( 'customizer-repeater-admin-stylesheet', get_stylesheet_directory_uri().'/assets/repeater/repeater-style.css', array(), CUSTOMIZER_REPEATER_VERSION );
		wp_enqueue_script( 'customizer-repeater-script', get_stylesheet_directory_uri() . '/assets/repeater/repeater-script.js', array('jquery', 'jquery-ui-draggable', 'wp-color-picker' ), CUSTOMIZER_REPEATER_VERSION, true  );
		wp_enqueue_script( 'customizer-repeater-fontawesome-iconpicker', get_stylesheet_directory_uri() . '/assets/font-awesome/fontawesome-iconpicker.min.js', array( 'jquery' ), CUSTOMIZER_REPEATER_VERSION, true );
		wp_enqueue_style( 'customizer-repeater-fontawesome-iconpicker-script', get_stylesheet_directory_uri() . '/assets/font-awesome/fontawesome-iconpicker.min.css', array(), CUSTOMIZER_REPEATER_VERSION );
	}
	public function render_content() {
		/*Get default options*/
		$this_default = json_decode( $this->setting->default );
		/*Get values (json format)*/
		$values = $this->value();
		/*Decode values*/
		$json = json_decode( $values );
		if ( ! is_array( $json ) ) {
			$json = array( $values );
		} ?>

        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <div class="customizer-repeater-general-control-repeater customizer-repeater-general-control-droppable">
			<?php
			if ( ( count( $json ) == 1 && '' === $json[0] ) || empty( $json ) ) {
				if ( ! empty( $this_default ) ) {
					$this->iterate_array( $this_default ); ?>
                    <input type="hidden"
                           id="customizer-repeater-<?php echo esc_attr( $this->id ); ?>-colector" <?php esc_attr( $this->link() ); ?>
                           class="customizer-repeater-colector"
                           value="<?php echo esc_textarea( json_encode( $this_default ) ); ?>"/>
					<?php
				} else {
					$this->iterate_array(); ?>
                    <input type="hidden"
                           id="customizer-repeater-<?php echo esc_attr( $this->id ); ?>-colector" <?php esc_attr( $this->link() ); ?>
                           class="customizer-repeater-colector"/>
					<?php
				}
			} else {
				$this->iterate_array( $json ); ?>
                <input type="hidden" id="customizer-repeater-<?php echo esc_attr( $this->id ); ?>-colector" <?php esc_attr( $this->link() ); ?>
                       class="customizer-repeater-colector" value="<?php echo esc_textarea( $this->value() ); ?>"/>
				<?php
			} ?>
        </div>
        <button type="button" class="button add_field customizer-repeater-new-field">
			<?php echo esc_html( $this->add_field_label ); ?>
        </button>
		<?php
	}
	private function iterate_array($array = array()){
		/*Counter that helps checking if the box is first and should have the delete button disabled*/
		$it = 0;
		if(!empty($array)){
			foreach($array as $icon){ ?>
                <div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable">
                    <div class="customizer-repeater-customize-control-title">
						<?php echo esc_html( $this->boxtitle ) ?>
                    </div>
                    <div class="customizer-repeater-box-content-hidden">
                        <div class="description customize-control-description">
                            <?php echo esc_html( $this->description ) ?>
                        </div>
                        <?php
                        if(!empty($icon->id)){
                                $id = $icon->id;
                        }
                        if(!empty($icon->image_url)){
                                $image_url = $icon->image_url;
                        }
                        if(!empty($icon->icon_value)){
                                $icon_value = $icon->icon_value;
                        }
                        if(!empty($icon->title)){
                                $title = $icon->title;
                        }
                        if(!empty($icon->text)){
                                $text = $icon->text;
                        }
                        if(!empty($icon->link)){
                                $link = $icon->link;
                        }
                        if($this->customizer_repeater_image_control == true){
                                $this->image_control($image_url);
                        }
                        if($this->customizer_repeater_icon_control == true){
                                $this->icon_picker_control($icon_value);
                        }
                        if($this->customizer_repeater_title_control==true){
                                $this->input_control(array(
                                        'label' => apply_filters('repeater_input_labels_filter', esc_html__( 'Title','vahizshop' ), $this->id, 'customizer_repeater_title_control' ),
                                        'class' => 'customizer-repeater-title-control',
                                        'type'  => apply_filters('customizer_repeater_input_types_filter', '', $this->id, 'customizer_repeater_title_control' ),
                                ), $title);
                        }
                        if($this->customizer_repeater_text_control==true){
                                $this->input_control(array(
                                        'label' => apply_filters('repeater_input_labels_filter', esc_html__( 'Text','vahizshop' ), $this->id, 'customizer_repeater_text_control' ),
                                        'class' => 'customizer-repeater-text-control',
                                        'type'  => apply_filters('customizer_repeater_input_types_filter', 'textarea', $this->id, 'customizer_repeater_text_control' ),
                                ), $text);
                        }
                        if($this->customizer_repeater_link_control){
                                $this->input_control(array(
                                        'label' => apply_filters('repeater_input_labels_filter', esc_html__( 'Link','vahizshop' ), $this->id, 'customizer_repeater_link_control' ),
                                        'class' => 'customizer-repeater-link-control',
                                        'sanitize_callback' => 'esc_url_raw',
                                        'type'  => apply_filters('customizer_repeater_input_types_filter', '', $this->id, 'customizer_repeater_link_control' ),
                                ), $link);
                        }
                        ?>

                        <input type="hidden" class="social-repeater-box-id" value="<?php if ( ! empty( $id ) ) {
							echo esc_attr( $id );
						} ?>">
                        <button type="button" class="social-repeater-general-control-remove-field" <?php if ( $it == 0 ) {
							echo 'style="display:none;"';
						} ?>>
							<?php esc_html_e( 'Delete field', 'vahizshop' ); ?>
                        </button>

                    </div>
                </div>

				<?php
				$it++;
			}
		} else { ?>
            <div class="customizer-repeater-general-control-repeater-container">
                <div class="customizer-repeater-customize-control-title">
					<?php echo esc_html( $this->boxtitle ) ?>
                </div>
                <div class="customizer-repeater-box-content-hidden">
					<?php
                                        if ( $this->customizer_repeater_image_control == true ) {
						$this->image_control();
					}
					if ( $this->customizer_repeater_icon_control == true ) {
						$this->icon_picker_control();
					}
					if ( $this->customizer_repeater_title_control == true ) {
						$this->input_control( array(
							'label' => apply_filters('repeater_input_labels_filter', esc_html__( 'Title','vahizshop' ), $this->id, 'customizer_repeater_title_control' ),
							'class' => 'customizer-repeater-title-control',
							'type'  => apply_filters('customizer_repeater_input_types_filter', '', $this->id, 'customizer_repeater_title_control' ),
						) );
					}
					if ( $this->customizer_repeater_text_control == true ) {
						$this->input_control( array(
							'label' => apply_filters('repeater_input_labels_filter', esc_html__( 'Text','vahizshop' ), $this->id, 'customizer_repeater_text_control' ),
							'class' => 'customizer-repeater-text-control',
							'type'  => apply_filters('customizer_repeater_input_types_filter', 'textarea', $this->id, 'customizer_repeater_text_control' ),
						) );
					}
					if ( $this->customizer_repeater_link_control == true ) {
						$this->input_control( array(
							'label' => apply_filters('repeater_input_labels_filter', esc_html__( 'Link','vahizshop' ), $this->id, 'customizer_repeater_link_control' ),
							'class' => 'customizer-repeater-link-control',
							'type'  => apply_filters('customizer_repeater_input_types_filter', '', $this->id, 'customizer_repeater_link_control' ),
						) );
					}
					?>
                    <input type="hidden" class="social-repeater-box-id">
                    <button type="button" class="social-repeater-general-control-remove-field button" style="display:none;">
						<?php esc_html_e( 'Delete field', 'vahizshop' ); ?>
                    </button>
                </div>
            </div>
			<?php
		}
	}
	private function input_control( $options, $value='' ){ ?>

		<?php
		if( !empty($options['type']) ){
			switch ($options['type']) {
				case 'textarea':?>
                    <span class="customize-control-title"><?php echo esc_html( $options['label'] ); ?></span>
                    <textarea class="<?php echo esc_attr( $options['class'] ); ?>" placeholder="<?php echo esc_attr( $options['label'] ); ?>"><?php echo ( !empty($options['sanitize_callback']) ?  call_user_func_array( $options['sanitize_callback'], array( $value ) ) : esc_attr($value) ); ?></textarea>
					<?php
					break;
				case 'color':
					$style_to_add = '';
					if( $options['choice'] !== 'customizer_repeater_icon' ){
						$style_to_add = 'display:none';
					}?>
                    <span class="customize-control-title" <?php if( !empty( $style_to_add ) ) { echo 'style="'.esc_attr( $style_to_add ).'"';} ?>><?php echo esc_html( $options['label'] ); ?></span>
                    <div class="<?php echo esc_attr($options['class']); ?>" <?php if( !empty( $style_to_add ) ) { echo 'style="'.esc_attr( $style_to_add ).'"';} ?>>
                        <input type="text" value="<?php echo ( !empty($options['sanitize_callback']) ?  call_user_func_array( $options['sanitize_callback'], array( $value ) ) : esc_attr($value) ); ?>" class="<?php echo esc_attr($options['class']); ?>" />
                    </div>
					<?php
					break;
			}
		} else { ?>
            <span class="customize-control-title"><?php echo esc_html( $options['label'] ); ?></span>
            <input type="text" value="<?php echo ( !empty($options['sanitize_callback']) ?  call_user_func_array( $options['sanitize_callback'], array( $value ) ) : esc_attr($value) ); ?>" class="<?php echo esc_attr($options['class']); ?>" placeholder="<?php echo esc_attr( $options['label'] ); ?>"/>
			<?php
		}
	}
        
	private function icon_picker_control($value = ''){
		?>
                <div class="social-repeater-general-control-icon">
                    <span class="customize-control-title">
                        <?php esc_html_e('Icon','vahizshop'); ?>
                    </span>
                    <span class="description customize-control-description">
                        <?php
                        echo sprintf(
                                esc_html__( 'Note: Some icons may not be displayed here. You can see the full list of icons at %1$s.', 'vahizshop' ),
                                sprintf( '<a href="http://fontawesome.io/icons/" rel="nofollow">%s</a>', esc_html__( 'http://fontawesome.io/icons/', 'vahizshop' ) )
                        ); ?>
                    </span>
                    <div class="input-group icp-container">
                        <input data-placement="bottomRight" class="icp icp-auto" value="<?php if(!empty($value)) { echo esc_attr( $value );} ?>" type="text">
                        <span class="input-group-addon">
                            <i class="fab <?php echo esc_attr($value); ?>"></i>
                        </span>
                    </div>
                                <?php get_template_part( $this->customizer_icon_container ); ?>
                </div>
                        <?php
	}
        
        private function image_control($value = ''){ ?>
                <div class="customizer-repeater-image-control">
                    <span class="customize-control-title">
                        <?php esc_html_e('Image','your-textdomain')?>
                    </span>
                    <input type="text" class="widefat custom-media-url" value="<?php echo esc_attr( $value ); ?>">
                    <input type="button" class="button button-secondary customizer-repeater-custom-media-button" value="<?php esc_attr_e( 'Upload Image','your-textdomain' ); ?>" />
                </div>
                        <?php
	}

}
