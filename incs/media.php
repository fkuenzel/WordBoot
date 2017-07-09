<?php
/**
 * WordPress Images
 *
 * Ändert die Bilder Funktionen von WordPress und passt diese auf das Bootstrap Framework an.
 */

// retrieves the attachment ID from the file URL
function bs4_get_image_id( $image_url ) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

if ( ! function_exists( 'bs4_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own bs4_post_thumbnail() function to override in a child theme.
 *
 * @since Bootstrap4 1.0
 */
function bs4_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="postThumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="postThumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;

/**
 * Wordboot Caption Shortcode
 * Remove the default WordPress [caption}-Shortcode
 *
 * @version			1.0.0
 * @since			1.0.0
 */
function bs4_caption( $output, $attr, $content ) {
	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( /** 1 > $attr['width'] || **/ empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="figure ' . esc_attr( $attr['align'] ) . '"';

    //  Wenn HTML5 Support Aktiv
    if ( current_theme_supports( 'html5', 'caption' ) ) {
        /* Open the caption <figure>. */
        $output = '<figure' . $attributes .'>';
        /* Allow shortcodes for the content the caption was created for. */
        $output .= do_shortcode( $content );
        /* Append the caption text. */
        $output .= '<figcaption class="figure-caption">' . $attr['caption'] . '</figcaption>';
        /* Close the caption </figure>. */
        $output .= '</figure>';
    } else { 
    /* Open the caption <div>. */
        $output = '<div' . $attributes .'>';
        /* Allow shortcodes for the content the caption was created for. */
        $output .= do_shortcode( $content );
        /* Append the caption text. */
        $output .= '<div class="figure-caption">' . $attr['caption'] . '</div>';
        /* Close the caption </div>. */
        $output .= '</div>';
    }
    
	/* Return the formatted, clean caption. */
	return $output;
} add_filter( 'img_caption_shortcode', 'bs4_caption', 10, 3 );


/** 
 * Search and Replace IMG Tags
 *
 * Searching and replacing <img>-Tags and add the Bootstrap "img-fluid" class.
 * Removing the height and width attribute from <img>-tag
 *
 * @version			1.0.0
 * @since			1.0.0
 */  
function bs4_add_image_responsive_class( $html ){  
  $classes = ' img-fluid'; // separated by spaces, e.g. 'img image-link'  
  
  // check if there are already classes assigned to the anchor  
  if ( preg_match('/<img.*? class="/', $html) ) {  
    $html = preg_replace('/(<img.*? class=" .*?)/', '$1 ' . $classes . ' $2', $html);  
  } else {  
    $html = preg_replace('/(<img.*?)(\>)/', '$1 class="' . $classes . '" $2', $html);  
  }  
  
  // remove dimensions from images,, does not need it!  
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );  
  
  return $html;  
}  
add_filter( 'the_content','bs4_add_image_responsive_class', 1); 
add_filter( 'post_thumbnail_html', 'bs4_add_image_responsive_class', 1 ); 


/**
 * Add Responsive Images to Posts 
 *
 * by Using Responsive IMG over Media-Thek, using picture tag
 *
 * @version			1.0.0
 * @since			1.0.0
 */  
function bs4_responsive_img( $html, $id, $caption, $title, $align, $url, $size, $alt ){  
	
	if ( $size === 'bs4_post_img' ) {
		$image_xl = wp_get_attachment_image_src( $id, 'bs4_post_img_xl', false );
		$image_lg = wp_get_attachment_image_src( $id, 'bs4_post_img_lg', false );
		$image_md = wp_get_attachment_image_src( $id, 'bs4_post_img_md', false );
		$image_sm = wp_get_attachment_image_src( $id, 'bs4_post_img_sm', false );
		$image = wp_get_attachment_image_src( $id, 'bs4_post_img', false );
	
		$rep = '';
		
		if($url){ // if user wants to print the link with image
			$rep .= "<a href='" . $url . "' title='". $title ."'>";
		}
		$rep .= "<picture>
	<source media='(min-width: 1200px)' srcset='". $image_xl['0'] ."'>
	<source media='(min-width: 992px)' srcset='". $image_lg['0'] ."'>
	<source media='(min-width: 768px)' srcset='". $image_md['0'] ."'>
	<source media='(min-width: 576px)' srcset='". $image_sm['0'] ."'>
	<source media='(max-width: 575px)' srcset='". $image['0'] ."'>\n";

		$rep .= "
	<img src='". $image['0'] ."' class='img-fluid'  alt='".  $alt ."'>
		";
		
		$rep .= "</picture>";
		if($url){ // if user wants to print the link with image
			$rep .= "</a>";
		}
		
		return $rep;
	}
}  
add_filter( 'image_send_to_editor','bs4_responsive_img', 1, 10); 
 

/**
 * Add the Bootstrap "img-fluid" class to a image-gallery
 *
 * @version			1.0.0
 * @since			1.0.0
 */
function bs4_attachment_img_attributes ( $attr, $attachment ) {
	if ( isset( $attr['class'] ) && 'custom-logo' === $attr['class'] ) {
        $attr['class'] = 'custom-logo img-fluid';
    } else {
		$attr['class'] = 'img-fluid';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'bs4_attachment_img_attributes' , 20, 2);

function bs4_remove_classes( $html ) {
    $find = array(
		/**
		 * Find - Align Classes
		 **/
        "/alignleft/",
        "/alignright/",
        "/aligncenter/",
		"/alignnone/",
		/**
		 * Find - Tiny Inline Text Styles
		 */
		"/style=\"text-align:left;\"/",
		"/style=\"text-align:right;\"/",
		"/style=\"text-align:center;\"/",
		"/style=\"text-align:justify;\"/",
		/** 
		 * Find - Default Image Classes
		 */
		"/size-full/",
		"/size-large/",
		"/size-medium/",
		"/size-thumbnail/",
		/**
		 * Find - WordBoot Responsive Image
		 */
		"/size-bs4_post_img/",
	);
	
	
    $rep = array(
		/**
		 * Replace - Align Classes
		 **/
        "float-left",
        "float-right",
        "mx-auto text-center d-block",
		"alignnone",
		/**
		 * Replace - Tiny Inline Text Styles
		 */
		"class='text-left'",
		"class='text-right'",
		"class='text-center'",
		"class='text-justify'",
		/**
		 * Replace - Default Image Class
		 */
		"img-fluid",
		"img-fluid",
		"img-fluid",
		"img-fluid img-thumbnail",
		
		/**
		 * Replace - WordBoot Responsive Image
		 */
		"img-fluid",
	);
	
    $html = preg_replace( $find, $rep, $html );

    return $html;
}
add_filter( 'the_content','bs4_remove_classes', 1 );  


/**
 * Make iframe's Responsive
 *
 * @version			1.0.0
 * @since			1.0.0
 */
function bs4_oembed_replacer( $html ) {
    $find = array(
        '/<iframe/',
		'/<\/iframe>/',
		'/(width|height|frameborder)=("|\')\d*(|px)("|\')\s/',
		'/allowfullscreen/'
    );
    $rep = array(
		"\n\t\t<div class='embed-responsive embed-responsive-16by9'>\n\t\t\t<iframe class='embed-responsive-item'",
		"</iframe><!-- .embed-responsive-item end; -->\n\t\t</div><!-- .embed-responsive .embed-responsive-16by9 end; -->\n",
		'',
		''
	);
    $html = preg_replace( $find, $rep, $html );
	
    return $html;

}
add_filter( 'embed_oembed_html','bs4_oembed_replacer', 1, 4 );
add_filter( 'the_excerpt_embed', 'bs4_oembed_replacer', 1, 4 );

/**
 * Remove WordPress Emoji function from fronted and backend
 * 
 * @version			1.0.0
 * @since			1.0.0
 */ 
function bs4_remove_emoji()	{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'bs4_remove_tinymce_emoji');
}

function bs4_remove_tinymce_emoji($plugins) {
	if (!is_array($plugins)) {
		return array();
	}
	return array_diff($plugins, array(
		'wpemoji'
	));
} add_action('init', 'bs4_remove_emoji');

/**
 * Gallery Shortcode
 *
 * Bootstrap Gallery Shortcode function for WordPress
 *
 * @package			WordPress
 * @subpackage		Bootstrap4
 *
 * @version			1.0.0
 * @since			1.0.0
 *
 * @param array $attr {
 *     Attributes of the gallery shortcode.
 *
 *     @type string       $order      Order of the images in the gallery. Default 'ASC'. Accepts 'ASC', 'DESC'.
 *     @type string       $orderby    The field to use when ordering the images. Default 'menu_order ID'.
 *                                    Accepts any valid SQL ORDERBY statement.
 *     @type int          $id         Post ID.
 *     @type string       $itemtag    HTML tag to use for each image in the gallery.
 *                                    Default 'dl', or 'figure' when the theme registers HTML5 gallery support.
 *     @type string       $icontag    HTML tag to use for each image's icon.
 *                                    Default 'dt', or 'div' when the theme registers HTML5 gallery support.
 *     @type string       $captiontag HTML tag to use for each image's caption.
 *                                    Default 'dd', or 'figcaption' when the theme registers HTML5 gallery support.
 *     @type int          $columns    Number of columns of images to display. Default 3.
 *     @type string|array $size       Size of the images to display. Accepts any valid image size, or an array of width
 *                                    and height values in pixels (in that order). Default 'thumbnail'.
 *     @type string       $ids        A comma-separated list of IDs of attachments to display. Default empty.
 *     @type string       $include    A comma-separated list of IDs of attachments to include. Default empty.
 *     @type string       $exclude    A comma-separated list of IDs of attachments to exclude. Default empty.
 *     @type string       $link       What to link each image to. Default empty (links to the attachment page).
 *                                    Accepts 'file', 'none'.
 * }
 * @return string HTML content to display gallery.
 */
function bs4_shortcode_gallery( $attr ) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	/**
	 * Filters the default gallery shortcode output.
	 *
	 * If the filtered output isn't empty, it will be used instead of generating
	 * the default gallery template.
	 *
	 * @since 2.5.0
	 * @since 4.2.0 The `$instance` parameter was added.
	 *
	 * @see gallery_shortcode()
	 *
	 * @param string $output   The gallery output. Default empty.
	 * @param array  $attr     Attributes of the gallery shortcode.
	 * @param int    $instance Unique numeric ID of this gallery shortcode instance.
	 */
	$output = apply_filters( 'post_gallery', '', $attr, $instance );
	if ( $output != '' ) {
		return $output;
	}

	$html5 = current_theme_supports( 'html5', 'gallery' );
	$atts = shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => $html5 ? 'figure'     : 'dl',
		'icontag'    => $html5 ? 'div'        : 'dt',
		'captiontag' => $html5 ? 'figcaption' : 'dd',
		'columns'    => 3, // ( 1 - 9 ) default: 3
		'size'       => 'thumbnail', // (default) thumbnail, medium, large, full
		'include'    => '',
		'exclude'    => '',
		'link'       => '' // (default) mediasite,  file, none
	), $attr, 'gallery' );

	$id = intval( $atts['id'] );

	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
		}
		return $output;
	}

	$itemtag = tag_escape( $atts['itemtag'] );
	$captiontag = tag_escape( $atts['captiontag'] );
	$icontag = tag_escape( $atts['icontag'] );
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) ) {
		$itemtag = 'dl';
	}
	if ( ! isset( $valid_tags[ $captiontag ] ) ) {
		$captiontag = 'dd';
	}
	if ( ! isset( $valid_tags[ $icontag ] ) ) {
		$icontag = 'dt';
	}

	$columns = intval( $atts['columns'] );
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = '';
	/**
	 * Filters whether to print default gallery styles.
	 *
	 * @since 3.1.0
	 *
	 * @param bool $print Whether to print default gallery styles.
	 *                    Defaults to false if the theme supports HTML5 galleries.
	 *                    Otherwise, defaults to true.
	 */
	if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
		$gallery_style = "";
	}
	
	
	$size_class = sanitize_html_class( $atts['size'] );

	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>\n";
	
	/**
	 * Filters the default gallery shortcode CSS styles.
	 *
	 * @since 2.5.0
	 *
	 * @param string $gallery_style Default CSS styles and opening HTML div container
	 *                              for the gallery shortcode output.
	 */
	$output = apply_filters( 'gallery_style', $gallery_div );
	$output .= "<div class='row'>\n";
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {

		$attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id",  ) : '';
		if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
			$image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
		} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
			$image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
		} else {
			$image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr );
		}
		$image_meta  = wp_get_attachment_metadata( $id );
		
		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
		}
		$output .= "<{$itemtag} class='gallery-item figure col mt-1 mb-1'>";
		$output .= "
			<{$icontag} class='gallery-icon {$orientation}'>
				$image_output
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption figure-caption' id='$selector-$id'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( ++$i % $columns == 0 ) {
			$output .= "</div><!-- .row end -->\n<div class='row'>\n";
		}
	}

	if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
		$output .= "
			<br style='clear: both' />";
	}
	$output .= "</div> <!-- .row end; -->\n";
	$output .= "
		</div> <!-- #gallery-#ID end; -->\n";

	return $output;
}

// remove WordPress default gallery shortcode;
remove_shortcode('gallery', 'gallery_shortcode'); // remove WordPress default gallery;
// add Bootstrap gallery ghortcode
add_shortcode('gallery', 'bs4_shortcode_gallery' );

/**
 * For Media Library Images (Admin
 *
 * @since		1.0.0
 */

add_filter( 'image_size_names_choose', 'bs4_custom_image_size' );
function bs4_custom_image_size( $sizes ) {
    return array_merge( $sizes, array(
        'bs4_post_img' => __( 'Responsive IMG' ),
    ) );
}
?>