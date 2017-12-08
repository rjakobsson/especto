<?php
/**
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * Team template part
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
if (
	( ! is_customize_preview() ) && // always output markup from within the customizer
	( false == get_theme_mod( 'business_identity_team_display' ) &&
	! is_page_template( 'page-templates/contributors.php' ) )
	) {
	/**
	 * Bail if the user has disabled the special offer banner,
	 * but always output markup while inside of the customizer so that
	 * postMessage works for displaying the banner area when the option
	 * was previously set to false.
	 */
	return;
} ?>

<?php // only show team output if it's explicity been turned on, otherwise show user instructions
	if ( true == get_theme_mod( 'business_identity_team_display' ) || is_page_template( 'page-templates/contributors.php' ) ) { ?>

	<?php
		// Verify theme mods and ensure sensible defaults
		$team_label = ( false === get_theme_mod( 'business_identity_team_label' ) ? __( 'People Involved', 'business-identity' ) : get_theme_mod( 'business_identity_team_label' ) );
		$team_title = ( false === get_theme_mod( 'business_identity_team_title' ) ? __( 'The Team', 'business-identity' ) : get_theme_mod( 'business_identity_team_title' ) );

		// get all authors and above
		$team_member_ids = get_users(
			array(
				'fields' => 'ID',
				'order'  => 'DESC',
				'who'    => 'authors',
			)
		);
	?>

	<section id="team">
		<div class="grid">
			<div class="row">
				<div class="twelve column">
					<span class="label">
						<?php if ( ! empty( $team_label ) ) { ?>
							<?php echo esc_html( $team_label ); ?>
						<?php } ?>
					</span>
					<h1>
						<?php if ( ! empty( $team_title ) ) { ?>
							<?php echo esc_html( $team_title ); ?>
						<?php } ?>
					</h1>
				</div><!-- .twelve -->
			</div><!-- .row -->
			<div class="row">
				<?php
					$author_count = 0; // track number of authors output

					foreach ( $team_member_ids as $team_member_id ) :
						$post_count = count_user_posts( $team_member_id );

						// Move on if user has not published a post (yet).
						if ( ! $post_count ) {
							continue;
						}
				?>
					<div class="one column">
						<?php echo get_avatar( $team_member_id, 90 ); ?>
					</div><!-- .one -->
					<div class="three column">
						<h2>
							<?php if ( '' != get_the_author_meta( 'user_url', $team_member_id ) ) : ?>
								<a href="<?php echo esc_url( get_the_author_meta( 'user_url', $team_member_id ) ); ?>">
									<?php echo esc_html( get_the_author_meta( 'display_name', $team_member_id ) ); ?>
								</a>
							<?php else : ?>
								<?php echo esc_html( get_the_author_meta( 'display_name', $team_member_id ) ); ?>
							<?php endif; ?>
						</h2>
						<?php echo get_the_author_meta( 'description', $team_member_id ); ?>
						<?php business_identity_social_profile( $team_member_id ); ?>
					</div><!-- .three -->
				<?php
					$author_count++; // increment author count by 1
					endforeach;
				?>

				<?php
					/**
					 * If there are no posts in the blog, and the team area is active,
					 * then show a note to the blog author that there will need to be published
					 * posts for this section of the home page to work well.
					 */
					if ( 0 == $author_count ) :
				?>

					<div class="row">
						<div class="twelve column">
							<p>
								<?php _e( 'This section of your home page is used to display team members who have at least one published post on your website. The author avatar, name, and description are all able to be configured on your user settings page.', 'business-identity' ); ?>
							</p>
						</div><!-- .twelve -->
					</div><!-- .row-->

				<?php endif; ?>
			</div><!-- .row -->
		</div><!-- .grid -->
	</section><!-- #team -->

<?php } else { ?>

	<section id="team">
		<div class="grid">
			<div class="row">
				<div class="twelve column">
					<span class="label"><?php _e( 'People Involved', 'business-identity' ); ?></span>
					<h1><?php _e( 'The Team', 'business-identity' ); ?></h1>
				</div><!-- .twelve -->
			</div><!-- .row -->
			<div class="row">
				<div class="twelve column">
					<h1 class="instructions">
						<?php _e( 'This section of your home page is used to display team members who have at least one published post on your website. The author avatar, name, and description are all able to be configured on your user settings page.', 'business-identity' ); ?>
					</h1>
				</div><!-- .twelve -->
			</div><!-- .row-->
		</div><!-- .grid -->
	</section><!-- #team -->

<?php } ?>