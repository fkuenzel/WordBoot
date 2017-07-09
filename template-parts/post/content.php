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
				the_title( '<h1 class="post-title">', '</h1>' );
			} else {
				the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .postHeader  end; -->

	<?php bs4_post_thumbnail(); ?>
	
	<div class="postContent">
		<?php the_content( sprintf( __( 'Continue reading <span class="sr-only">"%s"</span>', 'bs4_lang' ), get_the_title() ) ); ?>
		<?php
		if ( is_single AND is_singular() ) {
				bs4_link_pages( array(

				) );
			}
		?>
		
	</div><!-- .postContent end; -->
	<div class="clearfix"></div>
	<footer class="postFooter my-3">
		<?php bs4_content_footer(); ?>
	</footer>
</article><!-- #post-ID end; -->
