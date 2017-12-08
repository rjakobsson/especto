<?php
/**
 * Comment Form Notes
 *
 * @see     function add_filter
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_comment_form( $args ) {
	$args['comment_notes_after'] = '';

	return $args;
} // end function business_identity_comment_form
add_filter( 'comment_form_defaults', 'business_identity_comment_form' );