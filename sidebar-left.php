<div class="col-,md-3" id="sidebar-left">
	<?php 
	if ( is_active_sidebar( 'sidebar_left' ) ) {
		dynamic_sidebar( 'sidebar_left' );
	} else { ?>
	<?php } ?>
</div>