<?php
/**
 * WordBoot Theme Setup
 *
 * @package			WordPress
 * @subpackage		WordBoot
 *
 * @version			1.0.0
 * @since			1.0.0
 */
function wordboot_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'wordboot' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wordboot', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'featured-image', 2000, 1200, true );
	add_image_size( 'thumbnail-avatar', 150, 150, true );
	add_image_size( 'wb_slider_img', 1140, 400, true );
	
	// Set the default content width.
	$GLOBALS['content_width'] = 1140;

	if ( version_compare( $GLOBALS['wp_version'], '4.4.2', '>' ) ) {
		/*
		 * Enable support for site logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 400,
			'width'       => 1140,
			'flex-height' => true,
			'flex-width'  => true,
		) );
	}
	// Register Theme Features

	// Add theme support for Custom Header
	add_theme_support( 'custom-header', apply_filters( 'wordboot_custom_header_args', array(
			'default-image'          => '',
			'width'                  => 1140,
			'height'                 => 400,
			'flex-width'             => true,
			'flex-height'            => true,
			'uploads'                => true,
			'random-default'         => true,
			'header-text'            => false,
			'default-text-color'     => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
			'video'                  => true,
			'video-active-callback'  => '',
		))
	);

	add_theme_support( 'custom-background', apply_filters( 'wordboot_custom_hbackground_args',	
		array(
			'default-preset' => 'default',
			'default-position-x' => 'left',
			'default-position-y' => 'top',
			'default-size' => 'auto',
			'default-repeat' => 'no-repeat',
			'default-attachment' => 'scroll',
			'wp-head-callback' => '_custom_background_cb',
		))
	);
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'wordboot' ),
		'social' => __( 'Social Links Menu', 'wordboot' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
	/**
	 * Customize Selective Refresh Widgets
	 *
	 * @since WordPress 4.5
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );
}
?>