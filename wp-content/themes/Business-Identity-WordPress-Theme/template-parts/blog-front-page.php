<?php
/**
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * Description: Front Page Blog template part
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

// Get recent posts quantity
$recent_posts_quantity = get_theme_mod( 'business_identity_recent_posts_quantity' );

// Bail if a user has selected 0 (int) for recent posts display
if ( 0 === $recent_posts_quantity ) {
	return;
}

// Show six recent posts by default on theme activation
if ( false === $recent_posts_quantity ) {
	$recent_posts_quantity = 6;
}

// Retrieve the tag that's been set for Featured Content and exclude it from the front page blog.
$featured_content_options = get_option( 'featured-content' );
$exclude_featured_tag     = array();
// Make sure that FC is turned on before doing things with its data
if ( ! empty( $featured_content_options['tag-id'] ) ) {
	$featured_tag         = ( ! empty( $featured_content_options['tag-name'] ) ) ? (string) $featured_content_options['tag-name'] : null;
	$featured_tag_data    = get_term_by( 'name', $featured_tag, 'post_tag' );
	$featured_tag_data    = ( ! empty( $featured_tag_data ) ) ? (object) $featured_tag_data : null;
	$featured_tag_id      = ( ! empty( $featured_tag_data->term_id ) ) ? (int) $featured_tag_data->term_id : null;
	$exclude_featured_tag = ( ! empty( $featured_tag_id ) ) ? array( $featured_tag_id ) : array();
}

$blog = new WP_Query(
	array(
		'post_type'				=> 'post',                 // get posts only
		'post_status'			=> 'publish',              // show only published posts
		'orderby'				=> 'date',                 // order posts by date
		'posts_per_page'		=> $recent_posts_quantity, // show six posts max on the home page
		'no_found_rows'			=> true,                   // pagination not needed
		'ignore_sticky_posts'	=> true,                   // ignore sticky posts
		'tag__not_in'			=> $exclude_featured_tag,  // ignore Featured Content
	)
); ?>

<?php if ( $blog->have_posts() ) : ?>

	<?php
		// Verify theme mods and ensure sensible defaults
		$recent_posts_label     = ( false === get_theme_mod( 'business_identity_recent_posts_label' ) ? __( 'Our Blog', 'business-identity' ) : get_theme_mod( 'business_identity_recent_posts_label' ) );
		$recent_posts_title     = ( false === get_theme_mod( 'business_identity_recent_posts_title' ) ? __( 'Latest Updates', 'business-identity' ) : get_theme_mod( 'business_identity_recent_posts_title' ) );
		$recent_posts_link_text = ( false === get_theme_mod( 'business_identity_recent_posts_cta_text' ) ? __( 'View Blog', 'business-identity' ) : get_theme_mod( 'business_identity_recent_posts_cta_text' ) );
	?>

	<section id="front-page-blog">
		<div class="grid">
			<div class="row">
				<div class="twelve column">
					<span class="label">
						<?php if ( ! empty( $recent_posts_label ) ) { ?>
							<?php echo esc_html( $recent_posts_label ); ?>
						<?php } ?>
					</span>
					<h1 class="front-page-blog-title">
						<?php if ( ! empty( $recent_posts_title ) ) { ?>
							<?php echo esc_html( $recent_posts_title ); ?>
						<?php } ?>
					</h1>
				</div><!-- .twelve -->
			</div><!-- .row -->

			<div class="row">
				<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
					<div class="twelve column">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="four column">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="front-entry-featured-image">
											<a href="<?php the_permalink(); ?>" rel="bookmark">
												<?php the_post_thumbnail( 'post-thumbnail' ); ?>
											</a>
										</div><!-- .front-entry-featured-image -->
									<?php endif; ?>
								</header>
								<div class="front-entry-content eight column">
									<?php business_identity_posted_on(); ?>
										<?php if ( '' != get_the_title() ) : ?>
											<h1 class="front-entry-title">
												<?php the_title(); ?>
											</h1><!-- .front-entry-title -->
									<?php endif; ?>
									<?php the_excerpt(); ?>
									<a class="continue-reading" href="<?php the_permalink(); ?>" rel="bookmark">
										<span><?php _e( 'Continue Reading', 'business-identity' ); ?></span>
									</a><!-- .continue-reading -->
								</div><!-- .front-entry-content -->
						</article><!-- #post-## -->
				</div><!-- .twelve -->
				<?php
					endwhile;
					wp_reset_postdata();
				?>

				<?php
					$blog_page_id = get_option( 'page_for_posts' );
					if ( ( '0' != $blog_page_id ) && ! empty( $recent_posts_link_text ) ) :
				?>
					<a class="call-to-action" href="<?php echo esc_url( get_the_permalink( $blog_page_id ) ); ?>">
						<?php
							if ( ! empty( $recent_posts_link_text ) ) {
								echo esc_html( $recent_posts_link_text );
							}
						?>
					</a><!-- .call-to-action -->
				<?php endif; ?>

			</div><!-- .row -->
		</div><!-- .grid -->
	</section><!-- #front-page-blog -->
<?php endif; ?>