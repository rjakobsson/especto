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
 * The Template for displaying a single Testimonial.
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

get_header(); ?>

<?php // output custom header for testimonials
	business_identity_get_testimonial_header();
?>

<section id="page-header">
	<div class="grid">
		<div class="row">
			<div class="twelve column">
				<h1>
					<a href="<?php echo esc_url( home_url( '/testimonial' ) ); ?>">
						<?php _e( 'Testimonial', 'business-identity' ); ?>
					</a>
				</h1>
			</div><!-- .twelve -->
		</div><!-- .row -->
	</div><!-- .grid -->
</section><!-- #page-header -->

<div id="content" class="site-content">
	<div class="grid">
		<div class="row">
			<div class="eight column content-area">
				<div id="primary">
					<main id="main" class="site-main" role="main">
						<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								/*
								 * Include the post format-specific template for the content. If you want to
								 * use this in a child theme, then include a file called called content-___.php
								 * (where ___ is the post format) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'testimonial' );

								// Previous/next post navigation.
								business_identity_post_nav();
							endwhile;
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .eight -->

			<?php get_template_part( 'sidebars/sidebar', 'primary' ); ?>
		</div><!-- .row -->
	</div><!-- .grid -->
</div><!-- #content -->

<?php get_footer(); ?>