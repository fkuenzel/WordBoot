<?php
/**
 * Customizer Options Functions
 *
 * @since		Bootstrap4 1.0.0
 * @version		1.0.0
 */
function bs4_columns_layout( $show_cols = false, $layout = 'global' ) {
	$output = '';
	switch( $layout ) {
		case 'global':
			$cols = get_theme_mod('columns_layout_global', 'fullwidth');
			break;
		case 'single':
			$cols = get_theme_mod('columns_layout_single', 'default');
			break;
		case 'pages':
			$cols = get_theme_mod('columns_layout_pages', 'default');
			break;
		default:
			$cols = get_theme_mod('columns_layout_global', 'fullwidth');
			break;
	}
	
	if ( $cols === 'default' ) { $cols = get_theme_mod('columns_layout_global', 'fullwidth'); }
	switch( $cols ) {
		case 'fullwidth':
			$output .= '<div class="col fullwidth">';
			break;
		case '2_cols_left':
			$output .= '<div class="col-md-9 has-left-sidebar">';
			break;
		case '2_cols_right':
			$output .= '<div class="col-md-9 has-right-sidebar">';
			break;
		case '3_cols':
			$output .= '<div class="col-md-6 3-colum-layout">';
			break;
		default:
			$output .= '<div class="col no-cols">';
			break;
	}
	/*
	if ( !empty( $cols ) ) {
		if ( $cols === 'default' ) {
			$default_cols = get_theme_mod('columns_layout_global', 'fullwidth');
			if ( 'fullwidth' === $default_cols ) { $output .= '<div class="col fullwidth">'; }
			if ( '2_cols_left' === $default_cols ) { $output .=  '<div class="col-md-9 has-left-sidebar">'; }
			if ( '2_cols_right' === $default_cols ) { $output .= '<div class="col-md-9 has-right-sidebar">'; }
			if ( '3_cols' === $default_cols ) { $output .= '<div class="col-md-6 3-colum-layout">'; }
		} else {		
			if ( 'fullwidth' === $cols ) { $output .= '<div class="col fullwidth">'; }
			if ( '2_cols_left' === $cols ) { $output .=  '<div class="col-md-9 has-left-sidebar">'; }
			if ( '2_cols_right' === $cols ) { $output .= '<div class="col-md-9 has-right-sidebar">'; }
			if ( '3_cols' === $cols ) { $output .= '<div class="col-md-6 3-colum-layout">'; }
		}
	} else {
		$output .= '<div class="col no-cols">';
	}
	*/
	
	if ( $show_cols === false ) {
		return $cols;
	} else {
		return $output;
	}
}

function bs4_show_single_excerpt() {
	
	return get_theme_mod( 'ShowExcerptSingle' );
}

function bs4_show_excerpt() {
	
	return get_theme_mod( 'ShowExcerptBlog');
}
/**
 * Filter the except length to customitze lenght.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function bs4_custom_excerpt_length( $length ) {
    $lenght = get_theme_mod('ExcerptLenght');
	
	if ( !empty($lenght) ) {
		return 135;
	}
	
	return $lenght;
}
//add_filter( 'excerpt_length', 'bs4_custom_excerpt_length', 999 );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wordpress_excerpt_more( $more ) {
    return sprintf( '<div class="clearfix">&nbsp;</div><a class="read-more btn btn-secondary" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        get_theme_mod('ExcerptText', __('Read More', 'bs4_lang') )
    );
}
//add_filter( 'excerpt_more', 'wordpress_excerpt_more' );


function bs4_trim_excerpt($text) {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');

		$text = strip_shortcodes( $text );

		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text , '');
		$lenght = get_theme_mod('ExcerptLenght');
		$excerpt_length = apply_filters('excerpt_length', $lenght);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '<div class="clearfix">&nbsp;</div><a class="read-more btn btn-secondary" rel="bookmark" href="'.get_permalink().'">'. get_theme_mod('ExcerptText', __('Read More', 'bs4_lang') ) .'</a>');
		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
			array_pop($words);
			$text = implode(' ', $words);
			$text = $text . $excerpt_more;
		} else {
			$text = implode(' ', $words);
		}
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'bs4_trim_excerpt');


function bs4_show_comments_on_pages() {
	
	return get_theme_mod( 'CommentsOnPages');
}

function bs4_comments_alerts_pages() {
	
	return get_theme_mod( 'CommentsAlertOnPages');
}

/**
 * Create Google Font URL
 *
 * @section			custom_font_options
 */
function google_font_import( $font ) {
	
	$font_decoder = urlencode( $font );
	$font_loader = "@import url('https://fonts.googleapis.com/css?family=". $font_decoder ."');";
	
	return $font_loader;
}

?>