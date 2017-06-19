<?php
/**
 * Bootstrap4 Comments
 *
 * Comment functions for the Bootstrap4 Theme
 *
 * @package			Bootstrap4
 * @subpackage		WordPress
 *
 * @section			comments
 * @version			1.0.0
 * @since			1.0.0
 */

function bs4_comment_form( $args ) {
	
	$commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5 = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	
	$args['fields'] = array(
		'author' => '
		<div class="form-group comment-form-author">
			<label for="author">' . __( 'Name', 'bs4_lang' ) .
			( $req ? ' <span class="required text-danger">*</span>' : '' ) . '</label>
			<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' ' . ( $req ? ' required' : '' ) . ' />
		</div> <!-- .form-group end; -->',
		'email' => '
		<div class="form-group comment-form-email">
			<label for="email" >' . __( 'Email', 'bs4_lang' ) .
			( $req ? ' <span class="required text-danger">*</span>' : '' ) . '</label>
			<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' ' . ( $req ? ' required' : '' ) . ' />
		</div> <!-- .form-group end; -->',
		'url' => '
		<div class="form-group comment-form-url">
			<label for="url" >' . __( 'Website', 'bs4_lang' ) . '</label>
			<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
		</div> <!-- .form-group end; -->',
    );
    $args['comment_field'] = '
		<div class="form-group comment-form-comment">
			<label for="comment" >' . __( 'Comment', 'bs4_lang' ) . '</label>
			<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</div>';    
	$args['comment_notes_before'] = '<div class="alert alert-info">'.  __ ('Your email address will not be published.', 'bs4_lang') .'</div>';
	$args['comment_notes_after'] = '<div class="alert alert-info form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'bs4_lang' ), ' <code>' . allowed_tags() . '</code>' ) . '</div>';
	$args['class_form'] = 'form-comments';
	$args['class_submit'] = 'btn btn-primary';
	$args['format'] = 'html5';
	
	return $args;
}
add_filter( 'comment_form_defaults', 'bs4_comment_form' );

function bs4_edit_comment( $link, $text = null, $before = '', $after = '') {
	if ( null === $text ) {
        $text = __( 'Edit This', 'bs4_lang' );
    }
	$link = '<a class="comment-edit-link btn btn-secondary btn-sm pull-right" href="' . esc_url( get_edit_comment_link( $comment ) ) . '">' . $text . '</a>';
	
	return $link;
} add_filter( 'edit_comment_link', 'bs4_edit_comment' ); 


function bs4_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='comment-reply-link btn btn-secondary", $class);
    return $class;
} add_filter('comment_reply_link', 'bs4_reply_link_class');

function bs4_comments_navigation( $args = array() ) {
    $navigation = '';
 
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 ) {
        $args = wp_parse_args( $args, array(
            'prev_text'          => __( '<span aria-hidden="true">&larr;</span> Older comments', 'bs4_lang' ),
            'next_text'          => __( 'Newer comments <span aria-hidden="true">&rarr;</span>', 'bs4_lang' ),
            'screen_reader_text' => __( 'Comments navigation', 'bs4_lang' ),
        ) );
 
        $prev_link = get_previous_comments_link( $args['prev_text'] );
        $next_link = get_next_comments_link( $args['next_text'] );

        if ( $prev_link ) {
            $navigation .= '<li class="nav-previous previous">' . $prev_link . '</li>';
        }
 
        if ( $next_link ) {
            $navigation .= '<li class="nav-next next">' . $next_link . '</li>';
        }
 
        $navigation = bs4_postnavigation( $navigation, 'comment-navigation', $args['screen_reader_text'] );
    }
 
    echo $navigation;
} 

function bs4_comments_alert() {
	$output = '';
	
	if ( /*is_page() AND bs4_comments_alerts_page() == TRUE && */ ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments') ) {
		$output .= "<div class='alert alert-danger mt-3'>\n
		<i class='fa fa-exclamation-triangle'></i> <span class='h4'>". __( 'Comments are closed for this Page.', 'bs4_lang' ) ."</span>\n
		</div>\n";
	} else if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		$output .= "<div class='alert alert-danger mt-3'>\n
		<i class='fa fa-exclamation-triangle'></i> <span class='h4'>". __( 'Comments are closed for this post.', 'bs4_lang' ) ."</span>\n
		</div>\n";
	}
	
	echo $output;
}

function bs4_comment_classes() {
	$classes[] = 'list-group-item list-group-item-action flex-column align-items-start';
	
	return $classes;
}
add_filter( 'comment_class', bs4_comment_classes, 10, 10 );

function bs4_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<header class="comment-head list-group-item-heading">
		<div class="comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) : ?>
			<?php echo get_avatar( $comment, $args['avatar_size'], '', '', array( 'class' => 'img-thumbnail float-left' )  ); ?>
		<?php endif; ?>
		<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>', 'bs4_lang' ), get_comment_author_link() ); ?>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation text-info"><?php _e( 'Your comment is awaiting moderation.', 'bs4_lang' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s','bs4_lang'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'bs4_lang' ) );
			?>
		</div>
	</header>
	<div class="comment-content list-group-item-text">
		<?php comment_text(); ?>
	</div>
	<footer class="reply comment-footer list-group-item-footer">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</footer>
<?php
} 
?>