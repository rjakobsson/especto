<?php
/**
 * Front Page Recent Posts
 *
 * @see     function add_setting
 * @see     function add_control
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
$wp_customize->add_setting(
	'business_identity_recent_posts_quantity',
	array(
		'default'			=> 6,
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'business_identity_recent_posts_quantity',
	array(
		'label'			=> __( 'Recent Posts Quantity', 'business-identity' ),
		'description'	=> __( 'Choose the number of recent posts that you would like to show on your static front page.', 'business-identity' ),
		'section'		=> 'static_front_page',
		'type'			=> 'select',
		'choices'		=> array(
			0	=> __( '0', 'business-identity' ),
			1	=> __( '1', 'business-identity' ),
			2	=> __( '2', 'business-identity' ),
			3	=> __( '3', 'business-identity' ),
			4	=> __( '4', 'business-identity' ),
			5	=> __( '5', 'business-identity' ),
			6	=> __( '6 (Default)', 'business-identity' ),
			7	=> __( '7', 'business-identity' ),
			8	=> __( '8', 'business-identity' ),
			9	=> __( '9', 'business-identity' ),
			10	=> __( '10', 'business-identity' ),
			11	=> __( '11', 'business-identity' ),
			12	=> __( '12', 'business-identity' ),
		),
		'priority'		=> 75,
	)
);
$wp_customize->add_setting(
	'business_identity_recent_posts_label',
	array(
		'default'			=> __( 'Our Blog', 'business-identity' ),
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_recent_posts_label',
	array(
		'label'		=> __( 'Recent Posts Label', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 76,
	)
);
$wp_customize->add_setting(
	'business_identity_recent_posts_title',
	array(
		'default'			=> __( 'Latest Updates', 'business-identity' ),
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_recent_posts_title',
	array(
		'label'		=> __( 'Recent Posts Section Title', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 77,
	)
);
$wp_customize->add_setting(
	'business_identity_recent_posts_cta_text',
	array(
		'default'			=> __( 'View Blog', 'business-identity' ),
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_recent_posts_cta_text',
	array(
		'label'		=> __( 'Recent Posts Button Text', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 78,
	)
);