<?php
/**
 * TopMenu Navigation
 *
 * @subpackage		Bootstrap4
 * @since			1.0.0
 */
 
?>

<?php if ( has_nav_menu( 'header_m' ) ) : ?>
	<nav class="navbar navbar-expand-lg <?php echo bs4_navbar_color_schema(); ?>">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#headerMenu" aria-controls="headerMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button> <!-- .navbar-toggler .navbar-toggler-right end;-->
		<?php navbar_brand(); ?>
		<?php wp_nav_menu( array(
			'theme_location'	=> 'header_m',
			'menu_id'        	=> 'headerM',
			'container'         => 'div',
			'container_class'   => 'collapse navbar-collapse',
			'container_id'		=> 'headerMenu',
			'menu_class'     	=> 'navbar-nav mr-auto',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker()
		) ); ?>
	</nav> <!-- .navbar .navbar-expand-lg .navbar-light .bg-faded end; -->
<?php endif; ?>