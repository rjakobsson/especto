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
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

get_header();
get_template_part( 'template-parts/featured', 'content' ); ?>

<div id="content" class="site-content">
	<div class="grid">
		<div class="row">
			<div class="eight column content-area">
				<div id="primary">
					<main id="main" class="site-main" role="main">
						<?php if ( have_posts() ) : ?>

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
									/* Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_format() );
								?>

							<?php endwhile; ?>

								<?php business_identity_paging_nav(); ?>

						<?php else : ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .eight -->

			<?php get_template_part( 'sidebars/sidebar', 'primary' ); ?>
		</div><!-- .row -->
	</div><!-- .grid -->
</div><!-- #content -->

<?php get_footer(); ?>