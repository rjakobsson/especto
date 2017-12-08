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
 * Special Offer Banner
 *
 * @package Business_Identity
 * @since Business Identity 1.0
 */

// grab special offer title
$special_offer_title = get_theme_mod( 'business_identity_special_offer_title' );

/**
 * Make sure that some conditions are being met before continuing.
 *
 * 1. We always want to make sure that the file and corresponding markup are loaded
 *    from within the Customizer for better contextual help.
 * 2. Out of the box, the theme will return false for theme mods. We need to account for this.
 * 3. If an option has been set but not for this particular option, then the theme mod will
 *    be assigned a blank string value. We need to account for this.
 * 4. If a value has been set for this option and then manually removed, the theme mod will return
 *    a zero string value. We need to account for this.
 */
if ( ! is_customize_preview() && empty( $special_offer_title ) ) {
	return;
} ?>

<section class="special-offer">
	<div class="grid">
		<div class="row">
			<div class="twelve column">
				<span class="label">
					<?php
						if ( '' != get_theme_mod( 'business_identity_special_offer_label' ) ) {
							echo esc_html( get_theme_mod( 'business_identity_special_offer_label' ) );
						}
					?>
				</span>
				<h1>
					<?php
						if (
							false != get_theme_mod( 'business_identity_special_offer_title' ) && // no option has been set
							'' != get_theme_mod( 'business_identity_special_offer_title' ) // the option has been gutted by the user
						) {
							echo esc_html( get_theme_mod( 'business_identity_special_offer_title' ) );
						} else { // if no banner text has been set and the special offer banner is visible, output instructions to the user
							_e( 'Create your special offer banner by navigating to the <em>Home</em> section of the Customizer. The banner can include a small label, large promotional text, and a call to action button that links to any location of your choosing. If you would like to exclude this banner from your home page, simply turn it off.', 'business-identity' );
						}
					?>
				</h1>
				<?php $call_to_action_url = get_theme_mod( 'business_identity_special_offer_cta_link' ); ?>
				<a class="call-to-action" href="<?php echo esc_url( $call_to_action_url ); ?>">
					<?php
						if ( '' != get_theme_mod( 'business_identity_special_offer_cta_text' ) ) :
							echo esc_html( get_theme_mod( 'business_identity_special_offer_cta_text' ) );
						endif;
					?>
				</a>
			</div><!-- .twelve -->
		</div><!-- .row -->
	</div><!-- .grid -->
</section><!-- .special-offer -->