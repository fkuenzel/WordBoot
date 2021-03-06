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
	wp_enqueue_style( 'bs4-style', get_stylesheet_uri(), array('bootstrap') );
	wp_enqueue_style( 'customizer-api', get_theme_file_uri( '/customizer-css.php' ), array('bs4-style') );
	
	// Load the Bootstrap 4 Stylesheet and JavaScript Files
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/libs/bootstrap4/css/bootstrap.min.css' ), array(), '4.0.0-beta' );
	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js'  , array('jquery'), '1.11.0', true );	
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/libs/bootstrap4/js/bootstrap.min.js' ), array('popper'), '4.0.0-beta', true );
	
	// Load Font-Awesome File
	wp_enqueue_style( 'font-awesome-4.7.0', get_theme_file_uri( '/libs/font-awesome/css/font-awesome.min.css' ), array( 'bs4-style' ), '4.7.0' );
	
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
/**
 * Remove jQuery Migrate
 *
 * @since		1.0.0
 */
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
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

$GLOBALS['bs4_version'] = '1.0.0-beta';

?>