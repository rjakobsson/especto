<?php
/**
 * Post and page navigation.
 *
 * @see     function _e
 * @see     function _x
 * @see     function get_adjacent_post
 * @see     function get_next_posts_link
 * @see     function get_post
 * @see     function get_previous_posts_link
 * @see     function is_attachment
 * @see     function next_post_link
 * @see     function next_posts_link
 * @see     function previous_post_link
 * @see     function previous_posts_link
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

if ( ! function_exists( 'business_identity_paging_nav' ) ) :
	function business_identity_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		} ?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'business-identity' ); ?></h1>
			<div class="nav-links">
				<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous">
						<?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'business-identity' ) ); ?>
					</div><!-- .nav-previous -->
				<?php endif; ?>
				<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next">
						<?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'business-identity' ) ); ?>
					</div><!-- .nav-next -->
				<?php endif; ?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation --><?php
	} // end function business_identity_paging_nav
endif;

if ( ! function_exists( 'business_identity_post_nav' ) ) :
	function business_identity_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		} ?>
		<nav class="navigation post-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'business-identity' ); ?></h1>
			<div class="nav-links">
				<?php
					previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'business-identity' ) );
					next_post_link( '<div class="nav-next">%link</div>', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'business-identity' ) );
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation --><?php
	} // end function business_identity_post_nav
endif;