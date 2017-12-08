<?php
/**
 * Implement Custom Header functionality for Business Identity. We use
 * theme support and not add_custom_image_header (deprecated in 3.4) for this functionality.
 *
 * @see     function add_action
 * @see     function add_theme_support
 * @see     function apply_filters
 * @see     function bloginfo
 * @see     function esc_attr
 * @see     function get_header_image
 * @see     function get_header_textcolor
 * @see     function jetpack_has_site_logo
 * @see     function jetpack_the_site_logo
 * @link    http://codex.wordpress.org/Custom_Headers
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

function business_identity_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'business_identity_custom_header_args',
			array(
				'default-text-color'     => 'ffffff', // false or hex value of default color
				'width'                  => 1440,     // width in pixels of custom header image
				'height'                 => 422,      // height in pixels of custom header image
				'flex-height'            => true,     // allow flex-height custom headers
				'flex-width'             => true,     // allow flex-width custom headers
				'wp-head-callback'       => 'business_identity_header_style',       // callback used to output custom header styles on front-end
				'admin-head-callback'    => 'business_identity_admin_header_style', // callback used to style output on the Appearance > Header screen
				'admin-preview-callback' => 'business_identity_admin_header_image', // callback used to output custom header markup in Appearance > Header screen
			)
		)
	);
} // end function business_identity_custom_header_setup
add_action( 'after_setup_theme', 'business_identity_custom_header_setup' );

if ( ! function_exists( 'business_identity_header_style' ) ) :
	function business_identity_header_style() {
		$header_text_color = get_header_textcolor();

		/**
		 * There are three possible meaningul values for HEADER_TEXTCOLOR:
		 *
		 * - A text color given in hex that is the same as the default set in 'default-text-color'
		 * - A custom text color in hex which has been set by the user
		 * - 'blank', which indicates that a user has chosen to hide his site title
		 */
		if ( HEADER_TEXTCOLOR == $header_text_color ) {
			return;
		} ?>

		<style type="text/css">
			<?php if ( 'blank' == $header_text_color ) : ?>
				/* hide text */
				#page .site-title span,
				.custom-logo #page .site-title span:nth-child(2) {
					clip: rect( 1px, 1px, 1px, 1px );
					position: absolute !important;
					height: 1px;
					width: 1px;
					overflow: hidden;
				}
				.custom-logo #page .site-title span {
					clip: auto;
					position: relative !important;
					height: auto;
					width: auto;
					overflow: visible;
				}
				@media only screen
					and (min-width : 800px) {
						.no-js .main-navigation,
						.main-navigation {
							width: 100%;
						}
						#page .main-navigation > div {
							width: 80%;
						}
						#page .main-navigation .search-form {
							max-width: 211px;
						}
						#page .main-navigation .search-field {
							max-width: 200px;
						}
				}
				<?php if ( function_exists( 'jetpack_has_site_logo' ) && ! jetpack_has_site_logo() ) : ?>
					.site-branding {
						clip: rect( 1px, 1px, 1px, 1px );
						position: absolute !important;
						height: 1px;
						width: 1px;
						overflow: hidden;
					}
				<?php endif; ?>
				<?php if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) : ?>
					/* custom logo position adjustments on mobile */
					.custom-logo .site-title,
					.custom-logo .site-title a {
						margin: 0;
					}
					.custom-logo .site-title a,
					.custom-logo .site-title a img {
						display: block;
					}
					.custom-logo .site-title a {
						height: 58px;
					}
					.custom-logo .site-title a img {
						margin-top: 10px;
						margin-bottm: 0;
					}
					@media only screen
					and (min-width : 640px) {
						.custom-logo .site-title a,
						.custom-logo .site-title a img {
							display: inline-block;
						}
						.custom-logo .site-title a {
							height: auto;
						}
						.custom-logo .site-title a img {
							margin-top: 0;
						}
						.custom-logo #page .site-branding,
						.custom-logo #page .main-navigation {
							padding: 21px 0;
							min-height: 72px;
						}
						.custom-logo #page .main-navigation ul {
							padding: 10px 0;
						}
						.custom-logo .site-branding {
							padding: 0;
						}
						.custom-logo #page .main-navigation .search-form {
							margin-top: 3px;
						}
					}
					@media only screen
					and (min-width : 800px)
					and (max-width : 1024px) {
						.custom-logo .main-navigation {
							width: 90%;
						}
					}
					@media all and (min-width: 1025px) {
						.custom-logo .main-navigation {
							width: 92%;
						}
					}
				<?php endif; ?>
			<?php else : ?>
				#page .site-title a { /* Custom user-selected color for site title */
					color: #<?php echo esc_attr( $header_text_color ); ?>;
				}
			<?php endif; ?>
		</style>
		<?php
	} // end function business_identity_header_style
endif;

if ( ! function_exists( 'business_identity_admin_header_style' ) ) :
	/**
	 * Styles the header image displayed on the Appearance > Header admin panel.
	 */
	function business_identity_admin_header_style() {
	?>
		<style type="text/css">
			.appearance_page_custom-header #headimg {
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				border: none;
			}
			#header-image img {
				display: block;
				height: auto;
				margin: 0 auto;
				max-width: 100%;
			}
			.site-title {
				background: #433956;
				margin: 0;
				padding: 30px;
			}
			.site-title a {
				display: block;
			}
			.site-title,
			.site-title a {
				font-family: 'Lato', sans-serif;
				font-weight: 700;
				text-decoration: none;
				font-size: 28px;
				font-size: 1.75rem;
			}
			.site-logo {
				border: 0; /* Remove border when inside link element in IE 8/9/10 */
				height: auto; /* Ensure proper vertical scaling when images are responsively reduced horizontally */
				max-width: 48px;
				vertical-align: middle;
				margin-right: 10px;
			}
			.site-title span:nth-child(2) {
				position: relative;
				top: 3px;
			}
		</style>
	<?php
	} // end function business_identity_admin_header_style
endif;

if ( ! function_exists( 'business_identity_admin_header_image' ) ) :
	/**
	 * Create the custom header image markup displayed on the Appearance > Header screen.
	 */
	function business_identity_admin_header_image() {
		$style = get_header_textcolor();
	?>
		<div id="header-image">
			<?php if ( get_header_image() ) : ?>
				<img src="<?php header_image(); ?>" alt="">
			<?php endif; ?>
		</div><!-- #header-image -->

		<h1 class="site-title">
			<a id="name"<?php echo ' style="color:#' . esc_attr( $style ) . ';"'; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
					if ( function_exists( 'jetpack_the_site_logo' ) ) {
						jetpack_the_site_logo();
					}
				?>
				<span class="displaying-header-text"><?php bloginfo( 'name' ); ?></span>
			</a>
		</h1>
	<?php
	} // end function business_identity_admin_header_image
endif;