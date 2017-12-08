<?php
/**
 * Register theme widgets.
 *
 * - `sidebar-1`: Primary Sidebar used throughout site.
 * - `sidebar-2`: Website Footer used throughout entire site.
 * - `sidebar-3`: Front Page Widget Area used in the front page template
 *
 * @see     function add_action
 * @see     function register_sidebar
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Primary Sidebar', 'business-identity' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'This sidebar appears on most pages throughout your website. Simply add any Available Widgets into this space in order to turn the sidebar on. Removing all widgets from this primary sidebar will automatically turn the sidebar off.', 'business-identity' ),
			'before_widget' => "<aside id='%1\$s' class='widget %2\$s'>\n", // Add line feeds for prettier HTML output
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => "</h1>\n",
			'after_widget'  => "</aside>\n",
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Website Footer', 'business-identity' ),
			'id'            => 'sidebar-2',
			'description'	=> __( 'Enhance your website with footer widgets that include more details about your business, like its phone number, physical address, email address, or social media links. This website footer will appear on every page of your website.', 'business-identity' ),
			'before_widget' => "<aside id='%1\$s' class='widget %2\$s'>\n", // Add line feeds for prettier HTML output
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => "</h1>\n",
			'after_widget'  => "</aside>\n",
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Front Page', 'business-identity' ),
			'id'            => 'sidebar-3',
			'description'	=> __( 'Widgets added into this space will be used on your static front page, which can be set from within the Customizer. If no custom front page is used then this widget area will automatically be disabled.', 'business-identity' ),
			'before_widget' => "<aside id='%1\$s' class='widget %2\$s'>\n", // Add line feeds for prettier HTML output
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => "</h1>\n",
			'after_widget'  => "</aside>\n",
		)
	);
} // end function business_identity_widgets_init
add_action( 'widgets_init', 'business_identity_widgets_init' );