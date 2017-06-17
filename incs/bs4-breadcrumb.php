<?php
/**
 * Bootstrap4 Breadcrumb
 *
 * @since		1.0.0
 * @version		1.0.0
 */

function bs4_breadcrumb( $args = '' ) {
	global $post, $wp_query;
	
	
	$defaults = array(
        'delimiter' => '', // normal, lg or sm
		'home'		=> __( 'Home', 'bs4_lang' ),
		'before'	=> '',
		'after'		=> '',
	);

	$args = wp_parse_args( $args, $defaults );
 
	if ( !is_home() && !is_front_page() || is_paged() ) {
 
		echo '<nav class="breadcrumb">';
		echo '<a class="breadcrumb-item" href="' . get_bloginfo('url') . '">' . $args['home'] . '</a> ' . $args['delimeter'] . ' ';
 
	if ( is_category()) {
		$cat_obj = $wp_query->get_queried_object();
		$thisCat = $cat_obj->term_id;
		$thisCat = get_category($thisCat);
		$parentCat = get_category($thisCat->parent);
		if ($thisCat->parent != 0) 
			echo( get_category_parents($parentCat, TRUE, ' ' . $args['delimeter'] . ' ') );
			echo $args['before'] . single_cat_title('', false) . $args['after'];
	} elseif ( is_day() ) {
		echo '<a class="breadcrumb-item" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $args['delimeter'] . ' ';
		echo '<a class="breadcrumb-item" href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $args['delimeter'] . ' ';
		echo $args['before'] . get_the_time('d') . $args['after'];
	} elseif ( is_month() ) {
		echo '<a class="breadcrumb-item" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $args['delimeter'] . ' ';
		echo $args['before'] . get_the_time('F') . $args['after'];
	} elseif ( is_year() ) {
		echo $args['before'] . get_the_time('Y') . $args['after'];
	 } elseif ( is_single() && !is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a class="breadcrumb-item" href="' . get_bloginfo('url') . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $args['delimeter'] . ' ';
			echo '<span class="breadcrumb-item active">' . $args['before'] . get_the_title() . $args['after'] .'</span>';
		} else {
			$cat = get_the_category(); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $args['delimeter'] . ' ');
			echo '<span class="breadcrumb-item active">' . $args['before'] . get_the_title() . $args['after'] .'</span>';
		}
	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		$post_type = get_post_type_object(get_post_type());
		echo '<span class="breadcrumb-item active">' . $args['before'] . $post_type->labels->singular_name . $args['after'] .'</span>';
	} elseif ( is_attachment() ) {
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); $cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . $args['delimeter'] . ' ');
		echo '<a class="breadcrumb-item" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $args['delimeter'] . ' ';
		echo '<span class="breadcrumb-item active">' . $args['before'] . get_the_title() . $args['after'] .'</span>';
	} elseif ( is_page() && !$post->post_parent ) {
		echo '<span class="breadcrumb-item active">' . $args['before'] . get_the_title() . $args['after'] .'</span>';
	} elseif ( is_page() && $post->post_parent ) {
		$parent_id = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a class="breadcrumb-item "href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		foreach ($breadcrumbs as $crumb)
			echo $crumb . ' ' . $args['delimeter'] . ' ';
			echo '<span class="breadcrumb-item active">'. $args['before'] . get_the_title() . $args['after'] .'</span>';
		} elseif ( is_search() ) {
			echo $args['before'] . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $args['after'];
		} elseif ( is_tag() ) {
			echo $args['before'] . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $args['after'];
		} elseif ( is_404() ) {
			echo $args['before'] . 'Fehler 404' . $args['after'];
		}
 
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) 
				echo ' (';
				echo ': ' . __('Seite') . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
					echo ')';
		}
 
		echo '</nav>';
 
	} 
} 
?>