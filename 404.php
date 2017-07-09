<?php get_header(); ?>
	<div class="<?php bs4_container_class(); ?>" id="pageContent">
		
		
		<div class="row">
			<div class="<?php layout_grid_class('content' ); ?>">
				<div id="404-page" <?php post_class('pb-3'); ?>>
					<h1><?php _e('404 - Seite nicht gefunden', 'bs4_lang' ); ?></h1>
					<p><?php _e('Die von Ihnen aufgerufene Seite konnte nicht gefunden werden.', 'bs4_lang' ); ?></p>
				</div>
			</div> <!-- .col -->
			
			<?php if ( is_columns( 'sidebar-left' ) ) { get_sidebar( 'left' ); } ?>
			<?php if ( is_columns( 'sidebar-right' ) ) { get_sidebar( ); } ?>
			
		</div> <!-- .row end; -->
	</div> <!-- .<?php bs4_container_class(); ?> end -->
<?php get_footer(); ?>