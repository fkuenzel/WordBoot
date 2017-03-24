<?php
/**
 * Customizer Options Functions
 *
 * @since		WordBoot 1.0.0
 * @version		1.0.0
 */
function wb_columns_layout( $show_cols = false, $layout = 'global' ) {
	$output = '';
	switch( $layout ) {
		case 'global':
			$cols = get_theme_mod('columns_layout_global');
			break;
		case 'single':
			$cols = get_theme_mod('columns_layout_single');
			break;
		case 'pages':
			$cols = get_theme_mod('columns_layout_pages');
			break;
		default:
			$cols = get_theme_mod('columns_layout_global');
			break;
	}
	if ( !empty( $cols ) ) {
		if ( 'fullwidth' === $cols ) { $output .= '<div class="col fullwidth">'; }
		if ( '2_cols_left' === $cols ) { $output .=  '<div class="col-md-9 has-left-sidebar">'; }
		if ( '2_cols_right' === $cols ) { $output .= '<div class="col-md-9 has-right-sidebar">'; }
		if ( '3_cols' === $cols ) { $output .= '<div class="col-md-6 3-colum-layout">'; }
	} else {
		$output .= '<div class="col no-cols">';
	}
	
	if ( $show_cols == true ) {
		return $cols;
	} else {
		return $output;
	}
}

function wb_container_class() {
	
	$container = wb_get_container_class();
	
	echo $container;
}

function wb_get_container_class() {
	
	$container = get_theme_mod('container_class');
	
	if ( $container === 'fluid' ) {
		return 'container-fluid ';
	} else {
		return 'container ';
	}
}

function wordboot_show_single_excerpt() {
	
	return get_theme_mod( 'ShowExcerptSingle' );
}

function wordboot_show_excerpt() {
	
	return get_theme_mod( 'ShowExcerptBlog');
}
/**
 * Filter the except length to customitze lenght.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wordboot_custom_excerpt_length( $length ) {
    $lenght = get_theme_mod('ExcerptLenght');
	
	if ( !empty($lenght) ) {
		return 135;
	}
	
	return $lenght;
}
//add_filter( 'excerpt_length', 'wordboot_custom_excerpt_length', 999 );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wordpress_excerpt_more( $more ) {
    return sprintf( '<div class="clearfix">&nbsp;</div><a class="read-more btn btn-secondary" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        get_theme_mod('ExcerptText', __('Read More', 'wordboot') )
    );
}
//add_filter( 'excerpt_more', 'wordpress_excerpt_more' );


function wb_trim_excerpt($text) {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');

		$text = strip_shortcodes( $text );

		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text , '');
		$lenght = get_theme_mod('ExcerptLenght');
		$excerpt_length = apply_filters('excerpt_length', $lenght);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '<div class="clearfix">&nbsp;</div><a class="read-more btn btn-secondary" rel="bookmark" href="'.get_permalink().'">'. get_theme_mod('ExcerptText', __('Read More', 'wordboot') ) .'</a>');
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
add_filter('get_the_excerpt', 'wb_trim_excerpt');


function wb_show_comments_on_pages() {
	
	return get_theme_mod( 'CommentsOnPages');
}

function wb_comments_alerts_pages() {
	
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


/**
 * Custom Image Slider
 *
 * Create a Custom Image Slider
 *
 * @since		1.0.0
 */
function wb_image_slider() {
	
	$slider_img = array();
	
	$slider_img[0] = wb_get_image_id( get_theme_mod('wb_slide_img_1') );
	$slider_img[1] = wb_get_image_id( get_theme_mod('wb_slide_img_2') );
	$slider_img[2] = wb_get_image_id( get_theme_mod('wb_slide_img_3') );
	$slider_img[3] = wb_get_image_id( get_theme_mod('wb_slide_img_4') );
	$slider_img[4] = wb_get_image_id( get_theme_mod('wb_slide_img_5') );
	
	$output = '<div id="wb-image-slider" class="carousel slide '. wb_get_container_class() .'" data-ride="carousel">';
	$indi_count = -1;
	if ( get_theme_mod('wb_slider_indicators') == 'true' ) {
		$output .= '<ol class="carousel-indicators">';
		foreach( $slider_img as $img ) {
			$indi_count++;
			if ( !empty( $img ) ) {
		
				$output .= '<li data-target="#wb-image-slider" data-slide-to="'. $indi_count .'"';
				if ( $indi_count == 0 ) { $output .= ' class="active"'; }
				$output .= '></li>';
			}
		}
		$output .= '</ol>';
	}
	
	$output .= '<div class="carousel-inner" role="listbox">';
	$i = 0;
	foreach( $slider_img as $img ) {
		$i++;
		if ( !empty( $img ) ) {
			$output .= '<div class="carousel-item ';
			if ( $i === 1 ) { $output .= 'active'; }
			$output .= '">';
			$image = wp_get_attachment_image_src( $img, 'wb_slider_img', false );
			//if ( empty($image) ) { $image = wp_get_attachment_image_src( $img, 'full-width', false ); } 
			$output .= '<img class="d-block img-fluid" src="'. $image['0'] .'" />';
			
			if ( get_theme_mod('wb_slide_caption') == 'true')  {
				//$image_meta = wp_get_attachment_metadata( $img );
				$image_meta = get_post_field('post_content', $img);
				if ( !empty( $image_meta ) ) {
				$output .= '<div class="carousel-caption d-none d-md-block">'; 
				$output .= $image_meta;
				$output .= '</div>';
				//var_dump( $image_meta);
				}
			}
			$output .= '</div>';
		}
	}
	$output .= '</div> <!-- .carousel-inner END; -->';
	if ( get_theme_mod('wb_slider_controls') == 'true' ) {
		$output .= '<a class="carousel-control-prev" href="#wb-image-slider" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">'. __('Previous', 'wordboot' ) .'</span>
		</a>
		<a class="carousel-control-next" href="#wb-image-slider" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">'. __('Next', 'wordboot' ) .'</span>
		</a>';
	}
	$output .= '</div> <!.-- #wb_image_slider END -->';
	
	if ( get_theme_mod( 'wb_slider_status' ) == 'true' ) {
		echo apply_filters( 'wb_image_slider', $output );
	}
}
// retrieves the attachment ID from the file URL
function wb_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

?>