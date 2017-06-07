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
				bs4_posted_on();
				the_title( '<h2 class="display-4 post-title">', '</h2>' );
			} else {
				the_title( '<h2 class="display-4 post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .postHeader  end; -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && empty( $video ) ) : ?>
		<div class="postThumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'featured-image' ); ?>
			</a>
		</div><!-- .postThumbnail end; -->
	<?php endif; ?>
	
	<?php if ( ! is_single() ) :

			// If not a single post, highlight the video file.
			if ( ! empty( $video ) ) :
				foreach ( $video as $video_html ) {
					echo "<div class='postVideo'>\n<div class='embed-responsive embed-responsive-16by9'>\n";
						echo $video_html;
					echo '</div> <!-- .embed-responsive end; -->\</div> <!-- .postVideo end; -->';
				}
			endif;

		endif;
	if ( is_single() || empty( $video ) ) : 
	
	?>
	
	<div class="postContent">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="sr-only"> "%s"</span>', 'wordboot' ),
				get_the_title()
			) );
			if ( is_single ) {
				wp_link_pages( array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'wordboot' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
			}
		?>
	</div><!-- .postContent end; -->
	<?php endif; ?>
	<div class="clearfix"></div>
	<footer class="postFooter">
		<?php bs4_content_footer(); ?>
	</footer>
</article><!-- #post-ID end; -->
