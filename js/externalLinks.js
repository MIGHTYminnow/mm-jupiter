// Script to handle external links.
jQuery( document ).ready( function( $ ) {

	// External Links.
	var h = window.location.host.toLowerCase();
	$( '[href^="http"]' ).not( '[href*="' + h + '"]' ).attr( "target", "_blank" );
	$( 'a[href$=".pdf"]' ).attr({ "target":"_blank" });
	$( 'a[href$=".doc"]' ).attr({ "target":"_blank" });

})
