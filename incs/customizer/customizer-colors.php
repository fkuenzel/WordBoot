<?php
/**
 * Customizer Settings for Colors ans Texts
 *
 * @since		1.0.0
 * @package		Bootstrap4
 */
/**
 * Remove Color Section from WordPress Default Customizer
 * 
 * @since		1.0.0
 *
 */
$wp_customize->remove_section( 'colors' );


/**
 * Color and Text Sections
 */
$wp_customize->add_section(
	'bs4_body_options', array(
		'description_hidden'	=> true,
		'description'			=> __( 'Allgemeine Farb und Text Einstellungen', 'bs4_lang'),
		'capability'			=> 'edit_theme_options',
		'panel'					=> 'bs4_colors_panel',
		'priority'				=> 1,
		'title'					=> __( 'Body', 'bs4_lang' ),
	)
);
$wp_customize->add_section( 
    'background_image',  array(
        'panel' => 'bs4_colors_panel',
		'priority' => 3,
		'title' => __( 'Background Image' ),
    )
);
$wp_customize->add_section(
	'bs4_header_options', array(
		'description_hidden'	=> true,
		'description'			=> __( 'Allgemeine Text und Farb Einstellungen für den Header', 'bs4_lang'),
		'capability'			=> 'edit_theme_options',
		'panel'					=> 'bs4_colors_panel',
		'priority'				=> 3,
		'title'					=> __( 'Header', 'bs4_lang' ),
	)
);
$wp_customize->add_section( 
    'header_image',  array(
        'panel' => 'bs4_colors_panel',
		'priority' => 4,
		'title' => __( 'Header Image' ),
    )
);

$wp_customize->add_section(
	'bs4_header_navbar', array(
		'description_hidden'	=> true,
		'description'			=> __( 'Allgemeine Text und Farb Einstellungen für die Header Navbar', 'bs4_lang'),
		'capability'			=> 'edit_theme_options',
		'panel'					=> 'bs4_colors_panel',
		'priority'				=> 5,
		'title'					=> __( 'Header Navbar', 'bs4_lang' ),
	)
); 

$wp_customize->add_section(
	'bs4_content', array(
		'description_hidden'	=> true,
		'description'			=> __( 'Allgemeine Text und Farb Einstellungen für den Inhaltsbereich', 'bs4_lang'),
		'capability'			=> 'edit_theme_options',
		'panel'					=> 'bs4_colors_panel',
		'priority'				=> 6,
		'title'					=> __( 'Inhaltsbereich', 'bs4_lang' ),
	)
); 


$wp_customize->add_section(
	'bs4_footer', array(
		'description_hidden'	=> true,
		'description'			=> __( 'Allgemeine Text und Farb Einstellungen für den Footer', 'bs4_lang'),
		'capability'			=> 'edit_theme_options',
		'panel'					=> 'bs4_colors_panel',
		'priority'				=> 10,
		'title'					=> __( 'Footer', 'bs4_lang' ),
	)
); 

/**
 * Controlls and Settings
 */
 
/**
 * 1# Body Settings
 *
 * @since		1.0.0
 */

/**
 * Body Font Size
 */
$wp_customize->add_setting( 'body_font_size', 
	array(
		'default'    => '16',
		'transport'  => 'postMessage',
	)
);
$wp_customize->add_control( 'body_font_size',
	array(
		'description'	=> __( 'Default Font Size in <em>px</em>. <small><em>(DEFAULT: 16)</em></small>', 'bs4_lang' ),
		'label'    		=> __( 'Font Size', 'bs4_lang' ),
		'settings' 		=> 'body_font_size',
		'section'		=> 'bs4_body_options',
		'type'     		=> 'number',
		'priority' 		=> 1,
	)
);

/**
 * Line Height
 */
$wp_customize->add_setting( 'body_line_height', 
	array(
		'default'    => '1.5',
		'transport'  => 'postMessage',
	)
);
$wp_customize->add_control( 'body_line_height',
	array(
		'description'		=> __( 'Linien Höhe der Schrift <code>line-height</code> in <tt>em</em>', 'bs4_lang' ),
		'label'    			=> __( 'Linien Höhe', 'bs4_lang' ),
		'settings' 		=> 'body_line_height',
		'section'		=> 'bs4_body_options',
		'type'     		=> 'number',
		'priority' 		=> 2,
	)
);

/**
 * Body Font-Family
 */
$wp_customize->add_setting( 'body_font', 
	array(
		'default'       => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
		'transport'  	=> 'postMessage'
	)
);
$wp_customize->add_control( 
	new Google_Font_Dropdown_Custom_Control( 
	$wp_customize, 'body_font', 
		array(
			'description'		=> __( 'Haupt Schriftart aus dem Google Webfont Verzeichnis', 'bs4_lang' ),
			'label'    			=> __( 'Body Schriftart', 'bs4_lang' ),
			'settings'  	  	=> 'body_font',
			'section'			=> 'bs4_body_options',
			'priority'			=> 3
		) 
	)
);
 
/**
 * Body Colors
 */
$body_colors = array();
		
$body_colors[] = array(
	'slug'    => 'body_background_color',
	'default' => '',
	'label'   => __( 'Hintergrundfarbe', 'bs4_lang' )
);
$body_colors[] = array(
	'slug'    => 'body_text_color',
	'default' => '',
	'label'   => __( 'Body Textfarbe', 'bs4_lang' )
);
$i = 3;
foreach ( $body_colors as $body_color ) {
	$i++;
	// SETTINGS
	$wp_customize->add_setting( 
		$body_color['slug'], array(
			'capability' => 'edit_theme_options',
			'default'    => $body_color['default'],
			'transport' => 'postMessage',
			'type'       => 'theme_mod',
		)
	);
	// CONTROLS
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		$body_color['slug'], array(
			 'label'    => $body_color['label'],
			 'section'  => 'bs4_body_options',
			 'settings' => $body_color['slug'],
			 'priority' => $i,
		)
	));
} // foreach end
// JavaScript Changes
$wp_customize->get_setting( 'body_background_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'body_text_color' )->transport = 'postMessage';


/**
 * #2 Header
 * 
 * @since		1.0.0
 * @section		bs4_header_options
 */

$wp_customize->add_setting( 'header_pageTitle', 
	array(
		'default'       => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
		'transport'  	=> 'postMessage'
	)
);
$wp_customize->add_control( 
	new Google_Font_Dropdown_Custom_Control( 
	$wp_customize, 'header_pageTitle', 
		array(
			'description'		=> __( 'Schriftart für den Seitentitle im Header', 'bs4_lang' ),
			'label'    			=> __( 'Seitentitle Schriftart', 'bs4_lang' ),
			'settings'  	  	=> 'header_pageTitle',
			'section'			=> 'bs4_header_options',
			'priority'			=> 1
		) 
	)
);

$wp_customize->add_setting( 'header_pageDesc', 
	array(
		'default'       => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
		'transport'  	=> 'postMessage'
	)
);
$wp_customize->add_control( 
	new Google_Font_Dropdown_Custom_Control( 
	$wp_customize, 'header_pageDesc', 
		array(
			'description'		=> __( 'Schriftart für den Seitenslogan im Header', 'bs4_lang' ),
			'label'    			=> __( 'Seitenslogan Schriftart', 'bs4_lang' ),
			'settings'  	  	=> 'header_pageDesc',
			'section'			=> 'bs4_header_options',
			'priority'			=> 2
		) 
	)
);

$header_colors = array();
		
$header_colors[] = array(
	'slug'    => 'header_background_color',
	'default' => '',
	'label'   => __( 'Hintergrundfarbe Header', 'bs4_lang' )
);
$header_colors[] = array(
	'slug'    => 'header_text_color',
	'default' => '',
	'label'   => __( 'Header Textfarbe', 'bs4_lang' )
);
$i = 2;
foreach ( $header_colors as $header_color ) {
	$i++;
	// SETTINGS
	$wp_customize->add_setting( 
		$header_color['slug'], array(
			'capability' => 'edit_theme_options',
			'default'    => $header_color['default'],
			'transport' => 'postMessage',
			'type'       => 'theme_mod',
		)
	);
	// CONTROLS
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		$header_color['slug'], array(
			 'label'    => $header_color['label'],
			 'section'  => 'bs4_header_options',
			 'settings' => $header_color['slug'],
			 'priority' => $i,
		)
	));
} // foreach end
// JavaScript Changes
$wp_customize->get_setting( 'body_background_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'body_text_color' )->transport = 'postMessage';

/**
 * #3 Header Navbar
 * 
 * @since		1.0.0
 * @section		bs4_header_navbar
 */
$wp_customize->add_setting( 'navbar_text_family', 
	array(
		'default'       => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
		'transport'  	=> 'postMessage'
	)
);
$wp_customize->add_control( 
	new Google_Font_Dropdown_Custom_Control( 
	$wp_customize, 'navbar_text_family', 
		array(
			'description'		=> __( 'Schriftart für Header Navbar', 'bs4_lang' ),
			'label'    			=> __( 'Navbar Schriftart', 'bs4_lang' ),
			'settings'  	  	=> 'navbar_text_family',
			'section'			=> 'bs4_header_navbar',
			'priority'			=> 1
		) 
	)
);
$wp_customize->add_setting( 'navbar_brand_text_family', 
	array(
		'default'       => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
		'transport'  	=> 'postMessage'
	)
);
$wp_customize->add_control( 
	new Google_Font_Dropdown_Custom_Control( 
	$wp_customize, 'navbar_brand_text_family', 
		array(
			'description'		=> __( 'Schriftart für Header Navbar-Brand', 'bs4_lang' ),
			'label'    			=> __( 'Navbar-Brand Schriftart', 'bs4_lang' ),
			'settings'  	  	=> 'navbar_brand_text_family',
			'section'			=> 'bs4_header_navbar',
			'priority'			=> 2
		) 
	)
);

$navbar_colors = array();
		
$navbar_colors[] = array(
	'slug'    => 'navbar_background_color',
	'default' => '',
	'label'   => __( 'Hintergrundfarbe', 'bs4_lang' )
);
$navbar_colors[] = array(
	'slug'    => 'navbar_text_color',
	'default' => '#000',
	'label'   => __( 'Textfarbe Navbar-Brand', 'bs4_lang' )
);
$navbar_colors[] = array(
	'slug'    => 'navbar_link_color',
	'default' => '#000',
	'label'   => __( 'Linkfarbe', 'bs4_lang' )
);
$navbar_colors[] = array(
	'slug'    => 'navbar_link_hover_color',
	'default' => '#494949',
	'label'   => __( 'Linkfarbe Hover', 'bs4_lang' )
);
$navbar_colors[] = array(
	'slug'    => 'dropdown_background_color',
	'default' => '#fff',
	'label'   => __( 'Dropdown Hintergrundfarbe', 'bs4_lang' )
);
$navbar_colors[] = array(
	'slug'    => 'dropdown_link_color',
	'default' => '#000',
	'label'   => __( 'Dropdown Linkfarbe', 'bs4_lang' )
);
$navbar_colors[] = array(
	'slug'    => 'dropdown_linke_hover_color',
	'default' => '#494949',
	'label'   => __( 'Dropdown Linkfarbe Hover', 'bs4_lang' )
);

$i = 2;
foreach ( $navbar_colors as $navbar_color ) {
	$i++;
	// SETTINGS
	$wp_customize->add_setting( 
		$navbar_color['slug'], array(
			'capability' => 'edit_theme_options',
			'default'    => $navbar_color['default'],
			'transport' => 'postMessage',
			'type'       => 'theme_mod',
		)
	);
	// CONTROLS
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		$navbar_color['slug'], array(
			 'label'    => $navbar_color['label'],
			 'section'  => 'bs4_header_navbar',
			 'settings' => $navbar_color['slug'],
			 'priority' => $i,
		)
	));
} // foreach end

/**
 * #4 Header
 * 
 * @since		1.0.0
 * @section		bs4_content
 */
$wp_customize->add_setting( 'bs4_content_text_family', 
	array(
		'default'       => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
		'transport'  	=> 'postMessage'
	)
);
$wp_customize->add_control( 
	new Google_Font_Dropdown_Custom_Control( 
	$wp_customize, 'bs4_content_text_family', 
		array(
			'description'		=> __( 'Schriftart für Inhaltsbereich', 'bs4_lang' ),
			'label'    			=> __( 'Schriftart', 'bs4_lang' ),
			'settings'  	  	=> 'bs4_content_text_family',
			'section'			=> 'bs4_content',
			'priority'			=> 1
		) 
	)
);
$wp_customize->add_setting( 'bs4_content_headlines_text_family', 
	array(
		'default'       => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
		'transport'  	=> 'postMessage'
	)
);
$wp_customize->add_control( 
	new Google_Font_Dropdown_Custom_Control( 
	$wp_customize, 'bs4_content_headlines_text_family', 
		array(
			'description'		=> __( 'Schriftart für Überschriften', 'bs4_lang' ),
			'label'    			=> __( 'Überschriften', 'bs4_lang' ),
			'settings'  	  	=> 'bs4_content_headlines_text_family',
			'section'			=> 'bs4_content',
			'priority'			=> 2
		) 
	)
);

$wp_customize->add_setting( 
	'bs4_content_background_transparent', array(
		'default'			=> '1.0',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'postMessage',
		'type'				=> 'theme_mod',
	)
);
$wp_customize->add_control( 'bs4_content_background_transparent',
	array(
		'description' 	=> __('Wieviel Transparente soll der Hintergrund behommen? (Intressant wenn man Bilder als Hintergrund nutzt)', 'bs4_lang' ),
		'input_attrs' 	=> array(
							'min'   => 0,
							'max'   => 1.0,
							'step'  => 0.25,
						),
		'label'       	=> __('Hintergrund Transparente', 'bs4_lang'),
		'type'       	=> 'range',
		'section'    	=> 'bs4_content',
		'type'       	=> 'range',
		'priority'    	=> 3,
	)
);

$content_colors = array();
		
$content_colors[] = array(
	'slug'    => 'bs4_content_background',
	'default' => '#fff',
	'label'   => __( 'Hintergrundfarbe', 'bs4_lang' )
);
$content_colors[] = array(
	'slug'    => 'bs4_content_text_color',
	'default' => '',
	'label'   => __( 'Textfarbe', 'bs4_lang' )
);
$content_colors[] = array(
	'slug'    => 'bs4_headline_color',
	'default' => '',
	'label'   => __( 'Überschriften Farbe', 'bs4_lang' )
);
$i = 3;
foreach ( $content_colors as $content_color ) {
	$i++;
	// SETTINGS
	$wp_customize->add_setting( 
		$content_color['slug'], array(
			'capability' => 'edit_theme_options',
			'default'    => $content_color['default'],
			'transport' => 'postMessage',
			'type'       => 'theme_mod',
		)
	);
	// CONTROLS
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		$content_color['slug'], array(
			 'label'    => $content_color['label'],
			 'section'  => 'bs4_content',
			 'settings' => $content_color['slug'],
			 'priority' => $i,
		)
	));
} // foreach end

/**
 * Footer
 *
 * @section			bs4_footer
 */
$wp_customize->add_setting( 
	'bs4_footer_background_transparent', array(
		'default'			=> '1.0',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'postMessage',
		'type'				=> 'theme_mod',
	)
);
$wp_customize->add_control( 'bs4_footer_background_transparent',
	array(
		'description' 	=> __('Wieviel Transparente soll der Hintergrund behommen? (Intressant wenn man Bilder als Hintergrund nutzt)', 'bs4_lang' ),
		'input_attrs' 	=> array(
							'min'   => 0,
							'max'   => 1.0,
							'step'  => 0.25,
						),
		'label'       	=> __('Hintergrund Transparente', 'bs4_lang'),
		'type'       	=> 'range',
		'section'    	=> 'bs4_footer',
		'type'       	=> 'range',
		'priority'    	=> 3,
	)
); 

$footer_colors = array();
		
$footer_colors[] = array(
	'slug'    => 'bs4_footer_background',
	'default' => '#fff',
	'label'   => __( 'Hintergrundfarbe', 'bs4_lang' )
);
$footer_colors[] = array(
	'slug'    => 'bs4_footer_text_color',
	'default' => '',
	'label'   => __( 'Textfarbe', 'bs4_lang' )
);
$footer_colors[] = array(
	'slug'    => 'bs4_footer_headline_color',
	'default' => '',
	'label'   => __( 'Überschriften Farbe', 'bs4_lang' )
);
$i = 1;
foreach ( $footer_colors as $footer_color ) {
	$i++;
	// SETTINGS
	$wp_customize->add_setting( 
		$footer_color['slug'], array(
			'capability' => 'edit_theme_options',
			'default'    => $footer_color['default'],
			'transport' => 'postMessage',
			'type'       => 'theme_mod',
		)
	);
	// CONTROLS
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		$footer_color['slug'], array(
			 'label'    => $footer_color['label'],
			 'section'  => 'bs4_footer',
			 'settings' => $footer_color['slug'],
			 'priority' => $i,
		)
	));
} // foreach end
?>