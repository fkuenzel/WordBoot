/**
 * theme-customize.js
 *
 * @since		1.0.0
 * @package		Bootstrap4
 *
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {
	/**
	 * Layout background colors
	 */
	wp.customize( 'body_background_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background', newval );
		} );
	} );
	wp.customize( 'header_background_color', function( value ) {
		value.bind( function( newval ) {
			$('#pageHeader').css('background', newval );
		} );
	} );
	wp.customize( 'main_navbar_background_color', function( value ) {
		value.bind( function( newval ) {
			$('#pageHeader .bg-faded').css('background', newval );
			$('#pageHeader .dropdown-menu').css('background', newval );
		} );
	} );
	wp.customize( 'main_nav_link_border', function( value ) {
		value.bind( function( newval ) {
			$('#pageHeader .navbar .nav-item').css('border-color', newval );
		} );
	} );
	wp.customize( 'page_content_background_color', function( value ) {
		value.bind( function( newval ) {
			$('#pageContent').css('background', newval );
		} );
	} );
	wp.customize( 'sidebar_left_background_color', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar-left').css('background', newval );
		} );
	} );
	wp.customize( 'sidebar_right_background_color', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar-right').css('background', newval );
		} );
	} );
	wp.customize( 'sidebar_widget_background_color', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar-right aside').css('background', newval );
			$('#sidebar-left aside').css('background', newval );
		} );
	} );
	wp.customize( 'footer_background_color', function( value ) {
		value.bind( function( newval ) {
			$('#pageFooter').css('background', newval );
		} );
	} );
	
	
	/**
	 * Text Color Changes
	 */
	
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_text_color', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar-left').css('color', newval );
			$('#sidebar-right').css('color', newval );
		} );
	} );
		wp.customize( 'sidebar_headline_color', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar-left h6').css('color', newval );
			$('#sidebar-right h6').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_link_color', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar-left a').css('color', newval );
			$('#sidebar-left a:visited').css('color', newval );
			$('#sidebar-right a').css('color', newval );
			$('#sidebar-right a:visited').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_link_color_hover', function( value ) {
		value.bind( function( newval ) {
			$('#sidebar-left a:hover').css('color', newval );
			$('#sidebar-right a:hover').css('color', newval );
		} );
	} );
	wp.customize( 'footer_link_color', function( value ) {
		value.bind( function( newval ) {
			$('#pageFooter a').css('color', newval );
		} );
	} );
	wp.customize( 'footer_link_color_hover', function( value ) {
		value.bind( function( newval ) {
			$('#pageFooter a:hover').css('color', newval );
		} );
	} );
	wp.customize( 'link_color_hover', function( value ) {
		value.bind( function( newval ) {
			$('a').css('color', newval );
		} );
	} );
	wp.customize( 'link_color_hover', function( value ) {
		value.bind( function( newval ) {
			$('a:hover').css('color', newval );
		} );
	} );
	wp.customize( 'footer_color', function( value ) {
		value.bind( function( newval ) {
			$('#pageFooter').css('color', newval );
		} );
	} );
	wp.customize( 'link_color_hover', function( value ) {
		value.bind( function( newval ) {
			$('h1').css('color', newval );
			$('h2').css('color', newval );
			$('h3').css('color', newval );
			$('h4').css('color', newval );
			$('h5').css('color', newval );
			$('h6').css('color', newval );
			$('.h1').css('color', newval );
			$('.h2').css('color', newval );
			$('.h3').css('color', newval );
			$('.h4').css('color', newval );
			$('.h5').css('color', newval );
			$('.h6').css('color', newval );
		} );
	} );
	wp.customize( 'nav_link_color', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-light .navbar-nav .nav-link').css('color', newval );
		} );
	} );
	wp.customize( 'nav_link_active_color', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-light .navbar-nav .active>.nav-link').css('color', newval );
		} );
		
	/**
	 * Slider Settings
	 */
	wp.customize( 'wb_slice_caption_text', function( value ) {
		value.bind( function( newval ) {
			$('.carousel-caption').css('color', newval );
		} );
	} );
	wp.customize( 'wb_slice_caption_background', function( value ) {
		value.bind( function( newval ) {
			$('.carousel-caption').css('background', newval );
		} );
	} );	
} )( jQuery );