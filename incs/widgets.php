<?php
/**
 * WordBoot Widgets
 *
 * @package			WordPress
 * @subpackage		WordBoot
 *
 * @version			1.0.0
 * @since			1.0.0
 */
 
/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since WordBoot 1.0
 */
function wb_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'wordboot' ),
		'id'            => 'sidebar_left',
		'description'   => __( 'Add widgets here to appear in your left sidebar.', 'wordboot' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title h3">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Right', 'wordboot' ),
		'id'            => 'sidebar_right',
		'description'   => __( 'Add widgets here to appear in your right sidebar.', 'wordboot' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title h3">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'wordboot' ),
		'id'            => 'footer_widgets',
		'description'   => __( 'Add widgets here to appear in your footer.', 'wordboot' ),
		'before_widget' => '<aside id="%1$s" class="col widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title h3">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'wb_widgets_init' );

function wb_widget_init(){
	// unregister default WordPress Widget
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Meta' );
	
	// Register WordBoot Widgets
	register_widget( 'WB_Widget_Categories' );
	register_widget( 'WB_Widget_Meta' );
}

add_action("widgets_init", "wb_widget_init");

/**
 * Load WordBoot Widgets
 *
 * Loading WordBoot Special Widgets
 */
require( 'widgets/wp-category-widget.php' );
require( 'widgets/wb-meta-widget.php' );
?>