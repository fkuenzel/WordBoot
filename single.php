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
	
		<?php bs4_breadcrumb(); ?>
		
		<div class="row">
			<div class="<?php layout_grid_class('content' ); ?>">
			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					} else { 
						bs4_comments_alert();
					}
	
					the_post_navigation( array(
						'prev_text' => '<span class="sr-only">' . __( 'Previous Post', 'bs4_lang' ) . '</span> %title',
						'next_text' => '<span class="sr-only">' . __( 'Next Post', 'bs4_lang' ) . '</span> %title',
					) );
					
				endwhile; // End of the loop.
			?>
			</div> <!-- .col -->
			<?php if ( is_columns( 'sidebar-left' ) ) { get_sidebar( 'left' ); } ?>
			<?php if ( is_columns( 'sidebar-right' ) ) { get_sidebar( ); } ?>
		</div> <!-- .row end; -->
	</div> <!-- .<?php bs4_container_class(); ?> end -->
<?php get_footer(); ?>