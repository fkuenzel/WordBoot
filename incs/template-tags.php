<?php
if ( ! function_exists( 'bs4_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function bs4_posted_on() {
	echo get_bs4_posted_on();
}
 
function get_bs4_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s" hidden>%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);
	
	$posted_on = sprintf(
		__( 'Geschrieben am %s', 'bs4_lang' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	$byline = sprintf(
		__( 'von %s', 'bs4_lang' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	
	$output = '<div class="postMeta"><span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span></div>';
	
	return apply_filters( 'bs4_posted_on', "{$output}", $time_string . $posted_on . $byline );
}
endif;

if ( ! function_exists( 'bs4_content_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function bs4_content_footer() {
	echo "<div class='row'>\n";
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		echo "<div class='col-md-8'>\n";
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'bs4_lang' ) );
		if ( $categories_list && bs4_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Ver&ouml;ffentlich in %1$s', 'bs4_lang' ) . '</span>', $categories_list );
		}
		echo "<br />\n";
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', ',&nbsp;' );
		if ( $tags_list ) {
			printf( ' <span class="tags-links">' . __( 'Schlagw&ouml;rter: %1$s', 'bs4_lang' ) . '</span>', $tags_list );
		}
		echo "</div>\n";
	}
	echo "<div class='col'>\n";
	if ( is_page() AND bs4_show_comments_on_pages() == TRUE ) {
		echo ' <span class="comments-link float-lg-right">';
		comments_popup_link( __( 'Hinterlasse einen Kommentar', 'bs4_lang' ), __( '<span class="badge badge-default">1</span> Kommentar', 'bs4_lang' ), __( '<span class="badge badge-default">%</span> Kommentare', 'bs4_lang' ), 'btn btn-secondary btn-sm' );
		echo '</span>';
	} else if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() AND !is_page() ) ) {
			echo ' <span class="comments-link float-lg-right">';
			comments_popup_link( __( 'Hinterlasse einen Kommentar', 'bs4_lang' ), __( '<span class="badge badge-default">1</span> Kommentar', 'bs4_lang' ), __( '<span class="badge badge-default">%</span> Kommentare', 'bs4_lang' ), 'btn btn-secondary btn-sm' );
			echo '</span>';
		}
	
	edit_post_link( __( 'Bearbeiten', 'bs4_lang' ), ' <span class="edit-link float-lg-right mr-1">', '</span>', '', 'btn btn-secondary btn-sm' );
	echo "</div>\n";
	echo "</div> <!-- .row end -->\n";
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bs4_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bs4_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );
		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'bs4_categories', $all_the_cool_cats );
	}
	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bs4_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bs4_categorized_blog should return false.
		return false;
	}
}
/**
 * Flush out the transients used in bs4_categorized_blog.
 */
function bs4_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bs4_categories' );
}
add_action( 'edit_category', 'bs4_category_transient_flusher' );
add_action( 'save_post',     'bs4_category_transient_flusher' );


function bs4_single_post_excerpt() {
	
	$output = "";
	
	if ( is_single() AND bs4_show_single_excerpt() == true ) {
			$output .= "<div class='lead postExcerpt'>\n ". get_the_excerpt() ."</div>\n";
	}
	
	echo $output;
	
}

function bs4_add_html_classes( $html ) {
    $find = array(
        "/<blockquote>/",
    );
    $rep = array(
        "<blockquote class='blockquote'>"
    );
    $html = preg_replace( $find, $rep, $html );

    return $html;
} add_filter( 'the_content','bs4_add_html_classes', 0, 4 );  

function bs4_style_list_categorie($links) {
	
	// class="cat-item 
	$links = str_replace('<li class="cat-item ', '<li class="list-group-item justify-content-between cat-item ', $links);
	$links = str_replace('</a> (', '</a> <span class="badge badge-default badge-pill">', $links);
	$links = str_replace(')', '</span>', $links);
		
	return $links;
} add_filter('wp_list_categories', 'bs4_style_list_categorie');

/**
 * WordPress Searchform
 *
 * add a searchform to WordPress
 */
function bs4_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform form-inline" action="' . home_url( '/' ) . '" >
		<div class="form-group">
			<label for="s" class="sr-only">' . __( 'Suche für:', 'bs4_lang' ) . '</label>
			<input type="text" class="form-control" id="s" name="s" value="' . get_search_query() . '" placeholder="' . __( 'Suche für', 'bs4_lang' ) . '" />
		</div>
		<div class="form-group">
			<input type="submit" id="searchsubmit" class="btn btn-secondary" value="'. esc_attr__( 'Suchen', 'bs4_lang' ) .'" />
		</div>
    </form>';

    return apply_filters( 'bs4_search_form', $form );
} add_filter( 'get_search_form', 'bs4_search_form', 100 );

/**
 * Conditional Tag "is_tree()"
 *
 * Chek if page or page_parent
 *
 * @param	int		$pid 		page_id of the parent page
 * @return	bool				true or false
 */
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
               return true;   // we're at the page or at a sub page
	else 
               return false;  // we're elsewhere
};

?>