<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @since Bootstrap4 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title h3">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( __( 'One thought on &ldquo;%s&rdquo;', 'bs4_lang' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'bs4_lang'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h4>

		<?php wb_comments_navigation(); ?>

		<div class="comment-list list-group">
			<?php
				wp_list_comments( array(
					'style'       	=> 'div',
					'short_ping'  	=> true,
					'avatar_size'	=> 50,
					'type'			=>'all',
					'callback'		=> 'bs4_comment',
					'short_ping'	=> true,
				) );
			?>
		</div><!-- .comment-list .list-group end; -->
		
		
		<?php wb_comments_navigation( ); ?>
		
	<?php endif; // Check for have_comments(). 
	
		wb_comments_alert();
	
        /* Loads the comment-form.php template */
    	comment_form( array(
			'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title h2">',
			'title_reply_after'  => '</h5>',
		) );
	?>

</section><!-- .comments-area -->
