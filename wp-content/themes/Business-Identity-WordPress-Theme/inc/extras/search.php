<?php
/**
 * Better Search Input
 *
 * Add previous results and auto-save feature to HTML5 search form.
 *
 * This also renders HTML5 support for search inputs always on, regardless of explicit add theme support call.
 *
 * @link    http://www.wufoo.com/html5/types/5-search.html
 * @see     function _x
 * @see     function add_filter
 * @see     function esc_attr_x
 * @see     function get_search_form
 * @see     function get_search_query
 * @see     function home_url
 * @see     function esc_url
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_search_input_results( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		<label>
			<span class="screen-reader-text">' . _x( 'Search for:', 'label', 'business-identity' ) . '</span>
			<input type="search" results="5" autosave="business_identity_recent_searches" class="search-field" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder', 'business-identity' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'business-identity' ) . '" />
		</label>
		<input type="submit" class="search-submit" value="'. esc_attr_x( 'Search', 'submit button', 'business-identity' ) .'" />
	</form>';

	return $form;
} // end function business_identity_search_input_results
add_filter( 'get_search_form', 'business_identity_search_input_results' );