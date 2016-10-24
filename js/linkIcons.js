/**
 * Custom link JS for Jupiter Theme, added by MIGHTYminnow
 */

jQuery( document ).ready( function( $ ) {

	// External Links.
	 var h = window.location.host.toLowerCase();
	 $( '[href^="http"]' ).not( '[href*="' + h + '"]' ).addClass( 'external-link' ).attr( "target", "_blank" );

	 // Add classes to different types of links.
	 $( 'a[href^="mailto:"]' ).addClass( 'email-link' );
	 $( 'a[href$=".pdf"]' ).attr({ "target":"_blank" }).addClass( 'pdf-link' );
	 $( 'a[href$=".doc"]' ).attr({ "target":"_blank" }).addClass( 'doc-link' );

})
