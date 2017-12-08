<?php
/**
 * Customizer Support
 *
 * @see     function add_action
 * @see     function add_section
 * @see     function get_template_directory_uri
 * @see     function wp_enqueue_script
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 *  1.0 - Core-Supported Enhancements and Tweaks
 *  2.0 - Jetpack
 *  3.0 - Website Layout Section
 *        3.1 - Website Layout
 *  4.0 - Flourish
 *  5.0 - Website Contributors Display
 *  6.0 - Features and Services
 *  7.0 - Recent Posts
 *  8.0 - Special Offer Banner
 *  9.0 - Search
 * 10.0 - Site Top Content
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_identity_customize_register( $wp_customize ) {
	// 1.0 - Core-Supported Enhancements and Tweaks
	require 'customizer/core.php';

	// 2.0 - Jetpack
	require 'customizer/jetpack.php';

	// 3.0 - Website Layout Section
	$wp_customize->add_section(
		'business_identity_theme_options',
		array(
			'title'			=> __( 'Website Layout', 'business-identity' ),
			'priority'		=> 1,
		)
	);

	// 3.1 - Website Layout
	require 'customizer/layout.php';

	// 4.0 - Flourish
	require 'customizer/flourish.php';

	// 5.0 - Website Contributors Display
	require 'customizer/team.php';

	// 6.0 - Features and Services
	require 'customizer/features.php';

	// 7.0 - Recent Posts
	require 'customizer/recent-posts.php';

	// 8.0 - Special Offer Banner
	require 'customizer/special-offer.php';

	// 9.0 - Search
	require 'customizer/search.php';

	// 10.0 - Site Top Content
	require 'customizer/site-top-content.php';
} // end function business_identity_customize_register
// Give this a priority of 11 so that we are able to tweak Jetpack integration into the customizer
add_action( 'customize_register', 'business_identity_customize_register', 11 );

// Customizer JavaScript
function business_identity_customize_preview_js() {
	wp_enqueue_script( 'business-identity-customizer', get_template_directory_uri() . '/inc/customizer/customizer.js', array( 'customize-preview' ), '2.0', true );
} // end function business_identity_customize_preview_js
add_action( 'customize_preview_init', 'business_identity_customize_preview_js' );

// Data Validation
require 'customizer/validation.php';