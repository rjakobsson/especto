<?php
/**
 * Print the attached image with a link to the next attached image.
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
if ( ! function_exists( 'business_identity_the_attached_image' ) ) :
	function business_identity_the_attached_image() {
		if ( ! is_attachment() ) { // bail if not on an attachment view
			return;
		}

		$post = get_post();
		/**
		 * Filter the default Business Identity attachment size.
		 *
		 * @since Business Identity 1.0
		 *
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 *     @type int $height Height of the image in pixels. Default 1170.
		 *     @type int $width  Width of the image in pixels. Default 1170.
		 * }
		 */
		$attachment_size     = apply_filters( 'business_identity_attachment_size', 'business-identity-image-attachment' );
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts(
			array(
				'post_parent'    => $post->post_parent,
				'fields'         => 'ids',
				'numberposts'    => 45,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => 'ASC',
				'orderby'        => 'menu_order ID',
			)
		);

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			}

			// or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf(
			'<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	} // end function business_identity_the_attached_image
endif;