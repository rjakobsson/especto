<?php
/**
 * Extend the default WordPress body classes.
 *
 *  1.0 - Multiple Post/Page Author Site
 *  2.0 - Mobile Site detection by Jetpack
 *  3.0 - Browsers
 *      - Safari
 *      - Chrome
 *      - Gecko
 *      - Opera
 *      - Internet Explorer
 *  4.0 - Widget Detection
 *  5.0 - Widget Masonry
 *  6.0 - Logo
 *  7.0 - Custom Header Image
 *  8.0 - Empty Site Header
 *  9.0 - Default Sidebar Position
 * 10.0 - Hero Content
 * 11.0 - Website Layout
 * 12.0 - Special Offer Banner Link
 * 13.0 - Search Input Visibility
 * 14.0 - Site Top Content
 * 15.0 - Featured Content
 *        15.1 - Design
 *        15.2 - Text Alignment
 *
 * @see     function add_filter
 * @see     function get_header_image
 * @see     function get_header_textcolor
 * @see     function get_theme_mod
 * @see     function is_active_sidebar
 * @see     function is_multi_author
 * @see     function is_page_template
 * @see     function jetpack_has_site_logo
 * @see     function jetpack_is_mobile
 * @param   array $classes A list of existing body class values.
 * @return  array The filtered body class list.
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_body_classes( $classes ) {
	// 1.0 -  Multiple Post/Page Author Site
	if ( is_multi_author() ) {
		$classes[] = 'multi-author-site';
	}

	// 2.0 - Mobile Site
	if ( function_exists( 'jetpack_is_mobile' ) && jetpack_is_mobile() ) {
		$classes[] = 'mobile-site';
	}

	// 3.0 -  Browsers
	global $is_safari, $is_chrome, $is_gecko, $is_opera, $is_IE;

	if ( $is_safari ) {
		$classes[] = 'safari';
	}
	if ( $is_chrome ) {
		$classes[] = 'chrome';
	}
	if ( $is_gecko ) {
		$classes[] = 'gecko';
	}
	if ( $is_opera ) {
		$classes[] = 'opera';
	}
	if ( $is_IE ) {
		$classes[] = 'ie';
	}

	// 4.0 - Widget Detection
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'has-primary-sidebar';
	} else {
		$classes[] = 'has-no-primary-sidebar';
	}
	if ( is_active_sidebar( 'sidebar-2' ) ) {
		$classes[] = 'has-website-footer';
	} else {
		$classes[] = 'has-no-website-footer';
	}
	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'has-front-page-widgets';
	} else {
		$classes[] = 'has-no-front-page-widgets';
	}

	// 5.0 - Widget Masonry
	if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'masonry-on';
	}

	// 6.0 - Logo
	if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
		$classes[] = 'custom-logo';
	}

	// 7.0 - Custom Header Image
	if ( get_header_image() ) {
		$classes[] = 'has-custom-header-image';
	}

	// 8.0 - Empty Site Header
	if ( ! get_header_image() && // no site header
		( function_exists( 'jetpack_has_site_logo' ) && ! jetpack_has_site_logo() ) && // no site logo
		'blank' == get_header_textcolor() // no site title
	) {
		$classes[] = 'emptied-site-header';
	}

	// 9.0 - Default Sidebar Position
	if ( 'left' === get_theme_mod( 'business_identity_sidebar_position' ) ) {
		$classes[] = 'left-sidebar-position-chosen';
	}

	// 10.0 - Hero Content
	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		global $post;
		if ( isset( $post->post_content ) && '' != $post->post_content ) {
			$classes[] = 'hero';
		}
	}

	// 11.0 - Website Layout
	$business_identity_site_width = get_theme_mod( 'business_identity_site_width' );
	if (
		empty( $business_identity_site_width ) || // no option has been set
		'wide' == $business_identity_site_width // wide option has been set
	) {
		$classes[] = 'wide-site-width';
	}
	if ( 'slim' == $business_identity_site_width ) { // slim option has been set
		$classes[] = 'slim-site-width';
	}

	// 12.0 - Special Offer Banner Link
	$business_identity_special_offer_cta_link = get_theme_mod( 'business_identity_special_offer_cta_link' );
	if ( empty( $business_identity_special_offer_cta_link ) ) {
		$classes[] = 'empty-special-offer-link';
	}

	// 13.0 - Search Input Visibility
	$business_identity_search_display = get_theme_mod( 'business_identity_search_display' );
	if ( empty( $business_identity_search_display ) ) {
		$classes[] = 'hide-header-search-input';
	}

	// 14.0 - Site Top Content
	$site_top_content = get_theme_mod( 'business_identity_site_top_content_alignment' );
	if ( 'left' === $site_top_content ) {
		$classes[] = 'site-top-content-left';
	}
	if ( 'center' === $site_top_content ) {
		$classes[] = 'site-top-content-center';
	}
	if ( 'justify' === $site_top_content ) {
		$classes[] = 'site-top-content-justify';
	}

	// 15.0 - Featured Content
	// 15.1 - Design
	$business_identity_featured_content_design         = get_theme_mod( 'business_identity_featured_content_design' );
	$business_identity_featured_content_slideshow_mode = get_theme_mod( 'business_identity_featured_content_slideshow_mode' );
	if (
		empty( $business_identity_featured_content_design ) ||           // No design option has been set.
		'slider' == $business_identity_featured_content_design           // Slider
	) {
		$classes[] = 'featured-content-slider';
	}
	if ( 'mosaic' == $business_identity_featured_content_design ) {      // Mosaic Mode
		$classes[] = 'featured-content-mosaic';
	}
	if ( 'fullscreen' == $business_identity_featured_content_design ) {  // Fullscreen Mode
		$classes[] = 'featured-content-fullscreen';
	}
	if ( true === $business_identity_featured_content_slideshow_mode ) { // Slideshow Mode
		$classes[] = 'featured-content-slideshow-mode';
	}
	// 15.2 - Text Alignment
	$business_identity_featured_content_alignment = get_theme_mod( 'business_identity_featured_content_alignment' );
	if ( empty( $business_identity_featured_content_alignment ) ) {     // No alignment option has been set yet.
		$classes[] = 'featured-content-default-alignment';
	}
	if ( 'left' == $business_identity_featured_content_alignment ) {    // The left alignment option has been set.
		$classes[] = 'featured-content-left';
	}
	if ( 'center' == $business_identity_featured_content_alignment ) {  // The center alignment option has been set.
		$classes[] = 'featured-content-center';
	}
	if ( 'right' == $business_identity_featured_content_alignment ) {   // The right alignment option has been set.
		$classes[] = 'featured-content-right';
	}
	if ( 'justify' == $business_identity_featured_content_alignment ) { // The justify alignment option has been set.
		$classes[] = 'featured-content-justify';
	}

	return $classes;
} // end function business_identity_body_classes
add_filter( 'body_class', 'business_identity_body_classes' );