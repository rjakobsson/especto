/**
 * This separate file will only be loaded when we're in non-mobile views and
 * appropriate conditions are met for it to be loaded.
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
(function( $, undefined ){
	// Masonry container
	var footer_container = document.querySelector( '.masonry-on #tertiary .twelve' );
	// Only continue if footer sidebar is active
	if ( !!footer_container ) {
		// Check for RTL on body element
		var isRTL = document.body.classList.contains( 'rtl' );
		// Create new masonry object
		var footer_msnry = new Masonry( footer_container, {
			// options
			 columnWidth: '.grid-sizer',
			      gutter: '.gutter-sizer',
			itemSelector: '.widget',
			isOriginLeft: !isRTL,
		} );
		// trigger layout after images have loaded
		imagesLoaded( footer_container, function() {
			footer_msnry.layout();
		} );
	}

	// Masonry container
	var front_page_container = document.querySelector( '.masonry-on #front-page-ancillary .twelve' );
	// Only continue if front page sidebar is active
	if ( !!front_page_container ) {
		// Check for RTL on body element
		var isRTL = document.body.classList.contains( 'rtl' );
		// Create new masonry object
		var front_page_msnry = new Masonry( front_page_container, {
			// options
			 columnWidth: '.grid-sizer',
			      gutter: '.gutter-sizer',
			itemSelector: '.widget',
			isOriginLeft: !isRTL,
		} );
		// trigger layout after images have loaded
		imagesLoaded( front_page_container, function() {
			front_page_msnry.layout();
		} );
	}
})( jQuery );