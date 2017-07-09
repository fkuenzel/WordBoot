<?php

/**
 * Customizer Class 
 */
class Bootstrap4_Customizer {
	public static function register( $wp_customize ) {
		
		/**
		 * Bootstrap4 Layout Options
		 *
		 * @section		bs4_layout
		 * @since		Bootstrap4 1.0.0
		 */
		$wp_customize->add_panel(
			'bs4_layout_panel', array(
				'capability' => 'edit_theme_options',
				'description' => __( 'Layout Einstellungen f&uuml;r WordBoot und WordBoot Child Themes.', 'bs4_lang' ),
				'priority' => 21,
				'theme_supports' => '',
				'title' => __( 'Layout', 'bs4_lang' ),
			)
		);
		require_once( 'customizer-layout.php' );
		
		/**
		 * Bootstrap4 Carousel Slider Settings
		 *
		 * Settings Bootstrap Carousel Slider.
		 *
		 * @since		1.0.0
		 */
		$wp_customize->add_panel( 
			'bs4_carousel_panel', array(
				'capability' => 'edit_theme_options',
				'description' => __( 'Einstellungen für die Ausgabe des Bootstrap Carousel Slider, der in Bootstrap4 als Themenfunktion intregriert wird. Bestimmen Sie, ob der Schieberegler mit Navigationselementen, Texten usw. funktionieren und bestimmen Sie die Farben für den Slider.', 'bs4_lang' ),
				'priority' => 25,
				'theme_supports' => '',
				'title' => __( 'Carousel Slider', 'bs4_lang' ),
			)
		);
		require_once( 'customizer-slider.php' );
		

		/**
		 * WordBoot Color Settings
		 *
		 * Settings for Colors
		 *
		 * @since		1.0.0
		 */
		$wp_customize->add_panel(
			'bs4_colors_panel', array(
				'capability' => 'edit_theme_options',
				'description' => __( 'Passe alle m&ouml;glichen Text- und Hintergrundfarben an.', 'bs4_lang' ),
				'priority' => 30,
				'theme_supports' => '',
				'title' => __( 'Text &amp; Farben', 'bs4_lang' ),
			)
		);
		require_once get_parent_theme_file_path( '/incs/customizer/google-font-custom-control.php' );
		require_once( 'customizer-colors.php' );
		
			
		// Remove Default Custom CSS
		$wp_customize->remove_control( 'custom_css' );
		$wp_customize->remove_section( 'custom_css' );
		
	
		$wp_customize->add_section(
			'bs4_custom_css', array(
				'title'			=> __( 'Custom CSS', 'bs4_lang' ),
				'priority'		=> 35,
				'capability'	=> 'edit_theme_options',
				'description_hidden' => true,
				'description'        => sprintf( '%s<br /><a href="%s" class="external-link" target="_blank">%s<span class="screen-reader-text">%s</span></a>',
					__( 'CSS allows you to customize the appearance and layout of your site with code. Separate CSS is saved for each of your themes. In the editing area the Tab key enters a tab character. To move below this area by pressing Tab, press the Esc key followed by the Tab key.', 'bs4_lang' ),
					esc_url( __( 'https://codex.wordpress.org/CSS', 'bs4_lang' ) ),
					__( 'Learn more about CSS', 'bs4_lang' ),
					__( '(link opens in a new window)', 'bs4_lang' )
				),
			)
		);
		$wp_customize->add_setting( 'bs4_custom_css', 
			array(
				'default'    		=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'esc_textarea'
			)
		);
		$wp_customize->add_control( 'bs4_custom_css',
			array(
				'settings' => 'bs4_custom_css',
				'label'    => __( 'Your CSS rules for Bootstrap4', 'bs4_lang' ),
				'section'  => 'bs4_custom_css',
				'type'     => 'textarea',
				'priority' => 1,
			)
		);

	} // register end
	
	/**
	 * This outputs the javascript needed to automate the live settings preview.
     * Also keep in mind that this function isn't necessary unless your settings 
     * are using 'transport'=>'postMessage' instead of the default 'transport'
     * => 'refresh'
     * 
     * Used by hook: 'customize_preview_init'
     * 
     * @see add_action('customize_preview_init',$func)
     * @since MyTheme 1.0
     */
	public static function live_preview() {
		wp_enqueue_script( 'bs4-customize-preview', get_theme_file_uri( '/libs/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
	}
	
}


// Setup the Theme Customizer settings and controls...
add_action( 'customize_register', array( 'Bootstrap4_Customizer', 'register' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Bootstrap4_Customizer' , 'live_preview' ) );

/**
 * Callback function for sanitizing checkbox settings.
 *
 * Used by Bootstrap4_Customize
 *
 * @param $input
 *
 * @return int|string
 */
function bs4_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

function bs4_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
function bs4_sanitize_number( $value ) {
    $can_validate = method_exists( 'WP_Customize_Setting', 'validate' );
    if ( ! is_numeric( $value ) ) {
        return $can_validate ? new WP_Error( 'nan', __( 'Not a number', 'bs4_lang' ) ) : null;
    }
    return intval( $value );
}

/**
 * Converts a HEX value to RGB.
 *
 * @since Bootstrap4 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function bs4_hex2rgb( $color ) {
	$color = trim( $color, '#' );
	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}
	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}


require get_template_directory() . '/incs/customizer/customizer-funtions.php';
require get_template_directory() . '/incs/customizer/functions-layout.php';
require get_template_directory() . '/incs/customizer/functions-slider.php';
?>