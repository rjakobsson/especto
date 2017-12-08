<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 *  1.0 - Author Archive Handling
 *  2.0 - Excerpts
 *  3.0 - Better Search Input
 *  4.0 - Comment Form Notes
 *  5.0 - WordPress Tag Cloud
 *  6.0 - Nav Menu Fallback
 *  7.0 - Gallery Shortcode Attributes
 *  8.0 - WordPress Captions
 *  9.0 - WordPress Title
 * 10.0 - JavaScript Detection
 *
 * @see     function get_template_directory
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

// 1.0 - Author Archive Handling
require get_template_directory() . '/inc/extras/authors.php';

// 2.0 - Excerpts
require get_template_directory() . '/inc/extras/excerpts.php';

// 3.0 - Better Search Input
require get_template_directory() . '/inc/extras/search.php';

// 4.0 - Comment Form Notes
require get_template_directory() . '/inc/extras/comment-form.php';

// 5.0 - WordPress Tag Cloud
require get_template_directory() . '/inc/extras/tag-cloud.php';

// 6.0 - Nav Menu Fallback
require get_template_directory() . '/inc/extras/nav.php';

// 7.0 - Gallery Shortcode Attributes
require get_template_directory() . '/inc/extras/gallery.php';

// 8.0 - WordPress Captions
require get_template_directory() . '/inc/extras/captions.php';

// 9.0 - WordPress Title
require get_template_directory() . '/inc/extras/wp-title.php';

// 10.0 - JavaScript Detection
require get_template_directory() . '/inc/extras/js.php';