<?php
/**
 * Author Archive Handling
 *
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @see     function add_action
 * @see     function get_userdata
 * @see     function is_author
 * @global  WP_Query $wp_query WordPress Query object.
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
} // end function business_identity_setup_author
add_action( 'wp', 'business_identity_setup_author' );