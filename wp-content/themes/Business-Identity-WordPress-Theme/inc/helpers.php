<?php
/**
 * Helper functions
 *
 * @see     function add_action
 * @see     const DAY_IN_SECONDS
 * @see     function delete_transient
 * @see     function get_intermediate_image_sizes
 * @see     function get_transient
 * @see     function set_transient
 * @package Business_Identity
 * @since   Business Identity 2.0
 */

// Get additional image sizes available to theme.
function business_identity_get_additional_image_sizes() {
	global $_wp_additional_image_sizes;

	if ( ! empty( $_wp_additional_image_sizes ) ) {
		return $_wp_additional_image_sizes;
	}

	return array();
} // end function business_identity_get_additional_image_sizes