<?php
/**
 * Template Name: Alternate Sidebar Page
 *
 * This page template will allow users to set an alternate sidebar position on the fly.
 *
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * @see     function get_footer
 * @see     function get_header
 * @see     function get_template_part
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

get_header();
get_template_part( 'template-parts/featured', 'content' );
get_template_part( 'template-parts/header', 'page' );
get_template_part( 'template-parts/content', 'page' );
get_footer(); ?>