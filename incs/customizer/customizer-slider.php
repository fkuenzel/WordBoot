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
		'title'			=> __( 'Slider Einstellungen', 'bs4_lang' ),
	)
);
$wp_customize->add_section(
	'bs4_carousel_colors', array(
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'bs4_carousel_panel',
		'priority'		=> 10,
		'title'			=> __( 'Slider Farb Einstellungen', 'bs4_lang' ),
	)
);
$wp_customize->add_section(
	'bs4_carousel_uploads', array(
		'capability'	=> 'edit_theme_options',
		'description'	=> __( 'Lade bis zu Fünf Bilder für den Slider hoch oder wähle diese aus der WordPress Mediathek.', 'bs4_lang'),
		'panel'			=> 'bs4_carousel_panel',
		'priority'		=> 20,
		'title'			=> __( 'Slider Bilder-Upload', 'bs4_lang' ),
	)
); 
$wp_customize->add_section(
	'bs4_carousel_js_options', array(
		'capability'	=> 'edit_theme_options',
		'description'	=> '',
		'panel'			=> 'bs4_carousel_panel',
		'priority'		=> 30,
		'title'			=> __( 'Slider JavaScript Optionen', 'bs4_lang' ),
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
		'default'				=> false,
		//'sanitize_callback'		=> 'bs4_sanitize_choices',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'bs4_carousel_status',
	array(
		'choices' 		=> array(
							false  	=> __( 'Nein', 'bs4_lang' ),
							true   	=> __( 'Ja', 'bs4_lang' ),
						 ),
		'description'	=> '',
		'label'    		=> __( 'Slider Aktiv?', 'bs4_lang' ),
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
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'bs4_carousel_controls',
	array(
		'choices'		=> array(
							'false'  	=> __( 'No', 'bs4_lang' ),
							'true'   	=> __( 'Yes', 'bs4_lang' ),
						),
		'description'	=> __( 'Füge Steuerelemente (Pfeile) hinzu.', 'bs4_lang' ),
		'label'    		=> __( 'Steuerelemente?', 'bs4_lang' ),
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
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'bs4_carousel_indicators',
	array(
		'choices'  		=> array(
							'false'  	=> __( 'No', 'bs4_lang' ),
							'true'   	=> __( 'Yes', 'bs4_lang' ),
						),
		'description'	=> __( 'Sie können auch die Indikatoren zum Slider hinzufügen.', 'bs4_lang' ),
		'label'    		=> __( 'Indikatoren anzeigen?', 'bs4_lang' ),
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
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'bs4_carousel_caption',
	array(
		'choices'  		=> array(
							'false'  	=> __( 'No', 'bs4_lang' ),
							'true'   	=> __( 'Yes', 'bs4_lang' ),
						),
		'description'	=> __( 'F&uuml;ge beschriftungen zu den Sliderfolien an.<br /><em>Hierzu mu&szlig; &uuml;ber die Mediathek bei den gew&auml;hlten Bilder das Feld "Beschreibung" Ausgef&uuml;llt sein.', 'bs4_lang' ),
		'label'    		=> __( 'Slider Beschriftungen?', 'bs4_lang' ),
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
		'transport'			=> 'postMessage',
		'type'       		=> 'theme_mod',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bs4_carousel_controls_color',
	array(
		'description'	=> __( 'Welche Farben sollen die Steuerelemente haben?', 'bs4_lang' ),
		'label'    		=> __('Steuerelemente Farben', 'bs4_lang' ),
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
		'transport'			=> 'postMessage',
		'type'       		=> 'theme_mod',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bs4_carousel_indicator_color',
	array(
		'description'	=> __( 'Welche Farbe sollen die Indikatoren haben?', 'bs4_lang' ),
		'label'    		=> __('Indikatoren Farbe', 'bs4_lang' ),
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
		'transport'			=> 'postMessage',
		'type'       		=> 'theme_mod',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bs4_carousel_caption_background_color',
	array(
		'description'	=> __( 'Welche Hintergrundfarbe soll der Beschriftungsbreich des Sliders haben?', 'bs4_lang' ),
		'label'   		=> __('Hintergrundfarbe Beschriftung', 'bs4_lang' ),
		'section'  		=> 'bs4_carousel_colors',
		'settings' 		=> 'bs4_carousel_caption_background_color',
		'priority' 		=> 20,
	)
));

$wp_customize->add_setting( 
	'bs4_carousel_caption_background_transparent', array(
		'default'			=> '0.75',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'postMessage',
		'type'				=> 'theme_mod',
	)
);
$wp_customize->add_control( 'bs4_carousel_caption_background_transparent',
	array(
		'description' 	=> __('Wieviel Transparente soll der Beschriftungshintergrund behommen?', 'bs4_lang' ),
		'input_attrs' 	=> array(
							'min'   => 0,
							'max'   => 1.0,
							'step'  => 0.25,
						),
		'label'       	=> __('Beschriftungs Transparente', 'bs4_lang'),
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
		'transport'			=> 'postMessage',
		'type'				=> 'theme_mod',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bs4_carousel_caption_text_color',
	array(
		'description'	=> __( 'Welche Textfarbe soll der Beschriftungstext haben?', 'bs4_lang' ),
		'label'    		=> __('Beschriftungs Textfarbe', 'bs4_lang'),
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
		'label'   => __( 'Bild 1', 'bs4_lang' ),
		'slug'    => 'bs4_carousel_img_1',
		'transport' => 'refresh'
	);
	$sliders[] = array(
		'default' => '',
		'label'   => __( 'Bild 2', 'bs4_lang' ),
		'slug'    => 'bs4_carousel_img_2',
		'transport' => 'refresh'
	);
	$sliders[] = array(
		'default' => '',
		'label'   => __( 'Bild 3', 'bs4_lang' ),
		'slug'    => 'bs4_carousel_img_3',
		'transport' => 'refresh'
	);
	$sliders[] = array(
		'default' => '',
		'label'   => __( 'Bild 4', 'bs4_lang' ),
		'slug'    => 'bs4_carousel_img_4',
		'transport' => 'refresh'
	);
	$sliders[] = array(
		'default' => '',
		'label'   => __( 'Bild 5', 'bs4_lang' ),
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
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'bs4_carousel_js_interval',
	array(
		'description'	=> __( 'Die Zeitspanne zwischen dem automatischen fahren eines Artikels. Wenn <code>false</code>, schaltet Slider nicht automatisch.', 'bs4_lang' ),
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
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'bs4_carousel_js_keyboard',
	array(
		'choices'  		=> array(
							'false'  	=> __( 'Nein', 'bs4_lang' ),
							'true'   	=> __( 'Ja', 'bs4_lang' ),
						),
		'description'	=> __( 'Soll der Slider auf Tastatur Eingabe reagieren?.', 'bs4_lang' ),
		'label'    		=> __( 'Tastatur', 'bs4_lang' ),
		'section'		=> 'bs4_carousel_js_options',
		'settings' 		=> 'bs4_carousel_js_keyboard',
		'priority' 		=> 10,
		'type'     		=> 'select',		
	)
); 

$wp_customize->add_setting( 'bs4_carousel_js_pause', 
	array(
		'default'				=> 'hover',
		'transport'				=> 'postMessage',
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
		'description'	=> __( 'Wenn auf <code>"hover"</code> gesetzt ist, pausiert das fahren des Sliders auf <code>mouseenter</code> und setzt den Zyklus des Sliders auf <code>mouseleave</code> fort. Wenn auf <code>null</code> gesetzt ist, wird das Hover über den Slider nicht pausieren.', 'bs4_lang' ),
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
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'bs4_carousel_js_ride',
	array(
		'choices'  		=> array(
							'false'		  	=> __( 'false', 'bs4_lang' ),
							'carousel'   	=> __( 'carousel', 'bs4_lang' ),
						),
		'description'	=> __( 'Bei Aktivierung fährt der Slider Automatisch weiter, wenn er durch den Benutzer angehalten wurde.', 'bs4_lang' ),
		'label'    		=> __( 'Weiterlauf', 'bs4_lang' ),
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
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'bs4_carousel_js_wrap',
	array(
		'choices'  		=> array(
							'false'  	=> __( 'Nein', 'bs4_lang' ),
							'true'   	=> __( 'Ja', 'bs4_lang' ),
						),
		'description'	=> __( 'Soll der Slider kontinuierlich ablaufen oder am Ende Pauseren?', 'bs4_lang' ),
		'label'    		=> __( 'Wrap', 'bs4_lang' ),
		'section'		=> 'bs4_carousel_js_options',
		'settings' 		=> 'bs4_carousel_js_wrap',
		'priority' 		=> 40,
		'type'     		=> 'select',		
	)
); 
?>