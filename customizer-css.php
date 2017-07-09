<?php
/**
 * Bootstrap4 Customizer Sheet
 *
 * If your using the WordPress Customizer functions and if you setting external Stylesheet as Option.
 */
header('Content-Type: text/css;charset=utf-8');
define( 'WP_USE_THEMES', false );
require_once('../../../wp-load.php'); 
?>
/**
 * WordBoot Template Customizing CSS
 *
 * This is a automatic generatet CSS File from WordBoot Customizer Settings
 */
<?php 

echo get_container_css(); 

if ( get_theme_mod('body_font') ) {
	$body_font = get_theme_mod('body_font');
	if ( $body_font != '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif' ) {
		echo google_font_import( $body_font ) ."\n";
	}
}
if ( get_theme_mod('header_pageTitle') ) {
	$header_pageTitle = get_theme_mod('header_pageTitle');
	if ( $header_pageTitle != '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif' ) {
		echo google_font_import( $header_pageTitle ) ."\n";
	}
}
if ( get_theme_mod('header_pageDesc') ) {
	$header_pageDesc = get_theme_mod('header_pageDesc');
	if ( $header_pageDesc != '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif' ) {
		echo google_font_import( $header_pageDesc ) ."\n";
	}
}

if ( get_theme_mod('navbar_text_family') ) {
	$navbar_text_family = get_theme_mod('navbar_text_family');
	if ( $navbar_text_family != '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif' ) {
		echo google_font_import( $navbar_text_family ) ."\n";
	}
}

if ( get_theme_mod('navbar_brand_text_family') ) {
	$navbar_brand_text_family = get_theme_mod('navbar_brand_text_family');
	if ( $navbar_brand_text_family != '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif' ) {
		echo google_font_import( $navbar_brand_text_family ) ."\n";
	}
}

if ( get_theme_mod('font_family_headline') ) {
	$body_font = get_theme_mod('font_family_headline');
	echo google_font_import( $body_font ) ."";
}
?>

body {
	<?php if ( !empty( get_theme_mod('body_font_size') ) && get_theme_mod('body_font_size') !== null ) { ?>
	font-size: <?php echo get_theme_mod('body_font_size'); ?>px;
	<?php } if ( !empty( get_theme_mod('body_font') ) && get_theme_mod('body_font') !== null ) { ?>
	font-family: <?php echo get_theme_mod('body_font'); ?>, serif;
	<?php } if ( !empty( get_theme_mod('body_line_height') ) && get_theme_mod('body_line_height') !== null ) { ?>
	line-height: <?php echo get_theme_mod('body_line_height'); ?>em;
	<?php } if ( !empty( get_theme_mod('body_text_color') ) && get_theme_mod('body_text_color') !== null ) { ?>
	color: <?php echo get_theme_mod('body_text_color'); ?>;
	<?php } if ( !empty( get_theme_mod('body_background_color') ) && get_theme_mod('body_background_color') !== null ) { ?>
	background-color: <?php echo get_theme_mod('body_background_color'); ?>;
	<?php } ?>
}


#pageHeader {
	<?php if ( !empty( get_theme_mod('header_text_color') ) && get_theme_mod('header_text_color') !== null ) { ?>
	color: <?php echo get_theme_mod('header_text_color'); ?>;
	<?php } if ( !empty( get_theme_mod('header_background_color') ) && get_theme_mod('header_background_color') !== null ) { ?>
	background-color: <?php echo get_theme_mod('header_background_color'); ?>;
	<?php } ?>
}

<?php if ( !empty( get_theme_mod('header_pageTitle') ) && get_theme_mod('header_pageTitle') !== null ) { ?>
span.pageTitle {
	font-family: <?php echo get_theme_mod('header_pageTitle'); ?>, serif;
}
<?php } ?>
<?php if ( !empty( get_theme_mod('header_pageDesc') ) && get_theme_mod('header_pageDesc') !== null ) { ?>
span.pageDesc {
	font-family: <?php echo get_theme_mod('header_pageDesc'); ?>, serif;
}
<?php } ?>


<?php if ( !empty( get_theme_mod('navbar_text_family') ) && get_theme_mod('navbar_text_family') !== null ) { ?>
#pageHeader .navbar {
	font-family: <?php echo get_theme_mod('navbar_text_family'); ?>, serif;
}
<?php } ?>
<?php if ( !empty( get_theme_mod('navbar_brand_text_family') ) && get_theme_mod('navbar_brand_text_family') !== null ) { ?>
#pageHeader .navbar a.navbar-brand {
	font-family: <?php echo get_theme_mod('navbar_brand_text_family'); ?>, serif;
}
<?php } ?>
/**
 * Bootstrap Navbar
 */
<?php if ( !empty( get_theme_mod('navbar_background_color') ) && get_theme_mod('navbar_background_color') !== null ) { ?>
#pageHeader .navbar {
	background-color: <?php echo get_theme_mod('navbar_background_color'); ?>;
}
<?php } ?>
<?php if ( !empty( get_theme_mod('navbar_text_color') ) && get_theme_mod('navbar_text_color') !== null ) { ?>
#pageHeader .navbar-brand:focus, #pageHeader .navbar-brand:hover, #pageHeader .navbar-toggler:focus, #pageHeader .navbar-toggler:hover {
	color: <?php echo get_theme_mod('navbar_text_color'); ?>;
}
<?php } ?>
<?php if ( !empty( get_theme_mod('navbar_link_color') ) && get_theme_mod('navbar_link_color') !== null ) { ?>
#pageHeader .navbar-inverse .navbar-nav .nav-link {
	color: <?php echo get_theme_mod('navbar_link_color'); ?>;
}
<?php } ?>
<?php if ( !empty( get_theme_mod('navbar_link_hover_color') ) && get_theme_mod('navbar_link_hover_color') !== null ) { ?>
#pageHeader .navbar-inverse .navbar-nav .active>.nav-link, #pageHeader .navbar-inverse .navbar-nav .nav-link.active, #pageHeader .navbar-inverse .navbar-nav .nav-link.open, #pageHeader .navbar-inverse .navbar-nav .open>.nav-link, #pageHeader .navbar-inverse .navbar-nav .nav-link:focus, #pageHeader .navbar-inverse .navbar-nav .nav-link:hover {
  color: <?php echo get_theme_mod('navbar_link_hover_color'); ?>;
}
<?php } ?>

<?php if ( !empty( get_theme_mod('dropdown_background_color') ) && get_theme_mod('dropdown_background_color') !== null ) { ?>
#pageHeader .navbar-inverse .navbar-nav .dropdown-menu {
	background: <?php echo get_theme_mod('dropdown_background_color'); ?>;
}
<?php } ?>

<?php if ( !empty( get_theme_mod('dropdown_link_color') ) && get_theme_mod('dropdown_link_color') !== null ) { ?>
#pageHeader .navbar-inverse .navbar-nav .dropdown-menu a.nav-link {
	color: <?php echo get_theme_mod('dropdown_link_color'); ?>;
}
<?php } ?>
<?php if ( !empty( get_theme_mod('dropdown_linke_hover_color') ) && get_theme_mod('dropdown_linke_hover_color') !== null ) { ?>
#pageHeader .navbar-inverse .navbar-nav .dropdown-menu a.nav-link:focus, #pageHeader .navbar-inverse .navbar-nav .dropdown-menu a.nav-link:hover {
  color: <?php echo get_theme_mod('dropdown_linke_hover_color'); ?>;
}
<?php } ?>

/**
 * Content Section
 */
<?php
	$con_bg = get_theme_mod( 'bs4_content_background', '#fff');
	$content_bg = bs4_hex2rgb( $con_bg ); 
?>
#pageContent {
	<?php if ( !empty( get_theme_mod('bs4_content_text_color') ) && get_theme_mod('bs4_content_text_color') !== null ) { ?>
	color: <?php echo get_theme_mod( 'bs4_content_text_color'); ?>;
	<?php } ?>
	background: rgba(<?php echo $content_bg['red']; ?>, <?php echo $content_bg['green']; ?>, <?php echo $content_bg['blue']; ?>, <?php echo get_theme_mod( 'bs4_content_background_transparent', '1.0'); ?>);
} 
<?php if ( !empty( get_theme_mod('bs4_headline_color') ) && get_theme_mod('bs4_headline_color') !== null ) { ?>
#pageContent .post-title {
  color: <?php echo get_theme_mod('bs4_headline_color'); ?>;
}
<?php } ?>

<?php
	$foot_bg = get_theme_mod( 'bs4_footer_background', '#fff');
	$footer_bg = bs4_hex2rgb( $foot_bg ); 
?>
#pageFooter {
	<?php if ( !empty( get_theme_mod('bs4_footer_text_color') ) && get_theme_mod('bs4_footer_text_color') !== null ) { ?>
	color: <?php echo get_theme_mod( 'bs4_footer_text_color'); ?>;
	<?php } ?>
	background: rgba(<?php echo $footer_bg['red']; ?>, <?php echo $footer_bg['green']; ?>, <?php echo $footer_bg['blue']; ?>, <?php echo get_theme_mod( 'bs4_footer_background_transparent', '1.0'); ?>);
} 

<?php if ( get_theme_mod('bs4_carousel_status') == TRUE ) { ?>
/**
 * Bootstrap Carousel
 *
 * Carousel Colors
 */
<?php if ( get_theme_mod('bs4_carousel_caption') == TRUE ) { ?>
<?php
	$cap_bg = get_theme_mod( 'bs4_carousel_caption_background_color', '#000000');
	$caption_bg = bs4_hex2rgb( $cap_bg ); 
?>
.carousel-caption {
	color: <?php echo get_theme_mod( 'bs4_carousel_caption_text_color', '#ffffff'); ?>;
	background: rgba(<?php echo $caption_bg['red']; ?>, <?php echo $caption_bg['green']; ?>, <?php echo $caption_bg['blue']; ?>, <?php echo get_theme_mod( 'bs4_carousel_caption_background_transparent', '0.75	'); ?>);
} 
<?php } // carousel caption ?>
<?php if ( get_theme_mod( 'bs4_carousel_indicators' ) == TRUE ) { ?>

<?php
	$indicator_bg = get_theme_mod( 'bs4_carousel_indicator_color', '#ffffff');
	$indicator_bg = bs4_hex2rgb( $indicator_bg ); 
?>
.carousel-indicators li {
	background: rgba(<?php echo $indicator_bg['red']; ?>, <?php echo $indicator_bg['green']; ?>, <?php echo $indicator_bg['blue']; ?>, 0.5);
}
.carousel-indicators .active {
	background: <?php echo get_theme_mod( 'bs4_carousel_indicator_color', '#ffffff'); ?>;
}	
<?php } // Indicator END ?>
<?php if ( get_theme_mod('bs4_carousel_controls') == TRUE ) { ?>
.carousel-control-next,
.carousel-control-prev {
	color: <?php echo get_theme_mod( 'bs4_carousel_controls_color', '#ffffff'); ?>;
	font-size: 1.5rem;
}
.carousel-control-next:focus,
.carousel-control-next:hover,
.carousel-control-prev:focus, 
.carousel-control-prev:hover {
	color: <?php echo get_theme_mod( 'bs4_carousel_controls_color', '#ffffff'); ?>
}
<?php } // Carousel Control END ?>
<?php } // Carousel END ?>

<?php echo get_theme_mod( 'bs4_custom_css' ); ?>
<?php 
	$style = apply_filters( 'bs4_custom_css', $style ); 
	echo $style;
?>