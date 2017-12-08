<?php
/**
 * Features and Services in the Customizer.
 *
 * @see     function add_setting
 * @see     function add_control
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
$wp_customize->add_setting(
	'business_identity_features_cta_text',
	array(
		'transport'			=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_features_cta_text',
	array(
		'label'		=> __( 'Features and Services Button Text', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 60,
	)
);
$wp_customize->add_setting(
	'business_identity_features_label',
	array(
		'transport'			=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_features_label',
	array(
		'label'		=> __( 'Features and Services Label', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 50,
	)
);
$wp_customize->add_setting(
	'business_identity_features_page',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_features_page',
	array(
		'label'		=> __( 'Features and Services Page', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'dropdown-pages',
		'priority'	=> 40,
	)
);