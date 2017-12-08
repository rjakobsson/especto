/**
 * Miscellaneous theme experience improvements.
 *
 * @since Business Identity 1.0
 */
(function( $, undefined ){

	// load scripts when the DOM is ready and when Infinite Scroll has fired
	function postScripts() {
		/**
		 * Open rel external links in new tab, a more semantic approach than using hardcoded target blank
		 *
		 * @since Business Identity 1.0
		 */
		$( '.entry-content a[rel~=external]' ).attr( 'target', '_blank' );
	}

	// load scripts when the DOM is ready
	function documentScripts() {
		/**
		 * Check for the presence of a featured hero image on the home page.
		 *
		 * @since Business Identity 1.0
		 */
		 $hero = $( ".hero #hero" );
		$heroa = $( ".hero #hero a" );

		if ( !!$hero ) { // only continue if there's a hero on this page
			if ( $hero.hasClass( 'has-hero-bg') ) {
				$hero.css( {
					'color' : 'white'
				} );
				$heroa.css( {
					'color' : 'white'
				} );
			}
		}

		/**
		 * Presentational JS which fires on load and resize only
		 * once within a given amount of time to prevent performance setbacks.
		 *
		 * Note: debouncing defined in debouncer.js
		 *
		 * @since Business Identity 1.0
		 */
		var themeFuncs = debounce(function() {
			$site_header_height = 90;
			if ( $( window ).width() < 640 ) {
				$site_header_height = $( '.site-header' ).height() + 16;
			}
			if ( 639 < $( window ).width() && $( window ).width() < 1025 ) {
				$site_header_height = $( '.site-header' ).height() + 30;
			}
			if ( 1024 < $( window ).width() ) {
				$site_header_height = $( '.site-header' ).height() + 60;
			}
			$( '.hero #hero' ).css( {
				'padding-top' : $site_header_height + 'px'
			} );
		}, 250 );
		themeFuncs();
		window.addEventListener( 'resize', themeFuncs );
	}

	$( document )
		.ready( postScripts )
		.ready( documentScripts )
		.on( 'post-load', postScripts );

})( jQuery );