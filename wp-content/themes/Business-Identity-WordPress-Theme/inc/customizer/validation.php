<?php
/**
 * Data validation and sanitization for Customizer options.
 *
 * 1.0 - Site Width
 * 2.0 - Sidebar Position
 * 3.0 - Checkboxes
 * 4.0 - Site Top Content
 * 5.0 - Featured Content Design
 * 6.0 - Featured Content Alignment
 * 7.0 - Blog Content
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

// 1.0 - Site Width
function business_identity_sanitize_site_width( $value ) {
	if ( ! in_array( $value, array( 'wide', 'slim' ) ) ) {
		$value = 'wide';
	}

	return $value;
} // end function business_identity_sanitize_site_width

// 2.0 - Sidebar Position
function business_identity_sanitize_sidebar_position( $value ) {
	if ( ! in_array( $value, array( 'right', 'left' ) ) ) {
		$value = 'right';
	}

	return $value;
} // end function business_identity_sanitize_sidebar_position

// 3.0 - Checkboxes
function business_identity_sanitize_checkboxes( $value ) {
	if ( ! in_array( $value, array( true, false ) ) ) {
		$value = false;
	}

	return $value;
} // end function business_identity_sanitize_checkboxes

// 4.0 - Site Top Content
function business_identity_sanitize_site_top_content_alignment( $value ) {
	if ( ! in_array( $value, array( 'right', 'left', 'center', 'justify' ) ) ) {
		$value = 'right';
	}

	return $value;
} // end function business_identity_sanitize_site_top_content_alignment

// 5.0 - Featured Content Design
function business_identity_sanitize_featured_content_design( $value ) {
	if ( ! in_array( $value, array( 'slider', 'mosaic', 'fullscreen' ) ) ) {
		$value = 'slider';
	}

	return $value;
} // end function business_identity_sanitize_featured_content_design

// 6.0 - Featured Content Alignment
function business_identity_sanitize_featured_content_alignment( $value ) {
	if ( ! in_array( $value, array( 'left', 'center', 'right', 'justify' ) ) ) {
		$value = 'left';
	}

	return $value;
} // end function business_identity_sanitize_featured_content_alignment

// 7.0 - Blog Content
function business_identity_sanitize_blog_content( $value ) {
	if ( ! in_array( $value, array( 'excerpt', 'full' ) ) ) {
		$value = 'excerpt';
	}

	return $value;
} // end function business_identity_sanitize_blog_content