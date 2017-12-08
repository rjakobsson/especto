<?php
/**
 * Set up the default content width.
 *
 * The default value is set to twice the maximum available content width
 * in Business Identity, which is 1170 pixels. WordPress uses $content_width
 * to determine add media sizes and in some cases ignores user settings
 * on the media settings page when the setting is greater than $content_width.
 * Double values are for the benefit of Retina-ready devices.
 *
 * @see     function add_action
 * @see     function is_active_sidebar
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 2340; // pixels
}

// Reduce the overall theme content width if there is an active sidebar present in the theme.
function business_identity_content_width() {
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$GLOBALS['content_width'] = 1540;
	}
} // end function business_identity_content_width
add_action( 'template_redirect', 'business_identity_content_width' );