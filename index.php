<?php get_header(); ?>
	<div class="<?php wb_container_class(); ?>" id="pageContent">
		<div class="row">
		
		<?php if ( '2_cols_left' === wb_columns_layout( false, 'global' ) OR '3_cols' === wb_columns_layout( false, 'global' )) { get_sidebar('left'); } ?>
		
		<?php echo wb_columns_layout( true, 'global' ); ?>
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', get_post_format() );
			
			endwhile;
		?>
		
		<?php 
			wordboot_paging_nav( array(
				'prev_text' => '<span class="sr-only">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="sr-only">' . __( 'Next page', 'twentyseventeen' ) . '</span>',
				'before_page_number' => '<span class="meta-nav sr-only">' . __( 'Page', 'twentyseventeen' ) . ' </span>'
			) );
			
		endif;
		?>
		
		</div> <!-- .col -->
		
		<?php if ( '2_cols_right' === wb_columns_layout( false, 'global' ) OR '3_cols' === wb_columns_layout( false, 'global' )) { get_sidebar(); } ?>
		</div> <!-- .row end; -->
			
	</div> <!-- .<?php wb_container_class(); ?> end -->
<?php get_footer(); ?>