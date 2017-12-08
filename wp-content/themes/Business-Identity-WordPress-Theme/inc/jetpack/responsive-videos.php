<?php
/**
 * Responsive Videos
 *
 * @see     function add_action
 * @see     function add_theme_support
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_responsive_videos() {
	add_theme_support( 'jetpack-responsive-videos' );
} // end function business_identity_responsive_videos
add_action( 'after_setup_theme', 'business_identity_responsive_videos' );