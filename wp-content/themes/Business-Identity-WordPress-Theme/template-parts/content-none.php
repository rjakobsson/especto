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
 * The template part for displaying messages when no content has been found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
?>

<section class="no-results not-found">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<?php // a blog is empty (no posts) and needs content ?>
		<p>
			<?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'business-identity' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
		</p>

	<?php elseif ( is_search() ) : ?>

		<?php // nothing found on search results pages ?>
		<p>
			<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'business-identity' ); ?>
		</p>
		<?php get_search_form(); ?>

	<?php elseif ( is_archive() ) : ?>

		<?php // nothing found on archive pages ?>
		<p>
			<?php _e( 'The archive page that you are looking for cannot be found. Please return to the home page or use the search form below to find what you are looking for.', 'business-identity' ); ?>
		</p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<?php // 404 page not found error ?>
		<p>
			<?php _e( 'The page you are looking for has either been removed or relocated.', 'business-identity' ); ?>
		</p>
		<p>
			<?php
				printf(
					__( 'Please return to the <a href="%1$s" rel="home">home page</a> or use the search form below to find what you are looking for.', 'business-identity' ),
					esc_url( home_url( '/' ) )
				);
			?>
		</p>
		<?php get_search_form(); ?>

	<?php endif; ?>
</section><!-- .no-results -->
