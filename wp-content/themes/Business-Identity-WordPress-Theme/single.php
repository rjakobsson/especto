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
 * The Template for displaying all single posts.
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

get_header(); ?>

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
								get_template_part( 'template-parts/content', get_post_format() );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}

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