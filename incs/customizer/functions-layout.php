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
function bs4_container_class( $container_class = null) {
	
	$container = get_bs4_container_class( $container_class );
	
	echo $container;
}

function get_bs4_container_class( $container_class = null ) {
	
	
	if ( !isset( $container_class ) AND empty( $container_class ) ) {
		$container = get_theme_mod( 'container_class' );
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
		$max_width = get_theme_mod( 'container_width', '1140' );
	} else {
		$max_width = $maxWidth;
	}
	$output .= '
	@media (min-width: 576px) {
	  .container {
		width: '. ($max_width - 600) .'px;
		max-width: 100%;
	  }
	}
	';
	$output .= '
	@media (min-width: 768px) {
	  .container {
		width: '. ($max_width - 420) .'px;
		max-width: 100%;
	  }
	}
	';
	$output .= '
	@media (min-width: 992px) {
	  .container {
		width: '. ($max_width - 180) .'px;
		max-width: 100%;
	  }
	}
	';
	$output .= '
	@media (min-width: 1200px) {
	  .container {
		width: '. $max_width .'px;
		max-width: 100%;
	  }
	}
	';
	
	/**
	 * Filter Bootstrap4 container css output of the theme.
	 *
	 * @since Bootstrap4 1.0.0
	 *
	 * @param var $output		output of bootstrap container CSS.
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
 
 
/**
 * Bootstrap Columns Conditional Tag
 *
 * @since		1.0.0
 * @version		1.0.0
 *
 * @param string $section		section of column allow
 * @return	true|false			if section allowed, returns true.
 */
function is_columns( $section ) {
	$column_setting = get_theme_mod( 'columns_layout_global' );
	
	if ( isset( $section ) && !empty( $section ) ) {
		if ( $column_setting === 'two-sidebar' AND $section === 'sidebar-left' ) {
			return true;
		} else if ( $column_setting === 'two-sidebar' AND $section === 'sidebar-right' ) {
			return true;
		} else if ( $section === 'sidebar-right' AND $section === 'sidebar-right' ) {
			return true;
		} else if ( $section === 'sidebar-left' AND $section === 'sidebar-left' ) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}	

?>