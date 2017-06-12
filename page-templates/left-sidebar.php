<?php
/**
 * The template for displaying all PAGES posts with left sidebar
 *
 * Template Name: Page Left Sidebar
 *
 * @package WordPress
 * @subpackage bs4_basis
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
	<div class="<?php bs4_container_class(); ?>" id="pageContent">
		<div class="row">
			<div class="<?php layout_grid_class('content' ); ?>">
			<?php
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
			
			<?php get_sidebar( 'left' ); ?>
			
		</div> <!-- .row end; -->
	</div> <!-- .<?php bs4_container_class(); ?> AUTO CLASS end -->
<?php get_footer(); ?>