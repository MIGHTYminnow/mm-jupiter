// Script to handle external links.
jQuery( document ).ready( function( $ ) {

	// External Links.
	var h = window.location.host.toLowerCase();
	$( '[href^="http"]' ).not( '[href*="' + h + '"]' ).addClass( 'external-link' ).attr( "target", "_blank" );

})
