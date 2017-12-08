<?php
/**
 * Jetpack-specific options in the Customizer.
 *
 * 1.0 - Site Logo
 * 2.0 - Featured Content
 *       2.1 - Design
 *       2.2 - Quantity
 *       2.3 - Randomize
 *       2.4 - Text Alignment
 *       2.5 - Slideshow Mode
 *       2.6 - Speed (@since v2.1.3)
 * 3.0 - Testimonials
 *       3.1 - Front page testimonials
 *       3.2 - Randomize testimonials
 *
 * @see     function business_identity_get_additional_image_sizes
 *
 * @see     function business_identity_sanitize_checkboxes
 * @see     function business_identity_sanitize_featured_content_alignment
 * @see     function business_identity_sanitize_featured_content_design
 *
 * @see     function absint
 * @see     function add_control
 * @see     function add_setting
 * @see     function admin_url
 * @see     function get_control
 * @see     function get_section
 * @see     function sanitize_text_field
 * @link    http://jetpack.me
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

$site_logo = $wp_customize->get_control( 'site_logo' );
if ( ! empty( $site_logo ) ) :
	// 1.0 - Site Logo
	$additional_image_sizes = business_identity_get_additional_image_sizes();
	$site_logo_dimensions   = ! empty( $additional_image_sizes['business-identity-custom-logo'] ) ? $additional_image_sizes['business-identity-custom-logo'] : array();
	$site_logo_width        = ! empty( $site_logo_dimensions ) ? (int) $site_logo_dimensions['width'] / 2 : 9999;
	$site_logo_height       = ! empty( $site_logo_dimensions ) ? (int) $site_logo_dimensions['height'] / 2 : 9999;
	$wp_customize->get_control( 'site_logo' )->description = sprintf( __( 'Add a logo to the left of your website title. The maximum display size of your logo will be %1$s pixels wide by %2$s pixels tall.', 'business-identity' ), absint( $site_logo_width ), absint( $site_logo_height ) );
endif;

$featured_content = $wp_customize->get_section( 'featured_content' );
if ( ! empty( $featured_content ) ) :
	// 2.0 - Featured Content
	$wp_customize->get_section( 'featured_content' )->title                 = __( 'Featured Website Content', 'business-identity' );
	$wp_customize->get_section( 'featured_content' )->description           = sprintf( __( 'Easily feature a set of blog posts or static pages on your front page using any existing <a href="%1$s">tag</a> of your choice.', 'business-identity' ), esc_url( admin_url( '/edit-tags.php' ) ) );
	$wp_customize->get_section( 'featured_content' )->active_callback       = 'is_front_page';
	$wp_customize->get_section( 'featured_content' )->priority              = 3;
	$wp_customize->get_control( 'featured-content[hide-tag]' )->label       = __( 'Hide in tag clouds and post meta.', 'business-identity' );
	$wp_customize->get_control( 'featured-content[hide-tag]' )->description = __( 'When this option is checked, the tag that you have chosen for your featured content area will not be shown in your blog post tag list or within tag clouds throughout your website. If this option is not checked, the tag you enter will be treated like any other tag on your website.', 'business-identity' );
	$wp_customize->get_control( 'featured-content[show-all]' )->description = __( 'By default featured content will only be included on your front page. Select this option to show your featured content in all post listings.', 'business-identity' );
	$wp_customize->get_control( 'featured-content[tag-name]' )->priority    = 1;
	$wp_customize->get_control( 'featured-content[hide-tag]' )->priority    = 100;
	$wp_customize->get_control( 'featured-content[show-all]' )->priority    = 101;

	/**
	 * Custom options for Featured Content
	 *
	 * Design            Allow users to choose between three unique designs for their Featured Content area.
	 * Quantity          Allow users to set a specific quantity for featured content. Adding in an explicit
	 *                   option for this will let people take advantage of showing featured content tags in clouds
	 *                   and post meta while also having a reasonable number of posts show on the home page. Otherwise,
	 *                   the utility of showing featured content tags in clouds and post meta is lost if the maximum number of
	 *                   featured content posts that we allow in the theme will make tag views for FC be useless.
	 *                   Example: 10 posts are considered important, but a user only wants to feature 3 on the home page.
	 * Randomize         Allow users to randomize featured content on the home page.
	 * Slideshow Mode    Add in slideshow mode that will hide text on the featured content slider but also allow people to
	 *                   click through to see the post and page featured content.
	 * Text Alignment    Allow users to control the position of text overlays on their featured content slides.
	 * Speed             Allow users to control the speed of the slider. Default is 0 (manual navigation).
	 */
	// 2.1 - Design
	$wp_customize->add_setting(
		'business_identity_featured_content_design',
		array(
			'default'	=> 'slider',
			'sanitize_callback' => 'business_identity_sanitize_featured_content_design',
		)
	);
	$wp_customize->add_control(
		'business_identity_featured_content_design',
		array(
			'label'			=> __( 'Design', 'business-identity' ),
			'description'	=> __( 'Choose from either a carousel view (Slider), grid view (Mosaic), or super-wide view (Full Screen) for your featured home page posts and make them shine.', 'business-identity' ),
			'section'		=> 'featured_content',
			'type'			=> 'select',
			'choices'		=> array(
				'slider'		=> __( 'Slider (Default)', 'business-identity' ),
				'mosaic'		=> __( 'Mosaic', 'business-identity' ),
				'fullscreen'	=> __( 'Full Screen', 'business-identity' ),
			),
			'priority'		=> 10,
		)
	);
	// 2.2 - Quantity
	$wp_customize->add_setting(
		'business_identity_featured_content_quantity',
		array(
			'default'			=> 3,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'business_identity_featured_content_quantity',
		array(
			'label'			=> __( 'Quantity', 'business-identity' ),
			'description'	=> __( 'Choose the number of featured posts that you would like to show on your website home page. These will either be displayed in a slider, mosaic, or full screen view depending on which Design option you choose for your featured content.', 'business-identity' ),
			'section'		=> 'featured_content',
			'type'			=> 'select',
			'choices'		=> array(
				1	=> __( '1', 'business-identity' ),
				2	=> __( '2', 'business-identity' ),
				3	=> __( '3 (Default)', 'business-identity' ),
				4	=> __( '4', 'business-identity' ),
				5	=> __( '5', 'business-identity' ),
				6	=> __( '6', 'business-identity' ),
				7	=> __( '7', 'business-identity' ),
				8	=> __( '8', 'business-identity' ),
				9	=> __( '9', 'business-identity' ),
				10	=> __( '10', 'business-identity' ),
				11	=> __( '11', 'business-identity' ),
				12	=> __( '12', 'business-identity' ),
			),
			'priority'		=> 20,
		)
	);
	// 2.3 - Randomize
	$wp_customize->add_setting(
		'business_identity_featured_content_randomize',
		array(
			'default'			=> false,
			'sanitize_callback'	=> 'business_identity_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control(
		'business_identity_featured_content_randomize',
		array(
			'label'			=> __( 'Randomize Featured Content', 'business-identity' ),
			'description'	=> __( 'By default Featured Content will show in chronological order across your site. Click this option to randomize its order.', 'business-identity' ),
			'section'		=> 'featured_content',
			'type'			=> 'checkbox',
			'priority'		=> 21,
		)
	);
	// 2.4 - Text Alignment
	$wp_customize->add_setting(
		'business_identity_featured_content_alignment',
		array(
			'default'			=> 'left',
			'sanitize_callback' => 'business_identity_sanitize_featured_content_alignment',
		)
	);
	$wp_customize->add_control(
		'business_identity_featured_content_alignment',
		array(
			'label'			=> __( 'Text Alignment', 'business-identity' ),
			'section'		=> 'featured_content',
			'type'			=> 'select',
			'choices'		=> array(
				'left'		=> __( 'Left (Default)', 'business-identity' ),
				'center'	=> __( 'Center', 'business-identity' ),
				'right'		=> __( 'Right', 'business-identity' ),
				'justify'	=> __( 'Justify', 'business-identity' ),
			),
			'priority'		=> 30,
		)
	);
	// 2.5 - Slideshow Mode
	$wp_customize->add_setting(
		'business_identity_featured_content_slideshow_mode',
		array(
			'default'			=> false,
			'sanitize_callback'	=> 'business_identity_sanitize_checkboxes',
			'transport'			=> 'postMessage',
		)
	);
	$wp_customize->add_control(
		'business_identity_featured_content_slideshow_mode',
		array(
			'label'			=> __( 'Slideshow Mode', 'business-identity' ),
			'description'	=> __( 'By default your Featured Content slider will show custom text on top of it. If you would instead like to display clickable slideshow images, select this option.', 'business-identity' ),
			'section'		=> 'featured_content',
			'type'			=> 'checkbox',
			'priority'		=> 31,
		)
	);
	// 2.6 - Speed
	$wp_customize->add_setting(
		'business_identity_featured_content_speed',
		array(
			'default'			=> 0,
			'sanitize_callback'	=> 'absint',
		)
	);
	$wp_customize->add_control(
		'business_identity_featured_content_speed',
		array(
			'label'				=> __( 'Speed', 'business-identity' ),
			'description'		=> __( 'Choose between a manual, slow, normal, and fast transition between your slides.', 'business-identity' ),
			'section'			=> 'featured_content',
			'type'				=> 'select',
			'choices'			=> array(
				0				=> __( 'Manual (Default)', 'business-identity' ),
				9000			=> __( 'Slow', 'business-identity' ),
				6000			=> __( 'Normal', 'business-identity' ),
				3000			=> __( 'Fast', 'business-identity' ),
			),
			'priority'			=> 11,
			'active_callback'	=> 'business_identity_featured_content_speed_display',
		)
	);
	function business_identity_featured_content_speed_display() {
		$business_identity_featured_content_design = get_theme_mod( 'business_identity_featured_content_design' );
		if ( empty( $business_identity_featured_content_design ) || 'slider' == $business_identity_featured_content_design ) {
			return true;
		}

		return false;
	} // end function business_identity_featured_content_speed_display
endif;

$jetpack_testimonials = $wp_customize->get_section( 'jetpack_testimonials' );
if ( ! empty( $jetpack_testimonials ) ) :
	// 3.0 - Testimonials
	$wp_customize->get_control( 'jetpack_testimonials[page-title]' )->label        = __( 'Testimonials Page Title', 'business-identity' );
	$wp_customize->get_control( 'jetpack_testimonials[page-content]' )->label      = __( 'Testimonials Page Content', 'business-identity' );
	$wp_customize->get_control( 'jetpack_testimonials[featured-image]' )->label    = __( 'Testimonials Page Featured Image', 'business-identity' );
	$wp_customize->get_section( 'jetpack_testimonials' )->title                    = __( 'Customer Testimonials', 'business-identity' );
	$wp_customize->get_section( 'jetpack_testimonials' )->description              = __( '<em>Business Identity</em> supports customer testimonials, which are very easy to set up. Go to <em>Testimonials &rarr; Add New</em>, and that&#8217;s all there is to it. Testimonials will show on your <a href="http://businessidentitydemo.wordpress.com/docs/front-page-template/">home page</a> and also have <a href="http://businessidentitydemo.wordpress.com/testimonial/">special archive</a> views available.', 'business-identity' );
	$wp_customize->get_control( 'jetpack_testimonials[page-content]' )->priority   = 40;
	$wp_customize->get_control( 'jetpack_testimonials[page-title]' )->priority     = 30;
	$wp_customize->get_control( 'jetpack_testimonials[featured-image]' )->priority = 20;

	// 3.1 - Front page testimonials
	$wp_customize->add_setting(
		'business_identity_testimonials_heading',
		array(
			'default'			=> __( 'What Our Customers Think', 'business-identity' ),
			'sanitize_callback'	=> 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'business_identity_testimonials_heading',
		array(
			'label'			=> __( 'Testimonials Section Heading', 'business-identity' ),
			'description'	=> __( '(Displayed on the static front page of your site.)', 'business-identity' ),
			'section'		=> 'jetpack_testimonials',
			'type'			=> 'text',
			'priority'		=> 10,
		)
	);

	// 3.2 - Randomize testimonials
	$wp_customize->add_setting(
		'business_identity_testimonials_randomize',
		array(
			'default'			=> false,
			'sanitize_callback'	=> 'business_identity_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control(
		'business_identity_testimonials_randomize',
		array(
			'label'			=> __( 'Randomize Front Page Testimonials', 'business-identity' ),
			'description'	=> __( 'By default Testimonials will show in chronological order on the front page of your site. Click this option in order to randomize their order.', 'business-identity' ),
			'section'		=> 'jetpack_testimonials',
			'type'			=> 'checkbox',
			'priority'		=> 50,
		)
	);
endif;