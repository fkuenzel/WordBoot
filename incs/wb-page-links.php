<?php
/**
 * WordBoot Page Links
 */
/**
 * The formatted output of a list of pages.
 *
 * Displays page links for paginated posts (i.e. includes the <!--nextpage-->.
 * Quicktag one or more times). This tag must be within The Loop.
 *
 * @since 1.2.0
 *
 * @global int $page
 * @global int $numpages
 * @global int $multipage
 * @global int $more
 *
 * @param string|array $args {
 *     Optional. Array or string of default arguments.
 *
 *     @type string       $before           HTML or text to prepend to each link. Default is `<p> Pages:`.
 *     @type string       $after            HTML or text to append to each link. Default is `</p>`.
 *     @type string       $link_before      HTML or text to prepend to each link, inside the `<a>` tag.
 *                                          Also prepended to the current item, which is not linked. Default empty.
 *     @type string       $link_after       HTML or text to append to each Pages link inside the `<a>` tag.
 *                                          Also appended to the current item, which is not linked. Default empty.
 *     @type string       $next_or_number   Indicates whether page numbers should be used. Valid values are number
 *                                          and next. Default is 'number'.
 *     @type string       $separator        Text between pagination links. Default is ' '.
 *     @type string       $nextpagelink     Link text for the next page link, if available. Default is 'Next Page'.
 *     @type string       $previouspagelink Link text for the previous page link, if available. Default is 'Previous Page'.
 *     @type string       $pagelink         Format string for page numbers. The % in the parameter string will be
 *                                          replaced with the page number, so 'Page %' generates "Page 1", "Page 2", etc.
 *                                          Defaults to '%', just the page number.
 *     @type int|bool     $echo             Whether to echo or not. Accepts 1|true or 0|false. Default 1|true.
 * }
 * @return string Formatted output in HTML.
 */
function wb_link_pages( $args = '' ) {
	global $page, $numpages, $multipage, $more;

	$defaults = array(
		'before'           => '<h3 class="sr-only">' . __( 'Pages:', 'wordboot' ) .'</h3>',
		'after'            => '',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page', 'wordboot' ),
		'previouspagelink' => __( 'Previous page', 'wordboot' ),
		'pagelink'         => '%',
		'sizing'		   => 'pagination-lg', // .pagination-lg OR .pagination-sm
		'alignment'		   => '', // justify-content-center, OR justify-content-end
		'echo'             => 1
	);

	$params = wp_parse_args( $args, $defaults );

	/**
	 * Filters the arguments used in retrieving page links for paginated posts.
	 *
	 * @since 3.0.0
	 *
	 * @param array $params An array of arguments for page links for paginated posts.
	 */
	$r = apply_filters( 'wb_link_pages_args', $params );

	$output = '<nav aria-label="Page navigation">';
	if ( $multipage ) {
		if ( 'number' == $r['next_or_number'] ) {
			$output .= $r['before'];
			$output .= '<ul class="pagination '. $r['sizing'] .' '. $r['alignment'] .'">';
			for ( $i = 1; $i <= $numpages; $i++ ) {
				$output .= '<li class="page-item';
				if ( $i === $page ) {
						$output .= ' active';
				}
				$output .= '">';
				$link = $r['link_before'] . str_replace( '%', $i, $r['pagelink'] ) . $r['link_after'];
				if ( $i != $page || ! $more && 1 == $page ) {
					$link = _wb_link_page( $i ) . $link . '</a>';
				}
				/**
				 * Filters the HTML output of individual page number links.
				 *
				 * @since 1.0.0
				 *
				 * @param string $link The page number HTML output.
				 * @param int    $i    Page number for paginated posts' page links.
				 */
				$link = apply_filters( 'wb_link_pages_link', $link, $i );

				// Use the custom links separator beginning with the second link.
				$output .= ( 1 === $i ) ? ' ' : $r['separator'];
				if ( $i == $page ) {
						$output .= '<a href="#" class="page-link">';
				}
				$output .= $link;
				if ( $i == $page ) {
						$output .= ' <span class="sr-only">(current)</span></a>';
				}
				$output .= '</li>';
			}
			$output .= '</ul>';
			$output .= $r['after'];
		} elseif ( $more ) {
			$output .= $r['before'];
			$output .= '<ul class="pagination">';
			$prev = $page - 1;
			if ( $prev > 0 ) {
				$link = _wb_link_page( $prev ) . $r['link_before'] . $r['previouspagelink'] . $r['link_after'] . '</a>';

				$output .= apply_filters( 'wb_link_pages_link', $link, $prev );
			}
			$next = $page + 1;
			if ( $next <= $numpages ) {
				if ( $prev ) {
					$output .= $r['separator'];
				}
				$link = _wb_link_page( $next ) . $r['link_before'] . $r['nextpagelink'] . $r['link_after'] . '</a>';

				$output .= apply_filters( 'wb_link_pages_link', $link, $next );
			}
			$output .= '</ul>';
			$output .= $r['after'];
		}
	}
	$output .= '</nav> <!-- .pagination end;';
	/**
	 * Filters the HTML output of page links for paginated posts.
	 *
	 * @since 3.6.0
	 *
	 * @param string $output HTML output of paginated posts' page links.
	 * @param array  $args   An array of arguments.
	 */
	$html = apply_filters( 'wb_link_pages', $output, $args );

	if ( $r['echo'] ) {
		echo $html;
	}
	return $html;
}

/**
 * Helper function for wb_link_pages().
 *
 * @since 1.0.0
 * @access private
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int $i Page number.
 * @return string Link.
 */
function _wb_link_page( $i ) {
	global $wp_rewrite;
	$post = get_post();
	$query_args = array();

	if ( 1 == $i ) {
		$url = get_permalink();
	} else {
		if ( '' == get_option('permalink_structure') || in_array($post->post_status, array('draft', 'pending')) )
			$url = add_query_arg( 'page', $i, get_permalink() );
		elseif ( 'page' == get_option('show_on_front') && get_option('page_on_front') == $post->ID )
			$url = trailingslashit(get_permalink()) . user_trailingslashit("$wp_rewrite->pagination_base/" . $i, 'single_paged');
		else
			$url = trailingslashit(get_permalink()) . user_trailingslashit($i, 'single_paged');
	}

	if ( is_preview() ) {

		if ( ( 'draft' !== $post->post_status ) && isset( $_GET['preview_id'], $_GET['preview_nonce'] ) ) {
			$query_args['preview_id'] = wp_unslash( $_GET['preview_id'] );
			$query_args['preview_nonce'] = wp_unslash( $_GET['preview_nonce'] );
		}

		$url = get_preview_post_link( $post, $query_args, $url );
	}

	return '<a class="page-link" href="' . esc_url( $url ) . '">';
}