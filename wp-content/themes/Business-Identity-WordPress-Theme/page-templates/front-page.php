<?php
/**
 * Template Name: Front Page
 *
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * 1.0 - Hero
 * 2.0 - Featured Content
 * 3.0 - Features and Services
 * 4.0 - Team
 * 5.0 - Blog
 * 6.0 - Testimonials
 * 7.0 - Special Offer
 * 8.0 - Front Page Widgets
 *
 * @see     function get_footer
 * @see     function get_header
 * @see     function get_template_part
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
get_header();

// 1.0 - Hero
get_template_part( 'template-parts/hero', 'front-page' );

// 2.0 - Featured Content
get_template_part( 'template-parts/featured', 'content' );

// 3.0 - Features and Services
get_template_part( 'template-parts/features', 'front-page' );

// 4.0 - Team
get_template_part( 'template-parts/team', 'front-page' );

// 5.0 - Blog
get_template_part( 'template-parts/blog', 'front-page' );

// 6.0 - Testimonials
get_template_part( 'template-parts/testimonials', 'front-page' );

// 7.0 - Special Offer
get_template_part( 'template-parts/special-offer', 'front-page' );

// 8.0 - Front Page Widgets
get_template_part( 'sidebars/sidebar', 'front-page' );

get_footer(); ?>