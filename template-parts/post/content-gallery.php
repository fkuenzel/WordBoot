<?php
/**
 * Template part for displaying video-posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage wordboot
 * @since 1.0
 * @version 1.0
 */

?>

<?php
	$content = apply_filters( 'the_content', get_the_content() );
	$video = false;

	// Only get video from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="postHeader">
		<?php
			if ( is_single() ) {
				wordboot_posted_on();
				the_title( '<h2 class="display-4 post-title">', '</h2>' );
			} else {
				the_title( '<h2 class="display-4 post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .postHeader  end; -->
	
	
	<div class="postContent">
		<?php if ( ! is_single() ) :

			// If not a single post, highlight the gallery.
			if ( get_post_gallery() ) :
				echo '<div class="entry-gallery">';
					echo get_post_gallery();
				echo '</div>';
			endif;

		endif;

		if ( is_single() || ! get_post_gallery() ) :
		
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="sr-only"> "%s"</span>', 'wordboot' ),
				get_the_title()
			) );
		
			wb_link_pages( array() );
		endif; ?>
	</div><!-- .postContent end; -->

	<div class="clearfix"></div>
	<footer class="postFooter">
		<?php wordboot_content_footer(); ?>
	</footer>
</article><!-- #post-ID end; -->
