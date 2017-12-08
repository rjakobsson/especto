<?php
/**
 * Hero handling.
 *
 * @see     function business_identity_testimonial_hero
 * @see     function esc_attr
 * @see     function esc_url
 * @see     function get_post_class
 * @see     function get_post_thumbnail_id
 * @see     function get_theme_mod
 * @see     function has_post_thumbnail
 * @see     function is_archive
 * @see     function is_front_page
 * @see     function Jetpack::is_module_active
 * @see     function jetpack_photon_url
 * @see     function post_password_required
 * @see     function sanitize_text_field
 * @see     function wp_get_attachment_image_src
 * @param   object $post The post.
 * @param   string $size Custom size to use for the background image. Needs to be declared in theme setup function.
 * @param   string $classes Custom classes to use with the hero background output.
 * @param   bool $height Whether or not to output the height in pixels
 * @package Business_Identity
 * @since   Business Identity 2.0
 */

if ( ! function_exists( 'business_identity_hero_background' ) ) :
	/**
	 * For post types that support featured images, retrieve the featured image
	 * and output it as the hero background for any given content block.
	 *
	 * This is intended to be used within The Loop, but should also be able to be used
	 * outside of it as well.
	 */
	function business_identity_hero_background( $post = null, $size = '', $classes = '', $height = true ) {
		// Jetpack Testimonials
		if ( is_post_type_archive( 'jetpack-testimonial' ) ) {
			return;
		}

		// Bail if archive or the post is null
		if ( is_archive() || null == $post ) {
			echo 'class="no-hero"';
			return;
		}

		// grab the post ID
		$post_id = $post->ID;

		// Determine the featured image size to use
		$allowed_sizes = array(
			'thumbnail',
			'medium',
			'large',
			'post-thumbnail',
			'business-identity-index-thumbnail',
			'business-identity-index-thumbnail-full',
			'business-identity-image-attachment',
			'business-identity-testimonial-avatar',
			'business-identity-testimonial-avatar-single',
			'business-identity-page-hero',
			'business-identity-mosaic-tile',
		);

		// Make sure that the custom size being used is a registered image size
		if ( '' != $size && in_array( $size, $allowed_sizes ) ) {
			$size = $size;
		} else {
			$size = 'large';
		}

		/**
		 * If a dev. has added custom classes, then we'll use those,
		 * otherwise we'll fall back to the default behavior and use
		 * cover when there's a featured image set for the post or
		 * no hero when no featured image has been set for the post.
		 */
		if ( '' != $classes ) {
			$classes = (string) sanitize_text_field( $classes );
		} else {
			if ( ! post_password_required() && has_post_thumbnail( $post_id ) ) {
				$classes = 'cover';
			} else {
				$classes = 'no-hero';
			}
		}
		$classes = $classes . ' ' . implode( ' ', get_post_class( '', $post_id ) );

		if ( ! post_password_required() && has_post_thumbnail( $post_id ) ) {
			/**
			 * The expected output from $hero is as follows:
			 * - [0]: The absolute URL of the featured image.
			 * - [1]: The width (int) of the featured image.
			 * - [2]: The height (int) of the featured image.
			 */
			$hero        = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
			$hero_src    = $hero[0];
			$hero_height = (int) $hero[2];

			// Jetpack Photonize the featured image. This gives us flexibility to use Photon's image filtering as well.
			if ( class_exists( 'Jetpack' ) && method_exists( 'Jetpack', 'is_module_active' ) && Jetpack::is_module_active( 'photon' ) ) {
				$src        = $hero_src;
				$args       = array();
				$photon_url = jetpack_photon_url( $src, $args );
				$hero_src   = $photon_url;
			}

			// Output background image with or without height, depending on passed argument
			if ( false === $height ) {
				echo 'class="' . esc_attr( $classes ) . '" style="background-image: url( ' . esc_url( $hero_src ) . ' );"';
			} else {
				echo 'class="' . esc_attr( $classes ) . '" style="background-image: url( ' . esc_url( $hero_src ) . ' ); height: ' . esc_attr( $hero_height ) . 'px;"';
			}
		} else {
			/**
			 * If no featured image exists, let's add a helper class so that
			 * we're able to have some sensible styling. This also gives users
			 * with Custom CSS turned on power over what their post headers
			 * will look like.
			 */
			echo 'class="'. esc_attr( $classes ) . '"';
		}
	} // end function business_identity_hero_background()
endif;