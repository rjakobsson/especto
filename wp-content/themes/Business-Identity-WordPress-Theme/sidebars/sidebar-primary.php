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
 * Description: Primary Sidebar
 *
 * @see     function do_action
 * @see     function dynamic_sidebar
 * @see     function is_active_sidebar
 * @see     function is_page_template
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

if (
	// Bail if full width page template is in use
	is_page_template( 'page-templates/full-width.php' ) ||
	// Bail if no active sidebar is in use
	! is_active_sidebar( 'sidebar-1' )
) {
	return;
} ?>

<div class="four column widget-area">
	<div id="secondary" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>

		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
</div><!-- .widget-area -->