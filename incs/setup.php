<?php
/**
 * Bootstrap4 Theme Setup
 *
 * @package			WordPress
 * @subpackage		Bootstrap4
 *
 * @version			1.0.0
 * @since			1.0.0
 */
function bs4_setup() {
	/*
	 * Make theme available for translation.
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'bs4_lang' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bs4_lang', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	add_editor_style( 'libs/bootstrap4/css/bootstraps.min.css' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'featured-image', 2000, 1200, true );
	add_image_size( 'thumbnail-avatar', 150, 150, true );
	add_image_size( 'navbar-brand-logo', 30, 30, true );
	
	
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
	add_theme_support( 'custom-header', apply_filters( 'bs4_custom_header_args', array(
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

	add_theme_support( 'custom-background', apply_filters( 'bs4_custom_hbackground_args',	
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
		'header_m'			=> __( 'Men&uuml; Kopfbereich', 'bs4_lang' ),
		'sidebar_left_m'	=> __( 'Men&uuml; Linke Sidebar', 'bs4_lang' ),
		'sidebar_right_m'	=> __( 'Men&uuml; Sidebar Rechts', 'bs4_lang' ),
		'footer_m'			=> __( 'Men&uuml; Fussbereich', 'bs4_lang' ),
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


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bs4_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );
	
	// Check if layout is one column.
	if ( 'fullwidth' === $page_layout ) {
		$content_width = 1140;
		}

	// Check if is sidebar(s).
	if ( 'sidebar-left' === $page_layout OR 'sidebar-sidebar' === $page_layout ) {
		$content_width = 740;
	}
	
	// Check if is sidebar(s).
	if ( '3-columns' === $page_layout ) {
		$content_width = 540;
	}
	

	/**
	 * Filter Bootstrap4n content width of the theme.
	 *
	 * @since Bootstrap4 1.0.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'bs4_content_width', $content_width );
}
add_action( 'template_redirect', 'bs4_content_width', 0 );


?>