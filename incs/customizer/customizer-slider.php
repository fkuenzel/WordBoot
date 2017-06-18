<?php
/**
 * Customizer Settings for carousel
 *
 * @since		1.0.0
 * @package		Bootstrap4
 */
 
 
/**
 * carousel Sections
 */
$wp_customize->add_section(
	'bs4_carousel_options', array(
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'bs4_carousel_panel',
		'priority'		=> 1,
		'title'			=> __( 'Carousel Settings', 'bs4_lang' ),
	)
);
$wp_customize->add_section(
	'bs4_carousel_colors', array(
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'bs4_carousel_panel',
		'priority'		=> 10,
		'title'			=> __( 'Carousel Color Settings', 'bs4_lang' ),
	)
);
$wp_customize->add_section(
	'bs4_carousel_uploads', array(
		'capability'	=> 'edit_theme_options',
		'description'	=> __( 'Upload up to five images for your Carousel Slider or select from existing images from your media library.', 'bs4_lang'),
		'panel'			=> 'bs4_carousel_panel',
		'priority'		=> 20,
		'title'			=> __( 'Carousel Image Uploads', 'bs4_lang' ),
	)
); 
$wp_customize->add_section(
	'bs4_carousel_js_options', array(
		'capability'	=> 'edit_theme_options',
		'description'	=> '',
		'panel'			=> 'bs4_carousel_panel',
		'priority'		=> 30,
		'title'			=> __( 'Carousel JavaScript Options', 'bs4_lang' ),
	)
); 
/**
 * Controlls and Settings
 */

/**
 * 1. Carousel Settings
 */  
 
/**
 * Carousel Status
 *
 * @return		true|false
 * @default		false
 */
$wp_customize->add_setting( 'bs4_carousel_status', 
	array(
		'default'				=> 'false',
		//'sanitize_callback'		=> 'bs4_sanitize_choices',
		'transport'				=> 'postMe&szlig;age',
	)
);
$wp_customize->add_control( 'bs4_carousel_status',
	array(
		'choices' 		=> array(
							'false'  	=> __( 'No', 'bs4_lang' ),
							'true'   	=> __( 'Yes', 'bs4_lang' ),
						 ),
		'description'	=> '',
		'label'    		=> __( 'Carousel Active?', 'bs4_lang' ),
		'priority' 		=> 1,
		'section'		=> 'bs4_carousel_options',
		'settings'		=> 'bs4_carousel_status',
		'type'     		=> 'select',
	)
);

/**
 * Carousel Indicators
 *
 * @return		true|false
 * @default		false
 */
$wp_customize->add_setting( 'bs4_carousel_controls', 
	array(
		'default'				=> 'false',
		//'sanitize_callback'		=> 'bs4_sanitize_choices',
		'transport'				=> 'postMe&szlig;age',
	)
);
$wp_customize->add_control( 'bs4_carousel_controls',
	array(
		'choices'		=> array(
							'false'  	=> __( 'No', 'bs4_lang' ),
							'true'   	=> __( 'Yes', 'bs4_lang' ),
						),
		'description'	=> __( 'Adding Carousel Slider controls', 'bs4_lang' ),
		'label'    		=> __( 'Show Controls?', 'bs4_lang' ),
		'section'		=> 'bs4_carousel_options',
		'settings'		=> 'bs4_carousel_controls',
		'priority'		=> 10,
		'type'			=> 'select',
		
	)
);
/**
 * Carousel Indicators
 *
 * @return		true|false
 * @default		false
 */
$wp_customize->add_setting( 'bs4_carousel_indicators', 
	array(
		'default'				=> 'false',
		//'sanitize_callback'		=> 'bs4_sanitize_choices',
		'transport'				=> 'postMe&szlig;age',
	)
);
$wp_customize->add_control( 'bs4_carousel_indicators',
	array(
		'choices'  		=> array(
							'false'  	=> __( 'No', 'bs4_lang' ),
							'true'   	=> __( 'Yes', 'bs4_lang' ),
						),
		'description'	=> __( 'You can also add the indicators to the carousel, alongside the controls, too.', 'bs4_lang' ),
		'label'    		=> __( 'Show indicators?', 'bs4_lang' ),
		'section'		=> 'bs4_carousel_options',
		'settings'		=> 'bs4_carousel_indicators',
		'priority' 		=> 20,
		'type'     		=> 'select',
	)
);
/**
 * Carousel Captions
 *
 * @return		true|false
 * @default		false
 */
$wp_customize->add_setting( 'bs4_carousel_caption', 
	array(
		'default'				=> 'false',
		//'sanitize_callback'		=> 'bs4_sanitize_choices',
		'transport'				=> 'postMe&szlig;age',
	)
);
$wp_customize->add_control( 'bs4_carousel_caption',
	array(
		'choices'  		=> array(
							'false'  	=> __( 'No', 'bs4_lang' ),
							'true'   	=> __( 'Yes', 'bs4_lang' ),
						),
		'description'	=> __( 'F&uuml;ge beschriftungen zu den Sliderfolien an.<br /><em>Hierzu mu&szlig; &uuml;ber die Mediathek bei den gew&auml;hlten Bilder das Feld "Beschreibung" Ausgef&uuml;llt sein.', 'bs4_lang' ),
		'label'    		=> __( 'Show Captions?', 'bs4_lang' ),
		'section'		=> 'bs4_carousel_options',
		'settings' 		=> 'bs4_carousel_caption',
		'priority' 		=> 30,
		'type'     		=> 'select',		
	)
);

/**
 * 2. Carousel Color Settings
 */  
$wp_customize->add_setting( 'bs4_carousel_controls_color', 
	array(
		'default'			=> '#000000',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMe&szlig;age',
		'type'       		=> 'theme_mod',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bs4_carousel_controls_color',
	array(
		'description'	=> __( 'Which color should the Controls have?', 'bs4_lang' ),
		'label'    		=> __('Carousel Controls Color', 'bs4_lang' ),
		'section'  		=> 'bs4_carousel_colors',
		'settings'		=> 'bs4_carousel_controls_color',
		'priority' 		=> 1,
	)
)); 
 
$wp_customize->add_setting( 'bs4_carousel_indicator_color', 
	array(
		'default'			=> '#ffffff',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMe&szlig;age',
		'type'       		=> 'theme_mod',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bs4_carousel_indicator_color',
	array(
		'description'	=> __( 'Which color should the Indicators have?', 'bs4_lang' ),
		'label'    		=> __('Carousel Indicators Color', 'bs4_lang' ),
		'section'  		=> 'bs4_carousel_colors',
		'settings'		=> 'bs4_carousel_indicator_color',
		'priority' 		=> 10,
	)
));

$wp_customize->add_setting( 'bs4_carousel_caption_background_color', 
	array(
		'default'			=> '#000000',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMe&szlig;age',
		'type'       		=> 'theme_mod',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bs4_carousel_caption_background_color',
	array(
		'description'	=> __( 'Which background color should the caption have?', 'bs4_lang' ),
		'label'   		=> __('Carousel Caption Background Color', 'bs4_lang' ),
		'section'  		=> 'bs4_carousel_colors',
		'settings' 		=> 'bs4_carousel_caption_background_color',
		'priority' 		=> 20,
	)
));

$wp_customize->add_setting( 
	'bs4_carousel_caption_background_transparent', array(
		'default'			=> '0.75',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'postMe&szlig;age',
		'type'				=> 'theme_mod',
	)
);
$wp_customize->add_control( 'bs4_carousel_caption_background_transparent',
	array(
		'label'       	=> __('Caption Background Transparent', 'bs4_lang'),
		'description' 	=> __('How much transparency should the caption background have?', 'bs4_lang' ),
		'input_attrs' 	=> array(
							'min'   => 0,
							'max'   => 1.0,
							'step'  => 0.25,
						),
		'type'       	=> 'range',
		'section'    	=> 'bs4_carousel_colors',
		'type'       	=> 'range',
		'priority'    	=> 30,
	)
);


$wp_customize->add_setting( 
	'bs4_carousel_caption_text_color', array(
		'default'			=> '#ffffff',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMe&szlig;age',
		'type'				=> 'theme_mod',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bs4_carousel_caption_text_color',
	array(
		'description'	=> __( 'Which text color should the caption have?', 'bs4_lang' ),
		'label'    		=> __('Carousel Caption Text Color', 'bs4_lang'),
		'section'  		=> 'bs4_carousel_colors',
		'settings' 		=> 'bs4_carousel_caption_text_color',
		'priority' 		=> 40,
	)
)); 

/**
 * 3. Carousel Image Uploads
 */ 
$sliders = array();
		
	$sliders[] = array(
		'default' => '',
		'label'   => __( 'Image One', 'bs4_lang' ),
		'slug'    => 'bs4_carousel_img_1',
		'transport' => 'refresh'
	);
	$sliders[] = array(
		'default' => '',
		'label'   => __( 'Image Two', 'bs4_lang' ),
		'slug'    => 'bs4_carousel_img_2',
		'transport' => 'refresh'
	);
	$sliders[] = array(
		'default' => '',
		'label'   => __( 'Image Three', 'bs4_lang' ),
		'slug'    => 'bs4_carousel_img_3',
		'transport' => 'refresh'
	);
	$sliders[] = array(
		'default' => '',
		'label'   => __( 'Image Four', 'bs4_lang' ),
		'slug'    => 'bs4_carousel_img_4',
		'transport' => 'refresh'
	);
	$sliders[] = array(
		'default' => '',
		'label'   => __( 'Image Five', 'bs4_lang' ),
		'slug'    => 'bs4_carousel_img_5',
		'transport' => 'refresh'
	);
	
	foreach ( $sliders as $slider ) {
		// SETTINGS
		$wp_customize->add_setting( 
			$slider['slug'], array(
				'default'    => $slider['default'],
			)
		);
		// CONTROLS
		$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, $slider['slug'],
			array(
				 'label'    => $slider['label'],
				 'section'  => 'bs4_carousel_uploads',
				 'settings' => $slider['slug']
			)
		));
	} // foreach

/**
 * 4. Carousel JavaScript Options
 */

/**
 * Carousel interval
 *
 * @type		number
 * @default		5000
 */
$wp_customize->add_setting( 'bs4_carousel_js_interval', 
	array(
		'default'				=> 5000,
		//'sanitize_callback'		=> 'bs4_sanitize_number',
		'transport'				=> 'postMe&szlig;age',
	)
);
$wp_customize->add_control( 'bs4_carousel_js_interval',
	array(
		'description'	=> __( 'The amount of time to delay between automatically cycling an item. If false, carousel will not automatically cycle.', 'bs4_lang' ),
		'label'    		=> __( 'Interval', 'bs4_lang' ),
		'section'		=> 'bs4_carousel_js_options',
		'settings' 		=> 'bs4_carousel_js_interval',
		'priority' 		=> 1,
		'type'     		=> 'number',		
	)
); 

$wp_customize->add_setting( 'bs4_carousel_js_keyboard', 
	array(
		'default'				=> true,
		'sanitize_callback'		=> 'bs4_sanitize_choices',
		'transport'				=> 'postMe&szlig;age',
	)
);
$wp_customize->add_control( 'bs4_carousel_js_keyboard',
	array(
		'choices'  		=> array(
							'false'  	=> __( 'No', 'bs4_lang' ),
							'true'   	=> __( 'Yes', 'bs4_lang' ),
						),
		'description'	=> __( 'Whether the carousel should react to keyboard events.', 'bs4_lang' ),
		'label'    		=> __( 'Keyboard', 'bs4_lang' ),
		'section'		=> 'bs4_carousel_js_options',
		'settings' 		=> 'bs4_carousel_js_keyboard',
		'priority' 		=> 10,
		'type'     		=> 'select',		
	)
); 

$wp_customize->add_setting( 'bs4_carousel_js_pause', 
	array(
		'default'				=> 'hover',
		//'sanitize_callback'		=> 'bs4_sanitize_choices',
		'transport'				=> 'postMe&szlig;age',
	)
);
$wp_customize->add_control( 'bs4_carousel_js_pause',
	array(
		'choices'  		=> array(
							'hover'   		=> 'hover',
							'mouseenter'  	=> 'mouseenter',
							'mouseleave'  	=> 'mouseleave',
							'null'			=> 'null'
						),
		'description'	=> __( 'If set to <code>"hover"</code>, pauses the cycling of the carousel on <code>mouseenter</code> and resumes the cycling of the carousel on <code>mouseleave</code>. If set to <code>null</code>, hovering over the carousel won\'t pause it.', 'bs4_lang' ),
		'label'    		=> __( 'Pause', 'bs4_lang' ),
		'section'		=> 'bs4_carousel_js_options',
		'settings' 		=> 'bs4_carousel_js_pause',
		'priority' 		=> 20,
		'type'     		=> 'select',		
	)
); 

$wp_customize->add_setting( 'bs4_carousel_js_ride', 
	array(
		'default'				=> false,
		'sanitize_callback'		=> 'bs4_sanitize_choices',
		'transport'				=> 'postMe&szlig;age',
	)
);
$wp_customize->add_control( 'bs4_carousel_js_ride',
	array(
		'choices'  		=> array(
							'false'  	=> __( 'No', 'bs4_lang' ),
							'true'   	=> __( 'Yes', 'bs4_lang' ),
						),
		'description'	=> __( 'Autoplays the carousel after the user manually cycles the first item. If "carousel", autoplays the carousel on load.', 'bs4_lang' ),
		'label'    		=> __( 'Ride', 'bs4_lang' ),
		'section'		=> 'bs4_carousel_js_options',
		'settings' 		=> 'bs4_carousel_js_ride',
		'priority' 		=> 30,
		'type'     		=> 'select',		
	)
); 

$wp_customize->add_setting( 'bs4_carousel_js_wrap', 
	array(
		'default'				=> true,
		'sanitize_callback'		=> 'bs4_sanitize_choices',
		'transport'				=> 'postMe&szlig;age',
	)
);
$wp_customize->add_control( 'bs4_carousel_js_wrap',
	array(
		'choices'  		=> array(
							'false'  	=> __( 'No', 'bs4_lang' ),
							'true'   	=> __( 'Yes', 'bs4_lang' ),
						),
		'description'	=> __( 'Whether the carousel should cycle continuously or have hard stops.', 'bs4_lang' ),
		'label'    		=> __( 'Wrap', 'bs4_lang' ),
		'section'		=> 'bs4_carousel_js_options',
		'settings' 		=> 'bs4_carousel_js_wrap',
		'priority' 		=> 40,
		'type'     		=> 'select',		
	)
); 
?>