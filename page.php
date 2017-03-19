<?php
/**
 * The template for displaying all PAGES posts
 *
 *
 * @package WordPress
 * @subpackage wordboot
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
	<div class="<?php wb_container_class(); ?>" id="pageContent">
		<div class="row">
		
		<?php
			if ( '2_cols_left' === wb_columns_layout( true, 'pages' ) OR '3_cols' === wb_columns_layout( true, 'pages' )) { get_sidebar('left'); }
			echo wb_columns_layout( false, 'pages' ); 
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() AND wb_show_comments_on_pages() == TRUE ) {
						comments_template();
					} else {
						wb_comments_alert();
					}

				endwhile; // End of the loop.
			?>
			</div> <!-- .col -->
			
			<?php if ( '2_cols_right' === wb_columns_layout( true, 'pages' ) OR '3_cols' === wb_columns_layout( true, 'pages' )) { get_sidebar(); } ?>
			
		</div> <!-- .row end; -->
	</div> <!-- .<?php wb_container_class(); ?> AUTO CLASS end -->
<?php get_footer(); ?>