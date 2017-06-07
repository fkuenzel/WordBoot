<?php
/**
 * Load Theme Functions
 *
 * @package			WordPress
 * @subpackage		Bootstrap4
 *
 * @version			1.0.0
 * @since			1.0.0
 */

// Load Actions and Filters for Bootstrap4
add_action( 'after_setup_theme', 'bs4_setup' );
add_action( 'wp_enqueue_scripts', 'bs4_scripts' );

/**
 * Register and Loads Stylesheets and JavaScript Files
 *
 * @package			WordPress
 * @subpacke		Bootstrap4
 *
 * @version			1.0.0
 * @since			1.0.0
 */
function bs4_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'wordboot-style', get_stylesheet_uri(), array('bootstrap-style') );
	wp_enqueue_style( 'customizer-api', get_theme_file_uri( '/customizer-css.php' ), array('wordboot-style') );
	
	// Load the Bootstrap 4 Stylesheet and JavaScript Files
	wp_enqueue_style( 'bootstrap-style', get_theme_file_uri( '/libs/bootstrap4/css/bootstrap.min.css' ), array(), '4.0.0-alpha.6' );
	wp_enqueue_script( 'tether', get_theme_file_uri( '/libs/tether/1.4.0/js/tether.min.js' ) , array('jquery'), '1.4.0', true );	
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/libs/bootstrap4/js/bootstrap.min.js' ), array('jquery'), '4.0.0-alpha.6', true );
	
	// Load Font-Awesome File
	wp_enqueue_style( 'font-awesome-4.7.0', get_theme_file_uri( '/libs/font-awesome/css/font-awesome.min.css' ), array( 'wordboot-style' ), '4.7.0' );
	
	
	/**
	 * Load jQuery on Footer
	 */
	wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
	
	/**
	 * Add Inline JS to the Footer for external Modal Windows
	 */ 
	 
	wp_add_inline_script( "bootstrap-js", 
		"jQuery('[data-toggle=\"modalexternal\"]').click(function(e) {
			e.preventDefault();
			var modal_url = jQuery(this).attr('href');
			jQuery.ajax({
				url: modal_url,
				cache: false
			}).done(function( html ) {
				jQuery('#modalwindows').html(html);
				jQuery('#modal_frame').modal('show');
			});
		});
		"); 
	
}
require get_parent_theme_file_path( '/incs/setup.php' );
require get_parent_theme_file_path( '/incs/wp-bootstrap-navwalker.php' );
require get_parent_theme_file_path( '/incs/wb-catwalker.php' );
require get_parent_theme_file_path( '/incs/template-tags.php' );
require get_parent_theme_file_path( '/incs/wb-pagination.php' );
require get_parent_theme_file_path( '/incs/wb-page-links.php' );
require get_parent_theme_file_path( '/incs/media.php' );
require get_parent_theme_file_path( '/incs/comments.php' );
require get_parent_theme_file_path( '/incs/widgets.php' );

require get_parent_theme_file_path( '/incs/customizer/customizer-api.php' );

$GLOBALS['bs4_version'] = '1.0.0-alpha';

?>