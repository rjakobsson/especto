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
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
			<?php the_post_thumbnail( 'business-identity-testimonial-avatar-single' ); ?>
		</div><!-- .featured-image -->
	<?php endif; // has_post_thumbnail check ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header>' ); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'business-identity' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->