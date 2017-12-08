<?php
/**
 * Breadcrumbs for Pages
 *
 * Breadcrumb navigation is present on all pages for better
 * information discovery, especially on mobile devices.
 *
 * @see     function _e
 * @see     function esc_url
 * @see     function get_permalink
 * @see     function get_post_ancestors
 * @see     function get_the_title
 * @see     function get_theme_mod
 * @see     function home_url
 * @see     function is_front_page
 * @see     function is_page
 * @see     function the_title
 * @link    https://support.google.com/webmasters/answer/185417?hl=en
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

if ( ! function_exists( 'business_identity_breadcrumbs' ) ) :
	function business_identity_breadcrumbs( $post = null ) {
		if ( empty( $post ) && isset( $GLOBALS['post'] ) ) {
			$post = $GLOBALS['post']->ID;
		}

		// Bail if breadcrumbs are turned off
		if ( true === get_theme_mod( 'business_identity_hide_breadcrumbs' ) ) {
			return;
		}

		// Bail if we're not on a page or on the front page of the site
		if ( ! is_page( $post ) || is_front_page() ) {
			return;
		}

		// Grab IDs of all page ancestors and reverse their order for proper breadcrumb trail
		$page_ancestors = array_reverse( get_post_ancestors( $post ) ); ?>

		<section id="breadcrumbs">
			<div class="grid">
				<div class="row">
					<div class="twelve column">
						<nav class="entry-breadcrumbs" role="navigation">
							<h1 class="screen-reader-text">
								<?php _e( 'Website Breadcrumbs', 'business-identity' ); ?>
							</h1>

							<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url">
									<span itemprop="title">
										<?php _e( 'Home', 'business-identity' ); ?>
									</span>
								</a>
							</div><!-- .breadcrumb -->

							<?php if ( ! empty( $page_ancestors ) ) :
								foreach ( $page_ancestors as $ancestor_id ) { ?>
									<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb">
										<a href="<?php echo esc_url( get_permalink( $ancestor_id ) ); ?>" itemprop="url">
											<span itemprop="title">
												<?php echo get_the_title( $ancestor_id ); ?>
											</span>
										</a>
									</div><!-- .breadcrumb --><?php
								}
							endif; ?>

							<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb">
								<span itemprop="title">
									<?php the_title(); ?>
								</span>
							</div><!-- .breadcrumb -->
						</nav><!-- .entry-breadcrumbs -->
					</div><!-- .twelve -->
				</div><!-- .row -->
			</div><!-- .grid -->
		</section><!-- #breadcrumbs --><?php
	} // end function business_identity_breadcrumbs
endif;