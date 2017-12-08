<?php
/**
 * Google Fonts support.
 *
 * @see     function add_action
 * @see     function add_query_arg
 * @see     function wp_enqueue_style
 * @see     function wp_register_style
 * @link    https://www.google.com/fonts
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

/**
 * Output Lato Google Font URL
 *
 * @link   https://www.google.com/fonts/specimen/Lato
 * @return string
 */
if ( ! function_exists( 'business_identity_open_sans_font_url' ) ) :
	function business_identity_lato_font_url() {
		$lato_font_url = '';
		/* translators: If there are characters in your language that are not supported,
		 * by Lato, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Lato font: on or off', 'business-identity' ) ) {
			$lato_font_url = add_query_arg( 'family', urlencode( 'Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' ), '//fonts.googleapis.com/css' );
		}

		return $lato_font_url;
	} // end function business_identity_open_sans_font_url
endif;

/**
 * Output Open Sans Google Font URL
 *
 * Note: WordPress Core uses Open Sans within the admin, but not on the front-end for logged-out users
 * and visitors. The only time that the following code results in double Open Sans calls is when someone
 * is logged into his site and visiting it with the Toolbar active. WordPress Core only includes the
 * following font weights: 300italic, 400italic, 600italic, 300, 400, 600; thus, loading Open Sans
 * as a separate dependency of Business Identity is prefered so that we can take advantage of additional
 * weights. This also ensures that if WordPress moves away from Open Sans or changes its implementation
 * of Open Sans - for example bundling instead of hotlinking from Google - that we will be protected from it.
 *
 * @link   http://www.google.com/fonts/specimen/Open+Sans
 * @return string
 */
if ( ! function_exists( 'business_identity_open_sans_font_url' ) ) :
	function business_identity_open_sans_font_url() {
		$open_sans_font_url = '';

		/* translators: If there are characters in your language that are not supported
		 * by Open Sans, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'business-identity' ) ) {
			$subsets = 'latin,latin-ext';

			/* translators: To add an additional Open Sans character subset specific to your language,
			 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
			 */
			$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'business-identity' );

			if ( 'cyrillic' == $subset ) {
				$subsets .= ',cyrillic,cyrillic-ext';
			} elseif ( 'greek' == $subset ) {
				$subsets .= ',greek,greek-ext';
			} elseif ( 'vietnamese' == $subset ) {
				$subsets .= ',vietnamese';
			}

			$open_sans_font_url = add_query_arg( 'family', 'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', '//fonts.googleapis.com/css' );
			$open_sans_font_url = add_query_arg( 'subset', $subsets, $open_sans_font_url );

		}

		return $open_sans_font_url;
	} // end function business_identity_open_sans_font_url
endif;

/**
 * Register and Enqueue Google Fonts.
 *
 * @see function business_identity_lato_font_url
 * @see function business_identity_open_sans_font_url
 */
function business_identity_custom_fonts() {
	/**
	 * Note: null unversions the font stylesheet being called, otherwise the http request
	 * for the Google font would have something like &ver=3.9-alpha-27234-src in it, which
	 * we do not want.
	 */
	wp_register_style( 'business-identity-lato', business_identity_lato_font_url(), array(), null );
	wp_enqueue_style( 'business-identity-lato' );

	wp_register_style( 'business-identity-open-sans', business_identity_open_sans_font_url(), array(), null );
	wp_enqueue_style( 'business-identity-open-sans' );
} // end function business_identity_custom_fonts
add_action( 'wp_enqueue_scripts', 'business_identity_custom_fonts' );

/**
 * Register and Enqueue Google fonts style to admin screen for custom header display.
 */
function business_identity_admin_fonts() {
	wp_register_style( 'business-identity-lato', business_identity_lato_font_url(), array(), null );
	wp_enqueue_style( 'business-identity-lato' );
} // end function business_identity_admin_fonts
add_action( 'admin_print_scripts-appearance_page_custom-header', 'business_identity_admin_fonts' );