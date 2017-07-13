<div class="<?php layout_grid_class( 'sidebar-left' ); ?>" id="sidebar-left">
	<?php 
	if ( is_active_sidebar( 'sidebar_left' ) ) {
		dynamic_sidebar( 'sidebar_left' );
	} else { ?>

	<?php } ?>
</div> <!-- .<?php layout_grid_class( 'sidebar-left' ); ?> #sidebar-left  END -->