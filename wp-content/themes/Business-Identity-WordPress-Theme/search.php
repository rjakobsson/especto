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
 * The template for displaying Search Results pages.
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

get_header(); ?>

<section id="page-header">
	<div class="grid">
		<div class="row">
			<div class="twelve column">
				<h1>
					<?php printf( __( 'Search Results for: %s', 'business-identity' ), '<span>' . get_search_query() . '</span>' ); ?>
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
						<?php if ( have_posts() ) : ?>

							<?php get_search_form(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'template-parts/content', 'search' ); ?>

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