<?php
/**
 * WordBoot Customizer Sheet
 *
 * If your using the WordPress Customizer functions and if you setting external Stylesheet as Option.
 */
header('Content-Type: text/css;charset=utf-8');
define( 'WP_USE_THEMES', false );
include('../../../wp-load.php'); 
?>
/**
 * WordBoot Template D Customizing CSS
 *
 * This is a automatic generatet CSS File from WordBoot
 */
<?php 
if ( get_theme_mod('font_family_global') ) {
	$body_font = get_theme_mod('font_family_global');
	echo google_font_import( $body_font ) ."\n";
}
if ( get_theme_mod('font_family_headline') ) {
	$body_font = get_theme_mod('font_family_headline');
	echo google_font_import( $body_font ) ."";
}
?>


body {
	font-family: <?php echo get_theme_mod('font_family_global', 'inherit'); ?>;
	font-size: <?php echo get_theme_mod('font_size', '16'); ?>px;
	color: <?php echo get_theme_mod('text_color', '#292b2c'); ?>;
	background: <?php echo get_theme_mod( 'body_background_color', '#eaeaea'); ?>;
}
#pageHeader {
	background: <?php echo get_theme_mod( 'header_background_color', '#ffffff'); ?>;
}	
#pageHeader .bg-faded,
#pageHeader .dropdown-menu {
	background: <?php echo get_theme_mod( 'main_navbar_background_color', '#f7f7f7'); ?>;
}	
#pageContent {
	background: <?php echo get_theme_mod( 'page_content_background_color', '#ffffff'); ?>;
}

#sidebar-left {
	background: <?php echo get_theme_mod( 'sidebar_left_background_color', '#cccccc'); ?>;
}	
#sidebar-right {
	background: <?php echo get_theme_mod( 'sidebar_right_background_color', '#cccccc'); ?>;
}
#sidebar-left,
#sidebar-right {
	color: <?php echo get_theme_mod( 'sidebar_text_color', '#000'); ?>;
}	
#sidebar-right aside,
#sidebar-left aside {
	background: <?php echo get_theme_mod( 'sidebar_widget_background_color', '#ffffff'); ?>;
}
#sidebar-left h1, #sidebar-left h2, #sidebar-left h3, #sidebar-left h4, #sidebar-left h5, #sidebar-left h6,
#sidebar-right h1, #sidebar-right h2, #sidebar-right h3, #sidebar-right h4, #sidebar-right h5, #sidebar-right h6{
	color: <?php echo get_theme_mod( 'sidebar_headline_color', '#000'); ?>;
}	
#sidebar-left a,
#sidebar-left a:visited,
#sidebar-left a,
#sidebar-left a:visited, {
	color: <?php echo get_theme_mod('sidebar_link_color', '#337ab7'); ?>;
}

#sidebar-right a:hover,
#sidebar-right a:focus,
#sidebar-right a:hover,
#sidebar-right a:focus {
	color: <?php echo get_theme_mod('sidebar_link_color_hover', '#337ab7'); ?>;
}


#pageFooter {
	color: <?php echo get_theme_mod( 'footer_text_color', '#000'); ?>;
	background: <?php echo get_theme_mod( 'footer_background_color', '#ffffff'); ?>;
}	
#pageFooter a,
#pageFooter a:visited {
	color: <?php echo get_theme_mod('footer_link_color', '#337ab7'); ?>;
}

#pageFooter a:hover,
#pageFooter a:focus {
	color: <?php echo get_theme_mod('footer_link_color_hover', '#337ab7'); ?>;
}


a, a:visited {
	color: <?php echo get_theme_mod('link_color', '#337ab7'); ?>;
}
a:hover, a:focus {
	color: <?php echo get_theme_mod('link_color_hover', '#337ab7'); ?>;
}

h1,h2,h3,h4,h5,h6,
.h1,.h2,.h3,.h4,.h5,.h6 {
	font-family: <?php echo get_theme_mod('font_family_headline', 'inherit'); ?>;
	color: <?php echo get_theme_mod('headline_color', '#292b2c'); ?>;
}

#pageHeader .navbar .nav-item {
	border-color: <?php echo get_theme_mod('main_nav_link_border', '#fff'); ?>;
}
.navbar-light .navbar-nav .nav-link {
	color: <?php echo get_theme_mod('nav_link_color', '000'); ?>;
}
.navbar-light .navbar-nav .nav-link:focus,
.navbar-light .navbar-nav .nav-link:hover {
	color: <?php echo get_theme_mod('nav_link_hover_color', '000'); ?>;
}

.navbar-light .navbar-nav .active>.nav-link,
.navbar-light .navbar-nav .nav-link.active,
.navbar-light .navbar-nav .nav-link.open,
.navbar-light .navbar-nav .open>.nav-link {
	color: <?php echo get_theme_mod('nav_link_active_color', '000'); ?>;
}