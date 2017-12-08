<?php
/**
 * Website Team Display
 *
 * @see     function add_setting
 * @see     function add_control
 * @see     function business_identity_sanitize_checkboxes
 * @see     function sanitize_text_field
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
$wp_customize->add_setting(
	'business_identity_team_display',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'business_identity_sanitize_checkboxes',
	)
);
$wp_customize->add_control(
	'business_identity_team_display',
	array(
		'label'		=> __( 'Display Team Section', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'checkbox',
		'priority'	=> 68,
	)
);
$wp_customize->add_setting(
	'business_identity_team_label',
	array(
		'default'			=> __( 'People Involved', 'business-identity' ),
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_team_label',
	array(
		'label'		=> __( 'Team Label', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 66,
	)
);
$wp_customize->add_setting(
	'business_identity_team_title',
	array(
		'default'			=> __( 'The Team', 'business-identity' ),
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_team_title',
	array(
		'label'		=> __( 'Team Section Title', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 67,
	)
);