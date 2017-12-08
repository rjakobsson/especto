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
 * Description: The template for displaying featured content.
 *
 * This file should only load if there are featured posts present,
 * but we'll also want to make sure that if it's called directly then,
 * there are proper checks in place to make sure that featured content
 * exists before proceeding.
 *
 * @see     function business_identity_get_featured_posts
 * @see     function business_identity_has_featured_posts
 * @see     function business_identity_hero_background
 *
 * @see     function count
 * @see     function do_action
 * @see     function esc_url
 * @see     function get_permalink
 * @see     function get_theme_mod
 * @see     function has_excerpt
 * @see     function is_front_page
 * @see     function setup_postdata
 * @see     function the_excerpt
 * @see     function the_title
 * @see     function wp_reset_postdata
 * @package Business_Identity
 * @since   Business Identity 2.0
 */

// Bail immediately if not on the front page
if ( ! is_front_page() && ! is_page_template( 'page-templates/featured-content.php' ) ) {
	return;
}

// Bail if no featured content posts have been found
if ( ! business_identity_has_featured_posts() ) {
	return;
}

// Determine featured thumbnail size and height
$size   = 'business-identity-page-hero';
$height = true;
if ( 'mosaic' == get_theme_mod( 'business_identity_featured_content_design' ) ) {
	$size   = 'business-identity-mosaic-tile';
	$height = false;
}

// Fire action just before featured content.
do_action( 'business_identity_featured_posts_before' );

// Get the featured content and randomize if necessary
$featured_posts = business_identity_get_featured_posts();
if ( true === get_theme_mod( 'business_identity_featured_content_randomize' ) ) {
	shuffle( $featured_posts );
}
$featured_posts_quantity = (int) count( $featured_posts );
?>
<section id="featured-content" class="featured-content-<?php echo esc_attr( $featured_posts_quantity ); ?>">

<?php
// Loop through Featured Content
foreach ( (array) $featured_posts as $order => $post ) :
	setup_postdata( $post );
?>

	<article id="post-<?php the_ID(); ?>" <?php business_identity_hero_background( $post, $size, '', $height ); ?>>
		<div class="article-liner">
			<div class="grid">
				<div class="row">
					<div class="twelve column">
						<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ); ?>
						<?php if ( has_excerpt() ) : ?>
							<div class="entry-summary">
								<?php the_excerpt(); ?>
							</div><!-- .entry-summary -->
						<?php endif; ?>
					</div><!-- .twelve -->
				</div><!-- .row -->
			</div><!-- .grid -->
		</div><!-- .article-liner -->
	</article><!-- #post-## -->

<?php
// End featured content loop and reset post data.
endforeach; wp_reset_postdata();?>

</section><!-- #featured-content --><?php

// Fire action just after featured content.
do_action( 'business_identity_featured_posts_after' );