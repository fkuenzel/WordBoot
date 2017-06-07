<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage wordboot
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
	<div class="<?php bs4_container_class(); ?>" id="pageContent">
		<div class="row">
		
		<?php if ( '2_cols_left' === wb_columns_layout( false, 'single' ) OR '3_cols' === wb_columns_layout( false, 'single' ) ) { get_sidebar('left'); } ?>
		
		<?php echo wb_columns_layout(true, 'single' ); ?>
			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					} else { 
						wb_comments_alert();
					}
	
					the_post_navigation( array(
						'prev_text' => '<span class="sr-only">' . __( 'Previous Post', 'wordboot' ) . '</span> %title',
						'next_text' => '<span class="sr-only">' . __( 'Next Post', 'wordboot' ) . '</span> %title',
					) );
					
				endwhile; // End of the loop.
			?>
			</div> <!-- .col -->
			<?php if ( '2_cols_right' === wb_columns_layout( false, 'single' ) OR '3_cols' === wb_columns_layout( false, 'single' )) { get_sidebar(); } ?>
		</div> <!-- .row end; -->
	</div> <!-- .<?php bs4_container_class(); ?> end -->
<?php get_footer(); ?>