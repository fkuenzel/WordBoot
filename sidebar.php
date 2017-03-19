<div class="col-md-3" id="sidebar-right">
	<?php 
	if ( is_active_sidebar( 'sidebar_right' ) ) {
		dynamic_sidebar( 'sidebar_right' );
	} else { ?>
		<aside id="wbCategory">
			<h6 class="h5"><?php _e('Search', 'wordboot'); ?></h6>
			<div class="aside-content">
				<form role="search" method="get" class="search-form" action="<?php esc_url( home_url( '/' ) ); ?>">
					<label>
						<span class="screen-reader-text"><?php _e( 'Search for:', 'wordboot' ); ?></span>
						<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'wordboot' ); ?>" value="<?php get_search_query(); ?>" name="s" />
					</label>
					<input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'submit wordboot' ); ?>" />
				</form>
			</div> <!-- .aside-content END; -->
		</aside>
		<aside id="wbRecentComments">
			<h6 class="h5"><?php _e('Recent Comments'); ?></h6>
			<div class="aside-content">

			</div> <!-- .aside-content END; -->
		</aside>
	<?php } ?>
</div> <!-- .col-md-3 #sidebar-right END; -->