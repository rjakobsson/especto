<?php
/**
 * Special Offer Banner
 *
 * @uses    function add_setting
 * @uses    function add_control
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
$wp_customize->add_setting(
	'business_identity_special_offer_label',
	array(
		'transport'			=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_special_offer_label',
	array(
		'label'		=> __( 'Special Offer Label', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 90,
	)
);
$wp_customize->add_setting(
	'business_identity_special_offer_title',
	array(
		'transport'			=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_special_offer_title',
	array(
		'label'		=> __( 'Special Offer Text', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 80,
	)
);
$wp_customize->add_setting(
	'business_identity_special_offer_cta_text',
	array(
		'transport'			=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'business_identity_special_offer_cta_text',
	array(
		'label'		=> __( 'Call to Action Title', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 100,
	)
);
$wp_customize->add_setting(
	'business_identity_special_offer_cta_link',
	array(
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'business_identity_special_offer_cta_link',
	array(
		'label'		=> __( 'Call to Action Link', 'business-identity' ),
		'section'	=> 'static_front_page',
		'type'		=> 'text',
		'priority'	=> 110,
	)
);