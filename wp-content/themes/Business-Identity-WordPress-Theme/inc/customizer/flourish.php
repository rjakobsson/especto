<?php
/**
 * Flourish in the Customizer.
 *
 * @see     function add_setting
 * @see     function add_control
 * @see     function esc_url_raw
 * @see     function business_identity_sanitize_checkboxes
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
$wp_customize->add_setting(
	'business_identity_flourish',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);
$flourish_control = new WP_Customize_Image_Control(
	$wp_customize,
	'business_identity_flourish',
	array(
		'label'		=> __( 'Flourish', 'business-identity' ),
		'section'	=> 'static_front_page',
		'priority'	=> 300,
	)
);
$wp_customize->add_control(
	$flourish_control
);
$wp_customize->add_setting(
	'business_identity_flourish_display',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'business_identity_sanitize_checkboxes',
	)
);
$wp_customize->add_control(
	'business_identity_flourish_display',
	array(
		'label'		=> __( 'Display flourish on all pages', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'checkbox',
		'priority'	=> 301,
	)
);