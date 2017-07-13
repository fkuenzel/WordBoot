<?php
/**
 * Bootstrap4 Widgets
 *
 * @package			WordPress
 * @subpackage		Bootstrap4
 *
 * @version			1.0.0
 * @since			1.0.0
 */
 
/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Bootstrap4 1.0
 */
function bs4_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Links', 'bs4_lang' ),
		'id'            => 'sidebar_left',
		'description'   => __( 'Fügen Sie hier Widgets hinzu, um in der linken Seitenleiste zu erscheinen.', 'bs4_lang' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title h3">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Rechts', 'bs4_lang' ),
		'id'            => 'sidebar_right',
		'description'   => __( 'Füge hier Widgets hinzu, um in deiner rechten Seitenleiste zu erscheinen.', 'bs4_lang' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title h3">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'bs4_lang' ),
		'id'            => 'footer_widgets',
		'description'   => __( 'Füge hier Widgets hinzu, um in deiner Fußzeile zu erscheinen.', 'bs4_lang' ),
		'before_widget' => '<aside id="%1$s" class="col widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title h3">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'bs4_widgets_init' );

function bs4_widget_init(){
	// unregister default WordPress Widget
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	
	// Register Bootstrap4 Widgets
	register_widget( 'WB_Widget_Categories' );
	register_widget( 'WB_Widget_Meta' );
	register_widget( 'BS4_Widget_Recent_Posts' );
}

add_action("widgets_init", "bs4_widget_init");

/**
 * Load Bootstrap4 Widgets
 *
 * Loading Bootstrap4 Special Widgets
 */
require( 'widgets/wp-category-widget.php' );
require( 'widgets/wb-meta-widget.php' );
require( 'widgets/bs4-widget-recent-posts.php' );
?>