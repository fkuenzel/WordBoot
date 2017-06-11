<?php
/**
 * Customizer Settings for LAYOUT
 *
 * @since		1.0.0
 * @package		Bootstrap4
 */
 
/**
 * Layout Sections
 */
$wp_customize->add_section(
	'bs4_container_options', array(
		'description_hidden'	=> true,
		'description'			=> __( 'Einstellung für die Bootstrap Container Klassen verwendung in Bootstrap4.', 'bs4_lang'),
		'capability'			=> 'edit_theme_options',
		'panel'					=> 'bs4_layout_panel',
		'priority'				=> 1,
		'title'					=> __( 'Container', 'bs4_lang' ),
	)
);

$wp_customize->add_section(
	'bs4_layout_columns', array(
		'description_hidden'	=> false,
		'description'			=> __( 'Einstellungen für Anzahl der Layout Spalten, basierend auf dem Bootstrap Grid System.<br />Die Auswahl des Content Grids passiert Automatisch auf basis der Sidebar Einstellungen.', 'bs4_lang'),
		'capability'			=> 'edit_theme_options',
		'panel'					=> 'bs4_layout_panel',
		'priority'				=> 2,
		'title'					=> __( 'Spalten', 'bs4_lang' ),
	)
);

$wp_customize->add_section(
	'bs4_navbar_options', array(
		'description_hidden'	=> false,
		'description'			=> __( 'Einstellungen die Hauptnavigation (header).', 'bs4_lang'),
		'capability'			=> 'edit_theme_options',
		'panel'					=> 'bs4_layout_panel',
		'priority'				=> 3,
		'title'					=> __( 'Navbar Einstellung', 'bs4_lang' ),
	)
);

/**
 * Controlls and Settings
 */

/**
 * 1. LAYOUT CONTAINER
 */

/**
 * Set the Bootstrap Container Class
 * default: fixed-width
 */
$wp_customize->add_setting( 'container_class', 
	array(
		'default'    		=> 'container',
		'transport' 		 => 'postMessage',
	)
);
$wp_customize->add_control( 'container_class',
	array(
		'choices'  		=> array(
							'container'			=> __( 'fixed-width', 'wordboot' ),
							'container-fluid'	=> __( 'fluid-width', 'wordboot' ),
						 ),
		'description'	=> __( 'Choose from a responsive, fixed-width container (meaning its <code>max-width</code> changes at each breakpoint) or fluid-width (meaning it’s 100% wide all the time).', 'wordboot' ),
		'label'    		=> __( 'Container Setting', 'wordboot' ),
		'priority'		=> 1,
		'section'  		=> 'bs4_container_options',
		'settings' 		=> 'container_class',
		'type'    		=> 'select',
	)
); 

$wp_customize->add_setting( 'container_width', 
	array(
		'default'    		=> '1140',
		'transport' 		 => 'postMessage',
	)
);
$wp_customize->add_control( 'container_width',
	array(
		'description'	=> __( 'Wähle die maximale Container Breite in Pixel für die <code>.container</code> Klasse aus. Bootstrap4 erstellt Automatisch die Breakpoints für das CSS.<br />Die berechnung erfolgt nur bei verwendung des fixed-width Container einstellung.', 'wordboot' ),
		'label'    		=> __( 'Container Breite', 'wordboot' ),
		'priority'		=> 2,
		'section'  		=> 'bs4_container_options',
		'settings' 		=> 'container_width',
		'type'    		=> 'text',
	)
); 


// JavaScript Changes
$wp_customize->get_setting( 'container_class' )->transport = 'postMessage';
$wp_customize->get_setting( 'container_width' )->transport = 'postMessage';

/**
 * 2. LAYOUT COLUMNS
 */ 
 
/**
 * Layout Colum Setting GLOBAL
 * default:		full-width
 */
$wp_customize->add_setting( 'layout_columns', 
	array(
		'default'				=> 'full-width',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'layout_columns',
	array(
		'choices'  		=> array(
								'full-width	'   	=> __( 'Full Width (default)', 'bs4_lang' ),
								'sidebar-left'  	=> __( '2 Columns (Left Sidebar)', 'bs4_lang' ),
								'sidebar-right' 	=> __( '2 Columns (Right Sidebar)', 'bs4_lang' ),
								'two-sidebar'		=> __( '3 Columns', 'bs4_lang' )
						 ),
		'description'	=> '',
		'label'			=> __( 'Columns', 'bs4_lang' ),
		'priority' 		=> 1,
		'section'  		=> 'bs4_layout_columns',
		'settings' 		=> 'layout_columns',
		'type'			=> 'select',
	)
);

/**
 * Colums Sidebar(s) Settings
 */
$wp_customize->add_setting( 'grid_sidebar_left', 
	array(
		'default'    		=> 'col-lg-2',
		'transport' 		=> 'postMessage',
	)
);
$wp_customize->add_control( 'grid_sidebar_left',
		array(
		'choices'  		=> array(
							'6'	=> __( '50% <code>(col-6)</code>', 'bs4_lang' ),
							'5'	=> __( '41.666667% <code>(col-5)</code>', 'bs4_lang' ),
							'4'	=> __( '33.333333% <code>(col-4)</code>', 'bs4_lang' ),
							'3'	=> __( '25% <code>(col-3)</code>', 'bs4_lang' ),
							'2'	=> __( '16.666667% <code>(col-2)</code> (default)', 'bs4_lang' ),
							'1'	=> __( '8.333333% <code>(col-1)</code>', 'bs4_lang' ),
						 ),
		'description'	=> __( '<em>Nur Relevant, wenn 2-Spalten (Linke Sidebar) oder 3-Spalten Layout gewählt ist.</em>' , 'bs4_lang' ),
		'label'			=> __( 'Breite für Linke Sidebar.', 'bs4_lang' ),
		'priority' 		=> 10,
		'section'  		=> 'bs4_layout_columns',
		'settings' 		=> 'grid_sidebar_left',
		'type'			=> 'select',
	)
);

$wp_customize->add_setting( 'grid_sidebar_right', 
	array(
		'default'    		=> 'col-lg-2',
		'transport' 		=> 'postMessage',
	)
);
$wp_customize->add_control( 'grid_sidebar_right',
		array(
		'choices'  		=> array(
							'6'	=> __( '50% <code>(col-6)</code>', 'bs4_lang' ),
							'5'	=> __( '41.666667% <code>(col-5)</code>', 'bs4_lang' ),
							'4'	=> __( '33.333333% <code>(col-4)</code>', 'bs4_lang' ),
							'3'	=> __( '25% <code>(col-3)</code>', 'bs4_lang' ),
							'2'	=> __( '16.666667% <code>(col-2)</code> (default)', 'bs4_lang' ),
							'1'	=> __( '8.333333% <code>(col-1)</code>', 'bs4_lang' ),
						 ),
		'description'	=> __( '<em>Nur Relevant, wenn 2-Spalten (Rechte Sidebar) oder 3-Spalten Layout gewählt ist.</em>' , 'bs4_lang' ),
		'label'			=> __( 'Breite für Rechte Sidebar.', 'bs4_lang' ),
		'priority' 		=> 15,
		'section'  		=> 'bs4_layout_columns',
		'settings' 		=> 'grid_sidebar_right',
		'type'			=> 'select',
	)
);

/**
 * 3. Navbar Options
 *
 * @section		bs4_navbar_options
 */

/**
 * navbar-brand text
 *
 * @default		mobile
 */
$wp_customize->add_setting( 'navbar_brand_text', 
	array(
		'default'    		=> 'mobile',
		'transport' 		=> 'postMessage',
	)
);
$wp_customize->add_control( 'navbar_brand_text',
		array(
		'choices'  		=> array(
							'no'	=> __( 'No', 'bs4_lang' ),
							'yes'	=> __( 'Yes', 'bs4_lang' ),
							'desktop'	=> __( 'Only in Desktop View', 'bs4_lang' ),
							'mobile'	=> __( 'Only in Mobile View (default)', 'bs4_lang' ),
						 ),
		'description'	=> __( 'Show Navbar-Brand in the main menu?' , 'bs4_lang' ),
		'label'			=> __( 'Navbar Brand', 'bs4_lang' ),
		'priority' 		=> 1,
		'section'  		=> 'bs4_navbar_options',
		'settings' 		=> 'navbar_brand_text',
		'type'			=> 'select',
	)
);

/**
 * navbar-brand Logo
 *
 * @default		mobile
 */
$wp_customize->add_setting( 'navbar_brand_logo', 
	array(
		'default'    		=> 'no',
		'transport' 		=> 'postMessage',
	)
);
$wp_customize->add_control( 'navbar_brand_logo',
		array(
		'choices'  		=> array(
							'no'	=> __( 'No (default)', 'bs4_lang' ),
							'yes'	=> __( 'Yes, without text', 'bs4_lang' ),
							'text'	=> __( 'Yes, with text', 'bs4_lang' ),
						 ),
		'description'	=> __( 'Show Navbar-Brand Logo in the main menu?' , 'bs4_lang' ),
		'label'			=> __( 'Navbar Brand Logo', 'bs4_lang' ),
		'priority' 		=> 5,
		'section'  		=> 'bs4_navbar_options',
		'settings' 		=> 'navbar_brand_logo',
		'type'			=> 'select',
	)
);
/**
 * navbar-brand logo upload
 *
 * default		none
 */
$wp_customize->add_setting( 'navbar_brand_upload',
	array(
		'default'    => '',
	)
);
$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'navbar_brand_upload',
	array(
		'description'	=> __( 'Uploading Navbar Brand Logo. Size: 30x30px' , 'bs4_lang' ),
		'label'   		=> __( 'Navbar Brand Logo Upload', 'bs4_lang' ),
		'priority'		=> 10,
		'section'		=> 'bs4_navbar_options',
		'settings'		=> 'navbar_brand_upload',
	)
));

/**
 * Navbar Color schemes
 *
 * @default		navbar-light
 */
 $wp_customize->add_setting( 'navbar_color_schema',
	array(
		'default'    => 'navbar-light',
	)
);
$wp_customize->add_control( 'navbar_color_schema',
	array(
		'choices'  		=> array(
							'navbar-light'	=> __( 'navbar-light (default)', 'bs4_lang' ),
							'bg-primary'	=> __( 'primary (dark blue)', 'bs4_lang' ),
							'bg-success'	=> __( 'success (green)', 'bs4_lang' ),
							'bg-info'		=> __( 'info (light blue)', 'bs4_lang' ),
							'bg-warning'	=> __( 'warning (orange)', 'bs4_lang' ),
							'bg-danger'		=> __( 'danger (red)', 'bs4_lang' ),
							'bg-inverse'	=> __( 'inverse (black)', 'bs4_lang' ),
						),
		'description'	=> __( 'Farb Schema der Navbar anhand von Boostrap Default Klassen.<br />Wenn du die Navbar Inviduell gestallten möchtes, wähle das Standard Farbe Schema' , 'bs4_lang' ),
		'label'   		=> __( 'Navbar Color schemes', 'bs4_lang' ),
		'priority'		=> 15,
		'section'		=> 'bs4_navbar_options',
		'settings'		=> 'navbar_color_schema',
		'type'			=> 'select',
	)
);


?>