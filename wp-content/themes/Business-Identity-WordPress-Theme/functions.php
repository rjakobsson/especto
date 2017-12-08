<?php
/**
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * Description: Business Identity functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 *  1.0 - Theme Setup
 *  2.0 - Helper Functions
 *  3.0 - $content_width
 *  4.0 - Custom Header
 *  5.0 - Google Fonts
 *  6.0 - Customizer
 *  7.0 - Template Tags
 *  8.0 - Extras
 *  9.0 - Jetpack
 * 10.0 - Body Classes
 * 11.0 - Scripts and Styles
 * 12.0 - Widgets
 * 13.0 - Custom Background
 *
 * @link    http://codex.wordpress.org/Plugin_API
 * @see     function get_template_directory
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

// 1.0 - Theme Setup
require get_template_directory() . '/inc/theme-setup.php';

// 2.0 - Helper Functions
require get_template_directory() . '/inc/helpers.php';

// 3.0 - $content_width
require get_template_directory() . '/inc/content-width.php';

// 4.0 - Custom Header
require get_template_directory() . '/inc/custom-header.php';

// 5.0 - Google Fonts
require get_template_directory() . '/inc/custom-fonts.php';

// 6.0 - Customizer
require get_template_directory() . '/inc/customizer.php';

// 7.0 - Template Tags
require get_template_directory() . '/inc/template-tags.php';

// 8.0 - Extras
require get_template_directory() . '/inc/extras.php';

// 9.0 - Jetpack
require get_template_directory() . '/inc/jetpack.php';

// 10.0 - Body Classes
require get_template_directory() . '/inc/body-classes.php';

// 11.0 - Scripts and Styles
require get_template_directory() . '/inc/scripts.php';

// 12.0 - Widgets
require get_template_directory() . '/inc/widgets.php';

// 13.0 - Custom Background
require get_template_directory() . '/inc/custom-background.php';