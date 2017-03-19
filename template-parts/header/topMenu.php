<?php
/**
 * TopMenu Navigation
 *
 * @subpackage		WordBoot
 * @since			1.0.0
 */
 
?>

<?php if ( has_nav_menu( 'top' ) ) : ?>
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#topMenu" aria-controls="topMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button> <!-- .navbar-toggler .navbar-toggler-right end;-->
		<?php wp_nav_menu( array(
			'theme_location'	=> 'top',
			'menu_id'        	=> 'top-menu',
			'container'         => 'div',
			'container_class'   => 'collapse navbar-collapse',
			'container_id'		=> 'topMenu',
			'menu_class'     	=> 'navbar-nav mr-auto '. wb_get_container_class() ,
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker()
		) ); ?>
	</nav> <!-- .navbar .navbar-toggleable-md .navbar-light .bg-faded end; -->
<?php endif; ?>