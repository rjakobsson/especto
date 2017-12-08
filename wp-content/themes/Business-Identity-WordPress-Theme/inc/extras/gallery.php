<?php
/**
 * Gallery Shortcode Attributes
 *
 * Replaces definition list elements with their appropriate HTML5 counterparts.
 * This is used for backwards compatibility with versions prior to WordPress 3.9
 *
 * @todo    Remove when WordPress 4.1 is released
 * @see     function add_theme_support inside of function business_identity_setup
 * @link    https://core.trac.wordpress.org/changeset/27396
 * @link    https://core.trac.wordpress.org/ticket/26697
 * @param   array $attr The output array of shortcode attributes.
 * @return  array HTML5 gallery attributes.
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_shortcode_atts_gallery( $attr ) {
	$attr['itemtag']    = 'figure';
	$attr['icontag']    = 'div';
	$attr['captiontag'] = 'figcaption';

	return $attr;
} // end function business_identity_shortcode_atts_gallery
add_filter( 'shortcode_atts_gallery', 'business_identity_shortcode_atts_gallery' );