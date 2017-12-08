<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * 1.0 - Post and Page Navigation
 * 2.0 - Breadcrumbs
 * 3.0 - Hero Background
 * 4.0 - Image Attachments
 * 5.0 - Categorized Blog
 * 6.0 - Entry Meta
 * 7.0 - Social Profiles
 * 8.0 - Archives
 *
 * @see     function get_template_directory
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

// 1.0 - Post and Page Navigation
require get_template_directory() . '/inc/template-tags/navigation.php';

// 2.0 - Breadcrumbs
require get_template_directory() . '/inc/template-tags/breadcrumbs.php';

// 3.0 - Hero Background
require get_template_directory() . '/inc/template-tags/hero-background.php';

// 4.0 - Image Attachments
require get_template_directory() . '/inc/template-tags/the-attached-image.php';

// 5.0 - Categorized Blog
require get_template_directory() . '/inc/template-tags/categorized-blog.php';

// 6.0 - Entry Meta
require get_template_directory() . '/inc/template-tags/entry-meta.php';

// 7.0 - Social Profiles
require get_template_directory() . '/inc/template-tags/social-profiles.php';

// 8.0 - Archives
require get_template_directory() . '/inc/template-tags/archives.php';