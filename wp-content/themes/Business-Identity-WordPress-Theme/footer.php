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
 * Description: The template for displaying the global site footer.
 *
 * @see     function esc_html_e
 * @see     function esc_url
 * @see     function get_template_part
 * @see     function has_nav_menu
 * @see     function wp_footer
 * @see     function wp_nav_menu
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
?>
			<?php get_template_part( 'template-parts/content', 'flourish' ); ?>
			<?php get_template_part( 'sidebars/sidebar', 'website-footer' ); ?>

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="grid">
					<div class="row">
						<div class="twelve column">
							<div class="footer-divider">
								<?php if ( has_nav_menu( 'secondary' ) ) : ?>
									<nav class="secondary-navigation" role="navigation">
										<h1 class="screen-reader-text">
											<?php esc_html_e( 'Secondary Menu', 'business-identity' ); ?>
										</h1>

										<?php
											// Optional Secondary Menu
											wp_nav_menu(
												array(
													'theme_location' => 'secondary',
													'depth' => 1,
												)
											);
										?>
									</nav><!-- .secondary-navigation -->
								<?php endif; ?>
								
								<div class="site-info">
								<!--KLUDGE-->
									<ul class="social">
									    <li class="twitter"><a href="https://twitter.com/boxola"><span>Twitter</span></a></li>
									    <li class="facebook"><a href="https://www.facebook.com/revisionsbolag"><span>Facebook</span></a></li>
									    <li class="linkedin"><a href="https://se.linkedin.com/pub/ola-jakobsson/19/379/786"><span>LinkedIn</span></a></li>
									    <li class="instagram"><a href="http://instagram.com/especto_nkpg"><span>Instagram</span></a></li>
									</ul><!-- .social -->
								</div><!-- .site-info -->
							</div>
						</div><!-- .twelve -->
					</div><!-- .row -->
				</div><!-- .grid -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>
	</body>
</html>