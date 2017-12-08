/**
 * Theme customizer enhancements for a better user experience.
 *
 * 1.0 - Site Title
 * 2.0 - Site Description
 * 3.0 - Background Color
 * 4.0 - Features and Services
 * 5.0 - Special Offer Banner
 * 6.0 - Featured Content Slideshow Mode
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

( function( $, undefined ) {
	// 1.0 - Site Title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a span:nth-child(2)' ).text( to );
		} );
	} );

	// 2.0 - Site Description
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// 3.0 - Background Color
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css({
				'background-color' : to
			});
		} );
	} );

	// 4.0 - Features and Services
	wp.customize( 'business_identity_features_label', function( value ) {
		value.bind( function( to ) {
			if ( '' === to ) {
				$( '.features .label' ).css( {
					'display' : 'none'
				} );
			}
			else {
				$( '.features .label' ).css( {
					'display' : 'block'
				} );
				$( '.features .label' ).text( to );
			}
		} );
	} );
	wp.customize( 'business_identity_features_cta_text', function( value ) {
		value.bind( function( to ) {
			if ( '' === to ) {
				$( '.features .call-to-action' ).css( {
					'display' : 'none'
				} );
			}
			else {
				$( '.features .call-to-action' ).css( {
					'display' : 'inline-block'
				} );
				$( '.features .call-to-action' ).text( to );
			}
		} );
	} );

	// 5.0 - Special Offer Banner
	wp.customize( 'business_identity_special_offer_label', function( value ) {
		value.bind( function( to ) {
			if ( '' === to ) {
				$( '.special-offer .label' ).css( {
					'display' : 'none'
				} );
			}
			else {
				$( '.special-offer .label' ).css( {
					'display' : 'block'
				} );
				$( '.special-offer .label' ).text( to );
			}
		} );
	} );
	wp.customize( 'business_identity_special_offer_title', function( value ) {
		value.bind( function( to ) {
			if ( '' === to ) {
				$( '.special-offer h1' ).css( {
					'display' : 'none'
				} );
			}
			else {
				$( '.special-offer h1' ).css( {
					'display' : 'inline-block'
				} );
				$( '.special-offer h1' ).text( to );
			}
		} );
	} );
	wp.customize( 'business_identity_special_offer_cta_text', function( value ) {
		value.bind( function( to ) {
			if ( '' === to ) {
				$( '.special-offer .call-to-action' ).css( {
					'display' : 'none'
				} );
			}
			else {
				$( '.special-offer .call-to-action' ).css( {
					'display' : 'inline-block'
				} );
				$( '.special-offer .call-to-action' ).text( to );
			}
		} );
	} );
	wp.customize( 'business_identity_special_offer_cta_link', function( value ) {
		value.bind( function( to ) {
			$( '.special-offer .call-to-action' ).attr( 'href', to );
		} );
	} );

	// 6.0 - Featured Content Slideshow Mode
	wp.customize( 'business_identity_featured_content_slideshow_mode', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '#featured-content .cover .twelve' ).css( {
					'visibility' : 'hidden'
				} );
			} else {
				$( '#featured-content .cover .twelve' ).css( {
					'visibility' : 'visible'
				} );
			}
		} );
	} );
} )( jQuery );