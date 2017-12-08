/**
 * Sliding Mobile Menu
 *
 * @since Business Identity 1.0
 */

( function( $, undefined ) {
	/***
	* Run this code when the menu toggle link has been tapped or clicked
	*/
	var supportTouch = false;
	if ( 'ontouchstart' in window ) { // detect touch support
		supportTouch = 'touchstart'; // iOS and Android
		$( '#header-image, .site-branding, #hero, .features, #team, #front-page-blog, #testimonials, .special-offer, #front-page-ancillary, .flourish, #breadcrumbs, #page-header, #page-hero, #content, #tertiary, .site-footer' ).css( 'cursor', 'pointer' );
	}
	else {
		supportTouch = 'click'; // Browsers
	}

	$( '.menu-toggle' ).on( supportTouch, function( e ) {
		e.preventDefault(); // prevent event from carrying out its default functionality
		e.stopPropagation(); // prevent event propagation

		var $body = $( 'body' ),
			$page = $( '#page' ),
			$menu = $( '.main-navigation' ),

			/* Cross browser support for CSS "transition end" event */
			transitionEnd = 'transitionend webkitTransitionEnd otransitionend MSTransitionEnd';

			/* When the toggle menu link is clicked, animation starts */
			$body.addClass( 'animating' );

		/***
		* Determine the direction of the animation and
		* add the correct direction class depending
		* on whether the menu was already visible.
		*/
		if ( $body.hasClass( 'menu-visible' ) ) {
			if ( $body.hasClass( 'rtl' ) ) { // make sure the menu works in RTL mode
				$body.addClass( 'left' );
			} else {
				$body.addClass( 'right' );
			}
		} else {
			if ( $body.hasClass( 'rtl' ) ) {
				$body.addClass( 'right' );
			} else {
				$body.addClass( 'left' );
			}
		}

		/***
		* When the animation (technically a CSS transition)
		* has finished, remove all animating classes and
		* either add or remove the "menu-visible" class
		* depending whether it was visible or not previously.
		*/
		$page.on( transitionEnd, function() {
			$body
				.removeClass( 'animating left right' )
				.toggleClass( 'menu-visible' );

			$page.off( transitionEnd );
		} );
	} );

	// If the menu is visible, allow a wider click-to-close menu area
	$( '#header-image, .site-branding, #hero, .features, #team, #front-page-blog, #testimonials, .special-offer, #front-page-ancillary, .flourish, #breadcrumbs, #page-header, #page-hero, #content, #tertiary, .site-footer' ).on( supportTouch, function( e ) {
		var $body = $( 'body' ),
			$toggle = $( '.menu-toggle' );

		if ( $body.hasClass( 'menu-visible' ) ) {
			e.stopPropagation(); // prevent event propagation

			if ( 'click' == supportTouch ) {
				$toggle.click();
			}
			else {
				e.preventDefault(); // prevent scrolling while toggle is triggered
				$toggle.trigger( supportTouch ); // simular an iOS click
			}
		} else {
			return;
		}
	});
} )( jQuery );