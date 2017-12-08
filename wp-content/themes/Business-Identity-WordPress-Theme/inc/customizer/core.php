<?php
/**
 * Core-supported enhancements and tweaks in the Customizer.
 *
 * @see     function get_control
 * @see     function get_section
 * @see     function get_setting
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

/**
 * Various postMessage support declarations for core-supported options
 *
 * Note: In some cases using the default refresh transport method for custom theme options
 * is better, especially when there's option-dependent markup present in the theme.
 */
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

/**
 * Tweaks for core-supported sections for better overall theme usability, especially for users
 * who are previewing the theme or have just activated the theme for the first time.
 */
$wp_customize->remove_control( 'blogdescription' );
$wp_customize->get_section( 'title_tagline' )->title           = __( 'Site Title', 'business-identity' );
$wp_customize->get_section( 'title_tagline' )->description     = __( 'The header of Business Identity was designed to include the site title, navigation menu, and website search input. Use this section to customize your website title. If you hide your website title, then the navigation menu will expand to fill the remaining space of your website header.', 'business-identity' );
$wp_customize->get_control( 'display_header_text' )->label     = __( 'Display Site Title', 'business-identity' );
$wp_customize->get_control( 'header_textcolor' )->label        = __( 'Site Title Color', 'business-identity' );
$wp_customize->get_section( 'header_image' )->description      = __( 'The header image will be displayed above all website content, including the website title and navigation menu.', 'business-identity' );
$wp_customize->get_section( 'background_image' )->description  = __( 'The background image will only be displayed when the website is in slim layout mode.', 'business-identity' );
$wp_customize->get_section( 'nav' )->description               = __( 'Business Identity supports 2 menus. Select which menu appears in each location. You can edit your menu content on the Menus screen in the Appearance section. The Primary Menu will be displayed at the top of your website near the website title, and the Secondary Menu will be displayed in the footer area of your website.', 'business-identity' );
$wp_customize->get_section( 'static_front_page' )->description = __( 'The magic of Business Identity really shines when you create and configure a <a href="http://en.support.wordpress.com/pages/front-page/">Static Front Page</a> for your website. <strong>It is highly recommended to create and set up your front page and posts page first</strong>, so that you will be able to more effectively make use of the configuration options available to you in your website customizer.', 'business-identity' );
$wp_customize->get_section( 'static_front_page' )->priority    = 10;
$wp_customize->get_control( 'page_on_front' )->priority        = 10;
$wp_customize->get_control( 'page_for_posts' )->priority       = 20;
$wp_customize->get_control( 'show_on_front' )->priority        = 30;