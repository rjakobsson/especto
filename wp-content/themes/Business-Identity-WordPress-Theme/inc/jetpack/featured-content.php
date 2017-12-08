<?php
/**
 * Featured Content
 *
 * Both pages and posts will be taggable for featured content. This will
 * be good for businesses that have static pages they'd like to feature
 * on the home page of their sites instead of blog posts.
 *
 * @see     function add_action
 * @see     function add_post_type_support
 * @see     function add_theme_support
 * @see     function apply_filters
 * @see     function get_theme_mod
 * @see     function is_paged
 * @link    http://jetpack.me/support/featured-content/
 * @package Business_Identity
 * @since   Business Identity 2.0
 */
function business_identity_featured_content_setup() {
	/**
	 * Grab max posts value from either The Customizer or a default.
	 */
	$max_posts = (int) ( false == get_theme_mod( 'business_identity_featured_content_quantity' ) ? 3 : get_theme_mod( 'business_identity_featured_content_quantity' ) );

	add_theme_support(
		'featured-content',
		array(
			'max_posts'					=> $max_posts, // int
			'post_types'				=> array( 'post', 'page' ), // extend to posts and pages
			'featured_content_filter'	=> 'business_identity_get_featured_posts', // define filter
		)
	);

	add_post_type_support( 'page', 'excerpt' ); // Featured Content for pages and posts should be the same
} // end function business_identity_featured_content_setup
add_action( 'after_setup_theme', 'business_identity_featured_content_setup' );

/**
 * Getter function for Featured Content.
 *
 * @return array An array of WP_Post objects.
 */
function business_identity_get_featured_posts() {
	/**
	 * Filter the featured posts to return.
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'business_identity_get_featured_posts', array() );
} // end function business_identity_get_featured_posts()

/**
 * A helper conditional function that returns a boolean value.
 *
 * @return bool Whether there are featured posts.
 */
function business_identity_has_featured_posts( $minimum = 1 ) {
	if ( is_paged() ) {
		return false;
	}

	$minimum = (int) absint( $minimum );
	$featured_posts = apply_filters( 'business_identity_get_featured_posts', array() );

	if ( ! is_array( $featured_posts ) ) {
		return false;
	}

	if ( $minimum > count( $featured_posts ) ) {
		return false;
	}

	return true;
} // end function business_identity_has_featured_posts