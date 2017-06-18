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
				'description' => __( 'Layout Einstellungen f&uuml;r Bootstrap4 und Bootstrap4 Child Themes.', 'bs4_lang' ),
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
		$wp_customize->add_panel( 'bs4_carousel_panel', array(
			'capability' => 'edit_theme_options',
			'description' => __( 'Settings for the output of the bootstrap Carousel Slider, which is intregrigated as a theme function in Bootstrap4. Determine whether the slider with navigation elements, texts, etc. should work and determine the colors.', 'bs4_lang' ),
			'priority' => 25,
			'theme_supports' => '',
			'title' => __( 'Carousel Slider', 'bs4_lang' ),
		) );
		require_once( 'customizer-slider.php' );
		

		/**
		 * Bootstrap4 Carousel Slider Settings
		 *
		 * Settings Bootstrap Carousel Slider.
		 *
		 * @since		1.0.0
		 */
		$wp_customize->add_panel( 'bs4_colors_panel', array(
			'capability' => 'edit_theme_options',
			'description' => __( 'Passe alle m&ouml;glichen Text- und Hintergrundfarben an.', 'bs4_lang' ),
			'priority' => 30,
			'theme_supports' => '',
			'title' => __( 'Colors', 'bs4_lang' ),
		) );
		require_once( 'customizer-slider.php' );
		
		/**
		 * Text Settings Section for Bootstrap4
		 *
		 * @section		bs4_text_settings_options
		 * @since		Bootstrap4CHILD 1.0.0
		 */
		$wp_customize->add_section(
			'bs4_text_settings_options', array(
				'title'			=> __( 'Bootstrap4 Text Settings', 'bs4_lang' ),
				'priority'		=> 33,
				'capability'	=> 'edit_theme_options',
			)
		);
				
		
		/**
		 * Bootstrap4 Color Settings
		 *
		 * Settings for Colors of Bootstrap4.
		 *
		 * @since		1.0.0
		 */
		$wp_customize->add_panel( 'bs4_color_panel', array(
			'title' => __( 'Color Settings', 'bs4_lang' ),
			'description' => __( 'Bootstrap4 Color Settings for Text and Layout', 'bs4_lang' ), // Include html tags such as <p>.
			'priority' => 30, // Mixed with top-level-section hierarchy.
		) );
		
		/**
		 * Layout Background Colors Settings for Bootstrap4
		 *
		 * @section		bs4_layout_color_settings_options
		 * @since		1.0.0
		 */
		$wp_customize->add_section(
			'bs4_layout_color_settings_options', array(
				'title'			=> __( 'Layout Background Colors', 'bs4_lang' ),
				'priority'		=> 2,
				'capability'	=> 'edit_theme_options',
				'panel'			=> 'bs4_color_panel'
			)
		);
		
		/**
		 * Text Settings and Colors for Bootstrap4
		 *
		 * @section		bs4_text_settings_options
		 * @since		Bootstrap4 1.0.0
		 */
		$wp_customize->add_section(
			'bs4_text_settings_options', array(
				'title'			=> __( 'Text Settings and Colors', 'bs4_lang' ),
				'priority'		=> 30,
				'capability'	=> 'edit_theme_options',
				'panel'			=> 'bs4_color_panel'
			)
		);
		
		/**
		 * Laxou Background Colors
		 * @since		 1.0.0
		 */
		$layout_colors = array();
		
		$layout_colors[] = array(
			'slug'    => 'body_background_color',
			'default' => '#eaeaea',
			'label'   => __( 'Body background color', 'bs4_lang' )
		);
		$layout_colors[] = array(
			'slug'    => 'header_background_color',
			'default' => '#ffffff',
			'label'   => __( 'Header background color', 'bs4_lang' )
		);
		
		$layout_colors[] = array(
			'slug'    => 'main_navbar_background_color',
			'default' => '#f7f7f7',
			'label'   => __( 'Top Menu background color', 'bs4_lang' )
		);
		$layout_colors[] = array(
			'slug'    => 'main_nav_link_border',
			'default' => '#fff',
			'label'   => __( 'Top menu border Color', 'bs4_lang' )
		);
		$layout_colors[] = array(
			'slug'    => 'page_content_background_color',
			'default' => '#ffffff',
			'label'   => __( 'Page Content background color', 'bs4_lang' )
		);
		$layout_colors[] = array(
			'slug'    => 'sidebar_left_background_color',
			'default' => '#cccccc',
			'label'   => __( 'Sidebar left background color', 'bs4_lang' )
		);
		$layout_colors[] = array(
			'slug'    => 'sidebar_right_background_color',
			'default' => '#cccccc',
			'label'   => __( 'Sidebar right background color', 'bs4_lang' )
		);
		$layout_colors[] = array(
			'slug'    => 'sidebar_widget_background_color',
			'default' => '#fffffff',
			'label'   => __( 'Sidebar Section background color', 'bs4_lang' )
		);
		$layout_colors[] = array(
			'slug'    => 'footer_background_color',
			'default' => '#fffffff',
			'label'   => __( 'Footer background color', 'bs4_lang' )
		);
		foreach ( $layout_colors as $layout_color ) {
			// SETTINGS
			$wp_customize->add_setting( 
				$layout_color['slug'], array(
					'default'    => $layout_color['default'],
					'type'       => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'refresh'
				)
			);
			// CONTROLS
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				$layout_color['slug'], array(
					 'label'    => $layout_color['label'],
					 'section'  => 'bs4_layout_color_settings_options',
					 'settings' => $layout_color['slug']
				)
			));
		} // foreach end
		
		
		/**
		 * Bootstrap4 Text Settings Options
		 *
		 * @section		bs4_text_settings_options
		 * @since		Bootstrap4CHILD 1.0.0
		 */
		
		
		
		$wp_customize->add_setting( 'body_font_size', 
			array(
				'default'    => '16',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'intval',
			)
		);
		
		$wp_customize->add_control( 'body_font_size',
			array(
				'settings' 		=> 'body_font_size',
				'label'    		=> __( 'Font Size', 'bs4_lang' ),
				'description'	=> __( 'Default Font Size in <em>px</em>. <small><em>(DEFAULT: 16)</em></small>', 'bs4_lang' ),
				'section'		=> 'bs4_text_settings_options',
				'type'     		=> 'number',
				'priority' 		=> 1,
			)
		);
		// Add a Google Font control
        require_once get_parent_theme_file_path( '/incs/customizer/google-font-custom-control.php' );
        $wp_customize->add_setting( 'font_family_global', 
			array(
				'default'       => '',
				'transport'  	=> 'postMessage'
			)
		);
        $wp_customize->add_control( 
			new Google_Font_Dropdown_Custom_Control( 
				$wp_customize, 'font_family_global', 
				array(
					'settings'  	  	=> 'font_family_global',
					'label'    			=> __( 'Global Font', 'bs4_lang' ),
					'description'	=> __( 'Load the Default Font from Google Font Directory', 'bs4_lang' ),
					'section'			=> 'bs4_text_settings_options',
					'priority'			=> 2
				) 
			)
		);
		
		 $wp_customize->add_setting( 'font_family_headline', 
			array(
				'default'       => '',
				'transport'  	=> 'postMessage'
			)
		);
        $wp_customize->add_control( 
			new Google_Font_Dropdown_Custom_Control( 
				$wp_customize, 'font_family_headline', 
				array(
					'settings'  	  	=> 'font_family_headline',
					'label'    			=> __( 'Headline Font', 'bs4_lang' ),
					'description'		=> __( 'Load the Headline Font from Google Font Directory', 'bs4_lang' ),
					'section'			=> 'bs4_text_settings_options',
					'priority'			=> 2
				) 
			)
		);
		
		/**
		 * Text Color Settings
		 * @since		 1.0.0
		 */
		$text_colors = array();
		
		$text_colors[] = array(
			'slug'    => 'text_color',
			'default' => '#292b2c',
			'label'   => __( 'Text color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'link_color',
			'default' => '#337ab7',
			'label'   => __( 'Link color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'link_color_hover',
			'default' => '#337ab7',
			'label'   => __( 'Link Hover color', 'bs4_lang' )
		);
		
		$text_colors[] = array(
			'slug'    => 'headline_color',
			'default' => '#292b2c',
			'label'   => __( 'Headline color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'social_nav_link_color',
			'default' => '#00000',
			'label'   => __( 'Social nav link color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'social_nav_link_hover_color',
			'default' => '#00000',
			'label'   => __( 'Social nav link hover color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'nav_link_color',
			'default' => '#00000',
			'label'   => __( 'Nav link color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'nav_link_hover_color',
			'default' => '#00000',
			'label'   => __( 'Nav link hover color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'nav_link_active_color',
			'default' => '#00000',
			'label'   => __( 'Nav link active color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'footer_text_color',
			'default' => '#00000',
			'label'   => __( 'Footer Text color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'footer_link_color',
			'default' => '#337ab7',
			'label'   => __( 'Footer link color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'footer_link_color_hover',
			'default' => '#337ab7',
			'label'   => __( 'Footer link Hover color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'sidebar_text_color',
			'default' => '#00000',
			'label'   => __( 'Sidebar Text color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'sidebar_headline_color',
			'default' => '#00000',
			'label'   => __( 'Sidebar Headline color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'sidebar_link_color',
			'default' => '#337ab7',
			'label'   => __( 'Sidebar link color', 'bs4_lang' )
		);
		$text_colors[] = array(
			'slug'    => 'sidebar_link_color_hover',
			'default' => '#337ab7',
			'label'   => __( 'Sidebar link Hover color', 'bs4_lang' )
		);
		
		foreach ( $text_colors as $text_color ) {
			// SETTINGS
			$wp_customize->add_setting( 
				$text_color['slug'], array(
					'default'    => $text_color['default'],
					'type'       => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'refresh'
				)
			);
			// CONTROLS
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $text_color['slug'],
				array(
					 'label'    => $text_color['label'],
					 'section'  => 'bs4_text_settings_options',
					 'settings' => $text_color['slug']
				)
			));
			
			
		} // foreach end
		
		/**
			 * Remove Default Custom CSS
			 */
			$wp_customize->remove_control( 'custom_css' );
			$wp_customize->remove_section( 'custom_css' );
		
		/**
		 * Layout Background Colors Settings for Bootstrap4
		 *
		 * @section		bs4_layout_color_settings_options
		 * @since		1.0.0
		 */
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
		
		//4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
		$wp_customize->get_setting( 'body_background_color' )			->transport = 'postMessage';
		$wp_customize->get_setting( 'header_background_color' )			->transport = 'postMessage';
		$wp_customize->get_setting( 'main_navbar_background_color' )	->transport = 'postMessage';
		$wp_customize->get_setting( 'main_nav_link_border' )			->transport = 'postMessage';
		$wp_customize->get_setting( 'page_content_background_color' )	->transport = 'postMessage';
		$wp_customize->get_setting( 'sidebar_left_background_color' )	->transport = 'postMessage';
		$wp_customize->get_setting( 'sidebar_right_background_color' )	->transport = 'postMessage';
		$wp_customize->get_setting( 'sidebar_widget_background_color' )	->transport = 'postMessage';
		$wp_customize->get_setting( 'footer_background_color' )			->transport = 'postMessage';
		
		
		$wp_customize->get_setting( 'text_color' )				->transport = 'postMessage';
		$wp_customize->get_setting( 'sidebar_text_color' )		->transport = 'postMessage';
		$wp_customize->get_setting( 'sidebar_headline_color' )	->transport = 'postMessage';
		$wp_customize->get_setting( 'sidebar_link_color' )		->transport = 'postMessage';
		$wp_customize->get_setting( 'sidebar_link_color_hover' ) ->transport = 'postMessage';
		$wp_customize->get_setting( 'footer_text_color' )		->transport = 'postMessage';
		$wp_customize->get_setting( 'footer_link_color' )		->transport = 'postMessage';
		$wp_customize->get_setting( 'footer_link_color_hover' )	->transport = 'postMessage';
		$wp_customize->get_setting( 'link_color' )				->transport = 'postMessage';
		$wp_customize->get_setting( 'link_color_hover' )		->transport = 'postMessage';
		$wp_customize->get_setting( 'headline_color' )			->transport = 'postMessage';
		$wp_customize->get_setting( 'nav_link_color' )			->transport = 'postMessage';
		$wp_customize->get_setting( 'nav_link_hover_color' )	->transport = 'postMessage';
		$wp_customize->get_setting( 'nav_link_active_color' )	->transport = 'postMessage';
				
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