<?php
/**
 * Social Media Navigation
 *
 * @subpackage		WordBoot
 * @since			1.0.0
 */
 
?>

<?php if ( has_nav_menu( 'social' ) ) : ?>
	<?php wp_nav_menu( array(
		'theme_location'	=> 'social',
		'menu_id'        	=> 'social-menu',
		'container'         => 'nav',
		'container_class'   => 'socialMediaMenu float-md-right float-lg-right float-xl-right',
		'container_id'		=> 'socialMenu',
		'menu_class'     	=> 'nav justify-content-end',
		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		'walker'            => new wp_bootstrap_navwalker()
	) ); ?>
<?php endif; ?>