/**
 * External Links
 */
( function( $ ) {
	/** Open external links and files with extensions .pdf, .doc, .docx, .mp3, .m4a, and .wav in a new window. */
	var h = window.location.host.toLowerCase();

	/* Remove the initial www. (if exists) because we will add it later to check vs www and non-www too */
	h = h.replace(/^www\./i, '');
	$(
		"a[href^='http']:not([href*='" + h + "' i]):not([href*=www.'" + h + "' i]), "
		+ "form[action^='http']:not([action*='" + h + "' i]), "
		+ "a[href$='.doc' i], "
		+ "a[href$='.docx' i], "
		+ "a[href$='.m4a' i], "
		+ "a[href$='.mp3' i], "
		+ "a[href$='.pdf' i], "
		+ "a[href$='.wav' i]"
	).attr( 'target', '_blank' );

	/** Add classes to Phone, PDF and E-mail links for easier use. */
	$( 'a[href*=".pdf" i]' ).addClass( 'pdfLink' );
	$( 'a[href^="mailto:" i]').addClass( 'emailLink' );
	$( 'a[href^="tel:" i]').addClass( 'phoneLink' );
} )( jQuery );
