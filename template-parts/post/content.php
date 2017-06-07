<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage wordboot
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="postHeader">
		<?php
			if ( is_single() OR 'aside' == get_post_type() ) {
				bs4_posted_on();
				the_title( '<h2 class="display-4 post-title">', '</h2>' );
			} else {
				the_title( '<h2 class="display-4 post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .postHeader  end; -->

	<?php wb_post_thumbnail(); ?>

	<?php wb_single_post_excerpt() ?>
	
	<div class="postContent">
		<?php if( !is_singular() AND bs4_show_excerpt() != 'full' ) { ?>
			<?php the_excerpt(); ?>
		<?php } else { ?>
			<?php the_content( sprintf(
				__( 'Continue reading<span class="sr-only"> "%s"</span>', 'wordboot' ),
				get_the_title()
			) ); ?>
		<?php } ?>
		<?php
		if ( is_single AND is_singular() ) {
				wb_link_pages( array(

				) );
			}
		?>
		
	</div><!-- .postContent end; -->
	<div class="clearfix"></div>
	<footer class="postFooter">
		<?php bs4_content_footer(); ?>
	</footer>
</article><!-- #post-ID end; -->
