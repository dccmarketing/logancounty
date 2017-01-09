<?php
/**
 * Logan County Theme Customizer
 *
 * Contains methods for customizing the theme customization screen.
 *
 * @link 		https://codex.wordpress.org/Theme_Customization_API
 * @since 		1.0.0
 * @package  	Logan_County
 */

// Register panels, sections, and controls
add_action( 'customize_register', 'logancounty_register_panels' );
add_action( 'customize_register', 'logancounty_register_sections' );
add_action( 'customize_register', 'logancounty_register_fields' );

// Output custom CSS to live site
add_action( 'wp_head', 'logancounty_header_output' );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init', 'logancounty_live_preview' );

/**
 * Registers custom panels for the Customizer
 *
 * @see			add_action( 'customize_register', $func )
 * @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
 * @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 * @since 		1.0.0
 */
function logancounty_register_panels( $wp_customize ) {

	// Theme Options Panel
	$wp_customize->add_panel( 'theme_options',
		array(
			'capability'  		=> 'edit_theme_options',
			'description'  		=> esc_html__( 'Options for Destination Logan County', 'logan-county' ),
			'priority'  		=> 10,
			'theme_supports'  	=> '',
			'title'  			=> esc_html__( 'Theme Options', 'logan-county' ),
		)
	);

	/*
	// Theme Options Panel
	$wp_customize->add_panel( 'theme_options',
		array(
			'capability'  		=> 'edit_theme_options',
			'description'  		=> esc_html__( 'Options for Destination Logan County', 'logan-county' ),
			'priority'  		=> 10,
			'theme_supports'  	=> '',
			'title'  			=> esc_html__( 'Theme Options', 'logan-county' ),
		)
	);
	*/

} // logancounty_register_panels()

/**
 * Registers custom sections for the Customizer
 *
 * Existing sections:
 *
 * Slug 				Priority 		Title
 *
 * title_tagline 		20 				Site Identity
 * colors 				40				Colors
 * header_image 		60				Header Image
 * background_image 	80				Background Image
 * nav 					100 			Navigation
 * widgets 				110 			Widgets
 * static_front_page 	120 			Static Front Page
 * default 				160 			all others
 *
 * @see			add_action( 'customize_register', $func )
 * @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
 * @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 * @since 		1.0.0
 */
function logancounty_register_sections( $wp_customize ) {

	// Home Page Section
	$wp_customize->add_section( 'homepage',
		array(
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__( 'Home Page', 'logan-county' ),
			'panel' 		=> 'theme_options',
			'priority' 		=> 10,
			'title' 		=> esc_html__( 'Home Page', 'logan-county' )
		)
	);

	// Images Section
	$wp_customize->add_section( 'images',
		array(
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__( 'Images', 'logan-county' ),
			'panel' 		=> 'theme_options',
			'priority' 		=> 10,
			'title' 		=> esc_html__( 'Images', 'logan-county' )
		)
	);



	/*
	// New Section
	$wp_customize->add_section( 'new_section',
		array(
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__( 'New Customizer Section', 'logan-county' ),
			'panel' 		=> 'theme_options',
			'priority' 		=> 10,
			'title' 		=> esc_html__( 'New Section', 'logan-county' )
		)
	);
	*/

} // logancounty_register_sections()

/**
 * Registers controls/fields for the Customizer
 *
 * Note: To enable instant preview, we have to actually write a bit of custom
 * javascript. See live_preview() for more.
 *
 * Note: To use active_callbacks, don't add these to the selecting control, it apepars these conflict:
 * 		'transport' => 'postMessage'
 * 		$wp_customize->get_setting( 'field_name' )->transport = 'postMessage';
 *
 * @see			add_action( 'customize_register', $func )
 * @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
 * @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 * @since 		1.0.0
 */
function logancounty_register_fields( $wp_customize ) {

	// Enable live preview JS for default fields
	$wp_customize->get_setting( 'blogname' )->transport 		= 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport 	= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Home Section Fields

	// Things To Do Title
	$wp_customize->add_setting(
		'things_to_do_title',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'things_to_do_title',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label'  	=> esc_html__( 'Things To Do Title', 'logan-county' ),
			'priority' => 10,
			'section'  	=> 'homepage',
			'settings' 	=> 'things_to_do_title',
			'type' 		=> 'text'
		)
	);
	$wp_customize->get_setting( 'things_to_do_title' )->transport = 'postMessage';



	// Connect Title
	$wp_customize->add_setting(
		'connect_title',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'connect_title',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label'  	=> esc_html__( 'Connect Title', 'logan-county' ),
			'priority' => 10,
			'section'  	=> 'homepage',
			'settings' 	=> 'connect_title',
			'type' 		=> 'text'
		)
	);
	$wp_customize->get_setting( 'connect_title' )->transport = 'postMessage';



	// Testimonials Title
	$wp_customize->add_setting(
		'testimonials_title',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'testimonials_title',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label'  	=> esc_html__( 'Testimonials Title', 'logan-county' ),
			'priority' => 10,
			'section'  	=> 'homepage',
			'settings' 	=> 'testimonials_title',
			'type' 		=> 'text'
		)
	);
	$wp_customize->get_setting( 'testimonials_title' )->transport = 'postMessage';



	// Upcoming Events Title
	$wp_customize->add_setting(
		'upcoming_events_title',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'upcoming_events_title',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label'  	=> esc_html__( 'Upcoming Events Title', 'logan-county' ),
			'priority' => 10,
			'section'  	=> 'homepage',
			'settings' 	=> 'upcoming_events_title',
			'type' 		=> 'text'
		)
	);
	$wp_customize->get_setting( 'upcoming_events_title' )->transport = 'postMessage';



	// Places to Stay Title
	$wp_customize->add_setting(
		'places_to_stay_title',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'places_to_stay_title',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label'  	=> esc_html__( 'Places to Stay Title', 'logan-county' ),
			'priority' => 10,
			'section'  	=> 'homepage',
			'settings' 	=> 'places_to_stay_title',
			'type' 		=> 'text'
		)
	);
	$wp_customize->get_setting( 'places_to_stay_title' )->transport = 'postMessage';



	// Happenings Title
	$wp_customize->add_setting(
		'happenings_title',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'happenings_title',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label'  	=> esc_html__( 'Happenings Title', 'logan-county' ),
			'priority' => 10,
			'section'  	=> 'homepage',
			'settings' 	=> 'happenings_title',
			'type' 		=> 'text'
		)
	);
	$wp_customize->get_setting( 'happenings_title' )->transport = 'postMessage';



	// Friend Us Title
	$wp_customize->add_setting(
		'friend_us_title',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'friend_us_title',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label'  	=> esc_html__( 'Friend Us Title', 'logan-county' ),
			'priority' => 10,
			'section'  	=> 'homepage',
			'settings' 	=> 'friend_us_title',
			'type' 		=> 'text'
		)
	);
	$wp_customize->get_setting( 'friend_us_title' )->transport = 'postMessage';





	// Images Section Fields

	// Media Upload Field
	// Can be used for images
	// Returns the image ID, not a URL
	$wp_customize->add_setting(
		'default_header_image',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'default_header_image',
			array(
				'description' 	=> esc_html__( '', 'logan-county' ),
				'label' => esc_html__( 'Default Header Image', 'logan-county' ),
				'mime_type' => '',
				'priority' => 10,
				'section' => 'images',
				'settings' => 'default_header_image'
			)
		)
	);
	$wp_customize->get_setting( 'default_header_image' )->transport = 'postMessage';

	// Media Upload Field
	// Can be used for images
	// Returns the image ID, not a URL
	$wp_customize->add_setting(
		'slider_bg',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'slider_bg',
			array(
				'description' 	=> esc_html__( '', 'logan-county' ),
				'label' => esc_html__( 'Slider Background', 'logan-county' ),
				'mime_type' => '',
				'priority' => 10,
				'section' => 'images',
				'settings' => 'slider_bg'
			)
		)
	);
	$wp_customize->get_setting( 'slider_bg' )->transport = 'postMessage';



	/*
	// Fields & Controls

	// Text Field
	$wp_customize->add_setting(
		'text_field',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'text_field',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label'  	=> esc_html__( 'Text Field', 'logan-county' ),
			'priority' => 10,
			'section'  	=> 'new_section',
			'settings' 	=> 'text_field',
			'type' 		=> 'text'
		)
	);
	$wp_customize->get_setting( 'text_field' )->transport = 'postMessage';



	// URL Field
	$wp_customize->add_setting(
		'url_field',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'url_field',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label' => esc_html__( 'URL Field', 'logan-county' ),
			'priority' => 10,
			'section' => 'new_section',
			'settings' => 'url_field',
			'type' => 'url'
		)
	);
	$wp_customize->get_setting( 'url_field' )->transport = 'postMessage';



	// Email Field
	$wp_customize->add_setting(
		'email_field',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'email_field',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label' => esc_html__( 'Email Field', 'logan-county' ),
			'priority' => 10,
			'section' => 'new_section',
			'settings' => 'email_field',
			'type' => 'email'
		)
	);
	$wp_customize->get_setting( 'email_field' )->transport = 'postMessage';

	// Date Field
	$wp_customize->add_setting(
		'date_field',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'date_field',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label' => esc_html__( 'Date Field', 'logan-county' ),
			'priority' => 10,
			'section' => 'new_section',
			'settings' => 'date_field',
			'type' => 'date'
		)
	);
	$wp_customize->get_setting( 'date_field' )->transport = 'postMessage';


	// Checkbox Field
	$wp_customize->add_setting(
		'checkbox_field',
		array(
			'default'  	=> 'true',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'checkbox_field',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label' => esc_html__( 'Checkbox Field', 'logan-county' ),
			'priority' => 10,
			'section' => 'new_section',
			'settings' => 'checkbox_field',
			'type' => 'checkbox'
		)
	);
	$wp_customize->get_setting( 'checkbox_field' )->transport = 'postMessage';




	// Password Field
	$wp_customize->add_setting(
		'password_field',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'password_field',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label' => esc_html__( 'Password Field', 'logan-county' ),
			'priority' => 10,
			'section' => 'new_section',
			'settings' => 'password_field',
			'type' => 'password'
		)
	);
	$wp_customize->get_setting( 'password_field' )->transport = 'postMessage';



	// Radio Field
	$wp_customize->add_setting(
		'radio_field',
		array(
			'default'  	=> 'choice1',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'radio_field',
		array(
			'choices' => array(
				'choice1' => esc_html__( 'Choice 1', 'logan-county' ),
				'choice2' => esc_html__( 'Choice 2', 'logan-county' ),
				'choice3' => esc_html__( 'Choice 3', 'logan-county' )
			),
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label' => esc_html__( 'Radio Field', 'logan-county' ),
			'priority' => 10,
			'section' => 'new_section',
			'settings' => 'radio_field',
			'type' => 'radio'
		)
	);
	$wp_customize->get_setting( 'radio_field' )->transport = 'postMessage';



	// Select Field
	$wp_customize->add_setting(
		'select_field',
		array(
			'default'  	=> 'choice1',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'select_field',
		array(
			'choices' => array(
				'choice1' => esc_html__( 'Choice 1', 'logan-county' ),
				'choice2' => esc_html__( 'Choice 2', 'logan-county' ),
				'choice3' => esc_html__( 'Choice 3', 'logan-county' )
			),
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label' => esc_html__( 'Select Field', 'logan-county' ),
			'priority' => 10,
			'section' => 'new_section',
			'settings' => 'select_field',
			'type' => 'select'
		)
	);
	$wp_customize->get_setting( 'select_field' )->transport = 'postMessage';



	// Textarea Field
	$wp_customize->add_setting(
		'textarea_field',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'textarea_field',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label' => esc_html__( 'Textarea Field', 'logan-county' ),
			'priority' => 10,
			'section' => 'new_section',
			'settings' => 'textarea_field',
			'type' => 'textarea'
		)
	);
	$wp_customize->get_setting( 'textarea_field' )->transport = 'postMessage';



	// Range Field
	$wp_customize->add_setting(
		'range_field',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'range_field',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'input_attrs' => array(
				'class' => 'range-field',
				'max' => 100,
				'min' => 0,
				'step' => 1,
				'style' => 'color: #020202'
			),
			'label' => esc_html__( 'Range Field', 'logan-county' ),
			'priority' => 10,
			'section' => 'new_section',
			'settings' => 'range_field',
			'type' => 'range'
		)
	);
	$wp_customize->get_setting( 'range_field' )->transport = 'postMessage';



	// Page Select Field
	$wp_customize->add_setting(
		'select_page_field',
		array(
			'default'  	=> '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'select_page_field',
		array(
			'description' 	=> esc_html__( '', 'logan-county' ),
			'label' => esc_html__( 'Select Page', 'logan-county' ),
			'priority' => 10,
			'section' => 'new_section',
			'settings' => 'select_page_field',
			'type' => 'dropdown-pages'
		)
	);
	$wp_customize->get_setting( 'dropdown-pages' )->transport = 'postMessage';



	// Color Chooser Field
	$wp_customize->add_setting(
		'color_field',
		array(
			'default'  	=> '#ffffff',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_field',
			array(
				'description' 	=> esc_html__( '', 'logan-county' ),
				'label' => esc_html__( 'Color Field', 'logan-county' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'color_field'
			),
		)
	);
	$wp_customize->get_setting( 'color_field' )->transport = 'postMessage';



	// File Upload Field
	$wp_customize->add_setting( 'file_upload' );
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'file_upload',
			array(
				'description' 	=> esc_html__( '', 'logan-county' ),
				'label' => esc_html__( 'File Upload', 'logan-county' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'file_upload'
			),
		)
	);



	// Image Upload Field
	$wp_customize->add_setting(
		'image_upload',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'image_upload',
			array(
				'description' 	=> esc_html__( '', 'logan-county' ),
				'label' => esc_html__( 'Image Field', 'logan-county' ),
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'image_upload'
			)
		)
	);
	$wp_customize->get_setting( 'image_upload' )->transport = 'postMessage';



	// Media Upload Field
	// Can be used for images
	// Returns the image ID, not a URL
	$wp_customize->add_setting(
		'media_upload',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'media_upload',
			array(
				'description' 	=> esc_html__( '', 'logan-county' ),
				'label' => esc_html__( 'Media Field', 'logan-county' ),
				'mime_type' => '',
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'media_upload'
			)
		)
	);
	$wp_customize->get_setting( 'media_upload' )->transport = 'postMessage';




	// Cropped Image Field
	$wp_customize->add_setting(
		'cropped_image',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(
			$wp_customize,
			'cropped_image',
			array(
				'description' 	=> esc_html__( '', 'logan-county' ),
				'flex_height' => '',
				'flex_width' => '',
				'height' => '1080',
				'priority' => 10,
				'section' => 'new_section',
				'settings' => 'cropped_image',
				width' => '1920'
			)
		)
	);
	$wp_customize->get_setting( 'cropped_image' )->transport = 'postMessage';
	*/

} // logancounty_register_fields()

/**
 * This will generate a line of CSS for use in header output. If the setting
 * ($mod_name) has no defined value, the CSS will not be output.
 *
 * @access 		public
 * @since 		1.0.0
 * @param 		string 		$selector 		CSS selector
 * @param 		string 		$style 			The name of the CSS *property* to modify
 * @param 		string 		$mod_name 		The name of the 'theme_mod' option to fetch
 * @param 		string 		$prefix 		Optional. Anything that needs to be output before the CSS property
 * @param 		string 		$postfix 		Optional. Anything that needs to be output after the CSS property
 * @param 		bool 		$echo 			Optional. Whether to print directly to the page (default: true).
 * @return 		string 						Returns a single line of CSS with selectors and a property.
 */
function logancounty_generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {

	$return = '';
	$mod 	= get_theme_mod( $mod_name );

	if ( ! empty( $mod ) ) {

		$return = sprintf('%s { %s:%s; }',
			$selector,
			$style,
			$prefix . $mod . $postfix
		);

		if ( $echo ) {

			echo $return;

		}

	}

	return $return;

} // logancounty_generate_css()

/**
 * This will output the custom WordPress settings to the live theme's WP head.
 *
 * Used by hook: 'wp_head'
 *
 * @access 		public
 * @see 		add_action( 'wp_head', $func )
 * @since 		1.0.0
 */
function logancounty_header_output() {

	?><!-- Customizer CSS -->
	<style type="text/css"><?php

		// pattern:
		// logancounty_generate_css( 'selector', 'style', 'mod_name', 'prefix', 'postfix', true );
		//
		// background-image example:
		// logancounty_generate_css( '.class', 'background-image', 'background_image_example', 'url(', ')' );


	?></style><!-- Customizer CSS --><?php

} // logancounty_header_output()

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * Used by hook: 'customize_preview_init'
 *
 * @access 		public
 * @see 		add_action( 'customize_preview_init', $func )
 * @since 		1.0.0
 */
function logancounty_live_preview() {

	wp_enqueue_script( 'logancounty_customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'jquery', 'customize-preview' ), '', true );

} // logancounty_live_preview()


