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
		'description'			=> __( 'Einstellung f&uuml;r die Bootstrap Container Klassen verwendung in Bootstrap4.', 'bs4_lang'),
		'capability'			=> 'edit_theme_options',
		'panel'					=> 'bs4_layout_panel',
		'priority'				=> 1,
		'title'					=> __( 'Container', 'bs4_lang' ),
	)
);

$wp_customize->add_section(
	'bs4_layout_columns', array(
		'description_hidden'	=> false,
		'description'			=> __( 'Einstellungen f&uuml;r Anzahl der Layout Spalten, basierend auf dem Bootstrap Grid System.<br />Die Auswahl des Content Grids passiert Automatisch auf basis der Sidebar Einstellungen.', 'bs4_lang'),
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

$wp_customize->add_section(
	'bs4_breadcrumbs_options', array(
		'description_hidden'	=> false,
		'description'			=> __( 'Einstellungen Breadcrumb Navigation.', 'bs4_lang'),
		'capability'			=> 'edit_theme_options',
		'panel'					=> 'bs4_layout_panel',
		'priority'				=> 4,
		'title'					=> __( 'Breadcrumb', 'bs4_lang' ),
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
							'container'			=> __( 'fixed-width', 'bs4_lang' ),
							'container-fluid'	=> __( 'fluid-width', 'bs4_lang' ),
						 ),
		'description'	=> __( 'W&auml;hlen aus einem reaktionsf&auml;higen, festen Container (dh. er hat pro Ausgabe Medium eine Feste Breite) oder einem beweglichen Container (dh. er ist immer 100% breit).', 'bs4_lang' ),
		'label'    		=> __( 'Container Einstellung', 'bs4_lang' ),
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
		'description'	=> __( 'W&auml;hle die maximale Container Breite in Pixel f&uuml;r die <code>.container</code> Klasse aus. Bootstrap4 erstellt Automatisch die Breakpoints f&uuml;r das CSS.<br />Die berechnung erfolgt nur bei verwendung des fixed-width Container einstellung.', 'bs4_lang' ),
		'label'    		=> __( 'Container Breite', 'bs4_lang' ),
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
								'full-width'   		=> __( 'Full Width (default)', 'bs4_lang' ),
								'sidebar-left'  	=> __( '2 Columns (Left Sidebar)', 'bs4_lang' ),
								'sidebar-right' 	=> __( '2 Columns (Right Sidebar)', 'bs4_lang' ),
								'two-sidebar'		=> __( '3 Columns', 'bs4_lang' )
						 ),
		'description'	=> '',
		'label'			=> __( 'Spalten Anzahl', 'bs4_lang' ),
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
		'default'    		=> '3',
		'transport' 		=> 'postMessage',
	)
);
$wp_customize->add_control( 'grid_sidebar_left',
		array(
		'choices'  		=> array(
							'6'	=> __( '50% <code>(col-6)</code>', 'bs4_lang' ),
							'5'	=> __( '41.666667% <code>(col-5)</code>', 'bs4_lang' ),
							'4'	=> __( '33.333333% <code>(col-4)</code>', 'bs4_lang' ),
							'3'	=> __( '25% <code>(col-3)</code> (default)', 'bs4_lang' ),
							'2'	=> __( '16.666667% <code>(col-2)</code>', 'bs4_lang' ),
							'1'	=> __( '8.333333% <code>(col-1)</code>', 'bs4_lang' ),
						 ),
		'description'	=> __( '<em>Nur Relevant, wenn 2-Spalten (Linke Sidebar) oder 3-Spalten Layout gew&auml;hlt ist.</em>' , 'bs4_lang' ),
		'label'			=> __( 'Breite f&uuml;r Linke Sidebar.', 'bs4_lang' ),
		'priority' 		=> 10,
		'section'  		=> 'bs4_layout_columns',
		'settings' 		=> 'grid_sidebar_left',
		'type'			=> 'select',
	)
);

$wp_customize->add_setting( 'grid_sidebar_right', 
	array(
		'default'    		=> '2',
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
		'description'	=> __( '<em>Nur Relevant, wenn 2-Spalten (Rechte Sidebar) oder 3-Spalten Layout gew&auml;hlt ist.</em>' , 'bs4_lang' ),
		'label'			=> __( 'Breite f&uuml;r Rechte Sidebar.', 'bs4_lang' ),
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
							'no'		=> __( 'Nein', 'bs4_lang' ),
							'yes'		=> __( 'Ja', 'bs4_lang' ),
							'desktop'	=> __( 'Nur in Desktop Ansicht', 'bs4_lang' ),
							'mobile'	=> __( 'Nur in Mobiler Ansicht (default)', 'bs4_lang' ),
						 ),
		'description'	=> __( 'Zeige Navbar Seitenname im Hauptmen&uuml;?' , 'bs4_lang' ),
		'label'			=> __( 'Navbar Seitenname', 'bs4_lang' ),
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
							'no'	=> __( 'Nein (default)', 'bs4_lang' ),
							'yes'	=> __( 'Ja, ohne Seitename', 'bs4_lang' ),
							'text'	=> __( 'Ja, mit Seitename', 'bs4_lang' ),
						 ),
		'description'	=> __( 'Zeige Navbar-Logo?' , 'bs4_lang' ),
		'label'			=> __( 'Navbar Logo', 'bs4_lang' ),
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
		'description'	=> __( 'Hochladen des Navbar Logos. Gr&ouml;&szlig;e: 30x30px' , 'bs4_lang' ),
		'label'   		=> __( 'Navbar Logo Hochladen', 'bs4_lang' ),
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
							'navbar-light'		=> __( 'navbar-light (default)', 'bs4_lang' ),
							'navbar-customize'	=> __( 'navbar-customize', 'bs4_lang' ),
							'bg-primary'		=> __( 'primary (dark blue)', 'bs4_lang' ),
							'bg-success'		=> __( 'success (green)', 'bs4_lang' ),
							'bg-info'			=> __( 'info (light blue)', 'bs4_lang' ),
							'bg-warning'		=> __( 'warning (orange)', 'bs4_lang' ),
							'bg-danger'			=> __( 'danger (red)', 'bs4_lang' ),
							'bg-inverse'		=> __( 'inverse (black)', 'bs4_lang' ),
						),
		'description'	=> __( 'Farb Schema der Navbar anhand von Boostrap Default Klassen.<br />Wenn du die Navbar Inviduell gestallten m&ouml;chtes, w&auml;hle das Standard Farbe Schema' , 'bs4_lang' ),
		'label'   		=> __( 'Navbar Farb Schema', 'bs4_lang' ),
		'priority'		=> 15,
		'section'		=> 'bs4_navbar_options',
		'settings'		=> 'navbar_color_schema',
		'type'			=> 'select',
	)
);
// JavaScript Changes
$wp_customize->get_setting( 'navbar_color_schema' )->transport = 'postMessage';


/**
 * #4 Bootstrap Breadcrumb
 *
 * @since		1.0.0
 * @version 	1.0.0
 *
 * @section		bs4_breadcrumbs_options
 */
 
$wp_customize->add_setting( 'bs4_breadcrumbs_status',
	array(
		'default'	=> 'false',
		'type'		=> 'theme_mod',
	)
);

$wp_customize->add_control( 'bs4_breadcrumbs_status',
	array(
		'choices'  		=> array(
							'false'		=> __( 'Nein (Default)', 'bs4_lang' ),
							'true'		=> __( 'Ja', 'bs4_lang' ),
						),
		'description'	=> __( 'Stellen Sie ein ob die Breadrcrumb Navigation Angezeigt wird oder nicht.' , 'bs4_lang' ),
		'label'   		=> __( 'Breadcrumb Aktivieren?', 'bs4_lang' ),
		'priority'		=> 15,
		'section'		=> 'bs4_breadcrumbs_options',
		'settings'		=> 'bs4_breadcrumbs_status',
		'type'			=> 'select',
	)
);

?>