<?php 
/**
 * Custom Image Slider
 *
 * Create a Custom Image Slider
 *
 * @since		1.0.0
 */
function bs4_image_carousel() {
	
	$slider_img = array();
	
	$slider_img[0] = bs4_get_image_id( get_theme_mod('bs4_carousel_img_1') );
	$slider_img[1] = bs4_get_image_id( get_theme_mod('bs4_carousel_img_2') );
	$slider_img[2] = bs4_get_image_id( get_theme_mod('bs4_carousel_img_3') );
	$slider_img[3] = bs4_get_image_id( get_theme_mod('bs4_carousel_img_4') );
	$slider_img[4] = bs4_get_image_id( get_theme_mod('bs4_carousel_img_5') );
	
	$output = '<div id="bs4-image-carousel" class="carousel slide"';
	$output .= bs4_js_settings();
	$output .= '>';
	$indi_count = -1;
	if ( get_theme_mod('bs4_carousel_indicators') == 'true' ) {
		$output .= '<ol class="carousel-indicators">';
		foreach( $slider_img as $img ) {
			$indi_count++;
			if ( !empty( $img ) ) {
		
				$output .= '<li data-target="#bs4-image-carousel" data-slide-to="'. $indi_count .'"';
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
			$image_xl = wp_get_attachment_image_src( $img, 'bs4_slider_img_xl', false );
			$image_lg = wp_get_attachment_image_src( $img, 'bs4_slider_img_lg', false );
			$image_md = wp_get_attachment_image_src( $img, 'bs4_slider_img_md', false );
			$image_sm = wp_get_attachment_image_src( $img, 'bs4_slider_img_sm', false );
			$image = wp_get_attachment_image_src( $img, 'bs4_slider_img', false );
			//if ( empty($image) ) { $image = wp_get_attachment_image_src( $img, 'full-width', false ); } 
			//$output .= '<img class="d-block img-fluid" src="'. $image_xl['0'] .'" />';
			
			$output .= '
			<picture class="mx-auto d-block">
				<source media="(min-width: 1200px)" srcset="'. $image_xl['0'] .'">
				<source media="(min-width: 992px)" srcset="'. $image_lg['0'] .'">
				<source media="(min-width: 768px)" srcset="'. $image_md['0'] .'">
				<source media="(min-width: 576px)" srcset="'. $image_sm['0'] .'">
				<source media="(max-width: 575px)" srcset="'. $image['0'] .'">
				<img src="'. $image_md['0'] .'" class="img-fluid">
			</picture>
			
			';
			
			if ( get_theme_mod('bs4_carousel_caption') == 'true')  {
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
	if ( get_theme_mod('bs4_carousel_controls') == 'true' ) {
		$output .= '<a class="carousel-control-prev" href="#bs4-image-carousel" role="button" data-slide="prev">
			<i class="fa fa-chevron-left" aria-hidden="true"></i>
			<span class="sr-only">'. __('vorherige', 'bs4_lang' ) .'</span>
		</a>
		<a class="carousel-control-next" href="#bs4-image-carousel" role="button" data-slide="next">
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
			<span class="sr-only">'. __('nächste', 'bs4_lang' ) .'</span>
		</a>';
	}
	$output .= '</div> <!.-- #bs4_image_carousel END -->';
	
	
	echo apply_filters( 'bs4_image_carousel', $output );
	
}

function bs4_js_settings() {
	
	$options = array();
	
	$options['interval']	= get_theme_mod( 'bs4_carousel_js_interval', '5000');
	$options['keyboard']	= get_theme_mod( 'bs4_carousel_js_keyboard', 'true' );
	$options['pause']		= get_theme_mod( 'bs4_carousel_js_pause', 'hover' );
	$options['ride']		= get_theme_mod( 'bs4_carousel_js_ride', 'false' );
	$options['wrap']		= get_theme_mod( 'bs4_carousel_js_wrap', true );
	
	$output = '';
	foreach( $options as $option => $value ) {
		$output .= "data-$option='$value' ";
	}
	
	return $output;
	
}

?>