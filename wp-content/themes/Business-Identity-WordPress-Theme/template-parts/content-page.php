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
 * @see     function comments_open
 * @see     function comments_template
 * @see     function edit_post_link
 * @see     function get_comments_number
 * @see     function get_template_part
 * @see     function get_the_ID
 * @see     function get_theme_mod
 * @see     function have_posts
 * @see     function post_class
 * @see     function the_content
 * @see     function the_post
 * @see     function wp_link_pages
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

$features_page_id = (int) get_theme_mod( 'business_identity_features_page' );
$post_id          = (int) get_the_ID(); ?>

<div id="content" class="site-content">
	<div class="grid">
		<div class="row">
			<div class="eight column content-area">
				<div id="primary">
					<main id="main" class="site-main" role="main">
						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-content">
									<?php
										/**
										 * If the page we're viewing has been chosen as the Features and Services page,
										 * then hide the content that comes before the <!--more--> tag.
										 */
										if ( $features_page_id == $post_id ) {
											the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'business-identity' ), true );
										}
										else {
											the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'business-identity' ) );
										}
										wp_link_pages(
											array(
												'before' => '<div class="page-links">' . __( 'Pages:', 'business-identity' ),
												'after'  => '</div>',
											)
										);
									?>
								</div><!-- .entry-content -->
								<?php edit_post_link( __( 'Edit', 'business-identity' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
							</article><!-- #post-## -->

							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() ) :
									comments_template();
								endif;
							?>

						<?php endwhile; ?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .eight -->

			<?php get_template_part( 'sidebars/sidebar', 'primary' ); ?>
		</div><!-- .row -->
	</div><!-- .grid -->
</div><!-- #content -->