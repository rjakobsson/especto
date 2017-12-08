<?php
/**
 * WordPress Caption Padding
 *
 * Remove WordPress' default inline caption padding for pre-3.9 installations
 *
 * @see     function add_filter
 * @see     https://core.trac.wordpress.org/ticket/14380
 * @param   int $width default WordPress width (image width + 10px)
 * @return  int default WordPress width minus the ten pixels
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_caption_reset( $width ) {
	return $width - 10;
} // end function business_identity_caption_reset
add_filter( 'img_caption_shortcode_width', 'business_identity_caption_reset' );