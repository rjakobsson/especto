<?php
/**
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * Only show the hero banner if content has been explicity set
 * for the front page.
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * @see     function business_identity_hero_background
 * @see     function edit_post_link
 * @see     function get_the_content
 * @see     function have_posts
 * @see     function the_content
 * @see     function the_post
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php if ( '' != get_the_content() ) : ?>
		<section id="hero" <?php business_identity_hero_background( $post, 'business-identity-page-hero', '', false ); ?>>
			<div class="hero-wrapper">
				<div class="grid">
					<div class="row">
						<div class="twelve column">
							<div class="row">
								<div class="six column">
									<div class="hero-content">
										<?php the_content(); ?>
										<?php edit_post_link( __( 'Edit', 'business-identity' ), '<span class="edit-link">', '</span>' ); ?>
									</div><!-- .hero-content -->
								</div>
								<div class="six column"></div>
							</div>
						</div><!-- .twelve -->
					</div><!-- .row -->
				</div><!-- .grid -->
			</div><!-- .hero-wrapper -->
		</section><!-- #hero -->
	<?php endif; ?>
<?php endwhile; ?>