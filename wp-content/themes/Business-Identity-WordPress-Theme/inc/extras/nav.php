<?php
/**
 * Nav Menu Fallback
 *
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @see     function add_filter
 * @param   array $args Configuration arguments.
 * @return  array
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_page_menu_args( $args ) {
	$args['show_home'] = true;

	return $args;
} // end function business_identity_page_menu_args
add_filter( 'wp_page_menu_args', 'business_identity_page_menu_args' );