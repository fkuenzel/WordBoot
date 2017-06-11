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
	
} )( jQuery );