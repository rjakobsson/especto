<?php
/**
 * Search input visibility option in the Customizer
 *
 * @see     function add_control
 * @see     function add_setting
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
$wp_customize->add_setting(
	'business_identity_search_display',
	array(
		'default'	=> false,
		'sanitize_callback' => 'business_identity_sanitize_checkboxes',
	)
);
$wp_customize->add_control(
	'business_identity_search_display',
	array(
		'label'			=> __( 'Display search box in site header.', 'business-identity' ),
		'section'		=> 'nav',
		'type'			=> 'checkbox',
		'description'	=> __( 'If you would like to include a search box in your site navigation in desktop views, simply click this option. The search input box will always be visible to mobile visitors for easier navigation throughout your website.', 'business-identity' ),
	)
);