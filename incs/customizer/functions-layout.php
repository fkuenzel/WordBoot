<?php
/**
 * Customizer Functions
 *
 * CUSTOMIZER FUNCTIONS FOR LAYOUT SETTINGS
 *
 * @since		1.0.0
 */
 
/**
 * Bootstrap Container Class
 *
 * @param string $container_class		overwrite the customizer container class.
 *
 * @since		1.0.0
 * @version		1.0.0
 */
function bs4_container_class( $container_class = null ) {
	
	$container = get_bs4_container_class( $container_class );
	
	echo $container;
}

function get_bs4_container_class( $container_class = null ) {
	
	if ( !isset( $container_class ) AND empty( $container_class ) ) {
		$container = get_theme_mod( 'container_class', 'container' );
	} else {
		$container = $container_class;
	}
	/**
	 * Filter Bootstrap4 container class of the theme.
	 *
	 * @since Bootstrap4 1.0.0
	 *
	 * @param string $container		set default value from any point.
	 */
	return apply_filters( 'bs4_container_class', $container );
}

/**
 * Bootstrap Container CSS
 *
 * Create the Output for Customizer-CSS File.
 *
 * @param int $maxWidht		Container Max Width.
 *
 * @since		1.0.0
 * @version		1.0.0
 */
function get_container_css( $maxWidth = null ) {
	if ( !isset( $maxWidth ) AND empty( $maxWidth ) ) {
		$container_width = get_theme_mod( 'container_width', '1140' );
	} else {
		$container_width = $maxWidth;
	}
	if ( isset( $container_width ) AND $container_width != '1140' ) {
		$container_max_widths = array(
			'sm'	=> 600, // -180
			'md'	=> 420, // -240
			'lg'	=> 180, // -180
			'xl'	=> 0,
		);
		/**
		 * Calculate the .container width
		 */
		$container_custom_width = array();
				foreach ( $container_max_widths AS $type => $cal ) {
				$container_custom_width[$type] = $container_width - $cal;
		}
		
		$output  = '/**'."\n ".' * Custom Container Width'."\n ".' **/'."\n \n ";
		$output .= '/* Small devices (landscape phones, 576px and up) */' ."\n" .'@media (min-width: 576px) {'."\n".'    .container {'."\n".'        width: '. $container_custom_width['sm'] .'px;'."\n".'        max-width: 100%;'."\n".'    }'."\n".'}'."\n";
		$output .= '/* Medium devices (tablets, 768px and up) */' ."\n" .'@media (min-width: 768px) {'."\n".'    .container {'."\n".'        width: '. $container_custom_width['md'] .'px;'."\n".'        max-width: 100%;'."\n".'    }'."\n".'}'."\n";
		$output .= '/* Large devices (desktops, 992px and up) */' ."\n" .'@media (min-width: 992px) {'."\n".'    .container {'."\n".'       width: '. $container_custom_width['lg'] .'px;'."\n".'       max-width: 100%;'."\n".'    }'."\n".'}'."\n";
		$output .= '/* Extra large devices (large desktops, 1200px and up) */' ."\n" .'@media (min-width: 1200px) {'."\n".'    .container {'."\n".'        width: '. $container_custom_width['xl'] .'px;'."\n".'        max-width: 100%;'."\n".'    }'."\n".'}'."\n";
	} 
	
	/**
	 * Filter Bootstrap4 container css output of the theme.
	 *
	 * @since Bootstrap4 1.0.0
	 *
	 * @param string $output		output of bootstrap container CSS.
	 */
	return apply_filters( 'get_container_css', $output ); 
}

/**
 * Bootstrap4 Columns Settings
 *
 * Use the Bootstrap4 Grid for Layout Columns.
 *
 * @since	1.0.0
 */
function get_page_layout_columns() {
	$columns = get_theme_mod( 'layout_columns', 'full-width' );
	
	return apply_filters( 'get_page_layout_columns', $columns );
} 
 
/**
 * Bootstrap Columns Conditional Tag
 *
 * @since		1.0.0
 * @version		1.0.0
 *
 * @param string $name			name of column allow
 * @return bool	true|false			if name allowed, returns true.
 */
function is_columns( $name ) {
	
	$columns = get_page_layout_columns();
	
	if ( 'sidebar-left' === $name ) {
		if ( 'sidebar-left' === $columns || 'two-sidebar' == $columns ) { 
			return TRUE;
		} else {
			return FALSE;
		} 
	}
	if ( 'sidebar-right' === $name ) {
		if ( 'sidebar-right' === $columns || 'two-sidebar' == $columns ) { 
			return TRUE;
		} else {
			return FALSE;
		}
	}
	if ( 'full-width' === $name ) {
		if ( 'full-width' === $columns ) { 
			return TRUE;
		} else {
			return FALSE;
		}		
	}
}

/**
 * Layout Grid Classes
 *
 * @since		1.0.0
 * @version		1.0.0
 *
 * @param string $section		section of colum
 * @return string $output 		Output Bootstrap Grid Classes
 */
function layout_grid_class( $section ) {
	echo get_layout_grid_class( $section );
}
function get_layout_grid_class( $section ) {
	
	$columns = get_page_layout_columns();
	$bs_grid = '12';
	
	if ( $section === 'sidebar-left' ) {
		$grid = get_theme_mod( 'grid_sidebar_left', '2' );
	} 
	if ( $section === 'sidebar-right' ) {
		$grid = get_theme_mod( 'grid_sidebar_right', '2' );
	} 
	
	
	// Sidebar-Left Offset
	if ( $columns === 'sidebar-left' AND $section === 'sidebar-left' ) {
		$grid_offset = $grid - $bs_grid;
		$offset = ' pull-md'. $grid_offset;
	}
	
	if ( $section === 'sidebar-left' AND $columns === 'two-sidebar' ) {
		$grid_left = get_theme_mod( 'grid_sidebar_left', '2' );
		$grid_right = get_theme_mod( 'grid_sidebar_right', '2' );

		$grid_offset = $grid_left + $grid_right - $bs_grid;
		$offset = ' pull-md'. $grid_offset;
	}

	// Content Offset
	if ( $section === 'content' AND $columns === 'sidebar-left' ) {
		$grid = get_theme_mod( 'grid_sidebar_left', '2' );
		$offset .= ' push-md-'. $grid;
	}
	if ( $section === 'content' AND $columns === 'two-sidebar' ) {
		$grid = get_theme_mod( 'grid_sidebar_left', '2' );
		$offset .= ' push-md-'. $grid;
	}

	if ( $section === 'content' ) {
		$output = 'col' . $offset;
	} else {
		$output = 'col-lg-'.$grid . $offset .' col-md-12';
	}

	return $output;
}


/** 
 * Navbar Functions
 *
 * @section		Header Menu
 * @since		1.0.0
 */
function navbar_brand() {
	$brand_option = get_theme_mod( 'navbar_brand_text','yes' );
	
	switch( $brand_option ) {
		case 'yes':
			$output = '<a class="navbar-brand" href="'. esc_url( home_url( '/' ) ) .'">';
			if ( is_navbar_brand_logo() ) { $output .= get_navbar_brand_logo() .' '; }
			if ( !is_navbar_brand_logo() ) {
				$output .= get_bloginfo( 'name' );
			}
			$output .= '</a>';
			break;
		case 'mobile':
			$output = '<a class="navbar-brand hidden-md-up" href="'. esc_url( home_url( '/' ) ) .'">';
			if ( is_navbar_brand_logo() ) { $output .= get_navbar_brand_logo() .' '; }
			if ( !is_navbar_brand_logo() ) {
				$output .= get_bloginfo( 'name' );
			}
			$output .= '</a>';
			break;
		case 'desktop':
			$output = '<a class="navbar-brand hidden-lg-down" href="'. esc_url( home_url( '/' ) ) .'">';
			if ( is_navbar_brand_logo() ) { $output .= get_navbar_brand_logo() .' '; }
			if ( !is_navbar_brand_logo() ) {
				$output .= get_bloginfo( 'name' );
			}
			$output .= '</a>';
			break;
		default:
			$output = '<a class="navbar-brand">&nbsp;</a>';
			break;
	}

	echo $output;
}
function get_navbar_brand_logo() {
	
	$brand_img =  bs4_get_image_id( get_theme_mod('navbar_brand_upload') );
	$image = wp_get_attachment_image_url( $brand_img, 'navbar-brand-logo', false );
	
	if ( get_theme_mod('navbar_brand_logo' ) === 'text' ) {
		$classes = 'class="d-inline-block align-top"';
	} else {
		$classes = '';
	}
	if ( !empty( $image ) ) {
		$output = '<img src="'. $image .'" width="30" height="30" alt="" '.$classes.'>';
		if ( get_theme_mod('navbar_brand_logo' ) === 'text' ) { $output .= ' '. get_bloginfo( 'name' ); }

		return $output;
	}
}

function is_navbar_brand_logo() {
	
	if ( get_theme_mod('navbar_brand_logo', 'no' ) === 'no' ) {
		return false;
	} else {
		return true;
	}
}
?>