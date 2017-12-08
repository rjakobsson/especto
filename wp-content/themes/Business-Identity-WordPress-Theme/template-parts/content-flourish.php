<?php
/**
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * Flourish appears just above the site footer widgets.
 *
 * @see     function esc_url
 * @see     function get_theme_mod
 * @see     function get_template_part
 * @see     function is_customize_preview
 * @see     function is_front_page
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
$flourish_url     = get_theme_mod( 'business_identity_flourish' );
$flourish_display = get_theme_mod( 'business_identity_flourish_display' );

// Show flourish instructions within the Customizer
if ( is_customize_preview() ) {
	if ( empty( $flourish_url ) ) {
		// there's no flourish image that's been set
		get_template_part( 'inc/customizer/instructions/flourish', 'front-page' );
	} else {
		// We're on internal pages that have flourish display turned off when flourish has been uploaded
		if ( ! is_front_page() && empty( $flourish_display ) ) {
			get_template_part( 'inc/customizer/instructions/flourish', 'front-page' );
		}
	}
}

// Bail if we're not on the front page and global flourish display is turned off
if ( ! is_front_page() && empty( $flourish_display ) ) {
	return;
}

// Bail if no flourish has been found
if ( empty( $flourish_url ) ) {
	return;
} ?>

<section class="flourish"><img src="<?php echo esc_url( $flourish_url ); ?>" /></section>