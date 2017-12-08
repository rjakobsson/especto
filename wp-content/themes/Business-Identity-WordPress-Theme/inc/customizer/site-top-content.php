<?php
/**
 * Site top content
 *
 * @see     function add_control
 * @see     function add_setting
 * @see     function business_identity_sanitize_site_top_content_alignment
 * @see     function wp_kses_post
 * @package Business_Identity
 * @since   Business Identity 2.0
 */
$wp_customize->add_setting(
	'business_identity_site_top_content',
	array(
		'sanitize_callback'	=> 'wp_kses_post',
	)
);
$wp_customize->add_control(
	'business_identity_site_top_content',
	array(
		'label'			=> __( 'Site Top Content', 'business-identity' ),
		'section'		=> 'business_identity_theme_options',
		'type'			=> 'textarea',
		'priority'		=> 1,
		'description'	=> __( 'Add content into the top of your website, like business contact information or special announcements.', 'business-identity' ),
	)
);
$wp_customize->add_setting(
	'business_identity_site_top_content_alignment',
	array(
		'default'			=> 'right',
		'sanitize_callback'	=> 'business_identity_sanitize_site_top_content_alignment',
	)
);
$wp_customize->add_control(
	'business_identity_site_top_content_alignment',
	array(
		'label'			=> __( 'Site Top Content Alignment', 'business-identity' ),
		'section'		=> 'business_identity_theme_options',
		'choices'		=> array(
			'left'		=> __( 'Left', 'business-identity' ),
			'center'	=> __( 'Center', 'business-identity' ),
			'right'		=> __( 'Right (Default)', 'business-identity' ),
			'justify'	=> __( 'Justify', 'business-identity' ),
		),
		'type'			=> 'select',
		'priority'		=> 2,
	)
);