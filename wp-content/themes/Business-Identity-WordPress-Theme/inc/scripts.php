<?php
/**
 * Scripts and styles.
 *
 * 1.0 - Genericons
 * 2.0 - Primary Theme Stylesheet
 * 3.0 - Comment Reply Script
 * 4.0 - Featured Content
 * 5.0 - Mobile Menu
 * 6.0 - Masonry
 * 7.0 - Custom Theme Scripts
 * 8.0 - Debouncer
 * 9.0 - Skip Link Focus Fix
 *
 * @see     function add_action
 * @see     function comments_open
 * @see     function get_option
 * @see     function get_stylesheet_uri
 * @see     function get_template_directory_uri
 * @see     function get_theme_mod
 * @see     function is_active_sidebar
 * @see     function is_page_template
 * @see     function is_singular
 * @see     function wp_enqueue_script
 * @see     function wp_enqueue_style
 * @see     function wp_register_style
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_scripts() {
	// 1.0 - Genericons
	wp_register_style( 'genericons', get_template_directory_uri() . '/fonts/genericons/genericons.css', array(), '3.3' );

	// 2.0 - Primary Theme Stylesheet
	wp_enqueue_style( 'business-identity-style', get_stylesheet_uri(), array( 'genericons' ), null );

	// 3.0 - Comment Reply Script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// 4.0 - Featured Content
	$business_identity_featured_content_design = get_theme_mod( 'business_identity_featured_content_design' );
	if (
		( ( is_front_page() || is_page_template( 'page-templates/featured-content.php' ) ) && business_identity_has_featured_posts( 2 ) ) &&
		( empty( $business_identity_featured_content_design ) || // no option has been set
		'slider' == $business_identity_featured_content_design ) // slider option has been set
	) {
		wp_enqueue_script( 'business-identity-featured-content-slider', get_template_directory_uri() . '/inc/jetpack/featured-content.js', array( 'jquery' ), '1.0', true );
		wp_localize_script(
			'business-identity-featured-content-slider',
			'jetpackFC',
			array(
				'previous'		=> __( 'Previous Slide', 'business-identity' ),
				'next'			=> __( 'Next Slide', 'business-identity' ),
				'slide'			=> __( 'Slide', 'business-identity' ),
				'speed'			=> get_theme_mod( 'business_identity_featured_content_speed' ),
			)
		);
	}

	// 5.0 - Mobile Menu
	wp_enqueue_script( 'business-identity-sliding-mobile-menu', get_template_directory_uri() . '/js/sliding-mobile-menu.js', array( 'jquery' ), '1.0', true );

	// 6.0 - Masonry
	if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'business-identity-theme-masonry', get_template_directory_uri() . '/js/theme-masonry.js', array( 'masonry' ), '1.0', true );
	}

	// 7.0 - Custom Theme Scripts
	wp_enqueue_script( 'business-identity-scripts', get_template_directory_uri() . '/js/theme.js', array( 'business-identity-debouncer' ), '1.0', true );

	// 8.0 - Debouncer
	wp_enqueue_script( 'business-identity-debouncer', get_template_directory_uri() . '/js/debouncer.js', array(), '1.0', true );

	// 9.0 - Skip Link Focus Fix
	wp_enqueue_script( 'business-identity-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0', true );
} // end function business_identity_scripts
add_action( 'wp_enqueue_scripts', 'business_identity_scripts' );