/**
 * External Links
 */
( function( $ ) {
	/*
	Get the current page host:
	- in lowercase for easier comparisons.
	- without www. (in case it has it) because we will add it on another variable.
	*/
	var host = window.location.host.toLowerCase().replace(/^www\./i, '');

	/* Get the current page host with www. */
	var host_www = 'www.' + host;

	/* List of file extensions that we want to open on new tabs. */
	var extensions = [
		'doc',
		'docx',
		'm4a',
		'mp3',
		'pdf',
		'wav',
	];

	/* Check all links in the page to add the _blank target when applies. */
	$( 'a' ).each( function() {
		var url = new URL( $( this ).attr( 'href' ).toLowerCase() );
		var extension = url.pathname.split( '.' ).pop();

		/*
		Add the _blank target parameter to the link if:
			A) the link host is not the same than the site host without www or with www.
			OR
			B) the extension of the link is included on the list of extensions.
		*/
		if (
			( url.host != host && url.host != host_www )
			|| extensions.includes( extension )
		) {
			$( this ).attr( 'target', '_blank' );
		}
	} );

	/* Check all forms in the page to add the _blank target when applies. */
	$( 'form' ).each( function() {
		var url = new URL( $( this ).attr( 'action' ).toLowerCase() );

		/*
		Add the _blank target parameter to the link if the link host
		is not the same than the site host without www or with www.
		*/
		if ( url.host != host && url.host != host_www ) {
			$( this ).attr( 'target', '_blank' );
		}
	} );

	/* Add classes to PDF, E-mail and Phone links for easier use. */
	$( 'a[href$=".pdf" i]' ).addClass( 'pdfLink' );
	$( 'a[href^="mailto:" i]').addClass( 'emailLink' );
	$( 'a[href^="tel:" i]').addClass( 'phoneLink' );
} )( jQuery );
