<?php
/**
 * Enable theme support for Jetpack custom logos.
 *
 * The second array argument specifies a post thumbnail size, defaults to 'thumbnail'.
 *
 * @link    http://en.support.wordpress.com/site-logo/
 * @see     function add_image_size
 * @see     function add_theme_support
 * @see     function add_action
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_custom_logo() {
	add_image_size( 'business-identity-custom-logo', 96, 96, true );
	add_theme_support( 'site-logo', array( 'size' => 'business-identity-custom-logo' ) );
} // end function business_identity_custom_logo
add_action( 'after_setup_theme', 'business_identity_custom_logo' );

// Filter the site logo to drop the wrapping anchor.
function business_identity_filter_site_logo( $html, $logo, $size ) {
	// If no logo is set, but we're in the Customizer, leave a placeholder (needed for the live preview).
	if ( ! jetpack_has_site_logo() ) {
		if ( jetpack_is_customize_preview() ) {
			$html = sprintf( '<span class="site-logo-link" style="display:none;"><img class="site-logo" data-size="%s" /></span>', esc_attr( $size ) );
		}
	}

	// We have a logo. Logo is go.
	else {
		$span_class = ( jetpack_is_customize_preview() ) ? ' class="site-logo-link"': '';
		$html = sprintf(
			'<span%s>%s</span>',
			esc_html( $span_class ),
			wp_get_attachment_image(
				$logo['id'],
				$size,
				false,
				array(
					'class'     => "site-logo attachment-$size",
					'data-size' => $size,
				)
			)
		);
	}

	return $html;
} // end function business_identity_filter_site_logo
add_filter( 'jetpack_the_site_logo', 'business_identity_filter_site_logo', 10, 3 );