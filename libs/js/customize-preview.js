/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {
	
	// Container Class
	wp.customize( 'container_class', function( value ) {
		value.bind( function( to ) {
			if ( 'container-fluid' === to ) {
				$( '.container' ).addClass( 'container-fluid' ).removeClass( 'container' );
			} else {
				$( '.container-fluid' ).removeClass( 'container-fluid' ).addClass( 'container' );
			}
		} );
	} );
	// Container Class Width
	wp.customize( 'container_width', function( value ) {
        value.bind( function( newval ) {
            $('.container').css('width', newval );
        } );
    } );
	
	
	/**
	 * Slider Settings
	 */
	// Slider Status
	wp.customize( 'bs4_carousel_status', function( value ) {
			if ( true === value ) {
				$( '#bs4-image-carousel' ).addClass( 'd-block' )
			}
			if ( false === value ) {
				$( '#bs4-image-carousel' ).addClass( 'hidden-xs-up' );
			}
	} );
	
	
	
	/**
	 * Text and Color Changes
	 *
	 * @since		1.0.0
	 */
	 
	/**
	 * Body Settings
	 *
	 * Settings of Body Section
	 */
	wp.customize( 'body_font_size', function( value ) {
        value.bind( function( newval ) {
            $('body').css('font-size', newval +'px' );
        } );
    } );
	wp.customize( 'body_line_height', function( value ) {
        value.bind( function( newval ) {
            $('body').css('line-height', newval +'em' );
        } );
    } );
	wp.customize( 'body_font', function( value ) {
        value.bind( function( newval ) {
            $('body').css('font-family', newval );
			$('head').append('<style>@import url("https://fonts.googleapis.com/css?family='+ newval +'");</style>');
        } );
    } );	
	 
	wp.customize( 'body_background_color', function( value ) {
        value.bind( function( newval ) {
            $('body').css('background-color', newval );
        } );
    } );
	wp.customize( 'body_text_color', function( value ) {
        value.bind( function( newval ) {
            $('body').css('color', newval );
        } );
    } );
	
	/**
	 * Header Settings*
	 *
	 * Settings for Header
	 */
	wp.customize( 'header_pageTitle', function( value ) {
        value.bind( function( newval ) {
            $('span.pageTitle').css('font-family', newval );
			$('head').append('<style>@import url("https://fonts.googleapis.com/css?family='+ newval +'");</style>');
        } );
    } );
	wp.customize( 'header_pageDesc', function( value ) {
        value.bind( function( newval ) {
            $('span.pageDesc').css('font-family', newval );
			$('head').append('<style>@import url("https://fonts.googleapis.com/css?family='+ newval +'");</style>');
        } );
    } );	
	
	wp.customize( 'header_background_color', function( value ) {
        value.bind( function( newval ) {
            $('#pageHeader').css('background-color', newval );
        } );
    } );
	wp.customize( 'header_text_color', function( value ) {
        value.bind( function( newval ) {
            $('#pageHeader').css('color', newval );
        } );
    } );
	
	/**
	 * Header Navbar Settings*
	 *
	 * Settings for Header Navbar
	 */
	wp.customize( 'navbar_text_family', function( value ) {
        value.bind( function( newval ) {
            $('#pageHeader .navbar').css('font-family', newval );
			$('head').append('<style>@import url("https://fonts.googleapis.com/css?family='+ newval +'");</style>');
        } );
    } );
	wp.customize( 'navbar_brand_text_family', function( value ) {
        value.bind( function( newval ) {
            $('#pageHeader .navbar-brand').css('font-family', newval );
			$('head').append('<style>@import url("https://fonts.googleapis.com/css?family='+ newval +'");</style>');
        } );
    } );
	
	wp.customize( 'navbar_background_color', function( value ) {
        value.bind( function( newval ) {
            $('#pageHeader .navbar').css('background', newval );
        } );
    } );
	wp.customize( 'navbar_text_color', function( value ) {
        value.bind( function( newval ) {
            $('#pageHeader .navbar-brand').css('color');
        } );
    } );
	wp.customize( 'navbar_link_color', function( value ) {
        value.bind( function( newval ) {
            $('#headerM .nav-link').css('color', newval);
        } );
    } );
	wp.customize( 'navbar_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            $('.active .nav-link').css('color', newval);
        } );
    } );
	
	
	wp.customize( 'dropdown_background_color', function( value ) {
        value.bind( function( newval ) {
            $('#pageHeader ul.dropdown-menu').css('background-color', newval);
        } );
    } );
	wp.customize( 'dropdown_link_color', function( value ) {
        value.bind( function( newval ) {
            $('#pageHeader ul.dropdown-menu .nav-link').css('color', newval);
        } );
    } );
	
	/**
	 * Content Settings
	 *
	 * Settings for Content Section
	 */
	wp.customize( 'bs4_content_text_family', function( value ) {
        value.bind( function( newval ) {
            $('#pageContent .postContent').css('font-family', newval );
			$('head').append('<style>@import url("https://fonts.googleapis.com/css?family='+ newval +'");</style>');
        } );
    } );
	wp.customize( 'bs4_content_headlines_text_family', function( value ) {
        value.bind( function( newval ) {
            $('#pageContent .post-title').css('font-family', newval );
			$('#pageContent h1').css('font-family', newval );
			$('#pageContent h2').css('font-family', newval );
			$('#pageContent h3').css('font-family', newval );
			$('#pageContent h4').css('font-family', newval );
			$('#pageContent h5').css('font-family', newval );
			$('#pageContent h6').css('font-family', newval );
			$('#pageContent .h1').css('font-family', newval );
			$('#pageContent .h2').css('font-family', newval );
			$('#pageContent .h3').css('font-family', newval );
			$('#pageContent .h4').css('font-family', newval );
			$('#pageContent .h5').css('font-family', newval );
			$('#pageContent .h6').css('font-family', newval );
			$('head').append('<style>@import url("https://fonts.googleapis.com/css?family='+ newval +'");</style>');
        } );
    } );
	
	wp.customize( 'bs4_headline_color', function( value ) {
        value.bind( function( newval ) {
            $('#pageContent .post-title').css('color', newval);
			$('#pageContent h1').css('color', newval );
			$('#pageContent h2').css('color', newval );
			$('#pageContent h3').css('color', newval );
			$('#pageContent h4').css('color', newval );
			$('#pageContent h5').css('color', newval );
			$('#pageContent h6').css('color', newval );
			$('#pageContent .h1').css('color', newval );
			$('#pageContent .h2').css('color', newval );
			$('#pageContent .h3').css('color', newval );
			$('#pageContent .h4').css('color', newval );
			$('#pageContent .h5').css('color', newval );
			$('#pageContent .h6').css('color', newval );
        } );
    } );
	wp.customize( 'bs4_content_background', function( value ) {
        value.bind( function( newval ) {
            $('#pageContent').css('background', newval);
        } );
    } );
	wp.customize( 'bs4_content_text_color', function( value ) {
        value.bind( function( newval ) {
            $('#pageContent').css('color', newval);
        } );
    } );
	
	/**
	 * Footer Settings
	 *
	 * Settings for Footer Section
	 */
	wp.customize( 'bs4_footer_headline_color', function( value ) {
        value.bind( function( newval ) {
            $('#pageFooter h1').css('color', newval);
			$('#pageFooter h2').css('color', newval);
			$('#pageFooter h3').css('color', newval);
			$('#pageFooter h4').css('color', newval);
			$('#pageFooter h5').css('color', newval);
			$('#pageFooter h6').css('color', newval);
        } );
    } );
	wp.customize( 'bs4_footer_background', function( value ) {
        value.bind( function( newval ) {
            $('#pageFooter').css('background', newval);
        } );
    } );
	wp.customize( 'bs4_footer_text_color', function( value ) {
        value.bind( function( newval ) {
            $('#pageFooter').css('color', newval);
        } );
    } );
} )( jQuery );