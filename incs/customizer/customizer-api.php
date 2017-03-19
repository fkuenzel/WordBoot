<?php

/**
 * Customizer Class 
 */
class WordBoot_Customizer {
	public static function register( $wp_customize ) {
		
		/**
		 * WordBoot Options
		 *
		 * @section		wordboot_options
		 * @since		WordBoot 1.0.0
		 */
		
		$wp_customize->add_section(
			'wb_layout_options', array(
				'title'			=> __( 'WordBoot Layout Options', 'wordboot' ),
				'priority'		=> 20,
				'capability'	=> 'edit_theme_options',
			)
		);
		/**
		 * Container Class
		 *
		 * Set the Bootstrap Container Class
		 *
		 * default: fluid
		 */
		$wp_customize->add_setting( 'container_class', 
			array(
				'default'    => 'fluid',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wb_sanitize_choices',
			)
		);
		$wp_customize->add_control( 'container_class',
			array(
				'settings' => 'container_class',
				'label'    => __( 'Container Setting', 'wordboot' ),
				'section'  => 'wb_layout_options',
				'type'     => 'radio',
				'priority' => 1,
				'choices'  => array(
					'fluid'   	=> __( 'Fluid Width', 'wordboot' ),
					'default'  	=> __( 'Fix Container (min-width: 1140px)', 'wordboot' ),
				)
			)
		);
		
		/**
		 * Layout Colum Setting GLOBAL
		 *
		 * default:		fullwidth
		 */
		$wp_customize->add_setting( 'columns_layout_global', 
			array(
				'default'    => 'fullwidth',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wb_sanitize_choices',
			)
		);
		$wp_customize->add_control( 'columns_layout_global',
			array(
				'settings' => 'columns_layout_global',
				'label'    => __( 'Columns Global', 'wordboot' ),
				'section'  => 'wb_layout_options',
				'type'     => 'radio',
				'priority' => 1,
				'choices'  => array(
					'fullwidth'   	=> __( 'Fullwidth', 'wordboot' ),
					'2_cols_left'  	=> __( '2 Columns (Left Sidebar)', 'wordboot' ),
					'2_cols_right' 	=> __( '2 Columns (Right Sidebar)', 'wordboot' ),
					'3_cols'		=> __( '3 Columns', 'wordboot' )
				)
			)
		);
		/**
		 * Layoutt Colums Setting for Single Posts
		 *
		 * default:		default value of Global Layout Columns Setting
		 */
		$wp_customize->add_setting( 'columns_layout_single', 
			array(
				'default'    => 'default',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wb_sanitize_choices',
			)
		);
		$wp_customize->add_control( 'columns_layout_single',
			array(
				'settings' => 'columns_layout_single',
				'label'    => __( 'Columns for Single Pages', 'wordboot' ),
				'section'  => 'wb_layout_options',
				'type'     => 'radio',
				'priority' => 2,
				'choices'  => array(
					'default'		=> __( 'Default', 'wordboot' ),
					'fullwidth'   	=> __( 'Fullwidth', 'wordboot' ),
					'2_cols_left'  	=> __( '2 Columns (Left Sidebar)', 'wordboot' ),
					'2_cols_right' 	=> __( '2 Columns (Right Sidebar)', 'wordboot' ),
					'3_cols'		=> __( '3 Columns', 'wordboot' )
				)
			)
		);
		/**
		 * Layout Columns Setting for pages
		 *
		 * default:		default value of Global Layout Columns Setting
		 */
		$wp_customize->add_setting( 'columns_layout_pages', 
			array(
				'default'    => 'default',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wb_sanitize_choices',
			)
		);
		$wp_customize->add_control( 'columns_layout_pages',
			array(
				'settings' => 'columns_layout_pages',
				'label'    => __( 'Columns for Pages', 'wordboot' ),
				'section'  => 'wb_layout_options',
				'type'     => 'radio',
				'priority' => 3,
				'choices'  => array(
					'default'		=> __( 'Default', 'wordboot' ),
					'fullwidth'   	=> __( 'Fullwidth', 'wordboot' ),
					'2_cols_left'  	=> __( '2 Columns (Left Sidebar)', 'wordboot' ),
					'2_cols_right' 	=> __( '2 Columns (Right Sidebar)', 'wordboot' ),
					'3_cols'		=> __( '3 Columns', 'wordboot' )
				)
			)
		);
		
		
		/**
		 * Excerpt Options
		 * @since	WordBoot 1.0.0
		 */
		
		$wp_customize->add_section(
			'wb_excerpt_options', array(
				'title'			=> __( 'WordBoot Excerpt Options', 'wordboot' ),
				'priority'		=> 21,
				'capability'	=> 'edit_theme_options',
			)
		);
		
		/**
		 * Show Excerpts on Archive pages
		 *
		 * default:		no
		 */
		$wp_customize->add_setting( 'ShowExcerptBlog', 
			array(
				'default'    => 'no',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wb_sanitize_choices',
			)
		);
		$wp_customize->add_control( 'ShowExcerptBlog',
			array(
				'settings' => 'ShowExcerptBlog',
				'label'    => __( 'Show Excerpt or Full Post?', 'wordboot' ),
				'description'	=> __( 'See Full-Post or Excerpts on Blog or Archive Pages?', 'wordboot' ),
				'section'  => 'wb_excerpt_options',
				'type'     => 'radio',
				'priority' => 1,
				'choices'  => array(
					'full'	=> __( 'Full Posts', 'wordboot' ),
					'false'  	=> __( 'Excerpts', 'wordboot' )
				)
			)
		);
		/**
		 * Excerpts Lenght
		 *
		 * Excerpts Worth Lenght
		 *
		 * default: 135 
		 */
		$wp_customize->add_setting( 'ExcerptLenght', 
			array(
				'default'    => '135',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wb_sanitize_choices',
			)
		);
		$wp_customize->add_control( 'ExcerptLenght',
			array(
				'settings' => 'ExcerptLenght',
				'label'    		=> __( 'Excerpt Lenght?', 'wordboot' ),
				'description'	=> __( 'How long should my excerpt?', 'wordboot' ),
				'section'		=> 'wb_excerpt_options',
				'type'     		=> 'text',
				'priority' 		=> 2,
			)
		);
		
		/**
		 * Excerpt "Read More" Text
		 *
		 * default: __('Read more', 'wordboot')
		 */
		$wp_customize->add_setting( 'ExcerptText', 
			array(
				'default'    => __( 'Read More', 'wordboot' ),
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wb_sanitize_choices',
			)
		);
		$wp_customize->add_control( 'ExcerptText',
			array(
				'settings' => 'ExcerptText',
				'label'    		=> __( 'Excerpt Text', 'wordboot' ),
				'description'	=> __( 'Which text to appear in excerpts?', 'wordboot' ),
				'section'		=> 'wb_excerpt_options',
				'type'     		=> 'text',
				'priority' 		=> 3,
			)
		);
		/**
		 * Show Excerpts on single posts
		 *
		 * default:		no
		 */
		$wp_customize->add_setting( 'ShowExcerptSingle', 
			array(
				'default'    => 'no',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wb_sanitize_choices',
			)
		);
		$wp_customize->add_control( 'ShowExcerptSingle',
			array(
				'settings' => 'ShowExcerptSingle',
				'label'    => __( 'Show Excerpt on Single Pages?', 'wordboot' ),
				'description'	=> __( 'See excerpt on the full post?', 'wordboot' ),
				'section'  => 'wb_excerpt_options',
				'type'     => 'radio',
				'priority' => 4,
				'choices'  => array(
					'true'		=> __( 'Yes', 'wordboot' ),
					'false'  	=> __( 'No', 'wordboot' )
				)
			)
		);
				
		/**
		 * Comments Options
		 *
		 * Settings for Comment Handling
		 */
		$wp_customize->add_section(
			'wordboot_comments_options', array(
				'title'			=> __( 'WordBoot Comments Options', 'wordboot' ),
				'priority'		=> 22,
				'capability'	=> 'edit_theme_options',
			)
		);
		
		/**
		 * Comments on pages
		 *
		 * show comments and comments infos on pages
		 *
		 * default:	false
		 */
		$wp_customize->add_setting( 'CommentsOnPages', 
			array(
				'default'    => 'false',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wb_sanitize_choices',
			)
		);
		$wp_customize->add_control( 'CommentsOnPages',
			array(
				'settings' => 'CommentsOnPages',
				'label'    => __( 'Show Comments on Pages?', 'wordboot' ),
				'description'	=> __( 'Show Comments on Pages?', 'wordboot' ),
				'section'  => 'wordboot_comments_options',
				'type'     => 'radio',
				'priority' => 1,
				'choices'  => array(
					'true'	=> __( 'Yes', 'wordboot' ),
					'false'  	=> __( 'No', 'wordboot' )
				)
			)
		);
		/**
		 * Comment Alerts on Pages
		 *
		 * default: false
		 */
		$wp_customize->add_setting( 'CommentsAlertOnPages', 
			array(
				'default'    => 'false',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wb_sanitize_choices',
			)
		);
		$wp_customize->add_control( 'CommentsAlertOnPages',
			array(
				'settings' => 'CommentsAlertOnPages',
				'label'    => __( 'Show Comments Alerts on Pages?', 'wordboot' ),
				'description'	=> __( 'Show Comments Alerts on Pages? This Option works only if Comments On Page = YES', 'wordboot' ),
				'section'  => 'wordboot_comments_options',
				'type'     => 'radio',
				'priority' => 2,
				'choices'  => array(
					'true'	=> __( 'Yes', 'wordboot' ),
					'false'  	=> __( 'No', 'wordboot' )
				)
			)
		);
		
		
		/**
		 * Text Settings Section for WordBoot
		 *
		 * @section		wordboot_text_settings_options
		 * @since		WordBootCHILD 1.0.0
		 */
		$wp_customize->add_section(
			'wordboot_text_settings_options', array(
				'title'			=> __( 'WordBoot Text Settings', 'wordboot' ),
				'priority'		=> 30,
				'capability'	=> 'edit_theme_options',
			)
		);
		
		/**
		 * WordBoot Text Settings Options
		 *
		 * @section		wordboot_text_settings_options
		 * @since		WordBootCHILD 1.0.0
		 */
		
		
		
		$wp_customize->add_setting( 'font_size', 
			array(
				'default'    => '16',
				'transport'  => 'postMessage',
				'sanitize_callback' => 'wordboot_sanitize_choices',
			)
		);
		
		$wp_customize->add_control( 'font_size',
			array(
				'settings' => 'font_size',
				'label'    		=> __( 'Font Size', 'wordboot' ),
				'description'	=> __( 'Default Font Size in <em>px</em>. <small><em>(DEFAULT: 16)</em></small>', 'wordboot' ),
				'section'		=> 'wordboot_text_settings_options',
				'type'     		=> 'text',
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
					'label'    			=> __( 'Global Font', 'wordboot' ),
					'description'	=> __( 'Load the Default Font from Google Font Directory', 'wordboot' ),
					'section'			=> 'wordboot_text_settings_options',
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
					'label'    			=> __( 'Headline Font', 'wordboot' ),
					'description'		=> __( 'Load the Headline Font from Google Font Directory', 'wordboot' ),
					'section'			=> 'wordboot_text_settings_options',
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
			'label'   => __( 'Text Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'link_color',
			'default' => '#337ab7',
			'label'   => __( 'Link Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'link_color_hover',
			'default' => '#337ab7',
			'label'   => __( 'Link Hover Color', 'wordboot' )
		);
		
		$text_colors[] = array(
			'slug'    => 'headline_color',
			'default' => '#292b2c',
			'label'   => __( 'Headline Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'social_nav_link_color',
			'default' => '#00000',
			'label'   => __( 'Social Nav Link Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'social_nav_link_hover_color',
			'default' => '#00000',
			'label'   => __( 'Social Nav Link Hover Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'nav_link_color',
			'default' => '#00000',
			'label'   => __( 'Nav Link Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'nav_link_hover_color',
			'default' => '#00000',
			'label'   => __( 'Nav Link Hover Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'nav_link_active_color',
			'default' => '#00000',
			'label'   => __( 'Nav Link active Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'footer_text_color',
			'default' => '#00000',
			'label'   => __( 'Footer Text Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'footer_link_color',
			'default' => '#337ab7',
			'label'   => __( 'Footer Link Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'footer_link_color_hover',
			'default' => '#337ab7',
			'label'   => __( 'Footer Link Hover Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'sidebar_text_color',
			'default' => '#00000',
			'label'   => __( 'Sidebar Text Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'sidebar_headline_color',
			'default' => '#00000',
			'label'   => __( 'Sidebar Headline Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'sidebar_link_color',
			'default' => '#337ab7',
			'label'   => __( 'Sidebar Link Color', 'wordboot' )
		);
		$text_colors[] = array(
			'slug'    => 'sidebar_link_color_hover',
			'default' => '#337ab7',
			'label'   => __( 'Sidebar Link Hover Color', 'wordboot' )
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
					 'section'  => 'wordboot_text_settings_options',
					 'settings' => $text_color['slug']
				)
			));
		} // foreach end
		
		
		/**
		 * Custom Image Slider
		 */
		 
		$wp_customize->add_section(
			'wb_slider_options', array(
				'title'			=> __( 'WordBoot Image Slider Settings', 'wordboot' ),
				'priority'		=> 24,
				'capability'	=> 'edit_theme_options',
			)
		);
		
		$wp_customize->add_setting( 'wb_slider_status', 
			array(
				'default'    => 'false',
				'transport'  => 'postMessage',
			)
		);
		
		$wp_customize->add_control( 'wb_slider_status',
			array(
				'settings' => 'wb_slider_status',
				'label'    		=> __( 'Image Slider Active?', 'wordboot' ),
				'description'	=> '',
				'section'		=> 'wb_slider_options',
				'type'     => 'radio',
				'priority' => 1,
				'choices'  => array(
					'true'   	=> __( 'Yes', 'wordboot' ),
					'false'  	=> __( 'No', 'wordboot' ),
				)
			)
		);
		
		$wp_customize->add_setting( 'wb_slider_indicators', 
			array(
				'default'    => 'false',
				'transport'  => 'postMessage',
			)
		);
		
		$wp_customize->add_control( 'wb_slider_indicators',
			array(
				'settings' => 'wb_slider_indicators',
				'label'    		=> __( 'Image Slider indicators?', 'wordboot' ),
				'description'	=> '',
				'section'		=> 'wb_slider_options',
				'type'     => 'radio',
				'priority' => 2,
				'choices'  => array(
					'true'   	=> __( 'Yes', 'wordboot' ),
					'false'  	=> __( 'No', 'wordboot' ),
				)
			)
		);
		$wp_customize->add_setting( 'wb_slider_controls', 
			array(
				'default'    => 'false',
				'transport'  => 'postMessage',
			)
		);
		
		$wp_customize->add_control( 'wb_slider_controls',
			array(
				'settings' => 'wb_slider_controls',
				'label'    		=> __( 'Image Slider Controls?', 'wordboot' ),
				'description'	=> '',
				'section'		=> 'wb_slider_options',
				'type'     => 'radio',
				'priority' => 3,
				'choices'  => array(
					'true'   	=> __( 'Yes', 'wordboot' ),
					'false'  	=> __( 'No', 'wordboot' ),
				)
			)
		);
		$wp_customize->add_setting( 'wb_slide_caption', 
			array(
				'default'    => 'false',
				'transport'  => 'postMessage',
			)
		);
		
		$wp_customize->add_control( 'wb_slide_caption',
			array(
				'settings' => 'wb_slide_caption',
				'label'    		=> __( 'Caption Text on Slider?', 'wordboot' ),
				'description'	=> '',
				'section'		=> 'wb_slider_options',
				'type'     => 'radio',
				'priority' => 4,
				'choices'  => array(
					'true'   	=> __( 'Yes', 'wordboot' ),
					'false'  	=> __( 'No', 'wordboot' ),
				)
			)
		);
		
		$sliders = array();
		
		$sliders[] = array(
			'slug'    => 'wb_slide_img_1',
			'default' => '',
			'label'   => __( 'Slider Image One', 'wordboot' ),
			'transport' => 'refresh'
		);
		$sliders[] = array(
			'slug'    => 'wb_slide_img_2',
			'default' => '',
			'label'   => __( 'Slider Image Two', 'wordboot' ),
			'transport' => 'refresh'
		);
		$sliders[] = array(
			'slug'    => 'wb_slide_img_3',
			'default' => '',
			'label'   => __( 'Slider Image Three', 'wordboot' ),
			'transport' => 'refresh'
		);
		$sliders[] = array(
			'slug'    => 'wb_slide_img_4',
			'default' => '',
			'label'   => __( 'Slider Image Four', 'wordboot' ),
			'transport' => 'refresh'
		);
		$sliders[] = array(
			'slug'    => 'wb_slide_img_5',
			'default' => '',
			'label'   => __( 'Slider Image Five', 'wordboot' ),
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
					 'section'  => 'wb_slider_options',
					 'settings' => $slider['slug']
				)
			));
		} // foreach
		
		
		/**
		 * Layout Color Settings Section for WordBoot
		 *
		 * @section		wordboot_layout_color_settings_options
		 * @since		1.0.0
		 */
		$wp_customize->add_section(
			'wordboot_layout_color_settings_options', array(
				'title'			=> __( 'WordBoot Layout Color Settings', 'wordboot' ),
				'priority'		=> 24,
				'capability'	=> 'edit_theme_options',
			)
		);
		
		
		/**
		 * Text Settings Section for WordBoot
		 *
		 * @section		wordboot_text_settings_options
		 * @since		WordBootCHILD 1.0.0
		 */
		$wp_customize->add_section(
			'wordboot_text_settings_options', array(
				'title'			=> __( 'WordBoot Text Settings', 'wordboot' ),
				'priority'		=> 30,
				'capability'	=> 'edit_theme_options',
			)
		);
		/**
		 * Text Color Settings
		 * @since		 1.0.0
		 */
		$layout_colors = array();
		
		$layout_colors[] = array(
			'slug'    => 'body_background_color',
			'default' => '#eaeaea',
			'label'   => __( 'Body Background color', 'wordboot' )
		);
		$layout_colors[] = array(
			'slug'    => 'header_background_color',
			'default' => '#ffffff',
			'label'   => __( 'Header Background ', 'wordboot' )
		);
		
		$layout_colors[] = array(
			'slug'    => 'main_navbar_background_color',
			'default' => '#f7f7f7',
			'label'   => __( 'Main Menu background color', 'wordboot' )
		);
		$layout_colors[] = array(
			'slug'    => 'main_nav_link_border',
			'default' => '#fff',
			'label'   => __( 'Main Menu Border Color', 'wordboot' )
		);
		$layout_colors[] = array(
			'slug'    => 'page_content_background_color',
			'default' => '#ffffff',
			'label'   => __( 'Page Content background color', 'wordboot' )
		);
		$layout_colors[] = array(
			'slug'    => 'sidebar_left_background_color',
			'default' => '#cccccc',
			'label'   => __( 'Sidebar Left Background Color', 'wordboot' )
		);
		$layout_colors[] = array(
			'slug'    => 'sidebar_right_background_color',
			'default' => '#cccccc',
			'label'   => __( 'Sidebar right Background Color', 'wordboot' )
		);
		$layout_colors[] = array(
			'slug'    => 'sidebar_widget_background_color',
			'default' => '#fffffff',
			'label'   => __( 'Sidebar Sections Background Color', 'wordboot' )
		);
		$layout_colors[] = array(
			'slug'    => 'footer_background_color',
			'default' => '#fffffff',
			'label'   => __( 'Footer Background Color', 'wordboot' )
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
					 'section'  => 'wordboot_layout_color_settings_options',
					 'settings' => $layout_color['slug']
				)
			));
		} // foreach end
		
		
		
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
		wp_enqueue_script( 
		'wordboot-themecustomizer', // Give the script a unique ID
			get_template_directory_uri() . '/incs/customizer/theme-customizer.js', // Define the path to the JS file
			array(  'jquery', 'customize-preview' ), // Define dependencies
			'', // Define a version (optional) 
			true // Specify whether to put in footer (leave this true)
		);
	}
	
}


// Setup the Theme Customizer settings and controls...
add_action( 'customize_register', array( 'WordBoot_Customizer', 'register' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'WordBoot_Customizer' , 'live_preview' ) );

/**
 * Callback function for sanitizing checkbox settings.
 *
 * Used by WordBoot_Customize
 *
 * @param $input
 *
 * @return int|string
 */
function wb_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

function wb_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}


/**
 * Converts a HEX value to RGB.
 *
 * @since WordBoot 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function wb_hex2rgb( $color ) {
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

?>