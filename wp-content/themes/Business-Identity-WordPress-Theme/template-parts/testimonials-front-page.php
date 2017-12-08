<?php
/**
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * Testimonials template part
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

/**
 * Allow the use of more tags
 *
 * @link http://codex.wordpress.org/Function_Reference/the_content
 */
global $more; ?>

<?php
	// Testimonials orderby check
	if ( true === get_theme_mod( 'business_identity_testimonials_randomize' ) ) {
		$orderby = 'rand';
	} else {
		$orderby = 'date';
	}

	// Testimonials query
	$testimonials = new WP_Query(
		array(
			'post_type' => 'jetpack-testimonial', // get testimonials
			'post_status' => 'publish', // show only published posts
			'orderby' => $orderby, // order posts by date or random, depending on user setting
			'posts_per_page' => 4, // show six posts max on the home page
			'no_found_rows' => true, // pagination not needed
		)
	);
?>

<?php if ( $testimonials-> have_posts() ) : ?>
	<section id="testimonials">
		<div class="grid">
			<div class="row">
				<div class="twelve column">
					<?php
						$testimonials_label = get_theme_mod( 'jetpack_testimonials' );
						if ( ! empty( $testimonials_label['page-title'] ) ) {
							$testimonials_label = $testimonials_label['page-title'];
						} else {
							$testimonials_label = false;
						}
						$testimonials_heading = get_theme_mod( 'business_identity_testimonials_heading' );

						if ( ! empty( $testimonials_label ) ) : ?>
							<span class="label">
								<a href="<?php echo esc_url( home_url( '/testimonial/' ) ); ?>"><?php
									echo esc_html( $testimonials_label ); ?>
								</a>
							</span><?php
						endif;

						if ( ! empty( $testimonials_heading ) ) : ?>
							<h1><?php
								echo esc_html( $testimonials_heading ); ?>
							</h1><?php
						endif;
					?>
				</div><!-- .twelve -->
			</div><!-- .row -->
			<div class="row">
				<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); $more = 0; ?>
					<div class="three column">
						<div class="testimonial">
							<?php the_content( '' ); ?>
						</div><!-- .testimonial -->
						<div class="author">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'business-identity-testimonial-avatar' ); ?>
							<?php endif; ?>
							<span>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
									<?php the_title(); ?>
								</a>
							</span>
						</div><!-- .author -->
					</div><!-- .three -->
				<?php
					endwhile;
					wp_reset_postdata();
				?>
			</div><!-- .row -->
		</div><!-- .grid -->
	</section><!-- #testimonials -->
<?php endif; ?>