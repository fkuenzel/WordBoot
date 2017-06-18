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
			the_title( '<h1 class="post-title">', '</h1>' );
		?>
	</header><!-- .postHeader  end; -->

	<div class="postContent">
		
			<?php the_content( sprintf(
				__( 'Continue reading<span class="sr-only"> "%s"</span>', 'bs4_lang' ),
				get_the_title()
			) ); ?>
	</div><!-- .postContent end; -->
		<footer class="postFooter clearfix">
		<?php bs4_content_footer(); ?>
	</footer>
</article><!-- #post-ID end; -->
