<?php
/**
 * Prints HTML with meta information for associated posts, pages, and archive views.
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
if ( ! function_exists( 'business_identity_posted_on' ) ) :
	function business_identity_posted_on() {
		$time_string = '<time class="entry-time published" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			__(
				'<div class="date-inner"><span class="posted-on">%1$s</span><span class="byline"> by %2$s</span></div>',
				'business-identity'
			),
			sprintf(
				'<a href="%1$s" rel="bookmark">%2$s</a>',
				esc_url( get_permalink() ),
				$time_string
			),
			sprintf(
				'<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);
	} // end function business_identity_posted_on
endif;