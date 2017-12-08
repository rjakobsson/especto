<?php
/**
 * Jetpack Compatibility File
 *
 * 1.0 - Responsive Videos
 * 2.0 - Site Logo
 * 3.0 - Sharing
 * 4.0 - Testimonials
 * 5.0 - Infinite Scroll
 * 6.0 - Featured Content
 *
 * @link    http://jetpack.me/
 * @see     function get_template_directory
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

// 1.0 - Responsive Videos
require get_template_directory() . '/inc/jetpack/responsive-videos.php';

// 2.0 - Site Logo
require get_template_directory() . '/inc/jetpack/site-logo.php';

// 3.0 - Sharing
require get_template_directory() . '/inc/jetpack/sharing.php';

// 4.0 - Testimonials
require get_template_directory() . '/inc/jetpack/testimonials.php';

// 5.0 - Infinite Scroll
require get_template_directory() . '/inc/jetpack/infinite-scroll.php';

// 6.0 - Featured Content
require get_template_directory() . '/inc/jetpack/featured-content.php';