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
	<header class="entry-header">
		<?php if ( ! is_single() && is_sticky() ) : ?>
			<div class="featured-post">
				<?php _e( 'Featured', 'business-identity' ); ?>
			</div><!-- .featured-post -->
		<?php endif; // is_sticky check ?>
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-date">
				<?php business_identity_posted_on(); ?>
				<?php if ( is_single() ) : ?>
					<span class="bookmark">
						<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php _e( 'Bookmark', 'business-identity' ); ?>
						</a>
					</span><!-- .bookmark -->
				<?php endif; ?>
			</div>
		<?php endif; // get_post_type check ?>
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php if ( ! is_single() && has_post_thumbnail() ) : ?>
			<div class="featured-image">
				<?php
					if ( ! is_post_type_archive( 'jetpack-testimonial' ) ) {
						if ( is_active_sidebar( 'sidebar-1' ) ) {
							the_post_thumbnail( 'business-identity-index-thumbnail' );
						} else {
							the_post_thumbnail( 'business-identity-index-thumbnail-full' );
						}
					}
					else {
						the_post_thumbnail( 'business-identity-testimonial-avatar-single' );
					}
				?>
			</div><!-- .featured-image -->
		<?php endif; // has_post_thumbnail check ?>

		<?php if ( ! is_singular() && 'full' !== get_theme_mod( 'business_identity_content_mode' ) ) : ?>
			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div><!-- .entry-excerpt -->
		<?php else : ?>
			<div class="entry-content-wrapper">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'business-identity' ) ); ?>
				<?php
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'business-identity' ),
							'after'  => '</div>',
						)
					);
				?>
			</div><!-- .entry-content-wrapper -->
		<?php endif; ?>

	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'business-identity' ) );
				if ( $categories_list && business_identity_categorized_blog() ) :
			?>
				<span class="entry-categories">
					<?php echo $categories_list; ?>
				</span><!-- .entry-categories -->
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'business-identity' ) );
				if ( $tags_list ) :
			?>
				<span class="entry-tags">
					<?php echo $tags_list; ?>
				</span><!-- .entry-tags -->
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! is_single() && ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link">
				<?php
					comments_popup_link(
						__( 'Leave a comment', 'business-identity' ),
						__( '1 Comment', 'business-identity' ),
						__( '% Comments', 'business-identity' )
					);
				?>
			</span><!-- .comments-link -->
		<?php endif; // end comments link conditional ?>

		<?php edit_post_link( __( 'Edit', 'business-identity' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
