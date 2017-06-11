<div class="<?php layout_grid_class( 'sidebar-right' ); ?>" id="sidebar-right">
	<?php 
	if ( is_active_sidebar( 'sidebar_right' ) ) {
		dynamic_sidebar( 'sidebar_right' );
	} else { ?>
		
	<?php } ?>
</div> <!-- .<?php layout_grid_class( 'sidebar-right' ); ?> #sidebar-right END; -->