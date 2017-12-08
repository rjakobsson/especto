<?php
/**
 * WordPress.com-specific Functions
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @see     function add_action
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

function business_identity_wpcom_setup() {
	global $themecolors;

	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg'     => 'ffffff',
			'border' => 'f2f2f2',
			'text'   => '595959',
			'link'   => '7b65c7',
			'url'    => '7b65c7',
		);
	}
} // end function business_identity_wpcom_setup
add_action( 'after_setup_theme', 'business_identity_wpcom_setup' );