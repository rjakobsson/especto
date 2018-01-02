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
 * Description: The header for our theme, which displays all of the <head>
 * section and the site header.
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<!-- Use the latest IE engine to render the page and execute JavaScript -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/css/custom.css" type="text/css">
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'business-identity' ); ?>
		</a>

		<?php do_action( 'before_header' ); ?>

		<?php if ( get_header_image() ) : ?>
			<div id="header-image">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="" />
				</a>
			</div><!-- #header-image -->
		<?php endif; ?>

		<?php
			// Site Top Content
			$site_top_content = get_theme_mod( 'business_identity_site_top_content' );
			if ( ! empty( $site_top_content ) || is_customize_preview() ) : ?>
				<section class="site-top-content">
					<div class="grid">
						<div class="row">
							<div class="twelve column">
								<?php echo wp_kses_post( $site_top_content ); ?>
							</div><!-- .twelve -->
						</div><!-- .row -->
					</div><!-- .grid -->
				</section><!-- .site-top-content --><?php
			endif;
		?>

		<header id="masthead" class="site-header" role="banner">
			<div class="grid">
				<div class="row">
					<div class="twelve column">
						<div class="site-branding">
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php
										if ( function_exists( 'jetpack_the_site_logo' ) ) {
											jetpack_the_site_logo();
										}
									?>
									<span><?php bloginfo( 'name' ); ?></span>
								</a>
							</h1><!-- .site-title -->
							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( ! empty( $description ) || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html( $description ); ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->

						<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle">
								<?php _e( 'Menu', 'business-identity' ); ?>
							</button><!-- .menu-toggle -->

							<?php
								// Display search form on all pages except 404 not found page and search results page
								if ( ! is_404() && ! is_search() ) {
									get_search_form();
								}

								wp_nav_menu(
									array(
										'theme_location' => 'primary',
										'menu_class' => 'primary-navigation',
										'depth' => 4,
									)
								);
							?>
						</nav><!-- #site-navigation -->
					</div><!-- .twelve -->
				</div><!-- .row -->
			</div><!-- .grid -->
		</header><!-- #masthead -->