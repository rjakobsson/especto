<?php
/**
 * Excerpts
 *
 * @see     function add_filter
 * @see     function is_admin
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

/**
 * Filter the string in the "more" link displayed after a trimmed excerpt.
 *
 * @param  string $more Text that shows after an auto-trimmed excerpt.
 * @return string Adjusted auto-text after trimmed excerpts.
 */
function business_identity_auto_excerpt_more( $more ) {
	if ( ! is_admin() ) {
		return '&hellip;';
	}
} // end function business_identity_auto_excerpt_more
add_filter( 'excerpt_more', 'business_identity_auto_excerpt_more' );