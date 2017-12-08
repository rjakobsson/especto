<?php
/**
 * Website Layout
 *
 * 1.0 - Layout
 * 2.0 - Default Sidebar Position
 * 3.0 - Breadcrumbs
 * 4.0 - Blog Content
 *
 * @see     function business_identity_sanitize_blog_content
 * @see     function business_identity_sanitize_checkboxes
 * @see     function business_identity_sanitize_sidebar_position
 * @see     function business_identity_sanitize_site_width
 *
 * @see     function add_control
 * @see     function add_setting
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

/**
 * 1.0 - Layout
 *
 * Allow users to set either a wide (default) or slim layout.
 */
$wp_customize->add_setting(
	'business_identity_site_width',
	array(
		'default'			=> 'wide',
		'sanitize_callback'	=> 'business_identity_sanitize_site_width',
	)
);
$wp_customize->add_control(
	'business_identity_site_width',
	array(
		'label'			=> __( 'Site Width', 'business-identity' ),
		'section'		=> 'business_identity_theme_options',
		'choices'		=> array(
			'wide'	=> __( 'Wide (Default)', 'business-identity' ),
			'slim'	=> __( 'Slim', 'business-identity' ),
		),
		'type'			=> 'select',
		'description'	=> __( 'Business Identity supports a wide layout (default) and a slim layout. Use this option to choose how you would like Business Identity to be displayed on your website.', 'business-identity' ),
		'priority'		=> 10,
	)
);

/**
 * 2.0 - Default Sidebar Position
 *
 * Allow the user to set the default sidebar position for the theme.
 */
$wp_customize->add_setting(
	'business_identity_sidebar_position',
	array(
		'default'			=> 'right',
		'sanitize_callback'	=> 'business_identity_sanitize_sidebar_position',
	)
);
$wp_customize->add_control(
	'business_identity_sidebar_position',
	array(
		'label'			=> __( 'Default Sidebar Position', 'business-identity' ),
		'section'		=> 'business_identity_theme_options',
		'choices'		=> array(
			'right'	=> __( 'Right (Default)', 'business-identity' ),
			'left'	=> __( 'Left', 'business-identity' ),
		),
		'type'			=> 'select',
		'description'	=> __( 'By default the Business Identity theme will show the primary sidebar on the right side of your website. Use this setting to change the default sidebar position to the left side of your website.', 'business-identity' ),
		'priority'		=> 20,
	)
);

/**
 * 3.0 - Breadcrumbs
 *
 * Allow users to disable breadcrumbs on pages.
 */
$wp_customize->add_setting(
	'business_identity_hide_breadcrumbs',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'business_identity_sanitize_checkboxes',
	)
);
$wp_customize->add_control(
	'business_identity_hide_breadcrumbs',
	array(
		'label'			=> __( 'Hide page breadcrumbs', 'business-identity' ),
		'description'	=> __( 'By default breadcrumbs are shown on all pages. Select this option to turn them off.', 'business-identity' ),
		'section'		=> 'business_identity_theme_options',
		'type'			=> 'checkbox',
		'priority'		=> 30,
	)
);

/**
 * 4.0 - Blog Content
 *
 * Allow users to view either excerpts or full posts on blog index and archive pages.
 */
$wp_customize->add_setting(
	'business_identity_content_mode',
	array(
		'default'			=> 'excerpt',
		'sanitize_callback' => 'business_identity_sanitize_blog_content',
	)
);
$wp_customize->add_control(
	'business_identity_content_mode',
	array(
		'label'			=> __( 'Blog Content', 'business-identity' ),
		'section'		=> 'business_identity_theme_options',
		'choices'		=> array(
			'excerpt'	=> __( 'Excerpt (Default)', 'business-identity' ),
			'full'		=> __( 'Full', 'business-identity' ),
		),
		'type'			=> 'select',
		'description'	=> __( 'Use this setting to determine whether excerpts or full content will show on your blog index and archive pages.', 'business-identity' ),
		'priority'		=> 40,
	)
);