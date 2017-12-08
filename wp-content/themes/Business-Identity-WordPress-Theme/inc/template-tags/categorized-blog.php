<?php
/**
 * Determine if a site has more than one category in use.
 *
 * @see     function add_action
 * @see     function delete_transient
 * @see     function get_categories
 * @see     function get_transient
 * @see     function set_transient
 * @return  bool Whether or not the site is categorized.
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_categorized_blog() {
	if ( false === ( $cats = get_transient( 'business_identity_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$cats = get_categories(
			array(
				'hide_empty'	=> 1,
				'fields'		=> 'ids',
				'number'		=> 2, // We only need to know if there is more than one category.
			)
		);

		// Count the number of categories that are attached to the posts.
		$cats = count( $cats );

		set_transient( 'business_identity_cats', $cats );
	} // end transient check

	if ( 1 < $cats ) {
		return true;
	} else {
		return false;
	}
} // end function business_identity_categorized_blog

function business_identity_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	delete_transient( 'business_identity_cats' );
} // end function business_identity_category_transient_flusher
add_action( 'edit_category', 'business_identity_category_transient_flusher' );
add_action( 'save_post',     'business_identity_category_transient_flusher' );