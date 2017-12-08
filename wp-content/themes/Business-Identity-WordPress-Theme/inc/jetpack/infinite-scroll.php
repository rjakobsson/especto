<?php
/**
 * Infinite Scroll.
 *
 * @see     function add_action
 * @see     function add_filter
 * @see     function add_theme_support
 * @see     function get_post_format
 * @see     function get_template_part
 * @see     function have_posts
 * @see     function is_active_sidebar
 * @see     function jetpack_is_mobile
 * @see     function the_post
 * @see     class Jetpack_User_Agent_Info
 * @see     method Jetpack_User_Agent_Info is_ipad
 * @link    http://jetpack.me/support/infinite-scroll/
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_infinite_scroll_setup() {
	add_theme_support(
		'infinite-scroll',
		array(
			'container' => 'main',
			'footer'    => 'page',
			'render'    => 'business_identity_infinite_scroll_render',
		)
	);
} // end function business_identity_infinite_scroll_setup
add_action( 'after_setup_theme', 'business_identity_infinite_scroll_setup' );

function business_identity_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function business_identity_infinite_scroll_render

/**
 * Check whether or not footer widgets are present. If they are present, then a
 * button to 'Load more posts' will be displayed and IS will not be triggered
 * unless a user manually clicks on that button. Only allow click to load more posts
 * on iPads and iPhones for better mobile and tablet performance.
 *
 * @param bool $has_widgets Whether or not the footer has widgets.
 */
function business_identity_has_footer_widgets( $has_widgets ) {
	if (
		// disable scrolling on iPads
		( class_exists( 'Jetpack_User_Agent_Info' ) &&  method_exists( 'Jetpack_User_Agent_Info', 'is_ipad' ) &&  Jetpack_User_Agent_Info::is_ipad() ) ||
		// disable scrolling on iPhones
		( function_exists( 'jetpack_is_mobile' ) && jetpack_is_mobile() ) ||
		// if footer widgets are present
		( is_active_sidebar( 'sidebar-2' ) )
	) {
		$has_widgets = true;
	}

	return $has_widgets;
} // end function business_identity_has_footer_widgets
add_filter( 'infinite_scroll_has_footer_widgets', 'business_identity_has_footer_widgets' );