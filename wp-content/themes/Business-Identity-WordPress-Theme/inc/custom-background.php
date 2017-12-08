<?php
/**
 * Enable support for user-selected custom backgrounds. We use theme support
 * and not add_custom_background (deprecated in 3.4) for this functionality.
 *
 * @see     function add_action
 * @see     function add_filter
 * @see     function add_theme_support
 * @see     function apply_filters
 * @see     function get_background_image
 * @see     function get_theme_mod
 * @link    http://codex.wordpress.org/Function_Reference/add_theme_support#Custom_Background
 * @package Business_Identity
 * @since   Business Identity 2.0
 */

function business_identity_custom_background_setup() {
	add_theme_support(
		'custom-background',
		apply_filters(
			'business_identity_custom_background_args',
			array(
				'default-color' => '32333f',
			)
		)
	);
} // end function business_identity_custom_background_setup
add_action( 'after_setup_theme', 'business_identity_custom_background_setup' );

/**
 * Ensure that the background is truly customized.
 *
 * @link https://core.trac.wordpress.org/ticket/30299
 */
function business_identity_customized_background_class( $classes ) {
	$background_color = get_theme_mod( 'background_color' );

	if ( get_background_image() || ( ! empty( $background_color ) && '32333f' !== $background_color ) ) {
		$classes[] = 'customized-background';
	}

	return $classes;
} // end function business_identity_customized_background_class
add_filter( 'body_class', 'business_identity_customized_background_class' );