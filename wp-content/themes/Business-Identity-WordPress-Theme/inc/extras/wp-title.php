<?php
/**
 * WordPress Title
 *
 * Pre-WordPress 4.1 title handling inside of the theme. For newer installations of WordPress
 * title handling will be handled via add_theme_support.
 *
 * @link    https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
 * @todo    Remove this file when WordPress 4.4 is released.
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

if ( ! function_exists( '_wp_render_title_tag' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param  string $title Default title text for current view.
	 * @param  string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function business_identity_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'business-identity' ), max( $paged, $page ) );
		}

		return $title;
	} // end function business_identity_wp_title
	add_filter( 'wp_title', 'business_identity_wp_title', 10, 2 );
endif;

if ( ! function_exists( '_wp_render_title_tag' ) ) :
	// Title shim for sites older than WordPress 4.1.
	function business_identity_render_title() {
		echo '<title>' . wp_title( '|', false, 'right' ) . "</title>\n";
	} // end function business_identity_render_title
	add_action( 'wp_head', 'business_identity_render_title' );
endif;