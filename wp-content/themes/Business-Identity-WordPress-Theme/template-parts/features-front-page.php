<?php
/**
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * Features and Services template part
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * @package Business_Identity
 * @since Business Identity 1.0
 */

// Grab the features page ID (false, blank, '0', or a string number)
$features_page_id = get_theme_mod( 'business_identity_features_page' );

/**
 * Make sure that some conditions are being met before continuing.
 *
 * 1. We always want to make sure that the file and corresponding markup are loaded
 *    from within the Customizer for better contextual help.
 * 2. Out of the box, the theme will return false for theme mods. We need to account for this.
 * 3. If an option has been set but not for this particular option, then the theme mod will
 *    be assigned a blank string value. We need to account for this.
 * 4. If an page has been set for this option and then manually removed, the theme mod will return
 *    a zero string value. We need to account for this.
 */
if ( ! is_customize_preview() && empty( $features_page_id ) ) {
	return;
}

/**
 * Allow the use of more tags
 *
 * @link http://codex.wordpress.org/Function_Reference/the_content
 */
global $more;

/**
 * Get features page content
 *
 * Use WP_Query because when using get_post(), we are unable to also use
 * a <!--more--> link with the content. The idea here is that users should be
 * able to list 5-6 features or highlights of their services, while also being
 * able to use a <!--more--> tag so that their page can include more information when
 * visitors click the call to action button on the section.
 */
if ( '0' != $features_page_id && '' != $features_page_id ) {

$features = new WP_Query(
	array(
		'page_id' => $features_page_id, // page ID
		'post_type' => 'page', // get page
		'post_status' => 'publish', // show only published posts
	)
);
?>
	<?php if ( $features->have_posts() ) : ?>
		<section class="features">
			<div class="grid">
				<div class="row">
					<div class="twelve column">
						<span class="label">
							<?php
								if ( '' != get_theme_mod( 'business_identity_features_label' ) ) {
									echo esc_html( get_theme_mod( 'business_identity_features_label' ) );
								}
							?>
						</span>
						<?php while ( $features->have_posts() ) : $features->the_post(); $more = 0; ?>
							<?php if ( '' != get_the_title() ) : ?>
								<h1 class="features-title">
									<?php the_title(); ?>
								</h1><!-- .features-title -->
							<?php endif; ?>
							<div class="entry-content">
								<?php the_content(); ?>
								<a class="call-to-action" href="<?php the_permalink(); ?>" rel="bookmark">
									<?php
										if ( '' == get_theme_mod( 'business_identity_features_cta_text' ) ) {
											_e( 'View All Features', 'business-identity' );
										} else {
											echo esc_html( get_theme_mod( 'business_identity_features_cta_text' ) );
										}
									?>
								</a><!-- .call-to-action -->
							</div><!-- .feature-entry -->
							<?php edit_post_link( __( 'Edit', 'business-identity' ), '<span class="edit-link">', '</span>' ); ?>
						<?php
							endwhile;
							wp_reset_postdata();
						?>
					</div><!-- .twelve -->
				</div><!-- .row -->
			</div><!-- .grid -->
		</section><!-- .features -->
<?php
		endif; // end if features have posts
} // end if $features_page_id isn't 0 check
/**
 * Output helpful instructions to user if they have the features and services
 * section active but do not have a page chosen.
 */
else { ?>
	<section class="features">
		<div class="grid">
			<div class="row">
				<div class="twelve column">
					<span class="label">
						<?php _e( 'Features and Services', 'business-identity' ); ?>
					</span>
					<h1 class="features-title">
						<?php _e( 'The title of your features page will go here.', 'business-identity' ); ?>
					</h1>
					<div class="features-instructions">
						<h1>
							<?php _e( 'Creating a Features &amp; Services home page section is easy. Simply add a new page, then navigate to the Customizer and choose the page you created from the drop-down menu in the <em>Home</em> section. Any kind of content can be used in this section of your home page, and the content layout of this area is entirely controlled by you.', 'business-identity' ); ?>
						</h1>
						<a class="call-to-action" href="#">
							<?php _e( 'Call to Action', 'business-identity' ); ?>
						</a>
					</div>
				</div><!-- .twelve -->
			</div><!-- .row -->
		</div><!-- .grid -->
	</section><!-- .features -->
<?php } ?>