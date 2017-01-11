/**
 * Custom JS for Jupiter Theme, added by MIGHTYminnow
 */

 //Callback to fix skip links focus.
 function mmj_skiplinks() {
     'use strict';
     var element = document.getElementById( location.hash.substring( 1 ) );

     if ( element ) {
         if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
             element.tabIndex = -1;
         }
         element.focus();
     }
 }

jQuery( document ).ready( function( $ ) {

	 // Add classes to parts of lists.
	 $( 'li:last-child' ).addClass( 'last' );
	 $( 'li:first-child' ).addClass( 'first' );
	 $( 'ul, ol' ).parent( 'li' ).addClass( 'parent' );

	 // External Links.
	 var h = window.location.host.toLowerCase();
	 $( '[href^="http"]' ).not( '[href*="' + h + '"]' ).addClass( 'external-link' ).attr( "target", "_blank" );

	 if ( window.addEventListener ) {
	     window.addEventListener( 'hashchange', mmj_skiplinks, false );
	 } else { // IE8 and earlier.
	     window.attachEvent( 'onhashchange', mmj_skiplinks, false );
	 }

})
