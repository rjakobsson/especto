<?php
/**
 * Jetpack Testimonials
 *
 * @link    https://github.com/Automattic/jetpack/blob/master/modules/custom-post-types/testimonial.php
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

// Set up
function business_identity_testimonials_setup() {
	add_theme_support( 'jetpack-testimonial' );
} // end function business_identity_testimonials_setup
add_action( 'after_setup_theme', 'business_identity_testimonials_setup' );

// Flush rewrite rules so that /testimonial/ works properly post-activation
function business_identity_flush_rewrite_rules() {
	flush_rewrite_rules();
} // end function business_identity_flush_rewrite_rules
add_action( 'after_switch_theme', 'business_identity_flush_rewrite_rules' );

if ( ! function_exists( 'business_identity_get_testimonial_header' ) ) :
	function business_identity_get_testimonial_header() {
		if ( is_post_type_archive( 'jetpack-testimonial' ) ) :
			// Retrieve Testimonials mods.
			$testimonials = get_theme_mod( 'jetpack_testimonials' );
			if ( empty( $testimonials ) ) {
				// bail out if no mods have been set
				return;
			}
			$testimonials_header_img_id = $testimonials['featured-image'];
			if ( empty( $testimonials_header_img_id ) ) {
				// bail out if no custom header has been set
				return;
			}
			$testimonials_header_img_src = wp_get_attachment_image_src( $testimonials_header_img_id, 'business-identity-page-hero' );
			/**
			 * Expected output for $testimonials_header_img_src.
			 *
			 * - [0]: The absolute URL of the featured image.
			 * - [1]: The width (int) of the featured image.
			 * - [2]: The height (int) of the featured image.
			 */
			$testimonials_header_img_url    = esc_url( $testimonials_header_img_src[0] );
			$testimonials_header_img_height = $testimonials_header_img_src[2] . 'px'; ?>

			<section id="testimonial-header" style="background-image: url( <?php echo esc_attr( $testimonials_header_img_url ); ?> ); height: <?php echo esc_attr( $testimonials_header_img_height ); ?>;"></section><?php
		endif;
	} // end function business_identity_get_testimonial_header
endif;

if ( ! function_exists( 'business_identity_testimonials_page_content' ) ) :
	/**
	 * @since Business Identity 2.0
	 */
	function business_identity_testimonials_page_content() {
		if ( is_post_type_archive( 'jetpack-testimonial' ) ) :
			$testimonials = get_theme_mod( 'jetpack_testimonials' );
			if ( ! empty( $testimonials ) && ! empty( $testimonials['page-content'] ) ) :
				printf( '<div class="testimonials-page-content">%s</div>', $testimonials['page-content'] );
			endif;
		endif;
	} // end function business_identity_testimonials_page_content
endif;

/**
 * Archive title handling
 *
 * @param   string the Archive title
 * @since   Business Identity 2.0
 */
function business_identity_the_archive_title( $title ) {
	if ( is_post_type_archive( 'jetpack-testimonial' ) ) :
		$testimonials = get_theme_mod( 'jetpack_testimonials' );
		if ( ! empty( $testimonials ) && ! empty( $testimonials['page-title'] ) ) {
			$title = $testimonials['page-title'];
		} else {
			$title = __( 'Testimonials', 'business-identity' );
		}
	endif;

	return $title;
} // end function business_identity_the_archive_title
add_filter( 'get_the_archive_title', 'business_identity_the_archive_title' );