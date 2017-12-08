<?php
/**
 * WordPress Tag Cloud
 *
 * Modify the font sizes of WordPress' tag cloud
 *
 * @see     function add_filter
 * @see     function wp_tag_cloud
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_widget_tag_cloud_args( $args ) {
	$args['smallest'] = .75;
	$args['largest']  = 1.25;
	$args['unit']     = 'rem';
	$args['format']   = 'list';

	return $args;
} // end function business_identity_widget_tag_cloud_args
add_filter( 'widget_tag_cloud_args', 'business_identity_widget_tag_cloud_args' );