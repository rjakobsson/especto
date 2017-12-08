<?php
/**
 * Jetpack Sharing Tweaks
 *
 * @param  bool $show Whether to show sharing options.
 * @param  WP_Post $post The post to share.
 * @return bool
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_mute_content_filters( $show, $post ) {
	// grab post type
	$post_type = get_post_type( $post );
	// don't show sharing when Testimonials are being shown on the front page
	if ( 'jetpack-testimonial' === $post_type && is_front_page() && is_page_template( 'page-templates/front-page.php' ) ) {
		$show = false;
	}

	return $show;
} // end function business_identity_mute_content_filters
add_filter( 'sharing_show', 'business_identity_mute_content_filters', 10, 2 );