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
			the_title( '<h2 class="display-4 post-title">', '</h2>' );
		?>
	</header><!-- .postHeader  end; -->

	<div class="postContent">
		
			<?php the_content( sprintf(
				__( 'Continue reading<span class="sr-only"> "%s"</span>', 'wordboot' ),
				get_the_title()
			) ); ?>
	</div><!-- .postContent end; -->
	<div class="clearfix"></div>
	<footer class="postFooter">
		<?php wordboot_content_footer(); ?>
	</footer>
</article><!-- #post-ID end; -->
